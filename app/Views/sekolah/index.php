<!-- memanggil template -->
 <?= $this->extend('layout/template');?>

 <?= $this->section('content');?>
<!-- isi konten database -->
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h1 class="text-center my-3">Daftar Siswa</h1>
                <!-- <h6 class="model-cantik"> css </h6> -->
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Nama</th>
                    <th scope="col">NIS</th>
                    <th scope="col">KELAS</th>
                    <th scope="col">ALAMAT</th>
                    <th scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($siswa as $data_siswa) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><img src="<?= $data_siswa['gambar']; ?>"  class="img-thumbnail w-25" alt=""></td>
                            <td><?= $data_siswa['nama']; ?></td>
                            <td><?= $data_siswa['nis']; ?></td>
                            <td><?= $data_siswa['kelas']; ?></td>
                            <td><?= $data_siswa['alamat']; ?></td>
                            <td><a href="/sekolah/<?= $data_siswa['slug'] ?>" class="btn btn-success">Detail</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                </table>
            </div>
            <div class="col">
                <h1 class="text-center my-3">Daftar Guru</h1>
                <h6 class="model-cantik"> css </h6>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Nama</th>
                    <th scope="col">NIP</th>
                    <th scope="col">PENGAMPU MAPEL</th>
                    <th scope="col">ALAMAT</th>
                    <th scope="col">TELEPON</th>
                    <th scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $b = 1; ?>
                    <?php foreach ($guru as $data_guru) : ?>
                        <tr>
                            <th scope="row"><?= $b++; ?></th>
                            <td><img src="<?= $data_guru['gambar']; ?>" class="img-thumbnail w-25" alt=""></td>
                            <td><?= $data_guru['nama']; ?></td>
                            <td><?= $data_guru['nip']; ?></td>
                            <td><?= $data_guru['mata_pelajaran']; ?></td>
                            <td><?= $data_guru['alamat']; ?></td>
                            <td><?= $data_guru['no_hp']; ?></td>
                            <td><a href="/sekolah/<?= $data_guru['slug'] ?>" class="btn btn-success">Detail</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
<!-- ./isi konten database -->
 <?= $this->endSection();?>