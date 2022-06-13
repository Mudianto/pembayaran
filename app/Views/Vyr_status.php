<?= $this->extend('templateyayasan/template'); ?>
<?= $this->section('content'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data R Status</h1>
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
                            <h3 class="card-title">Lembaga</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover" id="example" width="100%">
                                <thead>
                                    <tr>
                                        <td scope="col">#</td>
                                        <td scope="col">Id Lembaga</td>
                                        <td scope="col">Inisial</td>
                                        <td scope="col">Nama Lembaga</td>
                                        <td scope="col">Alamat</td>
                                        <td scope="col">Timestamp</td>
                                        <!-- <td scope="col" align="center">Aksi</td> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php $i = 1;
                                        foreach ($lembaga as $row) { ?>
                                        <td scope="row"><?= $i++; ?></td>
                                        <td><?= $row->id_lembaga; ?></td>
                                        <td><?= $row->inisial; ?></td>
                                        <td><?= $row->nama_lembaga; ?></td>
                                        <td><?= $row->alamat; ?></td>
                                        <td><?= $row->timestamp; ?></td>
                                        <!-- <td align="center">
                                            <form action="siswadetail" method="POST">
                                                <input type="hidden" name="username" value="">
                                                <input type="submit" value="Detail" name="detail"
                                                    class="btn btn-primary">
                                            </form>
                                        </td> -->
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