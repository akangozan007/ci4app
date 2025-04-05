## 📘 Nzan Belajar Web Application CodeIgniter 4 di XAMPP terbaru 2025
## **Chapter 1: Introduction**

### **1. Instalasi**
- **Composer**: Instal Composer untuk manajemen dependensi.
- **Git Bash**: Instal Git Bash untuk versi kontrol.
- **CodeIgniter 4**: Unduh dan konfigurasi CodeIgniter 4.

### **2. Skema MVC (Model-View-Controller)**
#### **Flowchart** *(Tambahkan flowchart jika tersedia)*

---

## **Chapter 2: Basic Setup & Development**

### **3. Konfigurasi Server**
#### **Konfigurasi `.env`**
- Set **`BASE_URL = 'http://localhost:8080/'`**.
- Atur **`CI_ENVIRONMENT = development`**.

---

## **Chapter 3: Routing**

### **1. Routing di `app/Config/Routes.php`**
#### **Menambahkan Route Default**
```php
$routes->get('/', 'Home::index');
```
*Menampilkan halaman default CodeIgniter.*

#### **Menambahkan Route Test**
```php
$routes->get('/test', 'Home::test');
```
*Menampilkan output dari method `test()` dalam `app/Controllers/Home.php`.*

### **2. Membuat Controller `Razan.php`**
#### **Menambahkan Controller `Razan.php`**
- Buat file `app/Controllers/Razan.php`.

#### **Menambahkan Route Razan**
```php
$routes->get('/razan', 'Razan::index');
```
*Menampilkan output "My Name Is Bruce Wayne" dari method `index()` di `app/Controllers/Razan.php`.*

### **3. Menambahkan Properti dalam `BaseController.php`**
#### **Menambahkan Properti di `BaseController.php`**
```php
protected $jobs = "Web Developer";
```
#### **Menambahkan Route Developer**
```php
$routes->get('/razan/developer', 'Razan::jobs');
```
*Menampilkan "My Name Is Bruce Wayne As Web Developer" dari method `jobs()` di `app/Controllers/Razan.php`.*

### **4. Menambahkan Parameter dalam Routing**
#### **Mengatur Route di `app/Config/Routes.php`**
```php
$routes->get('/param/(:any)', 'Param::index/$1');
```

---

## **Chapter 4: Controller**

### **1. Membuat Controller `Param.php`**
#### **Menambahkan File `app/Controllers/Param.php`**
```php
namespace App\Controllers;

class Param extends BaseController
{
    public function index($usia = '', $nama = '', $domisili = '')
    {
        echo 'ex: /param/18/razan/kaligawe<br>';
        
        $data = [$usia, $nama, $domisili];
        
        echo '<ul>';
        foreach ($data as $item) {
            echo '<li>' . htmlspecialchars($item) . '</li>';
        }
        echo '</ul>';
    }
}
```

### **2. Membuat Controller dengan Namespace `app/Controllers/Admin/Users.php`**
#### **Menambahkan File `app/Controllers/Admin/Users.php`**
```php
<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Users extends BaseController
{
    public function index()
    {
        echo 'Selamat datang Admin';
    }
}
```
#### **Tujuan:**
- Untuk membedakan halaman yang ditampilkan untuk pengguna biasa dan admin.
- Membuat folder `app/Controllers/Admin/`.

---

## **Chapter 5: Views**

### **1. Membuat Beberapa Views (`Homepage.php`, `About.php`, dll.)**
#### **Routing di `app/Config/Routes.php`**
```php
$routes->get('/pages/', 'Pages::index');
```

#### **`app/Views/Homepage.php`**
```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Razan Belajar CodeIgniter</title>
</head>
<body>
    <h1>Homepage</h1>
</body>
</html>
```

#### **`app/Views/About.php`**
```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Razan Belajar CodeIgniter</title>
</head>
<body>
    <h1>About</h1>
</body>
</html>
```

### **2. Menggunakan Multiple Views dengan Bootstrap 5**
#### **Membuat Folder `app/Views/pages/layout/`**

#### **`app/Views/pages/layout/header.php`**
```html
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled">Disabled</a>
            </li>
          </ul>
          <form class="d-flex" role="search">c
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>
```

#### **`app/Views/pages/layout/footer.php`**
```html
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="main.js"></script>
  </body>
  </html>
```

