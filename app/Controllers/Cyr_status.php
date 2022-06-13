<?php

namespace App\Controllers;

class Cyr_status extends BaseController
{
    public function index()
    {
        $query              = $this->db->query("select * from lembaga");
        $data['lembaga']    = $query->getResult();
        return view('Vyr_status', $data);
    }
}