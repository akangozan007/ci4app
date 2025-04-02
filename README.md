# Belajar Web Application CodeIgniter 4 di XAMPP

## Chapter 1: Introduction

### 1. Instalasi
- **Composer**: Instalasi Composer untuk manajemen dependensi.
- **Git Bash**: Instalasi Git Bash untuk versi kontrol.
- **CodeIgniter 4**: Download dan konfigurasi CodeIgniter 4.

### 2. Skema MVC (Model-View-Controller)

#### **Flowchart**

## Chapter 2: Basic Setup & Development

### 3. Konfigurasi Server
#### **1. Konfigurasi `.env`**
- Set **`BASE_URL = 'http://localhost:8080/' `**.
- Atur **`CI_ENVIRONMENT = development`**.

## Chapter 3: Routing

#### **2. Routing di `app/Config/Routes.php`**
##### **Menambahkan Route Default**
```php
$routes->get('/', 'Home::index');
```
*Menampilkan halaman default CodeIgniter.*

##### **Menambahkan Route Test**
```php
$routes->get('/test', 'Home::test');
```
*Menampilkan output string dari method `test()` dalam `app/Controllers/Home.php`.*

#### **3. Membuat Controller Razan**
##### **Menambahkan Controller `Razan.php`**
- Buat file `app/Controllers/Razan.php` untuk pengenalan dasar.

##### **Menambahkan Route Razan**
```php
$routes->get('/razan', 'Razan::index');
```
*Menampilkan output string "My Name Is Bruce Wayne" dari method `index()` di `app/Controllers/Razan.php`.*

#### **4. Menambahkan Properti dalam `BaseController.php`**
##### **Menambahkan Properti di `BaseController.php`**
```php
protected $jobs = "Web Developer";
```
##### **Menambahkan Route Developer**
```php
$routes->get('/razan/developer', 'Razan::jobs');
```
*Menampilkan output string "My Name Is Bruce Wayne As Web Developer" dari method `jobs()` di `app/Controllers/Razan.php`.*

#### **5. Menambahkan Parameter dalam Routing**
##### **Mengatur Route di `app/Config/Routes.php`**
```php
// Route dengan parameter
// /param/inputan apapun
// index/$1 mengurutkan variable yang masuk ke dalam class
$routes->get('/param/(:any)', 'Param::index/$1');
```
## Chapter 4: Controller

#### **6. Membuat Controller `Param.php`**
##### **Menambahkan File `app/Controllers/Param.php`**
```php
namespace App\Controllers;

class Param extends BaseController
{
    // Menambahkan parameter: 1 untuk usia, 2 untuk nama, 3 untuk domisili
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

---
#### **6. Membuat Controller kedalam sebuah namespace `app\Controllers\Admin\Users.php`**
##### **Menambahkan File `app\Controllers\Admin\Users.php`**
```php
<?php

// register namespace admin
// namespace App\Controllers;
namespace App\Controllers\Admin;

use App\Controllers\BaseController;

// class Users
class Users extends BaseController
{
    // menambahkan parameter
    public function index()
    {
        echo 'Selamat datang Admin';
    }

    
}
?>

```
##### **Tujuannya untuk membedakan page mana yang akan ditampilkan untuk user biasa dan admin**
##### **Membuat folder `app\Controllers\Admin\`**


---
## Chapter 5: Views
#### **7. Membuat beberapa Views (Homepage.php, about dll) ke `app\Views\`**

##### **https://url:8080/pages/**
##### **terpanggil di class index `app\Controllers\Pages.php`**
##### **terRouting di `app\Config\Routes.php` menjadi `$routes->get('/pages/', 'Pages::index');`**
##### **`app\Views\Homepage.php`**
``` php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Razan Belajar Codeigniter</title>
</head>
<body>
    <h1>Homepage</h1>
    
</body>
</html>

```

##### **terpanggil di class About `app\Controllers\Pages.php`**
##### **terRouting di `app\Config\Routes.php` menjadi `$routes->get('/pages/', 'Pages::about');`**
##### **`app\Views\About.php`**
``` php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Razan Belajar Codeigniter</title>
</head>
<body>
    <h1>About</h1>
    
</body>
</html>

```

##### **Membuat beberapa laman static**



