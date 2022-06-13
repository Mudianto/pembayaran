<?= $this->extend('templateyayasan/template'); ?>
<?= $this->section('content'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- chat row -->
            <div class="row">
                <div class="col-md-2 g">
                    <!-- AREA CHART -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Cari Orang</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body c">
                            <div class="chart">
                                <form method="POST" action="transaksicari" id="ok">
                                    <div class="form-group row d">
                                        <label class="col-sm-4 col-form-label"><h6> Siswa</h6></label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control" id="inputEmail3" name="id">
                                        </div>
                                    </div>
                                    <div class="form-group row d">
                                        <label class="col-sm-4 col-form-label"><h6> Tahun</h6></label>
                                        <div class="col-sm-8">
                                            <select class="custom-select rounded-0" id="exampleSelectRounded0"
                                                name="tahun">
                                                <?php
                                                foreach ($c_tahun as $row) {
                                                ?>
                                                <option value="<?= $row->tahun; ?>">
                                                    <?= $row->tahun; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row d">
                                        <div class="col-sm-12">
                                            <button type="submit"
                                                class="btn btn-secondary btn-sm btn-block">Cari</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-3 g">
                    <!-- AREA CHART -->
                    <div class="card card-primary ">
                        <div class="card-header">
                            <h3 class="card-title">Info Siswa</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body c">
                            <div class="chart">
                                <!-- <canvas id="areaChart"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;">

                                </canvas> -->
                                <div class="card-body e">
                                    <div class="container">
                                        <div class="row e">
                                            <div class="col-sm-12 e">
                                                <div class="row e">
                                                    <div class="col-sm-4 e">
                                                        <label class="form-check-label ">
                                                            Nama
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-1 e">
                                                        =
                                                    </div>
                                                    <div class="col-sm-7 e">
                                                        <label class="form-check-label ">
                                                            <?=  $info_siswa['nama'] ?>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row e">
                                                    <div class="col-sm-4 e">
                                                        <label class="form-check-label ">
                                                            Alamat
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-1 e">
                                                        <label class="form-check-label ">
                                                            =

                                                        </label>
                                                    </div>
                                                    <div class="col-sm-7 e">
                                                        <label class="form-check-label ">
                                                            <?= $info_siswa['desakelurahanS']; ?>
                                                            <?= $info_siswa['kecamatanS']; ?>
                                                            <?= $info_siswa['kabupatenS']; ?>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row e">
                                                    <div class="col-sm-4 e">
                                                        <label class="form-check-label">
                                                            Lembaga
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-1 e">
                                                        <label class="form-check-label">
                                                            =
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-7 e">
                                                        <label class="form-check-label">
                                                            <?= $info_siswa['inisial_lembaga']; ?>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row e">
                                                    <div class="col-sm-4 e">
                                                        <label class="form-check-label">
                                                            Kelas
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-1 e">
                                                        <label class="form-check-label">
                                                            =
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-7 e">
                                                        <label class="form-check-label">
                                                            <?= $info_siswa['nama_ruang']; ?>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row e">
                                                    <div class="col-sm-4 e">
                                                        <label class="form-check-label">
                                                            Prodistik
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-1 e">
                                                        <label class="form-check-label">
                                                            =
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-7 e">
                                                        <label class="form-check-label">
                                                            <?= $info_siswa['prodistik']; ?>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row e">
                                                    <div class="col-sm-4 e">
                                                        <label class="form-check-label">
                                                            Pondok
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-1 e">
                                                        <label class="form-check-label">
                                                            =
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-7 e">
                                                        <label class="form-check-label">
                                                            <?= $info_siswa['nama_kamar']; ?>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row e">
                                                    <div class="col-sm-4 e">
                                                        <label class="form-check-label">
                                                            Madin
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-1 e">
                                                        <label class="form-check-label">
                                                            =
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-7 e">
                                                        <label class="form-check-label">
                                                            <?= $info_siswa['madin']; ?>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row e">
                                                    <div class="col-sm-4 e">
                                                        <label class="form-check-label">
                                                            Keterangan
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-1 e">
                                                        <label class="form-check-label">
                                                            =
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-7 e">
                                                        <label class="form-check-label">
                                                            <?= $info_siswa['keterangan']; ?>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row e">
                                                    <div class="col-sm-12 e text-center">
                                                        <label class="form-check-label">
                                                            <p class="text-danger e">
                                                                <?php
                                                                foreach ($tunggakan as $row) {
                                                                ?>
                                                                TUNGGGAKAN TAHUN = <?= $row->tahun; ?> SEBESAR = <?= rupiah($row->tunggakan);?>
                                                                <?php } ?>
                                                            
                                                            </p>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-2 g">
                    <!-- AREA CHART -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Pembayaran</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body c">
                            <div class="chart">
                            <!-- My Checkbox: <input id="myCheckbox" type="checkbox" /> -->
                                <div class="form-group sm row a">
                                    <label for="inputEmail3" class="col-sm-5 col-form-label"><h6> Total </h6></label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control form-control-sm" id="totalt" value="Rp. 0" disabled>
                                        <input type="hidden" class="form-control form-control-sm" id="total" value="0" >
                                    </div>
                                </div>
                                <div class="form-group sm row a">
                                    <label for="inputEmail3" class="col-sm-5 col-form-label"><h6>Bayar</h6></label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control form-control-sm" id="bayar" name="bayar" value="">
                                    </div>
                                </div>
                                <div class="form-group sm row a">
                                    <label for="inputEmail3" class="col-sm-5 col-form-label"><h6>Kembali</h6></label>
                                    <div class="col-sm-7">
                                        <input type="tex" class="form-control form-control-sm" id="sisa" name="sisa" value="Rp. 0" disabled>
                                    </div>
                                </div>
                                <div class="form-group row a">
                                    <div class="col-sm-12">
                                        <button onclick="myFunction()" class="btn btn-secondary btn-sm btn-block"
                                            <?php
                                                if (empty($info_siswa['id_siswa'])) {
                                                    echo "disabled";
                                                }
                                                ?>>Bayar</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-5 g">
                    <!-- AREA CHART -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Cari Id</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body c">
                            <div class="chart">
                            <!-- My Checkbox: <input id="myCheckbox" type="checkbox" /> -->
                               <table class="table" width="100%">
                                   <tr>
                                       <th>No</th>
                                       <th>Nis</th>
                                       <th>Nama</th>
                                       <th>Desa</th>
                                       <th>Kecamatan</th>
                                   </tr>
                                   <tr>
                                       <td>1</td>
                                       <td>6546564545645</td>
                                       <td>Agus Afino Fauzi</td>
                                       <td>Tambak Urang</td>
                                       <td>Sido Mulyo</td>
                                   </tr>
                               </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <form id="myForm" method="post" action="transaksicari/bayar">
                <?= $tampilCard; ?>
            </form>
            <!-- ////////////////////////////////////////////// -->
            <div class="row">
                <div class="col-md-12">
                    <!-- AREA CHART -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"></h3>
                                Nota Pembayaran
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">TANGGAL</th>
                                        <th scope="col">NOMOR NOTA</th>
                                        <th scope="col">NOMINAL</th>
                                        <th scope="col">DOWNLOAD</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    // dd($nota);
                                    $i=1;
                                        foreach ($nota as $row) { ?>
                                        <tr>
                                            <th scope="row"><?= $i; ?></th>
                                            <td><?= $row->tgl1; ?></td>
                                            <td><?= $row->no_nota; ?></td>
                                            <td><?= $row->total_nominal; ?></td>
                                            <td><a href="<?= base_url('nota/' . $row->no_nota); ?>"" target="blank" class="btn btn-primary">DOWNLOAD</a></td>
                                        </tr>
                                        <?php
                                        $i=$i+1;
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<script>

        var rupiahH = document.getElementById('bayar');

		rupiahH.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			rupiahH.value    = formatRupiah(this.value, 'Rp. ');

            var bayaraa     = rupiahH.value;
            var bayarbb     = bayaraa.replace(/[^,\d]/g, '').toString();
            var bayarcc     = parseInt(bayarbb);

             var totalaa  = document.getElementById('total').value;
            var totalbb  = parseInt(totalaa);

            var sisa    = bayarcc-totalbb;
            var sisaa    =  sisa.toString();

            // document.getElementById('sisa').value = formatRupiah(sisaa, 'Rp. ');;
            document.getElementById('sisa').value =sisaa;
		});

		/* Fungsi formatRupiah */
		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
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
			return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		}

$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
});
</script>
<script>
function myFunction() {
    document.getElementById("myForm").submit();
}

function minmax(value, min, max) {
    if (parseInt(value) < min || isNaN(parseInt(value)))
        return 0;
    else if (parseInt(value) > max)
        return max;
    else return value;
}
</script>
<?= $this->endSection(); ?>
<?php 
function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,0,'0','.');
	return $hasil_rupiah;
 
}
?>