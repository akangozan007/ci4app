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
## **Kesimpulan**
- Anda telah mempelajari dasar-dasar instalasi, routing, controller, views (menamba), dan views di CodeIgniter 4.
- And