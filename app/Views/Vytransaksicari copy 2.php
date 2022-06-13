<?= $this->extend('templateyayasan/template'); ?>
<?= $this->section('content'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Transaksi Pembayaran</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Layout</a></li>
                        <li class="breadcrumb-item active">Collapsed Sidebar</li>
                    </ol>
                </div>
            </div>
        </div>
    </section> -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- chat row -->
            <div class="row">
                <div class="col-md-4">
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
                                <!-- <canvas id="areaChart"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;">
                                </canvas> -->

                                <form>
                                    <div class="form-group row d">
                                        <label class="col-sm-3 col-form-label">ID SISWA</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="inputEmail3" name="id">
                                        </div>
                                    </div>
                                    <div class="form-group row d">
                                        <label class="col-sm-3 col-form-label">TAHUN TAGIHAN</label>
                                        <div class="col-sm-9">
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
                                                class="btn btn-secondary btn-lg btn-block">Cari</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

                <div class="col-md-4">
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
                                                    <div class="col-sm-3 e">
                                                        <label class="form-check-label ">
                                                            NAMA
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-1 e">
                                                        =
                                                    </div>
                                                    <div class="col-sm-8 e">
                                                        <label class="form-check-label ">
                                                            <?= $info_siswa->nama; ?>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row e">
                                                    <div class="col-sm-3 e">
                                                        <label class="form-check-label ">
                                                            ALAMAT
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-1 e">
                                                        <label class="form-check-label ">
                                                            =

                                                        </label>
                                                    </div>
                                                    <div class="col-sm-8 e">
                                                        <label class="form-check-label ">
                                                            <?= $info_siswa->desakelurahanS; ?>
                                                            <?= $info_siswa->kecamatanS; ?>
                                                            <?= $info_siswa->kabupatenS; ?>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row e">
                                                    <div class="col-sm-3 e">
                                                        <label class="form-check-label">
                                                            LEMBAGA
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-1 e">
                                                        <label class="form-check-label">
                                                            =
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-8 e">
                                                        <label class="form-check-label">
                                                            <?= $info_siswa->inisial_lembaga; ?>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row e">
                                                    <div class="col-sm-3 e">
                                                        <label class="form-check-label">
                                                            KELAS
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-1 e">
                                                        <label class="form-check-label">
                                                            =
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-8 e">
                                                        <label class="form-check-label">
                                                            <?= $info_siswa->nama_ruang; ?>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row e">
                                                    <div class="col-sm-3 e">
                                                        <label class="form-check-label">
                                                            PRODISTIK
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-1 e">
                                                        <label class="form-check-label">
                                                            =
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-8 e">
                                                        <label class="form-check-label">
                                                            <?= $info_siswa->prodistik; ?>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row e">
                                                    <div class="col-sm-3 e">
                                                        <label class="form-check-label">
                                                            PONDOK
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-1 e">
                                                        <label class="form-check-label">
                                                            =
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-8 e">
                                                        <label class="form-check-label">
                                                            <?= $info_siswa->nama_kamar; ?>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row e">
                                                    <div class="col-sm-3 e">
                                                        <label class="form-check-label">
                                                            MADIN
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-1 e">
                                                        <label class="form-check-label">
                                                            =
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-8 e">
                                                        <label class="form-check-label">
                                                            <?= $info_siswa->madin; ?>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row e">
                                                    <div class="col-sm-12 e text-center">
                                                        <label class="form-check-label">
                                                            <p class="text-danger e">contoh. TUNGGGAKAN 2019 190000000
                                                            </p>
                                                            <p class="text-danger e">contoh. TUNGGGAKAN 2019 190000000
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

                <div class="col-md-4">
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
                                <form>
                                    <div class="form-group row a">
                                        <label for="inputEmail3" class="col-sm-5 col-form-label">TOTAL TAGIHAN</label>
                                        <div class="col-sm-7">
                                            <input type="email" class="form-control form-control-sm" id="inputEmail3"
                                                placeholder="Email" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row a">
                                        <label for="inputEmail3" class="col-sm-5 col-form-label">BAYAR</label>
                                        <div class="col-sm-7">
                                            <input type="email" class="form-control form-control-sm" id="inputEmail3"
                                                placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group row a">
                                        <label for="inputEmail3" class="col-sm-5 col-form-label">SISA</label>
                                        <div class="col-sm-7">
                                            <input type="email" class="form-control form-control-sm" id="inputEmail3"
                                                placeholder="Email" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row a">
                                        <div class="col-sm-12">
                                            <button type="submit"
                                                class="btn btn-secondary btn-sm btn-block">Bayar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- end chat row -->
            <!-- chat row -->
            <?php if ($jumlah_card_lembaga >= 1) {
                foreach ($card_lembaga as $row) { ?>
            <div class="row">
                <div class="col-md-12">
                    <!-- AREA CHART -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><?= $row->inisial; ?></h3>

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
                                        <!-- //////////////////////////////////////////////////////////////// -->
                                        <div class="col-md-4 b">
                                            <div class="card">
                                                <div class="card-header text-center">
                                                    SPP
                                                </div>
                                                <div class="card-body b">
                                                    <div class="container ">
                                                        <div class="row ">
                                                            <div class="col-sm">
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            value="" id="defaultCheck1" checked>
                                                                        <label class="form-check-label"
                                                                            for="defaultCheck1" data-toggle="tooltip"
                                                                            title="Hooray!">
                                                                            1. SPP JANUARI
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            value="" id="defaultCheck1" checked>
                                                                        <label class="form-check-label"
                                                                            for="defaultCheck1" data-toggle="tooltip"
                                                                            title="Hooray!">
                                                                            2. SPP JANUARI
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            value="" id="defaultCheck1" checked>
                                                                        <label class="form-check-label"
                                                                            for="defaultCheck1" data-toggle="tooltip"
                                                                            title="Hooray!">
                                                                            3. SPP JANUARI
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            value="" id="defaultCheck1" checked>
                                                                        <label class="form-check-label"
                                                                            for="defaultCheck1" data-toggle="tooltip"
                                                                            title="Hooray!">
                                                                            4. SPP JANUARI
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            value="" id="defaultCheck1" checked>
                                                                        <label class="form-check-label"
                                                                            for="defaultCheck1" data-toggle="tooltip"
                                                                            title="Hooray!">
                                                                            5. SPP JANUARI
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            value="" id="defaultCheck1" checked>
                                                                        <label class="form-check-label"
                                                                            for="defaultCheck1" data-toggle="tooltip"
                                                                            title="Hooray!">
                                                                            6. SPP JANUARI
                                                                        </label>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="col-sm">
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            value="" id="defaultCheck1" checked>
                                                                        <label class="form-check-label"
                                                                            for="defaultCheck1" data-toggle="tooltip"
                                                                            title="Hooray!">
                                                                            7. SPP JANUARI
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            value="" id="defaultCheck1" checked>
                                                                        <label class="form-check-label"
                                                                            for="defaultCheck1" data-toggle="tooltip"
                                                                            title="Hooray!">
                                                                            8. SPP JANUARI
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            value="" id="defaultCheck1" checked>
                                                                        <label class="form-check-label"
                                                                            for="defaultCheck1" data-toggle="tooltip"
                                                                            title="Hooray!">
                                                                            9. SPP JANUARI
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            value="" id="defaultCheck1" checked>
                                                                        <label class="form-check-label"
                                                                            for="defaultCheck1" data-toggle="tooltip"
                                                                            title="Hooray!">
                                                                            10. SPP OKTEBER
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            value="" id="defaultCheck1" checked>
                                                                        <label class="form-check-label"
                                                                            for="defaultCheck1" data-toggle="tooltip"
                                                                            title="Hooray!">
                                                                            11. SPP NOVEMBER
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            value="" id="defaultCheck1" checked>
                                                                        <label class="form-check-label"
                                                                            for="defaultCheck1" data-toggle="tooltip"
                                                                            title="Hooray!">
                                                                            12. SPP DESEMBER
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- //////////////////////////////////////////////////////////////// -->
                                    </div>
                                </div>
                            </section>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <?php }
            } ?>
            <!-- end chat row -->
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<script>
$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
});
</script>

<?= $this->endSection(); ?>