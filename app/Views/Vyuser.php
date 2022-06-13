<?= $this->extend('templateyayasan/template'); ?>
<?= $this->section('content'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data User</h1>
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
                            <h3 class="card-title">User</h3>
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
                                        <td scope="col">#</td>
                                        <td scope="col">Id User</td>
                                        <td scope="col">Nama User</td>
                                        <td scope="col">Password</td>
                                        <td scope="col">Level</td>
                                        <td scope="col">Lembaga</td>
                                        <td scope="col">Keterangan</td>
                                        <td scope="col">Reset Password</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php $i = 1;
                                        foreach ($user as $row) { ?>
                                        <td scope="row"><?= $i++; ?></td>
                                        <td><?= $row->id_user; ?></td>
                                        <td><?= $row->nama_user; ?></td>
                                        <td><?= $row->password; ?></td>
                                        <td><?= $row->level; ?></td>
                                        <td><?= $row->nama_lembaga; ?></td>
                                        <td><?= $row->keterangan; ?></td>
                                        <td>
                                            <form action="" method="POST">
                                                <input type="hidden" name="username" value="<?= $row->id_user; ?>">
                                                <input type="submit" value="RESET" name="detail"
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