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

                                <form method="POST" action="transaksicari">
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
                                                        <label class="form-check-label">
                                                            NAMA
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-1 e">
                                                        =

                                                    </div>
                                                    <div class="col-sm-8 e">
                                                        <label class="form-check-label">

                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row e">
                                                    <div class="col-sm-3 e">
                                                        <label class="form-check-label">
                                                            ALAMAT
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-1 e">
                                                        <label class="form-check-label">
                                                            =
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-8 e">
                                                        <label class="form-check-label">

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

                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row e">
                                                    <div class="col-sm-3 e">
                                                        <label class="form-check-label">
                                                            KAMAR
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-1 e">
                                                        <label class="form-check-label">
                                                            =
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-8 e">
                                                        <label class="form-check-label">

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
                                            <input type="text" class="form-control form-control-sm" id="inputEmail3"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row a">
                                        <label for="inputEmail3" class="col-sm-5 col-form-label">BAYAR</label>
                                        <div class="col-sm-7">
                                            <input type="email" class="form-control form-control-sm" id="inputEmail3"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row a">
                                        <label for="inputEmail3" class="col-sm-5 col-form-label">SISA</label>
                                        <div class="col-sm-7">
                                            <input type="email" class="form-control form-control-sm" id="inputEmail3"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row a">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-secondary btn-sm btn-block"
                                                disabled>Bayar</button>
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
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?= $this->endSection(); ?>