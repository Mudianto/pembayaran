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
                            <a href="jenistagihantambah" class="btn btn-success btn-lg">Tambah</a>
                            <div class="table-responsive">
                                <table class="table table-hover" id="example" width="100%">
                                    <thead>
                                        <tr>
                                            <td scope="col">#</td>
                                            <td scope="col">Aksi</td>
                                            <td scope="col">Tahun</td>
                                            <td scope="col">Nama Tagihan</td>
                                            <td scope="col">Nominal</td>
                                            <td scope="col">Gender</td>
                                            <td scope="col">Jenis Pembayaran</td>
                                            <td scope="col">Kelompok</td>
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
                                            <td scope="col">ST Santri Madin</td>
                                            <td scope="col">Kelas Madin</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php $i = 1;
                                            foreach ($jenis_tagihan as $row) { ?>
                                            <td scope="row"><?= $i++; ?></td>
                                            <td align="center">
                                                <form action="jenistagihanedit" method="POST">
                                                    <input type="hidden" name="id" value="<?= $row->id_tagihan; ?>">
                                                    <input type="submit" value="Ubah" name="detail"
                                                        class="btn btn-primary">
                                                </form>
                                                <form action="jenistagihangenerate" method="POST">
                                                    <input type="hidden" name="id" value="<?= $row->id_tagihan; ?>">
                                                    <input type="submit" value="Generate" name="detail"
                                                        class="btn btn-info"
                                                        onClick="return confirm('Apakah Anda benar-benar mau Generate Transaksi?')">
                                                </form>
                                            </td>
                                            <td>
                                                <?= $row->tahun; ?>
                                            </td>
                                            <td>
                                                <?= $row->nama_tagihan; ?>
                                            </td>
                                            <td>
                                                <?= $row->nominal; ?>
                                            </td>
                                            <td>
                                                <?= $row->Gender; ?>
                                            </td>
                                            <td>
                                                <?= $row->jenis; ?>
                                            </td>
                                            <td>
                                                <?= $row->nama_kelompok; ?>
                                            </td>
                                            <td>
                                                <?= $row->nama_lembaga; ?>
                                            </td>
                                            <td>
                                                <?= $row->status_siswa; ?>
                                            </td>
                                            <td>
                                                <?= $row->tingkat_siswa; ?>
                                            </td>
                                            <td>
                                                <?= $row->nama_ruang; ?>
                                            </td>
                                            <td>
                                                <?= $row->nama_program; ?>
                                            </td>
                                            <td>
                                                <?= $row->prodistik; ?>
                                            </td>
                                            <td>
                                                <?= $row->pondok; ?>
                                            </td>
                                            <td>
                                                <?= $row->status_santri; ?>
                                            </td>
                                            <td>
                                                <?= $row->kamar; ?>
                                            </td>
                                            <td>
                                                <?= $row->madin; ?>
                                            </td>
                                            <td>
                                                <?= $row->status_santri_madin; ?>
                                            </td>
                                            <td>
                                                <?= $row->kelas_madin; ?>
                                            </td>
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