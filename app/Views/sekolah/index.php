<!-- memanggil template -->
 <?= $this->extend('layout/template');?>

 <?= $this->section('content');?>
<!-- isi konten database -->
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h1 class="text-center my-3">Daftar Siswa</h1>
                <h6 class="model-cantik"> css </h6>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama</th>
                    <th scope="col">NIS</th>
                    <th scope="col">KELAS</th>
                    <th scope="col">ALAMAT</th>
                    <th scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                    <td><a href="" class="btn btn-success">Detail</a></td>
                    </tr>
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
                    <th scope="col">Nama</th>
                    <th scope="col">NIP</th>
                    <th scope="col">PENGAMPU MAPEL</th>
                    <th scope="col">ALAMAT</th>
                    <th scope="col">TELEPON</th>
                    <th scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                    <td><a href="" class="btn btn-success">Detail</a></td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
    </div>
<!-- ./isi konten database -->
 <?= $this->endSection();?>