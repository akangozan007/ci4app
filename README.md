# Belajar Web Application CodeIgniter 4 di XAMPP

## Chapter 1: Introduction

### 1. Instalasi
- **Composer**: Instalasi Composer untuk manajemen dependensi.
- **Git Bash**: Instalasi Git Bash untuk versi kontrol.
- **CodeIgniter 4**: Download dan konfigurasi CodeIgniter 4.

### 2. Skema MVC (Model-View-Controller)

#### **Flowchart**

##### **Server Configuration**
1. **Konfigurasi `.env`**
   - Set `BASE_URL`.
   - Atur `CI_ENVIRONMENT = development`.

2. **Routing di `app/Config/Routes.php`**
   - **Menambahkan Route Default**
     ```php
     $routes->get('/', 'Home::index');
     ```
     *Menampilkan halaman default CodeIgniter.*
   
   - **Menambahkan Route Test**
     ```php
     $routes->get('/test', 'Home::test');
     ```
     *Menampilkan output string dari method `test()` dalam `app/Controllers/Home.php`.*

3. **Membuat Controller Razan**
   - **Menambahkan file `Razan.php` untuk soal perkenalan**
   - **Menambahkan Route Razan**
     ```php
     $routes->get('/razan', 'Razan::index');
     ```
     *Menampilkan output string "My Name Is Bruce Wayne" dari method `index()` di `app/Controllers/Razan.php`.*

4. **Kustom Property dalam `BaseController.php`**
   - **Menambahkan properti di `BaseController.php`**
     ```php
     protected $jobs = "Web Developer";
     ```
   - **Menambahkan Route Developer**
     ```php
     protected $routes->get('/razan/developer', 'Razan::jobs');
     ```
     *Menampilkan output string "My Name Is Bruce Wayne As Web Developer" dari method `jobs()` di `app/Controllers/Razan.php`.*

     5. **Menambahkan param dalam `D:\xampp82\htdocs\ci4app\app\Config\Routes.php`**
     ```php
     // route dengan param
    // /param/inputan apapun 
    // index/$1 mengurutkan variable yang masuk kedalam class
    $routes->get('/param/(:any)', 'Param::index/$1');
     ```
    6.  **Menambahkan Controller D:\xampp82\htdocs\ci4app\app\Controllers\Param.php**
     ```php
     protected 
     
        namespace App\Controllers;
        class Param extends BaseController
        {
            // menambahkan parameter 1 adalah scan usia, 2 scan nama, 3 scan domisili
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
     *Menampilkan output string "My Name Is Bruce Wayne As Web Developer" dari method `jobs()` di `app/Controllers/Razan.php`.*

---

## Chapter 2: ... *(Lanjutkan di sini)*

