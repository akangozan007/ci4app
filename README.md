# Belajar Web Application CodeIgniter 4 di XAMPP

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
    <title>Bootstrap Demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
```

#### **`app/Views/pages/layout/footer.php`**
```html
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="main.js"></script>
</body>
</html>
```

---
## **Kesimpulan**
- Anda telah mempelajari dasar-dasar instalasi, routing, controller, dan views di CodeIgniter 4.
- And