<?php

namespace App\Controllers;

class Cytransaksicari extends BaseController
{
    public function index()
    {
        //combobok tahun pada cari orang
        $query  = $this->db->query("SELECT tahun 
                                    FROM `transaksi`
                                    GROUP by tahun
                                    ORDER BY tahun DESC;");
        $data['c_tahun']    = $query->getResult();

        //data yang ditangkap dari inputan post
        $id           = $this->request->getPost("id");
        $tahun        = $this->request->getPost("tahun");

        //data info siswa
        $query  = $this->db->query("SELECT 	sa.id_siswa,
                                            sa.nama,
                                            s.desakelurahanS,
                                            s.kecamatanS,
                                            s.kabupatenS,
                                            sa.id_lembaga,
                                            (SELECT inisial FROM `lembaga` WHERE id_lembaga=sa.id_lembaga) inisial_lembaga,
                                            sa.ruang,
                                            (SELECT nama_ruang FROM `r_ruang` WHERE id_ruang=sa.ruang) nama_ruang,
                                            sa.prodistik,
                                            sa.kamar,
                                            (SELECT nama_kamar FROM `r_kamar` WHERE id_kamar=sa.kamar) nama_kamar,
                                            sa.madin
                                    FROM 	`siswa_aktif_ok` sa INNER JOIN siswa s ON sa.id_siswa=s.username
                                    WHERE sa.id_siswa='$id'");
        $data['info_siswa']    = $query->getRow();

        //cek data card lembaga
        $query  = $this->db->query("SELECT 	l.id_lembaga,l.inisial
                                    FROM 	`transaksi` t 
                                            INNER JOIN jenis_tagihan_ok jt ON jt.id_tagihan=t.id_tagihan 
                                            INNER JOIN lembaga l ON l.id_lembaga=jt.id_lembaga
                                    WHERE 	t.id_siswa='$id' AND t.tahun='$tahun'
                                    GROUP BY l.id_lembaga;");
        $data['jumlah_card_lembaga']    = $query->getNumRows();

        // echo $data['jumlah_card_lembaga'];
        // dd($data['jumlah_card_lembaga']);


        //menampilkan card lembaga
        $query  = $this->db->query("SELECT 	*,l.id_lembaga,l.inisial
                                    FROM 	`transaksi` t 
                                            INNER JOIN jenis_tagihan_ok jt ON jt.id_tagihan=t.id_tagihan 
                                            INNER JOIN lembaga l ON l.id_lembaga=jt.id_lembaga
                                    WHERE 	t.id_siswa='$id' AND t.tahun='$tahun'
                                    GROUP BY l.id_lembaga;");
        $data['card_lembaga']    = $query->getResult();

        // sfdafdasf
        if ($data['jumlah_card_lembaga'] >= 1) {
            foreach ($data['card_lembaga'] as $row) {
                // echo $row->id_lembaga;
                $id_lembaga = $row->id_lembaga;

                //menampilkan card lembaga
                $query  = $this->db->query("SELECT 	*,l.id_lembaga,l.inisial
                                            FROM 	`transaksi` t 
                                                    INNER JOIN jenis_tagihan_ok jt ON jt.id_tagihan=t.id_tagihan 
                                                    INNER JOIN lembaga l ON l.id_lembaga=jt.id_lembaga
                                            WHERE 	t.id_siswa='$id' AND t.tahun='$tahun'
                                            GROUP BY l.id_lembaga;");


                $data['card_lembaga']    = $query->getResult();
            }
        }




        $stop = "ok";
        dd($data['card_lembaga']);
        return view('Vytransaksicari', $data);
    }
}