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
        $x = 0;
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
        $hasil=$hasil."<input type='hidden' name='jumlah' value='".$x."'>";

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
                                    <input class="form-check-input" type="checkbox" id="defaultCheck'.$i.'" name="check['.$x.']"  value="checkBayar" >
                                    <label class="form-check-label" for="defaultCheck1"   title="Rp.' . number_format($row->rnominal, 0, ",", ".") . '" >
                                    ' . $row->nama_tagihan . '
                                    </label>
                                    </div>
                                </div>
                                <div class="col-sm-4 f"> 
                                   
                                ';

                $hasil = $hasil . '<input type="hidden" name="id_transaksi['.$x.']" value="' . $row->id_transaksi . '">
                                <input type="hidden" name="nominal'.$x.'" value="' . $row->rnominal . '">
                                <input type="hidden" name="tahun['.$x.']" value="' . $row->tahun . '">
                                <input type="hidden" name="id_siswa['.$x.']" value="' . $row->id_siswa . '">
                                <input type="hidden" name="id_tagihan['.$x.']" value="' . $row->id_tagihan . '">
                                
                                <input type="hidden" name="total['.$x.']" value="' . $total . '">
                                <input type="text" name="jenis_tagihan['.$x.']" value="' . $row->jenis_tagihan . '">';
               

                if ($row->jenis_tagihan == "Cash") {
                    $hasil = $hasil . '<input type="text" name="bayar['.$x.']" value="' . $row->rnominal . '"  class="form-control-sm col-12">';
                    $hasil = $hasil . '<input type="text" name="bayarxxx[]" value="' . $row->rnominal . '"  class="form-control-sm col-12" disabled>';
                } else if ($row->jenis_tagihan == "Cicilan") {
                    if ($row->keterangan_pembayaran == "Lunas") {
                        echo "Lunas";
                    } else {
                        $hasil  = $hasil . '<input type="number" name="bayar['.$x.']" value="0";  id="txtWeight" onchange="this.value = minmax(this.value, 0, ' . $batasMaxBayar . ')"  onkeyup="this.value = minmax(this.value, 0, ' . $batasMaxBayar . ')" value="' . $row->jenis_tagihan . '"  class="form-control-sm col-12">';
                    }
                } else {
                    $pesan = "data jenis pada tabel jenis_tagihan_ok harus Cash atau Cicilan mohon perbaiki data anda terlebih dahulu";
                    dd($pesan);
                }
                $hasil = $hasil . '</div>
                </div>
                ';
                $x=$x+1;
            }
           
        }
        return $hasil;
    }
    public function bayar()
    {
     
        $jumlah         =  $_POST['jumlah'];
        echo $jumlah."</br>";
        for($i=0;$i<$jumlah;$i++){
            echo $i;
            $nominal                = $_POST['nominal'.$i.''];
            echo $nominal."</br>";
        }
      
        // $id_transaksi           = $_POST['id_transaksi'];
       
      
        // // echo  count($id_transaksi) ;
        //     for ($i = 0; $i < count($id_transaksi); $i++) {
                
        //         $check                  = $_POST['check'];
        //         $nominal                = $_POST['nominal'];
        //         $tahun                  = $_POST['tahun'];
        //         $id_siswa               = $_POST['id_siswa'];
        //         $id_tagihan             = $_POST['id_tagihan'];
        //         $total                  = $_POST['total'];
        //         $bayar                  = $_POST['bayar'];
        //         $jenis_tagihan          = $_POST['jenis_tagihan'];

        //         echo " jenis tagihan  = ".$jenis_tagihan[$i];
        //         echo $check[$i];

        //         // if (isset($check[$i]) {
        //         //     echo "cek";
        //         // }
        //         // if(!empty($check[$i])){
        //         //     echo $check[$i];
        //             // echo "id transaksi = ".$id_transaksi[$i]; 
        //             // echo " nominal = ".$nominal[$i]; 
        //             // echo " tahun = ".$tahun[$i]; 
        //             // echo " id siswa = ".$id_siswa[$i]; 
        //             // echo " id tagihan = ".$id_tagihan[$i]; 
        //             // echo " total = ".$total[$i]; 
        //             // echo " bayar = ".$bayar[$i];
        //             // echo " jenis tagihan = ".$jenis_tagihan[$i];
        //             // echo "</br>";
        //             // }
        //             echo "</br>";
        //         }
               
            
           
       
    }
    function multisave($user_id, $category)
    {
        $query = "insert into user_cat values($user_id,$category)";
        $this->db->query($query);
    }
}