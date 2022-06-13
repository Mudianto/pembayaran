<?php

namespace App\Controllers;

class Cysiswaaktifedit extends BaseController
{
    public function index()
    {
        $id_siswa           = $this->request->getPost("id_siswa");
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
                                    WHERE id_siswa='$id_siswa';");
        $data['siswa_aktif']    = $query->getRow();

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

        return view('Vysiswaaktifedit', $data);
    }
    public function ubah()
    {
        $id_siswa = addslashes($this->request->getPost('id_siswa'));
        $tahun = addslashes($this->request->getPost('tahun'));
        $nama = addslashes($this->request->getPost('nama'));
        $Gender = addslashes($this->request->getPost('Gender'));
        $id_lembaga = addslashes($this->request->getPost('id_lembaga'));
        $st_siswa = addslashes($this->request->getPost('st_siswa'));
        $tingkat = addslashes($this->request->getPost('tingkat'));
        $ruang = addslashes($this->request->getPost('ruang'));
        $program = addslashes($this->request->getPost('program'));
        $prodistik = addslashes($this->request->getPost('prodistik'));
        $pondok = addslashes($this->request->getPost('pondok'));
        $st_santri = addslashes($this->request->getPost('st_santri'));
        $kamar = addslashes($this->request->getPost('kamar'));
        $madin = addslashes($this->request->getPost('madin'));
        $st_sanmad = addslashes($this->request->getPost('st_sanmad'));
        $kelas_madin = addslashes($this->request->getPost('kelas_madin'));


        $data['siswa_aktif']   = array(
            'id_siswa' => $id_siswa,
            'tahun' => $tahun,
            'nama' => $nama,
            'Gender' => $Gender,
            'id_lembaga' => $id_lembaga,
            'st_siswa' => $st_siswa,
            'tingkat' => $tingkat,
            'ruang' => $ruang,
            'program' => $program,
            'prodistik' => $prodistik,
            'pondok' => $pondok,
            'st_santri' => $st_santri,
            'kamar' => $kamar,
            'madin' => $madin,
            'st_sanmad' => $st_sanmad,
            'kelas_madin' => $kelas_madin,
        );

        // dd($data);
        $builder    = $this->db->table("siswa_aktif_ok");
        $builder->where('id_siswa', $id_siswa);
        $builder->update($data['siswa_aktif']);

        return redirect()->route('siswaaktif');
    }
}