<?= $this->extend('templateyayasan/template'); ?>
<?= $this->section('content'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Jenis Tagihan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Layout</a></li>
                        <li class="breadcrumb-item active">Collapsed Sidebar</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Jenis Tagihan</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>LEMBAGA </th>
                                        <th>NAMA TAGIHAN</th>
                                        <th>NOMINAL</th>
                                        <th>GENDER</th>
                                        <th>LEMBAGA</th>
                                        <th>TINGKAT</th>
                                        <th>RUANG</th>
                                        <th>PROGRAM</th>
                                        <th>PONDOK</th>
                                        <th>KAMAR</th>
                                        <th>MADIN</th>
                                        <th>KELAS MADIN</th>
                                        <th>PRODISTIK</th>
                                        <th>KELAS PRODISTIK</th>
                                        <th style="width: 40px">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1.</td>
                                        <td>LEMBAGA</td>
                                        <td>NAMA TAGIHAN</td>
                                        <td>NOMINAL</td>
                                        <td>NAMA TAGIHAN</td>
                                        <td>NAMA TAGIHAN</td>
                                        <td>NOMINAL</td>
                                        <td>NOMINAL</td>
                                        <td>NOMINAL</td>
                                        <td>NOMINAL</td>
                                        <td>NOMINAL</td>
                                        <td>NOMINAL</td>
                                        <td>NOMINAL</td>
                                        <td>NOMINAL</td>
                                        <td>NOMINAL</td>
                                        <td>
                                            <form action="jenistagihanedit" method="POST">
                                                <input type="hidden" name="id" value="">
                                                <input type="submit" value="Edit" name="detail" class="btn btn-primary">
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            </br>
                            <table class="table table-hover">
                                <!-- <table class="table table-hover" id="example" width="100%"> -->
                                <thead>
                                    <tr>
                                        <td scope="col"><b>#</b></td>
                                        <td scope="col"><b>Tahun</b></td>
                                        <td scope="col"><b>Nama Tagihan</b></td>
                                        <td scope="col"><b>Nominal</b></td>
                                        <td scope="col"><b>Gender</b></td>
                                        <td scope="col"><b>
                                                <center>Lembaga</center>
                                            </b></td>
                                        <td scope="col"><b>Tingkat</b></td>
                                        <td scope="col"><b>Ruang</b></td>
                                        <td scope="col"><b>Prodistik</b></td>
                                        <td scope="col"><b>Program</b></td>
                                        <td scope="col"><b>Ruang Prodistik</b></td>
                                        <td scope="col"><b>Pondok</b></td>
                                        <td scope="col"><b>Kamar</b></td>
                                        <td scope="col"><b>Madin</b></td>
                                        <td scope="col"><b>Kelas Madin</b></td>
                                        <td scope="col"><b>Jenis</b></td>
                                        <td scope="col"><b>Edit</b></td>
                                        <!-- <td scope="col" align="center">Aksi</td> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php $i = 1;
                                        foreach ($jenis_tagihan as $row) { ?>
                                        <td scope="row"><b><?= $i++; ?>.</b></td>
                                        <td><?= $row->tahun; ?></td>
                                        <td><?= $row->nama_tagihan; ?></td>
                                        <td><?= $row->nominal; ?></td>
                                        <td><?= $row->Gender; ?></td>
                                        <td><?= $row->inisial; ?></td>
                                        <td><?= $row->tingkat; ?></td>
                                        <td><?= $row->ruang; ?></td>
                                        <td><?= $row->prodistik; ?></td>
                                        <td><?= $row->ruang_prodistik; ?></td>
                                        <td><?= $row->program; ?></td>
                                        <td><?= $row->pondok; ?></td>
                                        <td><?= $row->kamar; ?></td>
                                        <td><?= $row->madin; ?></td>
                                        <td><?= $row->kelas_madin; ?></td>
                                        <td><?= $row->jenis; ?></td>
                                        <td align="center">
                                            <form action="jenistagihanedit" method="POST">
                                                <input type="hidden" name="id" value="<?= $row->id_tagihan; ?>">
                                                <input type="submit" value="Edit" name="detail" class="btn btn-primary">
                                            </form>
                                        </td>
                                    </tr>
                                    <?php  } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <!-- Footer -->
                        </div>
                        <!-- /.card-footer-->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?= $this->endSection(); ?>