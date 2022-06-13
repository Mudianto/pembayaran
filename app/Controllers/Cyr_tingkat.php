<?php

namespace App\Controllers;

class Cyr_tingkat extends BaseController
{
    public function index()
    {
        $query              = $this->db->query("select * from lembaga");
        $data['lembaga']    = $query->getResult();
        return view('Vyr_tingkat', $data);
    }
}