---
### **6. Views (Creating, and renderring data content )layouts**
#### **Membuat file `app/Views/pages/layout/template.php`**
```php
// disini header.php lama copas kesini
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled">Disabled</a>
            </li>
          </ul>
          <form class="d-flex" role="search">c
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>
// ./disini header.php lama copas kesini

// nah disini baru rendering
   <?= $this->renderSection('content'); ?>
// ./nah disini baru rendering

// disini footer.php lama copas kesini
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="main.js"></script>
  </body>
  </html>
// ./disini footer.php lama copas kesini

```
---
#### **a. Mengedit file `app/Views/pages/homepage.php` menjadi :**
```php

// memanggil si template.php (yang sudah berikut header.php dan footer.php)
<?= $this->extend('layout/template'); ?>
// ./memanggil si template.php (yang sudah berikut header.php dan footer.php)

// konten Homepage
// pembungkus pembuka dengan <?= $this->section('content'); ?>
<?= $this->section('content'); ?>
   <div class="container my-5">
      <div class="row">
        <div class="col">
        <h1>Homepage</h1>
      
        <p class="fs-5">You ve successfully loaded up the Bootstrap starter example. It includes <a href="https://getbootstrap.com/">Bootstrap 5</a> via the <a href="https://www.jsdelivr.com/package/npm/bootstrap">jsDelivr CDN</a> and includes an additional CSS and JS file for your own code.</p>
        <p>Feel free to download or copy-and-paste any parts of this example.</p>

        <hr class="col-1 my-4">

        <a href="https://getbootstrap.com" class="btn btn-primary">Read the Bootstrap docs</a>
        <a href="https://github.com/twbs/examples" class="btn btn-secondary">View on GitHub</a>
        </div>
      </div>
    </div>
<?= $this->endSection(); ?>
// pembungkus penutup dengan <?= $this->endSection(); ?>
// ./konten Homepage

```
---

#### **c. Mengedit file `app\Controllers\Pages.php` menjadi :**
```php
// sehingga kontroller kita lebih rapih dari sebelumnya dan aesthetickkeu
<?php

namespace App\Controllers;

class Pages extends BaseController
{
  //  memanggil homepage
    public function index()
    {
        $data = ['title' => 'Laman | Beranda'];
    
        return view('pages/homepage', $data);
    }
  // memanggil about
    public function about()
    {
    $data = ['title' => 'Laman | Tentang'];

    return view('pages/about', $data);
    }
    
}


```
---
#### **Berkreasi**
### **Membuat file `app\Views\pages\contact.php` :**
```php
// sehingga kontroller kita lebih rapih dari sebelumnya dan aesthetickkeu
<?php

namespace App\Controllers;

class Pages extends BaseController
{
  //  memanggil homepage
    public function index()
    {
        $data = ['title' => 'Laman | Beranda'];
    
        return view('pages/homepage', $data);
    }
  // memanggil about
    public function about()
    {
    $data = ['title' => 'Laman | Tentang'];

    return view('pages/about', $data);
    }
    
}


```

---
#### **Berkreasi**
### **Membuat partial layouting views file `app\Views\layout\navbar.php` :**
```php
// agar terlihat lebih terstruktur kita perlu memindahkan navbar kita
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/pages/about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/pages/contact-me">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>


```

### **Memanggil component navbar di file `app\Views\layout\template.php` :**
```php
// agar terlihat lebih terstruktur kita perlu memindahkan navbar kita
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
      <!-- partial navbar -->
      <?= $this->include('layout/navbar'); ?>
      <!-- ./partial navbar -->

      <!-- renderring content -->
        <?= $this->renderSection('content'); ?>
      <!-- ./renderring content -->
    
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="main.js"></script>
  </body>
  </html>
```
---
## **Chapter 7: Models (Membuat kerangka CRUD dengan Database)**
### **Membuat controller model sekolah di file `app\Controllers\Sekolah.php` :**
```php
// agar terlihat lebih terstruktur kita perlu memindahkan navbar kita
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
      <!-- partial navbar -->
      <?= $this->include('layout/navbar'); ?>
      <!-- ./partial navbar -->

      <!-- renderring content -->
        <?= $this->renderSection('content'); ?>
      <!-- ./renderring content -->
    
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="main.js"></script>
  </body>
  </html>
```

