<?= $this->extend('templateyayasan/template'); ?>
<?= $this->section('content'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Detail Siswa</h1>
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
                            <h3 class="card-title">Detail Siswa</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- <a href="databerkastambah" class="btn btn-primary">TAMBAH</a> -->
                            <form>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <a href="siswa" class="btn btn-primary">HALAMANSISWA</a>
                                    </div>
                                </div>
                            </form>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">1. Username</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->username; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">2. Nama </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->nama; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">3. Jenis Kelamin </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->jeniskelamin; ?>"
                                        disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">4. Tempat Lahir</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->tempatlahir; ?>"
                                        disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">5. Tanggal Lahir</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->tanggallahir; ?>"
                                        disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">6. Alamat Rumah
                                    Siswa</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->alamatrumahS; ?>"
                                        disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">7. Jalan Siswa</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->jalanS; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">8. Desa Kelurahan
                                    Siswa</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->desakelurahanS; ?>"
                                        disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">9. Kecamatan Siswa</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->kecamatanS; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">10. Kabupaten Siswa</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->kabupatenS; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">11. Propinsi Siswa</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->propinsiS; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">12. NISN</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->nisn; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">13. NIK Siswa</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->nikS; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">14. Nomer KK Siswa</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->nomerkkS; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">15. kewarganegaraan</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->kewarganegaraan; ?>"
                                        disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">16. Agama</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->agama; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">17. Status Anak</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->statusanak; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">18. Anak Ke</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->anakke; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">19. Jumlah Saudara</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->jumlahsaudara; ?>"
                                        disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">20. Nomer HP S</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->nomerhpS; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">21. Kartu PIP</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->kartupip; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">22. Berat Badan</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->beratbadan; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">23. Tinggi Badan</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->tinggibadan; ?>"
                                        disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">24. Ukuran Baju</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->ukuranbaju; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">25. Ukuran Celana</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->ukurancelana; ?>"
                                        disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">26. Ukuran Rok</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->ukuranrok; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">27. Ukuran Sepatu</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->ukuransepatu; ?>"
                                        disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">28. Pilihan Program</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->pilihanprogram; ?>"
                                        disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">29. id_lembaga </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->id_lembaga; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">30. NPSNNSM</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->npsnnsm; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">31. Jenjang</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->jenjang; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">32. Nama Sekolah</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->namasekolah; ?>"
                                        disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">33. Alamat Sekolah</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->alamatsekolah; ?>"
                                        disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">34. Tahun Lulus</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->tahunlulus; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">35. Nomer Seri
                                    Ijazah</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->nomerseriijazah; ?>"
                                        disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">36. Nomer SKHUN</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->nomerskhun; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">37. Nama Ibu</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->namaibu; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">38. NIK Ibu</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->nikI; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">39. Nomer KK Ibu</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->nomerkkI; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">40. Pekerjaan Ibu</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->pekerjaanI; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">41. Penghasilan Ibu</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->penghasilanI; ?>"
                                        disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">42. Alamat Rumah
                                    Ibu</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->alamatrumahI; ?>"
                                        disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">43. Jalan Ibu</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->jalanI; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">44. Desa Kelurahan
                                    Ibu</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->desakelurahanI; ?>"
                                        disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">45. Kecamatan Ibu</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->kecamatanI; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">46. Kabupaten Ibu</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->kabupatenI; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">47. Propinsi Ibu</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->propinsiI; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">48. Nomer HP Ibu</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->nomerhpI; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">49. Nama Ayah</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->namaayah; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">50. NIK Ayah</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->nikA; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">51. Nomer KK Ayah</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->nomerkkA; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">52. Pekerjaan Ayah</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->pekerjaanA; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">53. Penghasilan
                                    Ayah</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->penghasilanA; ?>"
                                        disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">54. Alamat KK A</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->alamatkkA; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">55. Jalan Ayah</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->jalanA; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">56. Desa Ayah</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->desaA; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">57. Kecamatan Ayah</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->kecamatanA; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">58. Kabupaten Ayah</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->kabupatenA; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">59. Propinsi Ayah</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->propinsiA; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">60. Nomor HP Ayah</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->hpA; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">61. Nama Wali</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->namwali; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">62. NIK Wali</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->nikW; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">63. Nomer KK Wali</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->nomerkkW; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">64. Pekerjaan Wali</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->pekerjaanW; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">65. Penghasilan
                                    Wali</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->penghasilanW; ?>"
                                        disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">66. Alamat KK Wali</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->alamatkkW; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">67. Jalan Wali</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->jalanW; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">68. Desa Wali</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->desaW; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">69. Kecamatan Wali</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->kecamatanW; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">70. Kabupaten Wali</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->kabupatenW; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">71. Propinsi Wali</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->propinsiW; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">72. Nomor Hp Wali</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->hpW; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">73. timestamp</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $siswa->timestamp; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <a href="siswa" class="btn btn-primary">HALAMANSISWA</a>
                                </div>
                            </div>
                            </form>
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