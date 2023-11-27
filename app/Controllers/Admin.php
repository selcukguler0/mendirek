<?php

namespace App\Controllers;

class Admin extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = db_connect();
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
        $data["title"] = "Mendirek Dükkan | Admin";
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

        $data["title"] = "Mendirek Dükkan | Admin";
        
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

        $data["title"] = "Mendirek Dükkan | Admin";
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
                    $data["title"] = "Mendirek Dükkan | Admin Girişi";
                    $data["error"] = "Kullanıcı adı veya şifre yanlış!";
                    return view('admin/login', $data);
                }
    
                // Create session
                $session = session();
                $session->set('admin', $user["username"]);
    
                return redirect()->to(base_url() . 'admin');
            } else {
                // User not found
                $data["title"] = "Mendirek Dükkan | Admin Girişi";
                $data["error"] = "Kullanıcı adı veya şifre yanlış!";
            }
    
            return view('admin/login', $data);
        }
        $data["title"] = "Mendirek Dükkan | Admin Girişi";
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