---
## **Adding CSS**
### **Menambahkan Kustom CSS di file `ci4app\public\css\styles.css` :**
```css
  /* custom css disini */
```

---
## **Callback CSS**
### **Menyisipkan link CSS di file `ci4app\public\css\styles.css` :**
```html
<head>
   <!-- code -->
      <link rel="stylesheet" href="/css/styles.css">
   <!-- another code -->
</head>
```

---
## **Database**
### **Mengedit file .env file `ci4app\.env` :**
```env
<!-- another code -->

app.baseURL = 'http://localhost:8080'
# If you have trouble with `.`, you could also use `_`.
# app_baseURL = ''
# app.forceGlobalSecureRequests = false
# app.CSPEnabled = false

<!-- another code -->

<!-- masukkan parameter ini sesuai konfigurasi yang anda miliki  -->
<!-- alamat server Codeigniter -->
database.default.hostname = localhost
<!-- Nama Database -->
database.default.database = sekolah
<!-- username database -->
database.default.username = root
<!-- password database -->
database.default.password = 
database.default.DBDriver = MySQLi
database.default.DBPrefix =
<!-- port service mysql server -->
database.default.port = 3306


```

## **Chapter 8: Custom Models (Membuat kerangka CRUD dengan Database)**
### **Kustomisasi model dengan method sendiri di guru model sekolah di file `app\Models\Guru.php` :**

```php

<?php

namespace App\Models;

use CodeIgniter\Model;

class Guru extends Model
{
    protected $table = 'guru';
    protected $primaryKey = 'id_guru';
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

// get data guru
// $slug untuk mengambil parameter
    public function getGuru($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }
}

```
### **Kustomisasi model dengan method sendiri di siswa model sekolah di file `app\Models\Siswa.php` :**

```php

<?php

namespace App\Models;

use CodeIgniter\Model;

class Guru extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'id_siswa';
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

// get data guru
// $slug untuk mengambil parameter
    public function getSiswa($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }
}

```
## **Chapter 9: Views Detail page untuk edit**
### **menambahkan detail page untuk edit dan hapus di file `app\Views\sekolah\detail.php` :**
```php
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

```

## **Chapter 10: Insert Data siswa dan guru**
### **menambahkan class controllers saveGuru di file `app\Controllers\Sekolah.php` :**
```php
  
  //Form Menyimpan Data Guru
    public function saveGuru()
    {
        // debug
        // dd($this->request->getVar());
        $nama = $this->request->getVar('nama');
        if (isset($nama)) {
            $param = $nama;
            $slug = md5($param);
            $date = date('d-m-y');
            $slug = md5($param.$date);
            // Format UUID (8-4-4-4-12)
            $formatted = substr($slug, 0, 8) . '-' .
                 substr($slug, 8, 4) . '-' .
                 substr($slug, 12, 4) . '-' .
                 substr($slug, 16, 4) . '-' .
                 substr($slug, 20, 12);
            // echo '<br>';
            // echo $formatted; 
            $this->guruModel->save([
                'nama'=>$this->request->getVar('nama'),
                'nip'=>$this->request->getVar('nip'),
                'mata_pelajaran'=>$this->request->getVar('mapel'),
                'alamat'=>$this->request->getVar('alamat'),
                'no_hp'=>$this->request->getVar('no_hp'),
                'slug'=>$formatted,
                'created_at'=>$date,
                'updated_at'=>$date,
            ]);
            // session flash
            session()->setFlashdata('pesan', 'data'.$nama.' berhasil ditambahkan');
            // jika berhasil update maka redirect ke page index sekolah
            return redirect()->to('/sekolah');
         }

    }


```
### **menambahkan class controllers saveSiswa di file `app\Controllers\Sekolah.php` :**
```php
  
  //Form Menyimpan Data Siswa
    public function saveSiswa()
    {
        // debug dump data
        // dd($this->request->getVar());
        $nama = $this->request->getVar('nama');
        if (isset($nama)) {
            $param = $nama;
            $slug = md5($param);
            $date = date('d-m-y');
            $slug = md5($param.$date);
            // Format UUID (8-4-4-4-12)
            $formatted = substr($slug, 0, 8) . '-' .
                 substr($slug, 8, 4) . '-' .
                 substr($slug, 12, 4) . '-' .
                 substr($slug, 16, 4) . '-' .
                 substr($slug, 20, 12);
            // echo '<br>';
            // echo $formatted; 
         }
        $this->siswaModel->save([
            'nama'=>$this->request->getVar('nama'),
            'nis'=>$this->request->getVar('nis'),
            'kelas'=>$this->request->getVar('kelas'),
            'alamat'=>$this->request->getVar('alamat'),
            'id_guru_wali'=>$this->request->getVar('walikelas'),
            'slug'=>$formatted,
            'created_at'=>$date,
            'updated_at'=>$date,
        ]);
        // session flash
        session()->setFlashdata('pesan', 'data'.$nama.' berhasil ditambahkan');
        // jika berhasil update maka redirect ke page index sekolah
        return redirect()->to('/sekolah');
    }


```

