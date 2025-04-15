<!-- memanggil template -->
<?= $this->extend('layout/template');?>

<?= $this->section('content');?>
<!-- isi konten form tambah Guru -->
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1> Form Ubah Data Siswa</h1>
                <form action="/sekolah/editsiswapost/<?= $siswa['slug'];?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="input-group mb-3">
                        <div class="row">
                            <div class="col-6">
                                <label for="nama">Data nama lengkap</label>
                                 <!-- tangkap error  -->
                                 <?php $error = $validation->getErrors(); ?>
                                <input value="<?= $siswa['nama'];?>" name="nama" type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid':'' ?>" placeholder="nama" aria-label="nama" aria-describedby="basic-addon1 validationServerNameFeedback">
                                <div id="validationNameFeedback" class="invalid-feedback">
                                    <?= $validation->getError('nama'); ?>
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="NIS">Data NIS (Wajib diisi)</label>
                                <input value="<?= $siswa['nis'];?>" name="nis" type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid':'' ?>" placeholder="NIS" aria-label="NIS" aria-describedby="basic-addon1 validationNISFeedback">
                                <div id="validationNISFeedback" class="invalid-feedback">
                                    <?= $validation->getError('nis'); ?>
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="kelas">Data kelas</label>
                                <input value="<?= $siswa['kelas'];?>" name="kelas" type="text" class="form-control <?= ($validation->hasError('kelas')) ? 'is-invalid':'' ?>" placeholder="kelas" aria-label="kelas" aria-describedby="basic-addon1 validationKelasFeedback">
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
                                        <option value="<?= $siswa['id_guru_wali']; ?>" aria-describedby="basic-addon1 validationWALIKELASFeedback"> <?= $pilih_guru['nama'];?> kode Guru : <?= $pilih_guru['id_guru'];?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div id="validationWALIKELASFeedback" class="invalid-feedback">
                                    <?= $validation->getError('walikelas'); ?>
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="alamat">Data alamat</label>
                                <textarea name="alamat" class="form-control" aria-label="<?= $siswa['alamat'];?>" placeholder="<?= $siswa['alamat'];?>"></textarea>
                            </div>
                        </div>
                        <div class="container mt-4">
                            <button type="submit" class="btn btn-primary">Ubah Data</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- isi konten form tambah Guru -->
<?= $this->endSection();?>