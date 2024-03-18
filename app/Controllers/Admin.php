<?php

namespace App\Controllers;

class Admin extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = db_connect();
        session();
    }
    public function is_logged_in()
    {
        $session = session();
        if ($session->get('admin') == null) {
            return false;
        }
        return true;
    }
    public function index()
    {
        if (!$this->is_logged_in()) {
            return redirect()->to(base_url() . 'admin/login');
        }

        $query = $this->db->query("SELECT * FROM books");
        $data["books"] = $query->getResultArray();
        $data["title"] = "Lolla Yayınları | Admin";
        $data["user"] = session()->get('admin');

        if (isset($_GET["success"])) {
            $data["success"] = $_GET["success"];
        }
        if (isset($_GET["deleted"])) {
            $data["deleted"] = $_GET["deleted"];
        }

        return view('admin/home', $data);
    }
    public function editbook($id)
    {
        if (!$this->is_logged_in()) {
            return redirect()->to(base_url() . 'admin/login');
        }

        if ($this->request->is("post")) {
            $data = [
                'name' => $this->request->getPost('name'),
                'author' => $this->request->getPost('author'),
                'price' => $this->request->getPost('price'),
                'language' => $this->request->getPost('language'),
                'cover' => $this->request->getPost('cover'),
                'type' => $this->request->getPost('type'),
                'code' => $this->request->getPost('code'),
                'stock' => $this->request->getPost('stock'),
                'page' => $this->request->getPost('page'),
                'category' => $this->request->getPost('category'),
            ];

            $file = $this->request->getFile('fileInput');

            if ($file->isValid() && !$file->hasMoved()) {
                $newName = md5(uniqid()) . "." . $file->getExtension();

                $file->move(FCPATH  . 'img/books', $newName);

                $data['img'] = $newName;
            }

            $id = $this->request->getPost('id');
            $builder = $this->db->table('books');

            $builder->where('id', $id);
            $builder->update($data);
            return redirect()->to(base_url() . "/admin/editbook/" . $id . "?success");
        }
        if (isset($_GET["success"])) {
            $data["success"] = $_GET["success"];
        }

        $query = $this->db->query("SELECT name FROM authors");
        $data["authors"] = $query->getResult();

        $query = $this->db->query("SELECT * FROM books where id = ?", [$this->db->escapeString($id)]);
        $data["book"] = $query->getResultArray()[0];

        $data["title"] = "Lolla Yayınları | Admin";

        return view('admin/editbook', $data);
    }
    public function addbook()
    {
        if (!$this->is_logged_in()) {
            return redirect()->to(base_url() . 'admin/login');
        }

        if ($this->request->is("post")) {
            $data = [
                'name' => $this->request->getPost('name'),
                'author' => $this->request->getPost('author'),
                'price' => $this->request->getPost('price'),
                'language' => $this->request->getPost('language'),
                'cover' => $this->request->getPost('cover'),
                'type' => $this->request->getPost('type'),
                'code' => $this->request->getPost('code'),
                'stock' => $this->request->getPost('stock'),
                'page' => $this->request->getPost('page'),
                'category' => $this->request->getPost('category'),
            ];

            $query = $this->db->query("SELECT * FROM authors where name = ?", [$this->db->escapeString($data["author"])]);

            //yazar yoksa ekle
            if (empty($query->getRow())) {
                $builder = $this->db->table('authors');
                $builder->insert(['name' => $data["author"]]);
            }

            $file = $this->request->getFile('fileInput');

            if ($file->isValid() && !$file->hasMoved()) {
                $newName = md5(uniqid()) . "." . $file->getExtension();

                $file->move(FCPATH  . 'img/books', $newName);

                $data['img'] = $newName;
            }

            $builder = $this->db->table('books');

            $builder->insert($data);

            return redirect()->to(base_url() . 'admin?success=' . $data["name"]);
        }

        $query = $this->db->query("SELECT name FROM authors");
        $data["authors"] = $query->getResult();

        $data["title"] = "Lolla Yayınları | Admin";
        return view('admin/addbook', $data);
    }
    public function deletebook()
    {
        if (!$this->is_logged_in()) {
            return redirect()->to(base_url() . 'admin/login');
        }

        $name = $this->request->getPost('name');
        $id = $this->request->getPost('id');

        $builder = $this->db->table('books');

        $builder->where('id', $id);
        $builder->delete();

        return redirect()->to(base_url() . 'admin?deleted=' . $name);
    }
    public function news()
    {
        if (!$this->is_logged_in()) {
            return redirect()->to(base_url() . 'admin/login');
        }

        $query = $this->db->query("SELECT * FROM news");
        $data["news"] = $query->getResultArray();
        $data["title"] = "Lolla Yayınları | Admin";
        $data["user"] = session()->get('admin');

        if (isset($_GET["success"])) {
            $data["success"] = $_GET["success"];
        }
        if (isset($_GET["deleted"])) {
            $data["deleted"] = $_GET["deleted"];
        }

        return view('admin/news', $data);
    }
    public function addnews()
    {
        if (!$this->is_logged_in()) {
            return redirect()->to(base_url() . 'admin/login');
        }

        if ($this->request->is("post")) {
            $data = [
                'title' => $this->request->getPost('title'),
                'content' => $this->request->getPost('content'),
            ];

            $file = $this->request->getFile('fileInput');

            if ($file->isValid() && !$file->hasMoved()) {
                $newName = md5(uniqid()) . "." . $file->getExtension();

                $file->move(FCPATH  . 'img/news', $newName);

                $data['img'] = $newName;
            }

            $builder = $this->db->table('news');

            $builder->insert($data);

            return redirect()->to(base_url() . 'admin/addnews?success=' . $data["title"]);
        }

        $data["title"] = "Lolla Yayınları | Admin";
        return view('admin/addnews', $data);
    }
    public function editnews($id)
    {
        if (!$this->is_logged_in()) {
            return redirect()->to(base_url() . 'admin/login');
        }

        if ($this->request->is("post")) {
            $data = [
                'title' => $this->request->getPost('title'),
                'content' => $this->request->getPost('content'),
            ];

            $file = $this->request->getFile('fileInput');

            if ($file->isValid() && !$file->hasMoved()) {
                $newName = md5(uniqid()) . "." . $file->getExtension();

                $file->move(FCPATH  . 'img/news', $newName);

                $data['img'] = $newName;
            }

            $id = $this->request->getPost('id');
            $builder = $this->db->table('news');

            $builder->where('id', $id);
            $builder->update($data);
            return redirect()->to(base_url() . "/admin/editnews/" . $id . "?success");
        }
        if (isset($_GET["success"])) {
            $data["success"] = $_GET["success"];
        }

        $query = $this->db->query("SELECT * FROM news where id = ?", [$this->db->escapeString($id)]);
        $data["news"] = $query->getRow();

        $data["title"] = "Lolla Yayınları | Admin";

        return view('admin/editnews', $data);
    }
    public function deletenews()
    {
        if (!$this->is_logged_in()) {
            return redirect()->to(base_url() . 'admin/login');
        }

        $title = $this->request->getPost('title');
        $id = $this->request->getPost('id');

        $builder = $this->db->table('news');

        $builder->where('id', $id);
        $builder->delete();

        return redirect()->to(base_url() . 'admin/news?deleted=' . $title);
    }
    public function orders()
    {
        if (!$this->is_logged_in()) {
            return redirect()->to(base_url() . 'admin/login');
        }
        //ödemesi tamamlanmış siparişleri al
        $query = $this->db->query("SELECT * FROM orders where paid=1");
        $data["orders"] = $query->getResultArray();
        $data["title"] = "Lolla Yayınları | Admin";
        $data["user"] = session()->get('admin');

        if (isset($_GET["success"])) {
            $data["success"] = $_GET["success"];
        }

        if (isset($_GET["deleted"])) {
            $data["deleted"] = $_GET["deleted"];
        }

        return view('admin/orders', $data);
    }
    public function order_details($id)
    {
        if (!$this->is_logged_in()) {
            return redirect()->to(base_url() . 'admin/login');
        }
        if ($this->request->is("post")) {
            $data_id = $this->request->getPost('id');
            $data = [
                'status' => $this->request->getPost('status'),
            ];
            $builder = $this->db->table('orders');

            $builder->where('id', $data_id);
            $builder->update($data);
            return redirect()->to(base_url() . "admin/order-details/" . $data_id . "?success=Güncellememe başarılı.");
        }

        $builder = $this->db->table('orders');
        $builder->where('id', $id);
        $query = $builder->get();
        //sipariş yoksa siparişler sayfasına yönlendir
        if (count($query->getResultArray()) <= 0) {
            return redirect()->to(base_url() . 'admin/orders');
        }
        $order = $query->getResultArray()[0];

        $data["basketItems"] = json_decode($order["basketItems"], true);
        $data["order"] = $order;

        $data["title"] = "Lolla Yayınları | Sipariş Detayı";
        return view('admin/order-details', $data);
    }
    public function login()
    {
        if ($this->request->is("post")) {
            $data = [
                'username' => $this->request->getPost('username'),
                'password' => $this->request->getPost('password'),
            ];

            // Check if user exists
            $builder = $this->db->table('admins');
            $builder->where('username', $data["username"]);
            $query = $builder->get();

            $users = $query->getResultArray();

            if (!empty($users)) {
                //verify password
                $user = $users[0];
                if (!password_verify(strval($data['password']), $user["password"])) {
                    $data["title"] = "Lolla Yayınları | Admin Girişi";
                    $data["error"] = "Kullanıcı adı veya şifre yanlış!";
                    return view('admin/login', $data);
                }

                // Create session
                $session = session();
                $session->set('admin', $user["username"]);

                return redirect()->to(base_url() . 'admin');
            } else {
                // User not found
                $data["title"] = "Lolla Yayınları | Admin Girişi";
                $data["error"] = "Kullanıcı adı veya şifre yanlış!";
            }

            return view('admin/login', $data);
        }
        $data["title"] = "Lolla Yayınları | Admin Girişi";
        return view('admin/login', $data);
    }
    public function logout()
    {
        if (!$this->is_logged_in()) {
            return redirect()->to(base_url() . 'admin/login');
        }

        $session = session();
        $session->destroy();
        return redirect()->to(base_url() . 'admin/login');
    }
}
