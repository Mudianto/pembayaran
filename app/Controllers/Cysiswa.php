<?php

namespace App\Controllers;

class Cysiswa extends BaseController
{
    public function index()
    {
        $query              = $this->db->query("SELECT s.username,s.nama,s.jeniskelamin,l.inisial 
                                                FROM `siswa` as s INNER JOIN lembaga as l ON s.id_lembaga=l.id_lembaga
                                                ORDER BY l.id_lembaga asc;");
        $data['siswa']    = $query->getResult();

        return view('Vysiswa', $data);
    }
}