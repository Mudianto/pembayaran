<?php

namespace App\Controllers;

class Cyjenistagihantambah extends BaseController
{
    public function index()
    {
        $query  = $this->db->query("SELECT * FROM r_kelompok");
        $data['r_kelompok']    = $query->getResult();

        $query  = $this->db->query("SELECT * FROM lembaga");
        $data['lembaga']    = $query->getResult();

        $query  = $this->db->query("SELECT * FROM r_status");
        $data['r_status']    = $query->getResult();

        $query  = $this->db->query("SELECT * FROM r_tingkat");
        $data['r_tingkat']    = $query->getResult();

        $query  = $this->db->query("SELECT * FROM r_ruang");
        $data['r_ruang']    = $query->getResult();

        $query  = $this->db->query("SELECT * FROM r_program");
        $data['r_program']    = $query->getResult();

        return view('Vyjenistagihantambah', $data);
    }
    public function simpan()
    {

        $tahun          = addslashes($this->request->getPost('tahun'));
        $nama_tagihan   = addslashes($this->request->getPost('nama_tagihan'));
        $nominal        = addslashes($this->request->getPost('nominal'));
        $Gender         = addslashes($this->request->getPost('Gender'));
        $jenis          = addslashes($this->request->getPost('jenis'));
        $kelompok       = addslashes($this->request->getPost('kelompok'));
        $id_lembaga     = addslashes($this->request->getPost('id_lembaga'));
        $st_siswa       = addslashes($this->request->getPost('st_siswa'));
        $tingkat        = addslashes($this->request->getPost('tingkat'));
        $ruang          = addslashes($this->request->getPost('ruang'));
        $program        = addslashes($this->request->getPost('program'));
        $prodistik      = addslashes($this->request->getPost('prodistik'));
        $pondok         = addslashes($this->request->getPost('pondok'));
        $st_santri      = addslashes($this->request->getPost('st_santri'));
        $kamar          = addslashes($this->request->getPost('kamar'));
        $madin          = addslashes($this->request->getPost('madin'));
        $st_sanmad      = addslashes($this->request->getPost('st_sanmad'));
        $kelas_madin    = addslashes($this->request->getPost('kelas_madin'));

        $data['jenis_tagihan']   = array(
            'id_tagihan ' => null,
            'tahun' => $tahun,
            'nama_tagihan' => $nama_tagihan,
            'nominal' => $nominal,
            'Gender' => $Gender,
            'jenis' => $jenis,
            'kelompok' => $kelompok,
            'id_lembaga' => $id_lembaga,
            'st_siswa' => $st_siswa,
            'tingkat' => $tingkat,
            'ruang' => $ruang,
            'program' => $program,
            'prodistik' => $prodistik,
            'pondok' => $pondok,
            'st_santri ' => $st_santri,
            'kamar' => $kamar,
            'madin' => $madin,
            'st_sanmad ' => $st_sanmad,
            'kelas_madin' => $kelas_madin,
        );
        // dd($data);

        $builder    = $this->db->table("jenis_tagihan_ok");
        $builder->insert($data['jenis_tagihan']);

        return redirect()->route('jenistagihan');
    }
}