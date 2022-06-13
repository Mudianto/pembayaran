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

        if ($query->getNumRows() >= 1) {
            $row = $query->getRow();
            if (isset($row)) {
                $data['info_siswa']   = array(
                    'id_siswa' =>  $row->id_siswa,
                    'nama' => $row->nama,
                    'desakelurahanS' =>  $row->desakelurahanS,
                    'kecamatanS' =>  $row->kecamatanS,
                    'kabupatenS' =>  $row->kabupatenS,
                    'inisial_lembaga' =>  $row->inisial_lembaga,
                    'nama_ruang' =>  $row->nama_ruang,
                    'ruang' =>  $row->ruang,
                    'prodistik' =>  $row->prodistik,
                    'kamar' =>  $row->kamar,
                    'nama_kamar' =>  $row->nama_kamar,
                    'madin' =>  $row->madin
                );
            }
        } else {
            $data['info_siswa']   = array(
                'id_siswa' => null,
                'nama' => null,
                'desakelurahanS' => null,
                'kecamatanS' => null,
                'kabupatenS' => null,
                'inisial_lembaga' => null,
                'nama_ruang' => null,
                'ruang' =>  null,
                'prodistik' =>  null,
                'kamar' =>  null,
                'nama_kamar' =>  null,
                'madin' => null
            );
        }

        $data['tampilCard'] = $this->cardLembaga($tahun, $id);

        $stop = "ok";
        // dd($data['card_lembaga']);
        return view('Vytransaksicari', $data);
    }
    public function cardLembaga($tahun, $id_siswa)
    {
        $hasil = '';
        //menampilkan card lembaga
        $query  = $this->db->query("
        SELECT 	rk.lembaga,l.nama_lembaga
        FROM 	`transaksi` t 
                INNER JOIN jenis_tagihan_ok jt ON t.id_tagihan=jt.id_tagihan
                INNER JOIN r_kelompok rk on rk.id_kelompok=jt.kelompok
                INNER JOIN lembaga l on l.id_lembaga=rk.lembaga
        WHERE 	t.id_siswa='$id_siswa' AND t.tahun='$tahun'
        GROUP BY rk.lembaga");

        // tampil card lembaga
        if ($query->getNumRows() >= 1) {
            $data['card_lembaga']    = $query->getResult();
            foreach ($data['card_lembaga'] as $row) {
                $id_lembaga = $row->lembaga;
                $hasil   = $hasil . '<!-- chat row -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- AREA CHART -->
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title"></h3>
                                                    ' . $row->nama_lembaga . '
                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card-body">

                                                <!-- Main content -->
                                                <section class="content">
                                                    <div class="container-fluid">
                                                        <!-- chat row -->
                                                        <div class="row ">
                                                        ' . $this->cardKelompok($tahun, $id_siswa, $id_lembaga) . '
                                                        </div>
                                                    </div>
                                                </section>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                </div>
                            <!-- end chat row -->';
            }
        }


        // $hasil = $hasil . '<button type="submit" class="btn btn-primary" style="width:200px" name="save">Submit</button>


        return $hasil;
    }
    public function cardKelompok($tahun, $id_siswa, $id_lembaga)
    {
        $hasil = "";
        // menampilkan card lembaga
        $query  = $this->db->query("SELECT 	rk.lembaga,rk.inisial
                                    FROM 	`transaksi` t 
                                            INNER JOIN jenis_tagihan_ok jt ON t.id_tagihan=jt.id_tagihan
                                            INNER JOIN r_kelompok rk on rk.id_kelompok=jt.kelompok
                                            INNER JOIN lembaga l on l.id_lembaga=rk.lembaga
                                    WHERE 	t.id_siswa='$id_siswa' AND t.tahun='$tahun'  and rk.lembaga='$id_lembaga'
                                    GROUP BY rk.inisial;");

        if ($query->getNumRows() >= 1) {
            $data['cardKelompok']    = $query->getResult();

            foreach ($data['cardKelompok'] as $row) {
                $inisial = $row->inisial;
                $hasil = $hasil . '<!-- //////////////////////////////////////////////////////////////// -->
            <div class="col-md-4 b">
                <div class="card">
                    <div class="card-header text-center">
                        ' . $row->inisial . '
                    </div>
                    <div class="card-body b">
                        <div class="container ">
                            <div class="row ">
                                <div class="col-sm">
                                ' .$this->itemPembayaran($tahun, $id_siswa, $id_lembaga, $inisial) .'
                                </div>
                                <!-- <div class="col-sm"> -->
                                <!-- ////////////////////////// -->
                                <!-- ////////////////////////// -->
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //////////////////////////////////////////////////////////////// -->';
            }
        }

        return $hasil;
    }
    public function itemPembayaran($tahun, $id_siswa, $id_lembaga, $inisial)
    {
        $hasil = "";

        // menampilkan isi
        $query  = $this->db->query("SELECT  *,
                                            rk.id_kelompok,
                                            rk.inisial,
                                            t.nominal 'rnominal',
                                            jt.jenis jenis_tagihan,
                                            t.keterangan keterangan_pembayaran
                                    FROM 	`transaksi` t 
                                            INNER JOIN jenis_tagihan_ok jt ON jt.id_tagihan=t.id_tagihan 
                                            INNER JOIN r_kelompok rk ON rk.id_kelompok=jt.kelompok 
                                    WHERE 	t.id_siswa='$id_siswa' AND 
                                            t.tahun='$tahun' AND 
                                            rk.lembaga='$id_lembaga' AND 
                                            rk.inisial='$inisial'
                                    ORDER BY rk.urut asc;");

        if ($query->getNumRows() >= 1) {
            $data['itemPembayaran']    = $query->getResult();
            $i = 0;
            foreach ($data['itemPembayaran'] as $row) {
                $i              = $i + 1;
                $total          = "";
                if (empty($row->total)) {
                    $total      = 0;
                } else {
                    $total      = $row->total;
                }
                $batasMaxBayar  = $row->rnominal - $total;
                $hasil  = $hasil . '
                            <div class="row">
                                <div class="col-sm-1 f">' . $i . '.</div>
                                <div class="col-sm-6 f"> 
                                    <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="defaultCheck1" name="check[]"  value="checkBayar" id="defaultCheck1" >
                                    <label class="form-check-label" for="defaultCheck1"   title="Rp.' . number_format($row->rnominal, 0, ",", ".") . '" >
                                    ' . $row->nama_tagihan . '
                                    </label>
                                    </div>
                                </div>
                                <div class="col-sm-4 f"> 
                                    <input type="number" name="bayar[]" value="' . $row->rnominal . '"> 
                                ';

                $hasil = $hasil . '<input type="number" name="id_transaksi[]" value="' . $row->id_transaksi . '">
                                <input type="number" name="nominal[]" value="' . $row->rnominal . '">
                                <input type="number" name="tahun[]" value="' . $row->tahun . '">
                                <input type="number" name="id_siswa[]" value="' . $row->id_siswa . '">
                                <input type="number" name="id_tagihan[]" value="' . $row->id_tagihan . '">
                                total
                                <input type="number" name="total[]" value="' . $total . '">
                                <input type="number" name="jenis_tagihan[]" value="' . $row->jenis_tagihan . '">';
               

                if ($row->jenis_tagihan == "Cash") {
                    $hasil = $hasil . 'bayar <input type="hidden" name="bayar[]" value="' . $row->rnominal . '"  class="form-control-sm col-12">';
                    $hasil = $hasil . '<input type="text" name="bayar[]" value="' . $row->rnominal . '"  class="form-control-sm col-12" disabled>';
                } else if ($row->jenis_tagihan == "Cicilan") {
                    if ($row->keterangan_pembayaran == "Lunas") {
                        echo "Lunas";
                    } else {
                        $hasil  = $hasil . 'bayar <input type="number" name="bayar[]" value="0";  id="txtWeight" onchange="this.value = minmax(this.value, 0, ' . $batasMaxBayar . ')" value="' . $row->jenis_tagihan . '" onkeyup="this.value = minmax(this.value, 0, ' . $batasMaxBayar . ')" value="' . $row->jenis_tagihan . '"  class="form-control-sm col-12">';
                    }
                } else {
                    $pesan = "data jenis pada tabel jenis_tagihan_ok harus Cash atau Cicilan mohon perbaiki data anda terlebih dahulu";
                    dd($pesan);
                }
                $hasil = $hasil . '</div>
                </div>
                ';
            }
        }
        return $hasil;
    }
    public function bayar()
    {
        // $this->load->view('multicheck_insert');
        // if (isset($_POST['save'])) {
        //     $user_id = 1;/* Pass the userid here */

        $checkbox       = $_POST['check'];

        $id_transaksi           = $_POST['id_transaksi'];
        $nominal                = $_POST['nominal'];
        // dd($nominal);
        $tahun                  = $_POST['tahun'];
        // dd($tahun);
        $id_siswa               = $_POST['id_siswa'];
        // dd()
        $id_tagihan             = $_POST['id_tagihan'];
        $total                  = $_POST['total'];
        $bayar                  = $_POST['bayar'];
        $jenis_tagihan          = $_POST['jenis_tagihan'];

        for ($i = 0; $i < count($checkbox); $i++) {
            echo $i;
            echo "</br>";
            echo count($checkbox);
            echo "</br> lalal ";
            echo $checkbox[$i];
            if (!empty($checkbox[$i])) {
                ////////////////////////////////////////////////
                $nominal            = $nominal[$i];
                $cetakIdTransaksi   = $id_transaksi[$i];
                $tahun              = $tahun[$i];
                $id_siswa           = $id_siswa[$i];
                $id_tagihan         = $id_tagihan[$i];
                // $total              = $total[$i];
                $jenis_tagihan      = $jenis_tagihan[$i];
                $bayar              = $bayar[$i];
                /////////////////////////////////////////////////
                // echo $cetakIdTransaksi;
                $query              = $this->db->query("select * from transaksi where id_transaksi='$cetakIdTransaksi'");
                $data['transaksi']  = $query->getResult();
                /////////////////////////////////////////////////////

                //pembuatan data;
                //////////////////////////////////////////////
                $tgl_bayar          = date("Y-m-d");

                $keterangan         = "";
                // if ($bayar <= 0) {
                //     if ($total <= 0) {
                //         $keterangan = "Belum Bayar";
                //     } else {
                //         $keterangan = "Belum Lunas";
                //     }
                // } else if ($bayar <= $nominal) {
                //     $cekBayar = $bayar + $total;
                //     if ($cekBayar < $nominal) {
                //         $keterangan = "Belum Lunas";
                //     } else {
                //         $keterangan = "Lunas";
                //     }
                // } else {
                //     $keterangan = "Ada Kesalah pada validasi html input bayar anda mohon cek lagi";
                //     dd($keterangan);
                // }
                // $total              = $total + $bayar;
                //////////////////////////////////////////

                ////////////////////////////////
                echo ' ' . $id_siswa;
                echo ' ' . $id_tagihan;
                echo ' ' . $nominal;
                echo ' ' . date("Y-m-d");
                // echo ' ' . $total;
                echo ' ' . $jenis_tagihan;
                echo ' ' . $bayar;
                echo "</br>";
                /////////////////////////////////
                foreach ($data['transaksi'] as $row) {
                    echo $row->id_transaksi;

                    $data['t'] = [
                        'tgl_bayar'         => $tgl_bayar,
                        'total'             => $total,
                        'keterangan'        => $keterangan,
                    ];
                    $builder = $this->db->table('transaksi');

                    // dd($data['t']);
                }
                ////////////////////////////////
                // dd($data['transaksi']);


                // data cicilan
                ////////////////////////////////////////////////////
                if ($jenis_tagihan == "Cicilan") {
                    echo "</br>";
                    echo ' ' . $tahun;
                    echo ' ' . $cetakIdTransaksi;
                    echo ' ' . $id_siswa;
                    echo ' ' . date("Y-m-d");
                    echo ' ' . $bayar;
                    $data = [
                        'id_cicilan ' => null,
                        'tahun'  =>  $tahun,
                        'id_transaksi'  => $cetakIdTransaksi,
                        'id_siswa'  =>  $id_siswa,
                        'nominal'  => $bayar,
                        'keterangan'  => null,
                    ];
                    $builder = $this->db->table('cicilan');
                    $builder->insert($data);
                }
                ////////////////////////////////////////////////////////
                // $this->Crud_model->multisave($user_id, $category_id);/* Call the modal */
            }
        }

        //     echo "Data added successfully!";
        // }
    }
    function multisave($user_id, $category)
    {
        $query = "insert into user_cat values($user_id,$category)";
        $this->db->query($query);
    }
}