<?php

namespace App\Controllers;

class User extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = db_connect();
    }
    public function is_logged_in()
    {
        $session = session();
        if ($session->get('user') == null) {
            return false;
        } else {
            return true;
        }
    }
    public function hesabim()
    {
        if (!$this->is_logged_in()) {
            return redirect()->to(base_url() . 'login');
        }
        $email = session()->get('user');
        $query = $this->db->query("SELECT * FROM users WHERE email = '{$email}'");
        $data["user"] = $query->getResultArray()[0];
        
        $data["title"] = "Mendirek Dükkan | Hesabım";
        return view('user/hesabim', $data);
    }

    public function card()
    {
        $data["title"] = "Mendirek Dükkan | Sepetim";
        helper('cookie');
        $cookie = get_cookie('card');
        $data["card"] = json_decode($cookie, true);
        return view('user/card', $data);
    }
    //card sayfası sonrası bilgilerin doldurulduğu sayfa -- /checkout
    public function checkout()
    {
        //tüm şehirleri cities tablosundan çek
        $query = $this->db->query("SELECT * FROM cities");
        $data["cities"] = $query->getResultArray();

        $data["title"] = "Mendirek Dükkan | Ödeme";
        return view('user/checkout', $data);
    }

    // LOGIN - REGISTER - FORGOT PASS - VERIFY MAIL - LOGOUT
    public function login()
    {
        if ($this->request->is("post")) {
            echo 'post';
            $data = [
                'email' => $this->request->getPost('email'),
                'password' => $this->request->getPost('password'),
            ];

            // Check if user exists
            $query = $this->db->query("SELECT * FROM users WHERE email = '" . $data["email"] . "'");

            $users = $query->getResultArray();

            //kullanıcı varsa
            if (!empty($users)) {
                echo 'user found';
                //verify password
                $user = $users[0];
                echo 'password verify: ' . password_hash(strval($data['password']), PASSWORD_DEFAULT);
                if (password_verify(strval($data['password']), $user["password"])) {
                    // Create session
                    $session = session();
                    $session->set('user', $data["email"]);

                    return redirect()->to(base_url() . 'hesabim');
                }
                $data["error"] = "E-posta adresi veya şifre hatalı!";
            }
            //kullanıcı yoksa
            else {
                echo 'user not found';
                $data["error"] = "Bu e-posta adresi ile herhangi bir kullanıcı bulunamadı!";
            }
        }
        $data["title"] = "Mendirek Dükkan | Üye Girişi";

        return view('user/login', $data);
    }
    public function register()
    {
        $data["validation"] = $this->validator;
        if ($this->request->is("post")) {
            echo 'post';
            $data = [
                'fullname' => $this->request->getPost('fullname'),
                'email' => $this->request->getPost('email'),
                'password' => $this->request->getPost('password'),
                'confirm_password' => $this->request->getPost('confirm_password'),
                'phone' => $this->request->getPost('phone'),
                'newsletter' => $this->request->getPost('newsletter'),
                'terms_and_conds' => $this->request->getPost('terms_and_conds'),
                'kvkk' => $this->request->getPost('kvkk'),
            ];
            //doğrulama geçersizse
            if (!$this->validate('register')) {
                echo 'validation failed';
                echo json_encode($this->validator->listErrors());
                $data['validation'] = $this->validator;
            }
            //doğrulama başarılıysa
            else {
                echo 'validation success';
                // Check if user exists
                $query = $this->db->query("SELECT * FROM users WHERE email = '" . $data["email"] . "'");

                $users = $query->getResultArray();

                //kullanıcı yoksa kayıt işlemi devam eder
                if (empty($users)) {
                    echo 'user not found';
                    //hash password
                    $data["password"] = password_hash(strval($data["password"]), PASSWORD_DEFAULT);
                    //generate random token
                    $token = bin2hex(random_bytes(30));

                    //insert user
                    $insertSql = "INSERT INTO users (fullname, email, password, phone) VALUES ('{$data["fullname"]}','{$data["email"]}','{$data["password"]}','{$data["phone"]}')";
                    $this->db->query($insertSql);

                    // mail gönderme işlemi yapılacak


                    // hesap oluşturulduktan sonra mail doğrulama yapılacak
                    return redirect()->to(base_url() . 'verify-mail');
                }
                //kullanıcı varsa
                else {
                    echo 'user found';
                    $data["error"] = "Bu e-posta adresi ile daha önce kayıt olunmuş!";
                }
            }
        }
        $data["title"] = "Mendirek Dükkan | Üye Ol";

        return view('user/register', $data);
    }
    public function forgot_pass()
    {
        if ($this->request->is("post")) {
            $data = [
                'email' => $this->request->getPost('email'),
            ];

            // Check if user exists
            $builder = $this->db->table('users');
            $builder->where('email', $data["email"]);
            $query = $builder->get();

            $users = $query->getResultArray();

            if (!empty($users)) {
                //verify password
                $user = $users[0];
                
                //send mail

                $data["success"] = "Şifre sıfırlama bağlantısı e-posta adresinize gönderildi!";
            } else {
                // User not found
                $data["error"] = "E-posta adresi bulunamadı!";
            }
        }
        $data["title"] = "Mendirek Dükkan | Şifremi Unuttum";

        return view('user/forgot-pass', $data);
    }
    public function activation_code()
    {
        if ($this->request->is("post")) {
            $data = [
                'email' => $this->request->getPost('email'),
            ];

            // Check if user exists
            $builder = $this->db->table('users');
            $builder->where('email', $data["email"]);
            $query = $builder->get();

            $users = $query->getResultArray();

            if (!empty($users)) {
                //verify password
                $user = $users[0];
                
                //send mail

                $data["success"] = "Aktivasyon kodu e-posta adresinize gönderildi!";
            } else {
                // User not found
                $data["error"] = "E-posta adresi bulunamadı!";
            }
        }
        $data["title"] = "Mendirek Dükkan | Aktivasyon Kodu";

        return view('user/activation-code', $data);
    }
    public function verify_mail()
    {
        $data["title"] = "Mendirek Dükkan | E-posta Doğrulama";
        return view('user/verify-mail', $data);
    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url() . 'login');
    }
}
