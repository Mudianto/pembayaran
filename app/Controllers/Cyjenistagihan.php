<?php

namespace App\Controllers;

class Cyjenistagihan extends BaseController
{
    public function index()
    {
        $query              = $this->db->query("SELECT 	*,
                                                        (SELECT nama_kelompok FROM `r_kelompok` WHERE id_kelompok=kelompok) nama_kelompok,
                                                        (SELECT inisial FROM `lembaga` as l WHERE l.id_lembaga=jt.id_lembaga) nama_lembaga,
                                                        (SELECT STATUS FROM `r_status` as s WHERE s.id_status=jt.st_siswa) status_siswa,
                                                        (SELECT nama_tingkat FROM `r_tingkat` WHERE id_tingkat=jt.tingkat) tingkat_siswa,
                                                        (SELECT nama_ruang FROM `r_ruang` WHERE id_ruang=jt.ruang) nama_ruang,
                                                        (SELECT nama_program FROM `r_program` WHERE id_program=program) nama_program,
                                                        (SELECT STATUS FROM `r_status` as s WHERE s.id_status=jt.st_santri) status_santri,
                                                        (SELECT STATUS FROM `r_status` as s WHERE s.id_status=jt.st_sanmad) status_santri_madin
                                        FROM `jenis_tagihan_ok` as jt;");
        $data['jenis_tagihan']    = $query->getResult();
        return view('Vyjenistagihan', $data);
    }
}