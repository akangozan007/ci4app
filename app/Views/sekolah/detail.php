<!-- memanggil template -->
<?= $this->extend('layout/template');?>

<?= $this->section('content');?>
<!-- isi konten database -->
    <div class="container-fluid">
        <div class="row">
            <div class="col">
            <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                <?php if($guru): ?>
                <img src="<?= $guru['gambar'] ;?>" class="img-fluid rounded-start" alt="...">
                <?php endif; ?>
                <?php if($siswa): ?>
                <img src="<?= $siswa['gambar'] ;?>" class="img-fluid rounded-start" alt="...">
                <?php endif; ?>
                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <?php if($guru): ?>
                    <h5 class="card-title"><?= $guru['nama'] ;?></h5>
                    <p class="card-text">NIP            : <?= $guru['nip'] ;?></p>
                    <p class="card-text">Guru pengampu  : <?= $guru['mata_pelajaran'] ;?></p>
                    <p class="card-text">Handphone : <?= $guru['nip'] ;?></p>
                    <p class="card-text"><small class="text-body-secondary"><?= $guru['alamat'] ;?></small></p>
                    <?php endif; ?>
                    <?php if($siswa): ?>
                    <h5 class="card-title"><?= $siswa['nama'] ;?></h5>
                    <p class="card-text">NIS            : <?= $siswa['nis'] ;?></p>
                    <p class="card-text">kelas          : <?= $siswa['kelas'] ;?></p>
                    <p class="card-text"><small class="text-body-secondary"><?= $siswa['alamat'] ;?></small></p>
                    <?php endif; ?>
                </div>
                </div>
            </div>
            </div>
            </div>
        </div>
    </div>
<!-- ./isi konten database -->
<?= $this->endSection();?>