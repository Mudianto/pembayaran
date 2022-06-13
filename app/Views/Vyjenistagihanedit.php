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
                            <h3 class="card-title">Edit Jenis Tagihan</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="jenistagihaneditubah">
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">1. ID TAGIHAN</label>
                                    <div class="col-sm-10">
                                        <input type="hidden" class="form-control" name="id_tagihan"
                                            value="<?= $jenis_tagihan->id_tagihan; ?>">
                                        <input type="text" class="form-control" name="id_tagihanxx"
                                            value="<?= $jenis_tagihan->id_tagihan; ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">2. TAHUN</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="tahun"
                                            value="<?= $jenis_tagihan->tahun; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">3. NAMA TAGIHAN</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nama_tagihan"
                                            value="<?= $jenis_tagihan->nama_tagihan; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">4. NOMINAL</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nominal"
                                            value="<?= $jenis_tagihan->nominal; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">5. GENDER</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="Gender">
                                            <option value="PUTRI" <?= pilih("PUTRI", $jenis_tagihan->Gender) ?>>
                                                PUTRI</option>
                                            <option value="PUTRA" <?= pilih("PUTRA", $jenis_tagihan->Gender) ?>>
                                                PUTRA</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">6. JENIS
                                        PEMBAYARAN</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="jenis">
                                            <option value="Cash" <?= pilih("Cash", $jenis_tagihan->jenis) ?>>
                                                Cash</option>
                                            <option value="Cililan" <?= pilih("Cililan", $jenis_tagihan->jenis) ?>>
                                                Cililan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">7. KELOMPOK</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="kelompok">
                                            <?php
                                            foreach ($r_kelompok as $row) {
                                            ?>
                                            <option value="<?= $row->id_kelompok; ?>"
                                                <?= pilih($row->id_kelompok, $jenis_tagihan->kelompok) ?>>
                                                <?= $row->nama_kelompok; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">8. LEMBAGA</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="id_lembaga">
                                            <?php
                                            foreach ($lembaga as $row) {
                                            ?>
                                            <option value="<?= $row->id_lembaga; ?>"
                                                <?= pilih($row->id_lembaga, $jenis_tagihan->id_lembaga) ?>>
                                                <?= $row->inisial ?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">9. ST SISWA</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="st_siswa">
                                            <?php
                                            foreach ($r_status as $row) {
                                            ?>
                                            <option value="<?= $row->id_status; ?>"
                                                <?= pilih($row->id_status, $jenis_tagihan->st_siswa) ?>>
                                                <?= $row->status; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">10. TINGKAT</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="tingkat">
                                            <?php
                                            foreach ($r_tingkat as $row) {
                                            ?>
                                            <option value="<?= $row->id_tingkat; ?>"
                                                <?= pilih($row->id_tingkat, $jenis_tagihan->tingkat) ?>>
                                                <?= $row->nama_tingkat; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">11. RUANG</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="ruang">
                                            <?php
                                            foreach ($r_ruang as $row) {
                                            ?>
                                            <option value="<?= $row->id_ruang; ?>"
                                                <?= pilih($row->id_ruang, $jenis_tagihan->ruang) ?>>
                                                <?= $row->nama_ruang; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">12. PROGRAM</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="program">
                                            <?php
                                            foreach ($r_program as $row) {
                                            ?>
                                            <option value="<?= $row->id_program; ?>"
                                                <?= pilih($row->id_program, $jenis_tagihan->program) ?>>
                                                <?= $row->nama_program; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">13. PRODISTIK</label>
                                    <div class="col-sm-10">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="prodistik"
                                                id="inlineRadio1" value="TIDAK"
                                                <?= pilihcek("TIDAK", $jenis_tagihan->prodistik); ?>>
                                            <label class="form-check-label" for="inlineRadio1">
                                                TIDAK</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="prodistik"
                                                id="inlineRadio2" value="YA"
                                                <?= pilihcek("YA", $jenis_tagihan->prodistik); ?>>
                                            <label class="form-check-label" for="inlineRadio2"> YA</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">14. PONDOK</label>
                                    <div class="col-sm-10">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="pondok" id="inlineRadio1"
                                                value="TIDAK" <?= pilihcek("TIDAK", $jenis_tagihan->pondok); ?>>
                                            <label class="form-check-label" for="inlineRadio1">
                                                TIDAK</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="pondok" id="inlineRadio2"
                                                value="YA" <?= pilihcek("YA", $jenis_tagihan->pondok); ?>>
                                            <label class="form-check-label" for="inlineRadio2">YA</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">15. ST SANTRI</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="st_santri">
                                            <?php
                                            foreach ($r_status as $row) {
                                            ?>
                                            <option value="<?= $row->id_status; ?>"
                                                <?= pilih($row->id_status, $jenis_tagihan->st_santri) ?>>
                                                <?= $row->status; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">16. KAMAR</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="kamar"
                                            value="<?= $jenis_tagihan->kamar; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">17. MADIN</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="madin"
                                            value="<?= $jenis_tagihan->madin; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">18. ST SANTRI
                                        MADIN</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="st_sanmad">
                                            <?php
                                            foreach ($r_status as $row) {
                                            ?>
                                            <option value="<?= $row->id_status; ?>"
                                                <?= pilih($row->id_status, $jenis_tagihan->st_sanmad) ?>>
                                                <?= $row->status; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">18. KELAS MADIN</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="kelas_madin"
                                            value="<?= $jenis_tagihan->kelas_madin; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-12 col-form-label">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">UBAH</button>
                                    </label>
                                </div>
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