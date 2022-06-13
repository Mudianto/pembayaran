<?php

namespace App\Controllers;

class Cytransaksicari extends BaseController
{
    public function index()
    {


        //combobok id siswa
        $query  = $this->db->query("SELECT id_siswa,nama FROM `siswa_aktif_ok`;");
        $data['id_siswa']    = $query->getResult();


        //combobok tahun pada cari orang
        $query  = $this->db->query("SELECT tahun 
                                    FROM `transaksi`
                                    GROUP by tahun
                                    ORDER BY tahun DESC;");
        $data['c_tahun']    = $query->getResult();

        //data yang ditangkap dari inputan post
        if(!empty($this->request->getPost("id"))){
            $id     = $this->request->getPost("id");
            $tahun  = $this->request->getPost("tahun");
            // echo "satu";
        }else{
            $id     = $this->session->ses_idsiswa;
            $tahun  = $this->session->ses_tahun;
            // $this->session->set('ses_idsiswa', null);
            // $this->session->set('ses_tahun', null);
            // echo "dua";
        }
            //tunggakan
            $query  = $this->db->query("SELECT tahun,sum(nominal) tunggakan FROM `transaksi` 
                                        WHERE id_siswa='$id' AND status='BELUM BAYAR' AND tahun !='$tahun'
                                        GROUP BY tahun");
                                        $data['tunggakan']    = $query->getResult();    

            // dd($data['tunggakan']);

            $query = $this->db->query("SELECT DATE_FORMAT(tgl, '%d/%m/%Y') tgl1,no_nota,SUM(nominal) total_nominal 
                                FROM `nota`
                                WHERE id_siswa='$id'
                                GROUP BY no_nota
                                ORDER BY tgl DESC");

            $data['nota']    = $query->getResult();
            // dd($data['nota']);

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
                                            sa.madin,
                                            sa.keterangan
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
                    'madin' =>  $row->madin,
                    'keterangan' =>  $row->keterangan
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
                'madin' => null,
                'keterangan' => null
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
                $hasil  =   $hasil . '<!-- chat row -->
                                <div class="row">
                                    <div class="col-md-12 g">
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
                                                        <div class="row ">';
                // START CARD KELOMPOK///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
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
                                                            <div class="col-sm">';
                                        // START ITEM PEMBAYARAN //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                            $query  = $this->db->query("SELECT  *,
                                                                                rk.id_kelompok,
                                                                                rk.inisial,
                                                                                t.nominal 'rnominal',
                                                                                jt.jenis jenis_tagihan,
                                                                                t.keterangan keterangan_pembayaran,
                                                                                t.status status_pembayaran,
                                                                                t.tgl_bayar tanggal_bayar
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
                                                                        <div class="form-check">';
                                                    if($row->status_pembayaran=="LUNAS"){

                                                    }else{
                                                        // $hasil  = $hasil . '
                                                        // My Checkbox: <input id="myCheckbox'.$x.'" type="checkbox" />
                                                        // ';
                                                         $hasil  = $hasil . '<input class="form-check-input" type="checkbox" id="myCheckbox'.$x.'"  name="check'.$x.'"  value="IYA"  >';
                                                     
                                                    }
                                                   
                                                    
                                                    $hasil  = $hasil . '<label class="form-check-label" for="defaultCheck1"   title="Rp.' . number_format($row->rnominal, 0, ",", ".") . '" >
                                                                        ' . $row->nama_tagihan . '
                                                                        </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4 f"> 
                                                                    
                                                                    ';

                                                    $hasil = $hasil . '<input type="hidden" name="id_transaksi'.$x.'" value="' . $row->id_transaksi . '">
                                                                    <input type="hidden" name="nominal'.$x.'" value="' . $row->rnominal . '">
                                                                    <input type="hidden" name="tahun'.$x.'" value="' . $row->tahun . '">
                                                                    <input type="hidden" name="id_siswa'.$x.'" value="' . $row->id_siswa . '">
                                                                    <input type="hidden" name="id_tagihan'.$x.'" value="' . $row->id_tagihan . '">
                                                                    <input type="hidden" name="keterangan'.$x.'" value="' . $row->keterangan_pembayaran . '">
                                                                    <input type="hidden" name="status'.$x.'" value="' . $row->status_pembayaran . '">
                                                                    
                                                                    <input type="hidden" name="total'.$x.'" value="' . $total . '">
                                                                    <input type="hidden" name="jenis_tagihan'.$x.'" value="' . $row->jenis_tagihan . '">
                                                                    <input type="hidden" id="vara'.$x.'" name="vara'.$x.'" value="0">';
                                                

                                                    if ($row->jenis_tagihan == "CASH") {
                                                        if($row->status_pembayaran=="LUNAS"){
                                                            $hasil = $hasil . 'L '.$row->tanggal_bayar;
                                                            $hasil = $hasil . '<input type="hidden" id="bayar'.$x.'" name="bayar'.$x.'" value="' . $row->rnominal . '"  class="form-control-sm col-12">';
                                                        }else{
                                                            $hasil = $hasil . '<input type="hidden" id="bayar'.$x.'" name="bayar'.$x.'" value="' . $row->rnominal . '"  class="form-control-sm col-12">';
                                                            $hasil = $hasil . '<input type="text" name="bayarxxx[]" value="' . $row->rnominal . '"  class="form-control-sm col-12" disabled>';
                                                        }
                                                        
                                                    } else if ($row->jenis_tagihan == "CICILAN") {
                                                        if ($row->status_pembayaran == "LUNAS") {
                                                            $hasil = $hasil . 'L '.$row->tanggal_bayar;
                                                            $hasil = $hasil . '<input type="hidden" id="bayar'.$x.'" name="bayar'.$x.'" value="' . $row->rnominal . '"  class="form-control-sm col-12">';
                                                        } else {
                                                            $hasil = $hasil . '<input type="number" id="bayar'.$x.'" name="bayar'.$x.'" value="' . $batasMaxBayar . '";  id="txtWeight" onchange="this.value = minmax(this.value, 0, ' . $batasMaxBayar . ')"  onkeyup="this.value = minmax(this.value, 0, ' . $batasMaxBayar . ')" value="' . $row->jenis_tagihan . '"  class="form-control-sm col-12">';
                                                        }
                                                    } else {
                                                        $pesan = "data jenis pada tabel jenis_tagihan_ok harus CASH atau CICILAN mohon perbaiki data anda terlebih dahulu";
                                                        dd($pesan);
                                                    }
                                                    $hasil = $hasil . '</div>
                                                    </div>
                                                    ';

                                                    //js ketik checkbox di klik
                                                    $hasil = $hasil."<script>
                                                                        const checkbox".$x." = document.getElementById('myCheckbox".$x."');
                                                                        
                                                                       
                                                                        checkbox".$x.".addEventListener('change', (event) => {
                                                                        if (event.currentTarget.checked) {
                                                                            let  x".$x."    = document.getElementById('bayar".$x."').value;

                                                                            document.getElementById('vara".$x."').value=x".$x.";
                                                                            let  vara".$x."    = document.getElementById('vara".$x."').value;

                                                                            let total   = document.getElementById('total').value;
                                                                            let tmp     = parseInt(total) + parseInt(vara".$x.");

                                                                            var prefix  = 'Rp. ';
                                                                            var number_string = tmp.toString(),
                                                                            split   		= number_string.split(','),
                                                                            sisa     		= split[0].length % 3,
                                                                            rupiah     		= split[0].substr(0, sisa),
                                                                            ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

                                                                            // tambahkan titik jika yang di input sudah menjadi angka ribuan
                                                                            if(ribuan){
                                                                                separator = sisa ? '.' : '';
                                                                                rupiah += separator + ribuan.join('.');
                                                                            }

                                                                            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                                                                            rupiah = 'Rp. '+ rupiah;

                                                                            document.getElementById('totalt').value =  rupiah;
                                                                            document.getElementById('total').value =  tmp;
                                                                            
                                                                            var bayarH         = document.getElementById('bayar').value;
                                                                            var bayarbb     = bayarH.replace(/[^,\d]/g, '').toString();
                                                                            if (bayarbb==''){
                                                                                var bayarcc     = parseInt('0');    
                                                                            }else{
                                                                            var bayarcc     = parseInt(bayarbb);
                                                                            }

                                                                            var totalaa  = document.getElementById('total').value;
                                                                            var totalbb  = parseInt(totalaa);

                                                                            var sisa     = bayarcc-totalbb;
                                                                            var sisaa    =  sisa.toString();

                                                                            //////// document.getElementById('sisa').value = formatRupiah(sisaa, 'Rp. ');;
                                                                            document.getElementById('sisa').value =sisaa;

                                                                        } else {
                                                                            let  x".$x." = document.getElementById('bayar".$x."').value;

                                                                            document.getElementById('vara".$x."').value=x".$x.";
                                                                            let  vara".$x."    = document.getElementById('vara".$x."').value;
                                                                            
                                                                            let total   = document.getElementById('total').value;
                                                                            let tmp     = parseInt(total) - parseInt(vara".$x.");


                                                                            var prefix  = 'Rp. ';
                                                                            var number_string = tmp.toString(),
                                                                            split   		= number_string.split(','),
                                                                            sisa     		= split[0].length % 3,
                                                                            rupiah     		= split[0].substr(0, sisa),
                                                                            ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

                                                                            // tambahkan titik jika yang di input sudah menjadi angka ribuan
                                                                            if(ribuan){
                                                                                separator = sisa ? '.' : '';
                                                                                rupiah += separator + ribuan.join('.');
                                                                            }

                                                                            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                                                                            rupiah = 'Rp. '+ rupiah;

                                                                            document.getElementById('totalt').value =  rupiah;
                                                                            document.getElementById('total').value =  tmp;
                                                                        
                                                                            var bayarH         = document.getElementById('bayar').value;
                                                                            var bayarbb     = bayarH.replace(/[^,\d]/g, '').toString();
                                                                            if (bayarbb==''){
                                                                                var bayarcc     = parseInt('0');    
                                                                            }else{
                                                                            var bayarcc     = parseInt(bayarbb);
                                                                            }

                                                                            var totalaa  = document.getElementById('total').value;
                                                                            var totalbb  = parseInt(totalaa);

                                                                            var sisa     = bayarcc-totalbb;
                                                                            var sisaa    =  sisa.toString();

                                                                            //////// document.getElementById('sisa').value = formatRupiah(sisaa, 'Rp. ');;
                                                                            document.getElementById('sisa').value =sisaa;
                                                                        }
                                                                        })

                                                                    
                                                                        var rupiahHH".$x." = document.getElementById('bayar".$x."');

                                                                        rupiahHH".$x.".addEventListener('keyup', function(e){
                                                                            var checkBoxa".$x." =  document.getElementById('myCheckbox".$x."');
                                                                            if (checkBoxa".$x.".checked == true){
                                                                                
                                                                                let  vara".$x."    = document.getElementById('vara".$x."').value;

                                                                                let total   = document.getElementById('total').value;
                                                                                total       = parseInt(total)-parseInt(vara".$x.");
                                                                                
                                                                                document.getElementById('vara".$x."').value=document.getElementById('bayar".$x."').value;
                                                                                let  varaa".$x."    = document.getElementById('vara".$x."').value;
                                                                              
                                                                                let tmp     = parseInt(total) + parseInt(varaa".$x.");
                                                                            
                                                                                var prefix  = 'Rp. ';
                                                                                var number_string = tmp.toString(),
                                                                                split   		= number_string.split(','),
                                                                                sisa     		= split[0].length % 3,
                                                                                rupiah     		= split[0].substr(0, sisa),
                                                                                ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

                                                                                // tambahkan titik jika yang di input sudah menjadi angka ribuan
                                                                                if(ribuan){
                                                                                    separator = sisa ? '.' : '';
                                                                                    rupiah += separator + ribuan.join('.');
                                                                                }
    
                                                                                rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                                                                                rupiah = 'Rp. '+ rupiah;
    
                                                                                document.getElementById('totalt').value =  rupiah;
                                                                                document.getElementById('total').value =  tmp;

                                                                                var bayarH         = document.getElementById('bayar').value;
                                                                                var bayarbb     = bayarH.replace(/[^,\d]/g, '').toString();
                                                                                if (bayarbb==''){
                                                                                    var bayarcc     = parseInt('0');    
                                                                                }else{
                                                                                var bayarcc     = parseInt(bayarbb);
                                                                                }
    
                                                                                var totalaa  = document.getElementById('total').value;
                                                                                var totalbb  = parseInt(totalaa);
    
                                                                                var sisa     = bayarcc-totalbb;
                                                                                var sisaa    =  sisa.toString();
    
                                                                                //////// document.getElementById('sisa').value = formatRupiah(sisaa, 'Rp. ');;
                                                                                document.getElementById('sisa').value =sisaa;
                                                                            }
                                                                        });

                                                                </script>
                                                                ";

                                                    //counter
                                                    $x=$x+1;
                                                }           
                                            }
                                        // END ITEM PEMBAYARAN /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    $hasil = $hasil.'</div>
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

                // END CARD KELOMPOK////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                $hasil  =   $hasil.'</div>
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
        $hasil  = $hasil."<input type='hidden' name='jumlah' value='".$x."'>";
        

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
                                            t.keterangan keterangan_pembayaran,
                                            t.status status_pembayaran,
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
                                    <input class="form-check-input" type="checkbox"  id="myCheckbox['.$x.']" name="check['.$x.']"  value="YA" >
                                    <label class="form-check-label" for="defaultCheck1"   title="Rp.' . number_format($row->rnominal, 0, ",", ".") . '" >
                                    ' . $row->nama_tagihan . '
                                    </label>
                                    </div>
                                </div>
                                <div class="col-sm-4 f"> 
                                   fghfgh
                                ';

                $hasil = $hasil . '<input type="hidden" name="id_transaksi['.$x.']" value="' . $row->id_transaksi . '">
                                <input type="hidden" name="nominal'.$x.'" value="' . $row->rnominal . '">
                                <input type="hidden" name="tahun'.$x.'" value="' . $row->tahun . '">
                                <input type="hidden" name="id_siswa'.$x.'" value="' . $row->id_siswa . '">uioyiuyy
                                <input type="hidden" name="id_tagihan'.$x.'" value="' . $row->id_tagihan . '">
                                <input type="hidden" name="keterangan'.$x.'" value="' . $row->keterangan_pembayaran . '">
                                <input type="hidden" name="status'.$x.'" value="' . $row->status_pembayaran . '">
                                
                                <input type="hidden" name="total'.$x.'" value="' . $total . '">
                                <input type="text" name="jenis_tagihan'.$x.'" value="' . $row->jenis_tagihan . '">';
               

                if ($row->jenis_tagihan == "CASH") {
                    $hasil = $hasil . '<input type="text" name="bayar'.$x.'" value="' . $row->rnominal . '"  class="form-control-sm col-12">';
                    $hasil = $hasil . '<input type="text" name="bayarxxx[]" value="' . $row->rnominal . '"  class="form-control-sm col-12" disabled>';
                } else if ($row->jenis_tagihan == "CICILAN") {
                    if ($row->keterangan_pembayaran == "Lunas") {
                        echo "Lunas";
                    } else {
                        $hasil  = $hasil . '<input type="number" name="bayar'.$x.'" value="0";  id="txtWeight" onchange="this.value = minmax(this.value, 0, ' . $batasMaxBayar . ')"  onkeyup="this.value = minmax(this.value, 0, ' . $batasMaxBayar . ')" value="' . $row->jenis_tagihan . '"  class="form-control-sm col-12">';
                    }
                } else {
                    $pesan = "data jenis pada tabel jenis_tagihan_ok harus CASH atau CICILAN mohon perbaiki data anda terlebih dahulu";
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
        // echo "JUMLAH INPUT = ".$jumlah."</br>";
        $id_admin      = "111";
        $nama_admin    = "Nurmalis Mudianto";
        $no_nota       =  date('dmyhis').$id_admin; 

        for($i=0;$i<$jumlah;$i++){
         
            if (isset($_POST['check'.$i])) {
                $check      = $_POST['check'.$i];
            }else{
                $check      = "TIDAK";
            }
          
            $nominal                = $_POST['nominal'.$i];
            $id_transaksi           = $_POST['id_transaksi'.$i];
            $bayar                  = $_POST['bayar'.$i];
            $jenis_tagihan          = $_POST['jenis_tagihan'.$i];
            $tahun                  = $_POST['tahun'.$i];
            $id_siswa               = $_POST['id_siswa'.$i];
           
            $tgl_bayar  = date("Y-m-d");
            if(empty($_POST['total'.$i])){
                $total     = $_POST['bayar'.$i];
            }else{
                $total     = $_POST['total'.$i]+$_POST['bayar'.$i];
            }

           
            if($total>=$nominal){
                $status             = 'LUNAS';
            }else{
                $status             = 'BELUM LUNAS';
            }

            if(empty($_POST['keterangan'.$i])){
                $keterangan             = $jenis_tagihan;
            }else {
                $keterangan             = $_POST['keterangan'.$i];
            }

          

            // echo "NO = ".$i." ";
            // echo "Check = ".$check." ";
            // echo "NOMINAL = ".$nominal." ";
            // echo "ID TRANSAKSI = ".$id_transaksi." ";
            // echo "BAYAR = ".$bayar." ";
            // echo "JENIS TAGIHAN = ".$jenis_tagihan." ";
            // echo "KETERANGAN = ".$keterangan." ";
            // echo "STATUS = ".$status." ";
            // echo"</br>";

            if($check=="IYA"){

                $data['transaksi']      = array(
                    'tgl_bayar'         =>$tgl_bayar,
                    'total'             =>$total,
                    'keterangan'        =>$keterangan,
                    'status'            =>$status
                );
                
                $builder = $this->db->table('transaksi');
                $builder->where('id_transaksi', $id_transaksi);
                // $builder->update($data['transaksi']);

                // echo $id_transaksi;
                // dd($data['transaksi']);
   
                // echo "NO = ".$i." ";
                // echo "Check = ".$check." ";
                // echo "NOMINAL = ".$nominal." ";
                // echo "ID TRANSAKSI = ".$id_transaksi." ";
                // echo "BAYAR = ".$bayar." ";
                // echo "JENIS TAGIHAN = ".$jenis_tagihan." ";
                // echo "KETERANGAN = ".$keterangan." ";
                // echo "STATUS = ".$status." ";
                
                // echo "tgl_bayar = ".$tgl_bayar." ";
                // echo "total = ".$total." ";

                //start jika pembayaran cicilan
                if($keterangan=="CICILAN"){
                    $data['cicilan']    = array(
                        'id_cicilan'   =>null,
                        'tahun'         =>$tahun,
                        'id_transaksi'  =>$id_transaksi,
                        'id_siswa'      =>$id_siswa,
                        'tanggal'       =>$tgl_bayar,
                        'nominal'       =>$bayar,
                        'keterangan'    =>null,
                        'timestamp'     =>null
                    );
                // dd($data['cicilan']);
                $builder = $this->db->table('cicilan');
                // $builder->insert($data['cicilan']);
                }

                //nota
                $tgl_nota      =  date('Y-m-d  h:i:s');

                $query  = $this->db->query("SELECT 	t.id_tagihan,jt.nama_tagihan 
                                            FROM 	`jenis_tagihan_ok` jt 
                                                    INNER JOIN transaksi t ON jt.id_tagihan=t.id_tagihan
                                            WHERE 	t.id_transaksi=$id_transaksi");

                    if ($query->getNumRows() >= 1) {
                        $row = $query->getRow();
                        if (isset($row)) {
                            $nama_item   = $row->nama_tagihan;
                        }
                    }
                
                    $query  = $this->db->query("SELECT 	nama 
                                                FROM 	siswa_aktif_ok
                                                WHERE 	id_siswa =$id_siswa");

                    if ($query->getNumRows() >= 1) {
                        $row = $query->getRow();
                        if (isset($row)) {
                            $nama_siswa   = $row->nama;
                        }
                    }


                $data['nota']  = array(
                    'id_transaksi'      =>null,
                    'no_nota'           =>$no_nota,
                    'tgl'               =>$tgl_nota,
                    'nama_item'         =>$nama_item,
                    'nominal'           =>$bayar,
                    'status'            =>$status,
                    'keterangan'        =>$keterangan,
                    'id_siswa'          =>$id_siswa,
                    'nama_siswa'        =>$nama_siswa,
                    'id_admin'          =>$id_admin,
                    'nama_admin'        =>$nama_admin
                );
                $builder = $this->db->table('nota');
                $builder->insert($data['nota']);
               
                
            }
        }
       
        $stop="stop";
        dd($stop);
        
        $this->session->set('ses_idsiswa', $id_siswa);
        $this->session->set('ses_tahun', $tahun);
        return redirect()->to(base_url('Cytransaksicari'));
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