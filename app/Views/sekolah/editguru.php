<!-- memanggil template -->
<?= $this->extend('layout/template');?>

<?= $this->section('content');?>
<!-- isi konten form tambah Guru -->
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1> Form Ubah Data Guru</h1>
                <form action="/sekolah/editgurupost/<?= $guru['slug'];?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="input-group mb-3">
                        <div class="row">
                            <div class="col-6">
                                <label for="nama">Data nama lengkap</label>
                                 <!-- tangkap error  -->
                                 <?php $error = $validation->getErrors(); ?>
                                <input value="<?= $guru['nama'];?>" name="nama" type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid':'' ?>" placeholder="nama" aria-label="nama" aria-describedby="basic-addon1 validationServerNameFeedback">
                                <div id="validationNameFeedback" class="invalid-feedback">
                                    <?= $validation->getError('nama'); ?>
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="NIP">Data NIP (Wajib diisi)</label>
                                <input value="<?= $guru['nip'];?>" name="nip" type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid':'' ?>" placeholder="NIP" aria-label="NIP" aria-describedby="basic-addon1 validationNIPFeedback">
                                <div id="validationNIPFeedback" class="invalid-feedback">
                                    <?= $validation->getError('nip'); ?>
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="mapel">Data pengampu mata pelajaran</label>
                                <input value="<?= $guru['mata_pelajaran'];?>" name="mapel" type="text" class="form-control <?= ($validation->hasError('mapel')) ? 'is-invalid':'' ?>" placeholder="mata pelajaran" aria-label="mapel" aria-describedby="basic-addon1 validationMAPELFeedback">
                                <div id="validationMAPELFeedback" class="invalid-feedback">
                                    <?= $validation->getError('mapel'); ?>
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="ponsel">Data nomor whatsapp</label>
                                <input value="<?= $guru['no_hp'];?>" name="ponsel" type="text" class="form-control <?= ($validation->hasError('ponsel')) ? 'is-invalid':'' ?>" placeholder="nomor ponsel" aria-label="ponsel" aria-describedby="basic-addon1 validationPONSELFeedback">
                                <div id="validationPONSELFeedback" class="invalid-feedback">
                                    <?= $validation->getError('ponsel'); ?>
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="alamat">Data alamat</label>
                                <textarea value="<?= $guru['alamat'];?>" name="alamat" class="form-control" aria-label="alamat" placeholder="alamat"></textarea>
                            </div>
                            <div class="col-6">
                                <label for="inputGroupFile02" class="my-3">Upload Foto</label>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control <?= ($validation->hasError('gambar')) ? 'is-invalid':'' ?>" id="inputGroupFile02"  aria-describedby="validationGAMBARFeedback" name="gambar">
                                        <div id="validationGAMBARFeedback" class="invalid-feedback">
                                            <?= $validation->getError('gambar'); ?>
                                        </div>
                                    </div>
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