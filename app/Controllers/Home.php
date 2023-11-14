<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data["books"] = [
            [
                'name' => 'Yokluğun Bolluğu',
                'author' => 'Samet Turgut',
                'img' => '1'
            ],
            [
                'name' => 'Yasak Cennet',
                'author' => 'Mürşide Toslak',
                'img' => '2'
            ],
            [
                'name' => 'Umudum Aşk',
                'author' => 'Özlem Uğurlu Aydın',
                'img' => '3'
            ],
            [
                'name' => 'Şovalyenin Dönüşü',
                'author' => 'Emine Özel Summak',
                'img' => '4'
            ],
            [
                'name' => 'Yakışıklı Bakıcı',
                'author' => 'Aleyna Daşkıran',
                'img' => '5'
            ],
            [
                'name' => 'Şovalyenin Dönüşü',
                'author' => 'Emine Özel Summak',
                'img' => '6'
            ]
        ];

        return view('home', $data);
    }
    public function hakkimizda(): string
    {
        return view('hakkimizda');
    }
    public function iletisim(): string
    {
        return view('iletisim');
    }
}
