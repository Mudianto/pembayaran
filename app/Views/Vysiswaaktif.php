<?= $this->extend('templateyayasan/template'); ?>
<?= $this->section('content'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Siswa Aktif</h1>
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
                            <h3 class="card-title">Siswa Aktif</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover" id="example" width="100%">
                                    <thead>
                                        <tr>
                                            <td scope="col">#</td>
                                            <td scope="col">Aksi</td>
                                            <td scope="col">Id Siswa</td>
                                            <td scope="col">Nama</td>
                                            <td scope="col">Gender</td>
                                            <td scope="col">Lembaga</td>
                                            <td scope="col">ST Siswa</td>
                                            <td scope="col">Tingkat</td>
                                            <td scope="col">Ruang</td>
                                            <td scope="col">Program</td>
                                            <td scope="col">Prodistik</td>
                                            <td scope="col">Pondok</td>
                                            <td scope="col">ST Santri</td>
                                            <td scope="col">Kamar</td>
                                            <td scope="col">Madin</td>
                                            <td scope="col">ST Sanmad</td>
                                            <td scope="col">Kelas Madin</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php $i = 1;
                                            foreach ($siswa_aktif as $row) { ?>
                                            <td scope="row"><?= $i++; ?></td>
                                            <td align="center">
                                                <form action="siswaaktifedit" method="POST">
                                                    <input type="hidden" name="id_siswa" value="<?= $row->id_siswa; ?>">
                                                    <input type="submit" value="Ubah" name="detail"
                                                        class="btn btn-primary">
                                                </form>
                                            </td>
                                            <td><?= $row->id_siswa; ?></td>
                                            <td><?= $row->nama; ?></td>
                                            <td><?= $row->Gender; ?></td>
                                            <td><?= $row->nama_lembaga; ?></td>
                                            <td><?= $row->status_siswa; ?></td>
                                            <td><?= $row->tingkat_siswa; ?></td>
                                            <td><?= $row->ruang; ?></td>
                                            <td><?= $row->program; ?></td>
                                            <td><?= $row->prodistik; ?></td>
                                            <td><?= $row->pondok; ?></td>
                                            <td><?= $row->status_santri; ?></td>
                                            <td><?= $row->kamar; ?></td>
                                            <td><?= $row->madin; ?></td>
                                            <td><?= $row->status_santri_madin; ?></td>
                                            <td><?= $row->kelas_madin; ?></td>

                                        </tr>
                                        <?php  } ?>
                                    </tbody>
                                </table>
                            </div>
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