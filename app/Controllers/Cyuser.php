<?php

namespace App\Controllers;

class Cyuser extends BaseController
{
    public function index()
    {
        $query              = $this->db->query("SELECT 	u.id_user,
                                                        u.nama_user,
                                                        u.password,
                                                        u.level,
                                                        l.nama_lembaga,
                                                        u.keterangan 
                                                FROM `user` as u INNER JOIN lembaga as l ON u.lembaga=l.id_lembaga;");
        $data['user']    = $query->getResult();

        return view('Vyuser', $data);
    }
}