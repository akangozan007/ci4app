<!-- memanggil template -->
<?= $this->extend('layout/template');?>

<?= $this->section('content');?>
<!-- isi konten form tambah Siswa -->
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1> Form Tambah Siswa</h1>
                    <!-- tangkap error  -->
                <form action="/sekolah/saveSiswa" method="post">
                    <?= csrf_field(); ?>
                    <div class="input-group mb-3">
                        <div class="row">
                            <div class="col-6">
                                <label for="nama">Data nama lengkap</label>
                                <?php $error = $validation->getErrors(); ?>
                                <input name="nama" type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid':'' ?>" placeholder="nama" aria-label="nama" aria-describedby="basic-addon1 validationServerNameFeedback">
                                <div id="validationNameFeedback" class="invalid-feedback">
                                    <?= $validation->getError('nama'); ?>
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="NIS">Data NIS (Wajib diisi)</label>
                                <input name="nis" type="text" class="form-control <?= ($validation->hasError('nis')) ? 'is-invalid':'' ?>" placeholder="NIS" aria-label="NIS" aria-describedby="basic-addon1 validationNISFeedback">
                                <div id="validationNISFeedback" class="invalid-feedback">
                                    <?= $validation->getError('nis'); ?>
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="kelas">Data kelas</label>
                                <input name="kelas" type="text" class="form-control <?= ($validation->hasError('kelas')) ? 'is-invalid':'' ?>" placeholder="kelas" aria-label="kelas" aria-describedby="basic-addon1 validationKelasFeedback">
                                <div id="validationKelasFeedback" class="invalid-feedback">
                                    <?= $validation->getError('kelas'); ?>
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="wali">Pilih Wali kelas</label>
                                <select name="walikelas" class="form-select" id="pilihan">
                                <label for="Pilih Wali Kelas"></label>
                                    <option selected>Silakan Pilih</option>
                                    <?php foreach($guru as $pilih_guru) : ?>
                                        <option value="1"><?= $pilih_guru['nama'];?> kode Guru : <?= $pilih_guru['id_guru'];?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="alamat">Data alamat</label>
                                <textarea name="alamat" class="form-control" aria-label="alamat" placeholder="alamat"></textarea>
                                
                            </div>
                        </div>
                        <div class="container mt-4">
                            <button type="submit" class="btn btn-primary">Tambah Data</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- isi konten form tambah Siswa -->
<?= $this->endSection();?>