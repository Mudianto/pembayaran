<?= $this->extend('templateyayasan/template'); ?>
<?= $this->section('content'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Data Siswa Aktif</h1>
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
                            <form method="post" action="siswaaktifeditubah">
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">1. ID SIWA</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="id_siswaxx"
                                            value="<?= $siswa_aktif->id_siswa; ?>" disabled>
                                        <input type="hidden" class="form-control" name="id_siswa"
                                            value="<?= $siswa_aktif->id_siswa; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">2. TAHUN </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="tahun"
                                            value="<?= $siswa_aktif->tahun; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">3. NAMA</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nama"
                                            value="<?= $siswa_aktif->nama; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">4. GENDER</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="Gender"
                                            value="<?= $siswa_aktif->Gender; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">5. LEMBAGA</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="id_lembaga">
                                            <?php
                                            foreach ($lembaga as $row) {
                                            ?>
                                            <option value="<?= $row->id_lembaga; ?>"
                                                <?= pilih($row->id_lembaga, $siswa_aktif->id_lembaga) ?>>
                                                <?= $row->inisial; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">6. ST SISWA</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="st_siswa">
                                            <?php
                                            foreach ($r_status as $row) {
                                            ?>
                                            <option value="<?= $row->id_status; ?>"
                                                <?= pilih($row->id_status, $siswa_aktif->st_siswa) ?>>
                                                <?= $row->status; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">7. TINGKAT</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="tingkat">
                                            <?php
                                            foreach ($r_tingkat as $row) {
                                            ?>
                                            <option value="<?= $row->id_tingkat; ?>"
                                                <?= pilih($row->id_tingkat, $siswa_aktif->tingkat) ?>>
                                                <?= $row->nama_tingkat; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">8. RUANG</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="ruang">
                                            <?php
                                            foreach ($r_ruang as $row) {
                                            ?>
                                            <option value="<?= $row->id_ruang; ?>"
                                                <?= pilih($row->id_ruang, $siswa_aktif->ruang) ?>>
                                                <?= $row->nama_ruang; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">9. PROGRAM</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="program">
                                            <?php
                                            foreach ($r_program as $row) {
                                            ?>
                                            <option value="<?= $row->id_program; ?>"
                                                <?= pilih($row->id_program, $siswa_aktif->program) ?>>
                                                <?= $row->nama_program; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">10. PRODISTIK</label>
                                    <div class="col-sm-10">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="prodistik"
                                                id="inlineRadio1" value="TIDAK"
                                                <?= pilihcek("TIDAK", $siswa_aktif->prodistik); ?>>
                                            <label class="form-check-label" for="inlineRadio1">
                                                TIDAK</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="prodistik"
                                                id="inlineRadio2" value="YA"
                                                <?= pilihcek("YA", $siswa_aktif->prodistik); ?>>
                                            <label class="form-check-label"
                                                for="inlineRadio2">YA</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">11. PONDOK</label>
                                    <div class="col-sm-10">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="pondok" id="inlineRadio1"
                                                value="TIDAK" <?= pilihcek("TIDAK", $siswa_aktif->pondok); ?>>
                                            <label class="form-check-label" for="inlineRadio1">
                                                TIDAK</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="pondok" id="inlineRadio2"
                                                value="YA" <?= pilihcek("YA", $siswa_aktif->pondok); ?>>
                                            <label class="form-check-label"
                                                for="inlineRadio2">YA</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">12. ST SANTRI</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="st_santri">
                                            <?php
                                            foreach ($r_status as $row) {
                                            ?>
                                            <option value="<?= $row->id_status; ?>"
                                                <?= pilih($row->id_status, $siswa_aktif->st_santri) ?>>
                                                <?= $row->status; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">13. KAMAR</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="kamar"
                                            value="<?= $siswa_aktif->kamar; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">14. MADIN</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="madin"
                                            value="<?= $siswa_aktif->madin; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">15. ST SANTRI
                                        MADIN</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="st_sanmad">
                                            <?php
                                            foreach ($r_status as $row) {
                                            ?>
                                            <option value="<?= $row->id_status; ?>"
                                                <?= pilih($row->id_status, $siswa_aktif->st_sanmad) ?>>
                                                <?= $row->status; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">16. KELAS MADIN</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="kelas_madin"
                                            value="<?= $siswa_aktif->kelas_madin; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-12 col-form-label">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">UBAH</button>
                                    </label>
                                </div>
                            </form>
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

<?php
function pilih($isi, $pilihan)
{
    $hasil  = "";
    if ($isi == $pilihan) {
        $hasil  = "selected";
    }
    return $hasil;
}
function pilihcek($isi, $pilihan)
{
    $hasil  = "";
    if (empty($pilihan) && $isi == "TIDAK") {
        $hasil  = "checked";
    } else if ($isi == $pilihan) {
        $hasil  = "checked";
    }
    return $hasil;
}
?>