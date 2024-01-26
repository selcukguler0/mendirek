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
        $conversationId = $this->randomConversationId();
        $request = new \Iyzipay\Request\CreatePaymentRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId($conversationId);
        $request->setPrice("1");
        $request->setPaidPrice("1.2");
        $request->setCurrency(\Iyzipay\Model\Currency::TL);
        $request->setInstallment(1);
        $request->setBasketId("B67832");
        $request->setPaymentChannel(\Iyzipay\Model\PaymentChannel::WEB);
        $request->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);
        $request->setCallbackUrl(base_url() . "iyzico/check3D");

        $paymentCard = new \Iyzipay\Model\PaymentCard();
        $paymentCard->setCardHolderName("John Doe");
        $paymentCard->setCardNumber("5528790000000008");
        $paymentCard->setExpireMonth("12");
        $paymentCard->setExpireYear("2030");
        $paymentCard->setCvc("123");
        $paymentCard->setRegisterCard(0);
        $request->setPaymentCard($paymentCard);

        $buyer = new \Iyzipay\Model\Buyer();
        $buyer->setId("BY789");
        $buyer->setName("John");
        $buyer->setSurname("Doe");
        $buyer->setGsmNumber("+905350000000");
        $buyer->setEmail("email@email.com");
        $buyer->setIdentityNumber("74300864791");
        $buyer->setLastLoginDate("2015-10-05 12:43:35");
        $buyer->setRegistrationDate("2013-04-21 15:12:09");
        $buyer->setRegistrationAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
        $buyer->setIp("85.34.78.112");
        $buyer->setCity("Istanbul");
        $buyer->setCountry("Turkey");
        $buyer->setZipCode("34732");
        $request->setBuyer($buyer);

        $shippingAddress = new \Iyzipay\Model\Address();
        $shippingAddress->setContactName("Jane Doe");
        $shippingAddress->setCity("Istanbul");
        $shippingAddress->setCountry("Turkey");
        $shippingAddress->setAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
        $shippingAddress->setZipCode("34742");
        $request->setShippingAddress($shippingAddress);

        $billingAddress = new \Iyzipay\Model\Address();
        $billingAddress->setContactName("Jane Doe");
        $billingAddress->setCity("Istanbul");
        $billingAddress->setCountry("Turkey");
        $billingAddress->setAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
        $billingAddress->setZipCode("34742");
        $request->setBillingAddress($billingAddress);

        $basketItems = array();
        $firstBasketItem = new \Iyzipay\Model\BasketItem();
        $firstBasketItem->setId("BI101");
        $firstBasketItem->setName("Binocular");
        $firstBasketItem->setCategory1("Collectibles");
        $firstBasketItem->setCategory2("Accessories");
        $firstBasketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
        $firstBasketItem->setPrice("0.3");
        $basketItems[0] = $firstBasketItem;
        
        $request->setBasketItems($basketItems);

        # make request
        $threedsInitialize = \Iyzipay\Model\ThreedsInitialize::create($request, $this->options());

        $response = json_decode($threedsInitialize->getRawResult());
        # print result
        if ($response->status == "success") {
            //threeDSHtmlContent db ye kayıt et
            $data = [
                'conversationId' => $conversationId,
                'threeDSHtmlContent' => $response->threeDSHtmlContent,
                'basketItems' => json_encode($basketItems),
                'orderTotal' => "100"
            ];
            $builder = $this->db->table('orders');
            $builder->insert($data);

            return redirect()->to(base_url() . "iyzico/payout?conversationId=" . $conversationId);
        }
        return redirect()->to(base_url());
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

        echo json_encode($postData);
        if ($postData["status"] == "success") {
            return redirect()->to(base_url() . "iyzico/success");
        }
        return redirect()->to(base_url() . "iyzico/fail");
    }

    public static function options()
    {
        $options = new \Iyzipay\Options();
        $options->setApiKey('sandbox-wHTcjZPIjtA6IqUNixph8f2n8vTTmbx0');
        $options->setSecretKey('sandbox-6UmvawgrQ1RdOShzoHJf9xTDvV0fU0Cb');
        $options->setBaseUrl('https://sandbox-api.iyzipay.com');

        return $options;
    }
    public function randomConversationId()
    {
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return substr(str_shuffle($permitted_chars), 0, 10);
    }
}
