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
        $data["title"] = "Mendirek Dükkan | Ana Sayfa";

        return view('home', $data);
    }
    public function hakkimizda(): string
    {
        $data["title"] = "Mendirek Dükkan | Hakkımızda";
        return view('hakkimizda', $data);
    }
    public function iletisim(): string
    {
        $data["title"] = "Mendirek Dükkan | İletişim";
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
        $data["title"] = "Mendirek Dükkan | Arama Sonuçları";

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
        $data["title"] = "Mendirek Dükkan | Yazarlar";

        return view('yazarlar', $data);
    }
    public function yazarlar_grup($firstLetter): string
    {
        $query =
            $this->db->query('SELECT * FROM authors WHERE name LIKE "' . $this->db->escapeLikeString($firstLetter) . '%" ORDER BY name');
        $authors = $query->getResult();

        $data["authors"] = $authors;
        $data["letter"] = $firstLetter;
        $data["title"] = "Mendirek Dükkan | Yazarlar - " . $firstLetter;

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
        $data["title"] = "Mendirek Dükkan | Yazarlar - " . $name;

        return view('yazarlar_grup', $data);
    }
    public function lolla_kids(): string
    {
        $data["title"] = "Mendirek Dükkan | Lolla Kids";
        return view("lolla_kids", $data);
    }
    public function kitaplar($filter): string
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
            $data["title"] = "Mendirek Dükkan | Kampanya";
            $data["header"] = "Kampanyalı ürünler";
            $data["empty_message"] = "Kampanyalı ürün bulunamadı.";
        }
        
        return view("kitaplar", $data);
    }
}
