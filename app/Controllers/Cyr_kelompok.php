<?php

namespace App\Controllers;

class Cyr_kelompok extends BaseController
{
    public function index()
    {
        $query              = $this->db->query("select * from lembaga");
        $data['lembaga']    = $query->getResult();
        return view('Vyr_kelompok', $data);
    }
}