### **mengedit model getGuru di file `app\Models\Guru.php` :**
```php
  
      <?php

    namespace App\Models;

    use CodeIgniter\Model;

    class Guru extends Model
    {
        protected $table = 'guru';
        protected $primaryKey = 'id_guru';
        protected $useTimestamps = true;
        protected $createdField  = 'created_at';
        protected $updatedField  = 'updated_at';
        // data yang diizinkan untuk ditambahkan ke server
        // sesuaikan dengan nama column yang bersangkutan table kalian masing masing ya
        protected $allowedFields  = ['nama','nip','mata_pelajaran','alamat','no_hp','slug'];

        public function getGuru($slug = false)
        {
            if ($slug == false) {
                // sama seperti select * from guru;
                return $this->findAll();
            }
            return $this->where(['slug' => $slug])->first();
        }
    }

```

### **mengedit model getSiswa di file `app\Models\Siswa.php` :**
```php
  
          <?php

    namespace App\Models;

    use CodeIgniter\Model;

    class Siswa extends Model
    {
        protected $table = 'siswa';
        protected $primaryKey = 'id_siswa';
        protected $useTimestamps = true;
        protected $createdField  = 'created_at';
        protected $updatedField  = 'updated_at';
        // data yang diizinkan untuk ditambahkan ke server
        protected $allowedFields  = ['nama','nis','kelas','alamat','id_guru_wali','slug'];

        public function getSiswa($slug = false)
        {
            if ($slug == false) {
                // sama seperti select * from siswa;
                return $this->findAll();
            }
            return $this->where(['slug' => $slug])->first();
        }
        
    }

```


### **Penyesuaian views untuk addsiswa di file `app\Views\sekolah\addsiswa.php` :**
```php
  
  <!-- memanggil template -->
  <?= $this->extend('layout/template');?>

  <?= $this->section('content');?>
  <!-- isi konten form tambah Siswa -->
      <div class="container">
          <div class="row">
              <div class="col-6">
                  <h1> Form Tambah Siswa</h1>
                  // method post arahkan ke route post /sekolah/saveSiswa
                  <form action="/sekolah/saveSiswa" method="post">
                      <?= csrf_field(); ?>
                      <div class="input-group mb-3">
                          <div class="row">
                              <div class="col-6">
                                  <label for="nama">Data nama lengkap</label>
                                  <input name="nama" type="text" class="form-control" placeholder="nama" aria-label="nama" aria-describedby="basic-addon1">
                              </div>
                              <div class="col-6">
                                  <label for="NIS">Data NIS (Wajib diisi)</label>
                                  <input name="nis" type="text" class="form-control" placeholder="NIS" aria-label="NIS" aria-describedby="basic-addon1">
                              </div>
                              <div class="col-6">
                                  <label for="kelas">Data kelas</label>
                                  <input name="kelas" type="text" class="form-control" placeholder="kelas" aria-label="kelas" aria-describedby="basic-addon1">
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

```

### **Penyesuaian views untuk addguru di file `app\Views\sekolah\addguru.php` :**
```php
  <!-- memanggil template -->
  <?= $this->extend('layout/template');?>

  <?= $this->section('content');?>
  <!-- isi konten form tambah Guru -->
      <div class="container">
          <div class="row">
              <div class="col-6">
                  <h1> Form Tambah Guru</h1>
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

```

---
## **Kesimpulan**
- Anda telah mempelajari MVC berikut CRUD dengan modelling data dan pengarahan controllers serta penyesuaian viewsnya