<?php

namespace App\Controllers;

class Cylembaga extends BaseController
{
    public function index()
    {
        $query              = $this->db->query("select * from lembaga");
        $data['lembaga']    = $query->getResult();
        return view('Vylembaga', $data);
    }
}