<?php

namespace App\Controllers;
use \Mpdf\Mpdf;
class Cynota extends BaseController
{
    public function index()
    {                                                                                                                   
        $mpdf = new \Mpdf\Mpdf(['format' => [58, 200]]);
        // $mpdf = new Mpdf(['mode' => 'utf-8']);

        // $mpdf = new \Mpdf\Mpdf();
        $mpdf->AddPage('P','','','','',0,0,3,0,0,0);
        $html = '<!DOCTYPE html>
        <html>
        <head>
        <style>
        h4 {
          line-height: 1.2;
          padding-top: 0px;
          padding-bottom: 0px;
          margin-top: 0px;
          margin-bottom: 0px;
        }
        h5 {
          line-height: 1.2;
          padding-top: 0px;
          padding-bottom: 0px;
          margin-top: 0px;
          margin-bottom: 0px;
        }
        h6 {
          line-height: 1.2;
          padding-top: 0px;
          padding-bottom: 0px;
          margin-top: 0px;
          margin-bottom: 0px;
        }
        .isi{
            font-size: 12px;
        }
        </style>
        </head>
        <body>
        
        <h4 align="center">YAYASAN TARBIYATUT</h4>
        <h4 align="center">THOLABAH</h4>
        <H4 align="center">Kranji Paciran Lamongan</H4>
        <H6 align="center">==========================</H6>
        <table width="100%" class="isi">
            <tr>
                <td>Nomor Nota</td>
                <td>:</td>
                <td>654465654465</td>
            </tr>
            <tr>
                <td>Pembayaran</td>
                <td>:</td>
                <td>12/10/2022</td>
            </tr>
            <tr>
                <td>44555558</td>
                <td>:</td>
                <td>agus alfino fauzi superwin</td>
            </tr>
        </table>
        <H6 align="center">==========================</H6>
        <table width="100%" class="isi">
            <tr>
                <td>1.</td>
                <td>Perawatan Gedung</td>
                <td>Rp.150.000</td>
            </tr>
            <tr>
                <td>1.</td>
                <td>Perawatan Gedung</td>
                <td>Rp.150.000</td>
            </tr>
            <tr>
                <td>1.</td>
                <td>Perawatan Gedung</td>
                <td>Rp.150.000</td>
            </tr>
        </table>
        <H6 align="center">==========================</H6>
        <table width="100%">
            <tr>
                <td><b>TOTAL</b></td>
                <td align="right"><b>RP. 2.000.000</b></td>
            </tr>
        </table>
        <table width="100%" class="isi">
            <tr>
                <td align="right">Tanggal Cetak 22/10/2002</td>
            </tr>
        </table>
        </body>
        </html>
        ';
        $mpdf->WriteHTML($html);
        
        // $mpdf->WriteHTML(view('vynota'));
        return redirect()->to($mpdf->Output('nota.pdf', 'I'));
    }
    public function cetaknota($id = null){

        //isi data id siswa
        $query = $this->db->query("SELECT id_siswa, DATE_FORMAT(tgl, '%d/%m/%Y') tgl FROM `nota` WHERE no_nota='$id' GROUP BY id_siswa");
        foreach ($query->getResult() as $row) {
            $id_siswa   = $row->id_siswa;
            $tgl        = $row->tgl;
        }
        // dd($id_siswa);

        //mengisi data siswa
        $query = $this->db->query("SELECT   *,
                                            (SELECT l.inisial FROM lembaga l WHERE l.id_lembaga=sa.id_lembaga) lembaga,
                                            (SELECT r.nama_ruang FROM r_ruang r where r.id_ruang=sa.ruang ) nama_ruang
                                    FROM `siswa_aktif_ok` sa where id_siswa='$id_siswa'");
        foreach ($query->getResult() as $row) {
            $nama       = $row->nama;
            $id_lembaga = $row->id_lembaga;
            $lembaga    = $row->lembaga;
            $ruang      = $row->nama_ruang;
        }

        //mengatur tinggi page
        $query = $this->db->query("SELECT count(*) jumlahdata FROM `nota` where no_nota='$id'");
        foreach ($query->getResult() as $row) {$jumlahdata   = $row->jumlahdata ;}
        $tinggi = 90+(5*$jumlahdata);
        //echo $id;
        $mpdf = new \Mpdf\Mpdf(['format' => [58, $tinggi]]);
        // $mpdf = new Mpdf(['mode' => 'utf-8']);

        // $mpdf = new \Mpdf\Mpdf();
        $mpdf->AddPage('P','','','','',0,0,3,0,0,0);
        $html = '<!DOCTYPE html>
        <html>
        <head>
        <style>
        h4 {
          line-height: 1.2;
          padding-top: 0px;
          padding-bottom: 0px;
          margin-top: 0px;
          margin-bottom: 0px;
        }
        h5 {
          line-height: 1.2;
          padding-top: 0px;
          padding-bottom: 0px;
          margin-top: 0px;
          margin-bottom: 0px;
        }
        h6 {
          line-height: 1.2;
          padding-top: 0px;
          padding-bottom: 0px;
          margin-top: 0px;
          margin-bottom: 0px;
        }
        .isi{
            font-size: 12px;
        }
        .isi1{
            font-size: 12px;
            padding-top: 0px;
            padding-bottom: 0px;
            margin-top: 0px;
            margin-bottom: 0px;
        }
        </style>
        </head>
        <body>
        
        <h5 align="center">Yayasan Pondok Pesantren</h5>
        <h4 align="center">TARBIYATUT THOLABAH</h4>
        <H4 align="center">Kranji Paciran Lamongan</H4>
        <p class="isi1" align="center">Call Center/WA : 085853922644</p>
        <H6 align="center">==========================</H6>
        <table width="100%" class="isi">
            <tr>
                <td>Nomor Nota</td>
                <td>:</td>
                <td>'.$id.'</td>
            </tr>
            <tr>
                <td>Pembayaran</td>
                <td>:</td>
                <td>'.$tgl.'</td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>'.$nama.'</td>
            </tr>
            
            <tr>
                <td>Unit</td>
                <td>:</td>
                <td>'.$lembaga.'</td>
            </tr>
            <tr>
                <td>Kelas/Ruang</td>
                <td>:</td>
                <td>'.$ruang.'</td>
            </tr>
            
        </table>
        <H6 align="center">==========================</H6>
        <table width="100%" class="isi">';
        $nomor          = 1;
        $total_nominal  = 0;
        $query = $this->db->query("SELECT * FROM `nota` where no_nota='$id'");
        foreach ($query->getResult() as $row) {
                $id_transaksi   = $row->id_transaksi ;
                $no_nota        = $row->no_nota;
                $tgl            = $row->tgl;
                $nama_item      = $row->nama_item;
                $nominal        = $row->nominal;
                $status         = $row->status;
                $keterangan     = $row->keterangan;
                $id_siswa       = $row->id_siswa;
                $nama_siswa     = $row->nama_siswa;
                $id_admin       = $row->id_admin;
                $nama_admin     = $row->nama_admin;
                $total_nominal  = $total_nominal+$nominal;
                $html =  $html.'
                <tr >
                    <td style="height:2mm">'.$nomor.'</td>
                    <td>'.$nama_item.'</td>
                    <td>'.rupiah($nominal).'</td>
                </tr>';
               
                $nomor=$nomor+1;
        }
    
       
        $html =  $html.'   
        </table>
        <H6 align="center">==========================</H6>
        <table width="100%">
            <tr>
                <td><b>TOTAL</b></td>
                <td align="right"><b>'.rupiah($total_nominal).'</b></td>
            </tr>
        </table>
        <table width="100%" class="isi">
            <tr>
                <td align="right">Tanggal Cetak '.date('d/m/Y').'</td>
            </tr>
            <tr>
                <td align="right">Admin : '.$nama_admin.'</td>
            </tr>
        </table>
        </body>
        </html>
        ';
        $mpdf->WriteHTML($html);
        
        // $mpdf->WriteHTML(view('vynota'));
        return redirect()->to($mpdf->Output('nota.pdf', 'I'));
    }
}
function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
}