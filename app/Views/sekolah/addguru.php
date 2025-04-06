<!-- memanggil template -->
<?= $this->extend('layout/template');?>

<?= $this->section('content');?>
<!-- isi konten form tambah Guru -->
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1> Form Tambah Guru</h1>
                 <!-- tangkap error  -->
                 <?php if (!empty($validation->getErrors())) : ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php foreach ($validation->getErrors() as $error) : ?>
                                    <li><?= esc($error) ?></li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                <form action="/sekolah/saveGuru" method="post">
                    <?= csrf_field(); ?>
                    <div class="input-group mb-3">
                        <div class="row">
                            <div class="col-6">
                                <label for="nama">Data nama lengkap</label>
                                <input name="nama" type="text" class="form-control" placeholder="nama" aria-label="nama" aria-describedby="basic-addon1">
                            </div>
                            <div class="col-6">
                                <label for="NIP">Data NIP (Wajib diisi)</label>
                                <input name="nip" type="text" class="form-control" placeholder="NIP" aria-label="NIP" aria-describedby="basic-addon1">
                            </div>
                            <div class="col-6">
                                <label for="mapel">Data pengampu mata pelajaran</label>
                                <input name="mapel" type="text" class="form-control" placeholder="mata pelajaran" aria-label="mapel" aria-describedby="basic-addon1">
                            </div>
                            <div class="col-6">
                                <label for="ponsel">Data nomor whatsapp</label>
                                <input name="ponsel" type="text" class="form-control" placeholder="nomor ponsel" aria-label="ponsel" aria-describedby="basic-addon1">
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
<!-- isi konten form tambah Guru -->
<?= $this->endSection();?>