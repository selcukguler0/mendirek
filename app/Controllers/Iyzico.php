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
    // public function payWithIyzico()
    // {
    //     $request = new \Iyzipay\Request\CreatePayWithIyzicoInitializeRequest();
    //     $request->setLocale(\Iyzipay\Model\Locale::TR);
    //     $request->setConversationId("123456789");
    //     $request->setPrice("1");
    //     $request->setPaidPrice("1.2");
    //     $request->setCurrency(\Iyzipay\Model\Currency::TL);
    //     $request->setBasketId("B67832");
    //     $request->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);
    //     $request->setCallbackUrl("https://www.merchant.com/callback");
    //     $request->setEnabledInstallments(array(2, 3, 6, 9));

    //     $buyer = new \Iyzipay\Model\Buyer();
    //     $buyer->setId("BY789");
    //     $buyer->setName("John");
    //     $buyer->setSurname("Doe");
    //     $buyer->setGsmNumber("+905350000000");
    //     $buyer->setEmail("email@email.com");
    //     $buyer->setIdentityNumber("74300864791");
    //     $buyer->setLastLoginDate("2015-10-05 12:43:35");
    //     $buyer->setRegistrationDate("2013-04-21 15:12:09");
    //     $buyer->setRegistrationAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
    //     $buyer->setIp("85.34.78.112");
    //     $buyer->setCity("Istanbul");
    //     $buyer->setCountry("Turkey");
    //     $buyer->setZipCode("34732");
    //     $request->setBuyer($buyer);

    //     $shippingAddress = new \Iyzipay\Model\Address();
    //     $shippingAddress->setContactName("Jane Doe");
    //     $shippingAddress->setCity("Istanbul");
    //     $shippingAddress->setCountry("Turkey");
    //     $shippingAddress->setAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
    //     $shippingAddress->setZipCode("34742");
    //     $request->setShippingAddress($shippingAddress);

    //     $billingAddress = new \Iyzipay\Model\Address();
    //     $billingAddress->setContactName("Jane Doe");
    //     $billingAddress->setCity("Istanbul");
    //     $billingAddress->setCountry("Turkey");
    //     $billingAddress->setAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
    //     $billingAddress->setZipCode("34742");
    //     $request->setBillingAddress($billingAddress);

    //     $basketItems = array();
    //     $firstBasketItem = new \Iyzipay\Model\BasketItem();
    //     $firstBasketItem->setId("BI101");
    //     $firstBasketItem->setName("Binocular");
    //     $firstBasketItem->setCategory1("Collectibles");
    //     $firstBasketItem->setCategory2("Accessories");
    //     $firstBasketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
    //     $firstBasketItem->setPrice("0.3");
    //     $basketItems[0] = $firstBasketItem;

    //     $secondBasketItem = new \Iyzipay\Model\BasketItem();
    //     $secondBasketItem->setId("BI102");
    //     $secondBasketItem->setName("Game code");
    //     $secondBasketItem->setCategory1("Game");
    //     $secondBasketItem->setCategory2("Online Game Items");
    //     $secondBasketItem->setItemType(\Iyzipay\Model\BasketItemType::VIRTUAL);
    //     $secondBasketItem->setPrice("0.5");
    //     $basketItems[1] = $secondBasketItem;

    //     $thirdBasketItem = new \Iyzipay\Model\BasketItem();
    //     $thirdBasketItem->setId("BI103");
    //     $thirdBasketItem->setName("Usb");
    //     $thirdBasketItem->setCategory1("Electronics");
    //     $thirdBasketItem->setCategory2("Usb / Cable");
    //     $thirdBasketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
    //     $thirdBasketItem->setPrice("0.2");
    //     $basketItems[2] = $thirdBasketItem;
    //     $request->setBasketItems($basketItems);

    //     # make request
    //     $payWithIyzicoInitialize = \Iyzipay\Model\PayWithIyzicoInitialize::create($request, $this->options());

    //     # print result
    //     return $payWithIyzicoInitialize->getRawResult();
    // }

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
        $request = new \Iyzipay\Request\CreatePaymentRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
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

        $secondBasketItem = new \Iyzipay\Model\BasketItem();
        $secondBasketItem->setId("BI102");
        $secondBasketItem->setName("Game code");
        $secondBasketItem->setCategory1("Game");
        $secondBasketItem->setCategory2("Online Game Items");
        $secondBasketItem->setItemType(\Iyzipay\Model\BasketItemType::VIRTUAL);
        $secondBasketItem->setPrice("0.5");
        $basketItems[1] = $secondBasketItem;

        $thirdBasketItem = new \Iyzipay\Model\BasketItem();
        $thirdBasketItem->setId("BI103");
        $thirdBasketItem->setName("Usb");
        $thirdBasketItem->setCategory1("Electronics");
        $thirdBasketItem->setCategory2("Usb / Cable");
        $thirdBasketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
        $thirdBasketItem->setPrice("0.2");
        $basketItems[2] = $thirdBasketItem;
        $request->setBasketItems($basketItems);

        # make request
        $threedsInitialize = \Iyzipay\Model\ThreedsInitialize::create($request, $this->options());

        $response = json_decode($threedsInitialize->getRawResult());
        # print result
        if ($response->status == "success") {
            //threeDSHtmlContent db ye kayıt et

            return redirect()->to(base_url() . "/iyzico/payout");
        }
        return redirect()->to(base_url());
    }
    //3. Adım - 2. adımda dönen threeDSHtmlContent base64 decoded olarak iframe içinde gösterilir
    public function payout()
    {
        $threeDSHtmlContent = "PCFkb2N0eXBlIGh0bWw+CjxodG1sIGxhbmc9ImVuIj4KPGhlYWQ+CiAgICA8dGl0bGU+aXl6aWNvIE1vY2sgM0QtU2VjdXJlIFByb2Nlc3NpbmcgUGFnZTwvdGl0bGU+CjwvaGVhZD4KPGJvZHk+Cjxmb3JtIGlkPSJpeXppY28tM2RzLWZvcm0iIGFjdGlvbj0iaHR0cHM6Ly9zYW5kYm94LWFwaS5peXppcGF5LmNvbS9wYXltZW50L21vY2svaW5pdDNkcyIgbWV0aG9kPSJwb3N0Ij4KICAgIDxpbnB1dCB0eXBlPSJoaWRkZW4iIG5hbWU9Im9yZGVySWQiIHZhbHVlPSJtb2NrMTItOTgzNDU2OTI5NzE2MjUwMWl5emlvcmQiPgogICAgPGlucHV0IHR5cGU9ImhpZGRlbiIgbmFtZT0iYmluIiB2YWx1ZT0iNTUyODc5Ij4KICAgIDxpbnB1dCB0eXBlPSJoaWRkZW4iIG5hbWU9InN1Y2Nlc3NVcmwiIHZhbHVlPSJodHRwczovL3NhbmRib3gtYXBpLml5emlwYXkuY29tL3BheW1lbnQvaXl6aXBvcy9jYWxsYmFjazNkcy9zdWNjZXNzLzMiPgogICAgPGlucHV0IHR5cGU9ImhpZGRlbiIgbmFtZT0iZmFpbHVyZVVybCIgdmFsdWU9Imh0dHBzOi8vc2FuZGJveC1hcGkuaXl6aXBheS5jb20vcGF5bWVudC9peXppcG9zL2NhbGxiYWNrM2RzL2ZhaWx1cmUvMyI+CiAgICA8aW5wdXQgdHlwZT0iaGlkZGVuIiBuYW1lPSJjb25maXJtYXRpb25VcmwiIHZhbHVlPSJodHRwczovL3NhbmRib3gtYXBpLml5emlwYXkuY29tL3BheW1lbnQvbW9jay9jb25maXJtM2RzIj4KICAgIDxpbnB1dCB0eXBlPSJoaWRkZW4iIG5hbWU9IlBhUmVxIiB2YWx1ZT0iZDU0ZWNlODItMWVkNi00MWNiLTljOGQtYjAwZmQyMTBlYmIwIj4KPC9mb3JtPgo8c2NyaXB0IHR5cGU9InRleHQvamF2YXNjcmlwdCI+CiAgICBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgiaXl6aWNvLTNkcy1mb3JtIikuc3VibWl0KCk7Cjwvc2NyaXB0Pgo8L2JvZHk+CjwvaHRtbD4=";
        $decodedString = base64_decode($threeDSHtmlContent);

        $data["title"] = "Mendirek Dükkan | Ödeme";
        $data["threeDSHtmlContent"] = $decodedString;
        return view('/iyzico/payout', $data);
    }
    //4. Adım - Yönlendirme ve Kontrol
    public function check3D()
    {
        $postData = $this->request->getJSON();

        echo json_encode($postData);

        return;
    }

    public static function options()
    {
        $options = new \Iyzipay\Options();
        $options->setApiKey('sandbox-wHTcjZPIjtA6IqUNixph8f2n8vTTmbx0');
        $options->setSecretKey('sandbox-6UmvawgrQ1RdOShzoHJf9xTDvV0fU0Cb');
        $options->setBaseUrl('https://sandbox-api.iyzipay.com');

        return $options;
    }
}
