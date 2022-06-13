<?php

namespace App\Controllers;

class Cytransaksi extends BaseController
{
    public function index()
    {
        $query  = $this->db->query("SELECT tahun 
                                    FROM `transaksi`
                                    GROUP by tahun
                                    ORDER BY tahun DESC;");
        $data['c_tahun']    = $query->getResult();

        return view('Vytransaksi', $data);
    }
}