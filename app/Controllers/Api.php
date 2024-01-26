<?php

namespace App\Controllers;

class Api extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = db_connect();
        session();
    }
    //ilçeleri çekmek için
    public function loadTowns($cityId)
    {
        $builder = $this->db->table('towns');
        $builder->where('cityId', $cityId);
        $query = $builder->get();
        $towns = $query->getResultArray();
        echo json_encode($towns);
    }
}
