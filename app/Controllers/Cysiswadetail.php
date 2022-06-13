<?php

namespace App\Controllers;

class Cysiswadetail extends BaseController
{
    public function index()
    {
        $username           = $this->request->getPost("username");

        $query              = $this->db->query("select * from siswa where username='$username'");
        $data['siswa']    = $query->getRow();

        return view('Vysiswadetail', $data);
    }
}