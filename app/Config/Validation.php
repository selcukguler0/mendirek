<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------

    public $login = [
        'email' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'E-posta alanı boş bırakılamaz.',
            ]
        ],
        'password' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Şifre alanı boş bırakılamaz.',
            ]
        ],
    ];
    public $register = [
        'fullname' => [
            'rules' => 'required|min_length[6]|max_length[30]', [
                'required' => 'Ad soyad alanı boş bırakılamaz.',
                'min_length' => 'Ad soyad en az 6 karakterden oluşmalıdır.',
                'max_length' => 'Ad soyad en fazla 30 karakterden oluşmalıdır.'
            ]
        ],
        'email' => [
            'rules' => 'required|valid_email|is_unique[users.email]',
            'errors' => [
                'required' => 'E-posta alanı boş bırakılamaz.',
                'valid_email' => 'E-posta adresi geçerli değil.',
                'is_unique' => 'Bu e-posta adresi zaten kullanılmış.'
            ]
        ],
        'password' => [
            'rules'  => 'required|max_length[32]|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/]',
            'errors' => [
                'required' => 'Şifre alanı boş bırakılamaz.',
                'regex_match' => 'Şifre en az 8 karakterden oluşmalıdır ve en az 1 büyük harf, 1 küçük harf, 1 sayı ve 1 özel karakter içermelidir.',
                'max_length' => 'Şifre en fazla 32 karakterden oluşmalıdır.'
            ]
        ],
        'confirm_password' => [
            'rules' => 'required|matches[password]',
            'errors' => [
                'required' => 'Şifre tekrarı alanı boş bırakılamaz.',
                'matches' => 'Şifreler uyuşmuyor.'
            ]
        ],
        'phone' => [
            'rules' => 'required|numeric',
            'errors' => [
                'required' => 'Telefon numarası alanı boş bırakılamaz.',
                'numeric' => 'Telefon numarası sadece rakamlardan oluşmalıdır.'
            ]
        ],
        'terms_and_conds' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Üyelik sözleşmesi kabul edilmelidir.'
            ],
        ],
        'kvkk' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'KVKK kabul edilmelidir.'
            ]
        ],
    ];
}
