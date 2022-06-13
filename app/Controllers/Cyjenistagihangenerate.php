<?php

namespace App\Controllers;

class Cyjenistagihangenerate extends BaseController
{
    public function index()
    {
        $id            = $this->request->getPost("id");
        $query         = $this->db->query("CALL generate_transaksi($id);");
        return redirect()->route('jenistagihan');
    }
}