<?= $this->extend('templateyayasan/template'); ?>
<?= $this->section('content'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Siswa</h1>
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
                            <h3 class="card-title">Siswa</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- <a href="databerkastambah" class="btn btn-primary">TAMBAH</a> -->

                            <table class="table table-hover" id="example" width="100%">
                                <thead>
                                    <tr>
                                        <td scope="col"><b>#</b></td>
                                        <td scope="col"><b>Username</b></td>
                                        <td scope="col"><b>Nama</b></td>
                                        <td scope="col"><b>JK</b></td>
                                        <td scope="col"><b>Lembaga</b></td>

                                        <td scope="col" align="center">Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php $i = 1;
                                        foreach ($siswa as $row) { ?>
                                        <td scope="row"><b><?= $i++; ?>.</b></td>
                                        <td><?= $row->username; ?></td>
                                        <td><?= $row->nama; ?></td>
                                        <td><?= $row->jeniskelamin; ?></td>
                                        <td><?= $row->inisial; ?></td>
                                        <td align="center">
                                            <form action="siswadetail" method="POST">
                                                <input type="hidden" name="username" value="<?= $row->username; ?>">
                                                <input type="submit" value="Detail" name="detail"
                                                    class="btn btn-primary">
                                            </form>
                                        </td>
                                    </tr>
                                    <?php  } ?>
                                </tbody>
                            </table>
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