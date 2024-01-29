<?php

namespace App\Controllers;

//import Iyzipay from Libraries/Iyzipay
require APPPATH . 'Libraries/Iyzipay/IyzipayBootstrap.php';

use IyzipayBootstrap;

IyzipayBootstrap::init();

class Iyzico extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = db_connect();
        session();
    }

    //--------------------------------------------------------------------
    //1. Adım - Taksit ve BIN Sorgulama
    //taksit seçeneği varsa installmentDetails altında taksit bilgileri de döner (yoksa installmentDetails tek 1 elemanlı döner)
    public function binControl()
    {
        //price binNumber conversationId - bu değerleri raw post data'dan al
        $postData = $this->request->getJSON();

        $request = new \Iyzipay\Request\RetrieveInstallmentInfoRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId($postData->conversationId);
        $request->setBinNumber($postData->binNumber);
        $request->setPrice($postData->price);

        $installmentInfo = \Iyzipay\Model\InstallmentInfo::retrieve($request, $this->options());

        return $installmentInfo->getRawResult();
    }
    //2. Adım - 3DS Başlatma
    public function start3DS()
    {
        //kullanıcı
        $email = session()->get('user');
        $builder = $this->db->table('users');
        $builder->where('email', $email);
        $query = $builder->get();
        $user = $query->getRow();

        //gelen data
        $postData = $this->request->getPost();
        $order_cart = json_decode($postData["order_cart"]);

        $order_total = 0;
        $books = array();
        //idlere bakarak databaseden fiyatları çek
        $builder = $this->db->table('books');
        foreach ($order_cart as $key => $value) {
            $builder->where('id', $value->id);
            $query = $builder->get();
            $row = $query->getRow();
            $books[$value->id] = $row;
            $order_total += $row->price;
        }
        $ord_billing_name = $postData["ord_billing_name"];
        $ord_billing_phone = $postData["ord_billing_phone"];
        $ord_billing_city = $postData["ord_billing_city"];
        $ord_billing_town = $postData["ord_billing_town"];
        $ord_billing_address = $postData["ord_billing_address"];
        $ord_billing_postalcode = $postData["ord_billing_postalcode"];

        $ord_shipping_note = $postData["ord_shipping_note"];


        // $ord_billing_firm_name = $ord_billing_name;
        // $ord_billing_tax_office = "";
        // $ord_billing_tax_number = "";

        //varsayılan olarak fatura adresi ile aynı
        $ord_shipping_name = $ord_billing_name;
        $ord_shipping_phone = $ord_billing_phone;
        $ord_shipping_address = $ord_billing_address;
        $ord_shipping_city = $ord_billing_city;
        $ord_shipping_town = $ord_billing_town;

        //tc kimlik veya vergi numarası
        $ord_billing_tax_number = $postData["ord_billing_tax_number"];

        //fatura adresi farklı ise
        if (!empty($postData["different_address"]) && $postData["different_address"] == "1") {
            $ord_shipping_name = $postData["ord_shipping_name"];
            $ord_shipping_phone = $postData["ord_shipping_phone"];
            $ord_shipping_address = $postData["ord_shipping_address"];
            $ord_shipping_city = $postData["ord_shipping_city"];
            $ord_shipping_town = $postData["ord_shipping_town"];
        }

        //taksit miktarı
        $installments = !empty($postData["installments"]) ? $postData["installments"] : 1;

        //kart bilgileri
        $ord_ccowner = $postData["ord_ccowner"];
        $ord_ccno = $postData["ord_ccno"];
        $ord_ccexpdate = $postData["ord_ccexpdate"];
        $ord_cvc = $postData["ord_cvc"];
        $conversationId = $postData["conversationId"];

        $request = new \Iyzipay\Request\CreatePaymentRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId($conversationId);
        $request->setPrice($order_total);
        $request->setPaidPrice($order_total);
        $request->setCurrency(\Iyzipay\Model\Currency::TL);
        $request->setInstallment($installments);
        $request->setBasketId("B67832");
        $request->setPaymentChannel(\Iyzipay\Model\PaymentChannel::WEB);
        $request->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);
        $request->setCallbackUrl(base_url() . "iyzico/check3D");

        $paymentCard = new \Iyzipay\Model\PaymentCard();
        $paymentCard->setCardHolderName($ord_ccowner);
        //sandbox card no: 5528790000000008
        $paymentCard->setCardNumber($ord_ccno);
        $paymentCard->setExpireMonth($ord_ccexpdate["m"]);
        $paymentCard->setExpireYear($ord_ccexpdate["y"]);
        $paymentCard->setCvc($ord_cvc);
        $paymentCard->setRegisterCard(0);
        $request->setPaymentCard($paymentCard);

        $buyer = new \Iyzipay\Model\Buyer();
        $buyer->setId($user->id);
        $buyer->setName($ord_billing_name);
        $buyer->setSurname($ord_billing_name);
        $buyer->setGsmNumber($ord_billing_phone);
        $buyer->setEmail($email);
        $buyer->setIdentityNumber($ord_billing_tax_number);
        $buyer->setLastLoginDate(date('Y-m-d H:i:s'));
        $buyer->setRegistrationDate($user->createdAt);
        $buyer->setRegistrationAddress($ord_billing_address);
        $buyer->setIp("85.34.78.112");
        $buyer->setCity("Istanbul");
        $buyer->setCountry("Turkey");
        $buyer->setZipCode("34732");
        $request->setBuyer($buyer);

        $shippingAddress = new \Iyzipay\Model\Address();
        $shippingAddress->setContactName($ord_shipping_name);
        $shippingAddress->setCity($ord_shipping_city);
        $shippingAddress->setCountry("Turkey");
        $shippingAddress->setAddress($ord_shipping_address);
        $shippingAddress->setZipCode("34000");
        $request->setShippingAddress($shippingAddress);

        $billingAddress = new \Iyzipay\Model\Address();
        $billingAddress->setContactName($ord_billing_name);
        $billingAddress->setCity("Istanbul");
        $billingAddress->setCountry("Turkey");
        $billingAddress->setAddress($ord_billing_address);
        $shippingAddress->setZipCode("34000");
        $request->setBillingAddress($billingAddress);

        $basketItems = array();
        foreach ($books as $key => $value) {
            $basketItem = new \Iyzipay\Model\BasketItem();
            $basketItem->setId($value->id);
            $basketItem->setName($value->name);
            $basketItem->setCategory1("Kitap");
            $basketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
            $basketItem->setPrice($value->price);
            $basketItems[] = $basketItem;
        }
        $request->setBasketItems($basketItems);

        # istek gönderiliyor
        $threedsInitialize = \Iyzipay\Model\ThreedsInitialize::create($request, $this->options());

        $response = json_decode($threedsInitialize->getRawResult());
        # işlem başarılı ise
        if ($response->status == "success") {
            //db ye kayıt et
            $postData["threeDSHtmlContent"] = $response->threeDSHtmlContent;
            $postData["conversationId"] = $conversationId;
            $postData["orderTotal"] = $order_total;
            $postData["userEmail"] = $email;
            $postData["basketItems"] = json_encode($books);

            //tabloda tutulmayan değerleri sil
            unset($postData["ord_ccowner"]);
            unset($postData["ord_ccno"]);
            unset($postData["ord_ccexpdate"]);
            unset($postData["ord_cvc"]);
            unset($postData["order_cart"]);
            unset($postData["save"]);

            $builder = $this->db->table('orders');
            $builder->insert($postData);

            return json_encode([
                "ok" => true,
                "redirectUrl" => base_url() . "iyzico/payout?conversationId=" . $conversationId,
            ]);
        }
        # işlem başarısız ise
        return json_encode([
            "ok" => false,
            "errorMessage" => $response->errorMessage,
        ]);
    }
    //3. Adım - 2. adımda dönen threeDSHtmlContent base64 decoded olarak iframe içinde gösterilir
    public function payout()
    {
        $conversationId = $this->request->getGet("conversationId");
        $builder = $this->db->table('orders');
        $builder->where('conversationId', $conversationId);
        $query = $builder->get();
        $row = $query->getRow();

        $threeDSHtmlContent = $row->threeDSHtmlContent;
        $decodedString = base64_decode(strval($threeDSHtmlContent));

        echo $decodedString;
        $data["title"] = "Mendirek Dükkan | Ödeme";
        $data["threeDSHtmlContent"] = $decodedString;
        return view('/iyzico/payout', $data);
    }
    //4. Adım - Yönlendirme ve Kontrol
    //sms kontrolü sonrası 3D doğrulama başarılı ise success sayfasına yönlendirilir
    public function check3D()
    {
        $postData = $this->request->getPost();

        $builder = $this->db->table('orders');
        $builder->where('conversationId', $postData["conversationId"]);
        if ($postData["status"] == "success") {
            $builder->update(['status' => 1]);
            return redirect()->to(base_url() . "iyzico/success");
        }
        $builder->update(['status' => 0]);
        return redirect()->to(base_url() . "iyzico/fail");
    }

    //başarılı ödeme sayfası
    //success
    public function success()
    {
        $data["title"] = "Mendirek Dükkan | Ödeme Başarılı";
        return view('/iyzico/success', $data);
    }
    //başarısız ödeme sayfası
    //fail
    public function fail()
    {
        $data["title"] = "Mendirek Dükkan | Ödeme Başarısız";
        return view('/iyzico/fail', $data);
    }

    public static function options()
    {
        $options = new \Iyzipay\Options();
        $options->setApiKey(getenv("iyzico.apikey"));
        $options->setSecretKey(getenv("iyzico.secretkey"));
        $options->setBaseUrl(getenv("iyzico.baseurl"));

        return $options;
    }
    public function randomConversationId()
    {
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return substr(str_shuffle($permitted_chars), 0, 10);
    }
}
