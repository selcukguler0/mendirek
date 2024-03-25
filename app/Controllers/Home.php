<?php

namespace App\Controllers;

class Home extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = db_connect();
        session();
    }
    public function index(): string
    {
        $query = $this->db->query('SELECT * FROM books');

        $books = $query->getResult();
        $data["books"] = $books;
        $data["featured"] = array_slice($books, 0, 15);
        $data["populer"] = array_slice($books, 15, 30);
        $data["most_sales"] = array_slice($books, 30, count($books));
        $data["title"] = "Lolla Yayınları | Ana Sayfa";

        $data["mainslider"] = [
            ["img" => "/slides/1.png", "url" => "/kitap/50"],
            ["img" => "/slides/2.png", "url" => "/kitap/501"],
        ];

        return view('home', $data);
    }
    public function hakkimizda(): string
    {
        $data["title"] = "Lolla Yayınları | Hakkımızda";
        return view('hakkimizda', $data);
    }
    public function iletisim(): string
    {
        $data["title"] = "Lolla Yayınları | İletişim";
        return view('iletisim', $data);
    }
    public function search(): string
    {
        $search_query =
            $this->db->escapeString($this->request->getGet("q"));

        $query =
            $this->db->query('SELECT * FROM books WHERE name like "%' . $search_query . '%" or author LIKE "%' . $search_query . '%";');
        $books = $query->getResult();

        $data["search_query"] = $search_query;
        $data["books"] = $books;
        $data["title"] = "Lolla Yayınları | Arama Sonuçları";

        return view('search', $data);
    }
    public function yazarlar(): string
    {
        $query =
            $this->db->query('SELECT * FROM authors ORDER BY name');
        $authors = $query->getResult();

        // Group authors by the first letter of their names
        $groupedAuthors = [];
        foreach ($authors as $author) {
            $firstLetter = mb_strtoupper(mb_substr($author->name, 0, 1, 'UTF-8'), 'UTF-8');

            if (!isset($groupedAuthors[$firstLetter])) {
                $groupedAuthors[$firstLetter] = [];
            }

            // Add the author to the corresponding letter group
            $groupedAuthors[$firstLetter][] = $author;
        }

        $data["authors"] = $groupedAuthors;
        $data["title"] = "Lolla Yayınları | Yazarlar";

        return view('yazarlar', $data);
    }
    public function yazarlar_grup($firstLetter): string
    {
        $query =
            $this->db->query('SELECT * FROM authors WHERE name LIKE "' . $this->db->escapeLikeString($firstLetter) . '%" ORDER BY name');
        $authors = $query->getResult();

        $data["authors"] = $authors;
        $data["letter"] = $firstLetter;
        $data["title"] = "Lolla Yayınları | Yazarlar - " . $firstLetter;

        return view('yazarlar_grup', $data);
    }
    public function yazarlar_ara(): string
    {

        $name =
            $this->db->escapeString($this->request->getGet("name"));

        $query =
            $this->db->query('SELECT * FROM authors WHERE name LIKE "%' . $this->db->escapeLikeString($name) . '%" ORDER BY name');
        $authors = $query->getResult();

        $data["authors"] = $authors;
        $data["letter"] = "";
        $data["title"] = "Lolla Yayınları | Yazarlar - " . $name;

        return view('yazarlar_grup', $data);
    }
    public function yazar($id): string
    {
        $query =
            $this->db->query('SELECT * FROM authors WHERE id = "' . $this->db->escapeString($id) . '"');
        $author = $query->getRow();
        if (!$author) {
            return show_404();
        }
        $query =
            $this->db->query('SELECT * FROM books WHERE author = "' . $this->db->escapeString($author->name) . '"');
        $books = $query->getResult();

        $data["books"] = $books;
        $data["author"] = $author;
        $data["title"] = "Lolla Yayınları | Yazar";
        return view("yazar", $data);
    }
    public function lolla_kids(): string
    {
        $data["title"] = "Lolla Yayınları | Lolla Kids";
        return view("lolla_kids", $data);
    }
    //kategori
    public function kategori_kitaplar($filter): string
    {
        if ($filter != "kampanya" && $filter != "yeni" && $filter != "cok_satan") {
            return show_404();
        }
        $query =
            $this->db->query('SELECT * FROM books WHERE category = "' . $this->db->escapeString($filter) . '"');
        $books = $query->getResult();

        $data["books"] = $books;
        $data["filter"] = $filter;
        if ($filter == "kampanya") {
            $data["title"] = "Lolla Yayınları | Kampanya";
            $data["header"] = "Kampanyalı ürünler";
            $data["breadcrumb"] = "Kampanya";
            $data["empty_message"] = "Kampanyalı ürün bulunamadı.";
        } else if ($filter == "cok_satan") {
            $data["title"] = "Lolla Yayınları | Çok Satanlar";
            $data["header"] = "Çok Satan ürünler";
            $data["breadcrumb"] = "Çok Satanlar";
            $data["empty_message"] = "Çok Satan kategorisinde ürün bulunamadı.";
        }

        return view("kategori_kitaplar", $data);
    }
    public function kitap($id): string
    {
        $query = $this->db->table('books')
            ->select('books.*, authors.id AS author_id')
            ->join('authors', 'books.author = authors.name')
            ->where('books.id', $id);

        $book = $query->get()->getRow();
        $data["book"] = $book;

        if (!$book) {
            return show_404();
        }
        $data["author_id"] = $book->author_id;
        $query2 = $this->db->query('SELECT * FROM books WHERE author = "' . $book->author . '" AND id != ' . $this->db->escapeString($id) . ' ORDER BY RAND() LIMIT 10');
        $data["books"] = $query2->getResult();
        $data["title"] = "Lolla Yayınları | " . $book->name;

        // return json_encode($data);
        return view("kitap", $data);
    }
    public function bultenler(): string
    {
        $query = $this->db->query('SELECT * FROM news ORDER BY createdAt DESC');
        $news = $query->getResult();
        $data["news"] = $news;
        $data["title"] = "Lolla Yayınları | Bülten";
        $data["empty_message"] = "Bülten bulunamadı.";
        $data["header"] = "Bülten";
        return view("bultenler", $data);
    }
    public function bulten($id): string
    {
        $query = $this->db->query('SELECT * FROM news WHERE id = ' . $this->db->escapeString($id));
        $new = $query->getRow();
        if (!$new) {
            return show_404();
        }
        $data["new"] = $new;
        $data["title"] = "Lolla Yayınları | " . $new->title;
        return view("bulten", $data);
    }
}
