<?php

namespace App\Controllers;

class Cysiswaaktif extends BaseController
{
    public function index()
    {
        $query  = $this->db->query("SELECT	sa.id_siswa,
                                            sa.tahun,
                                            sa.nama,
                                            sa.Gender,
                                            sa.id_lembaga,
                                            (SELECT inisial FROM `lembaga` WHERE id_lembaga=sa.id_lembaga) nama_lembaga,
                                            sa.st_siswa,
                                            (SELECT STATUS FROM `r_status` WHERE id_status=sa.st_siswa) status_siswa,
                                            sa.tingkat,
                                            (SELECT nama_tingkat FROM `r_tingkat` WHERE id_tingkat='sa.tingkat') tingkat_siswa,
                                            sa.ruang,
                                            sa.program,
                                            sa.prodistik,
                                            sa.pondok,
                                            sa.st_santri,
                                            (SELECT STATUS FROM `r_status` WHERE id_status=sa.st_santri) status_santri,
                                            sa.kamar,
                                            sa.madin,
                                            sa.st_sanmad,
                                            (SELECT STATUS FROM `r_status` WHERE id_status=sa.st_sanmad) status_santri_madin,
                                            sa.kelas_madin,
                                            sa.timestamp 
                                    FROM 	`siswa_aktif_ok` as sa  
                                    ORDER BY `sa`.`id_lembaga`  ASC,tingkat_siswa ASC;");
        $data['siswa_aktif']    = $query->getResult();
        return view('Vysiswaaktif', $data);
    }
}