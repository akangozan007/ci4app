# Belajar Web Application CodeIgniter 4 di XAMPP

## Chapter 1 Introduction
1. Instalasi Composer - Instalasi Git Bash - Download Codeigniter4 
2. Skema MVC Model-View-Controller 
    [[ FLOWCHART ]]
    Server :
        .env (BASE_URL, CI_ENVIRONTMENT = development) 
            app/Config/Routes.php 
            (Menambahkan route method GET ex:$routes->get('/', Home:index))
            <!-- page tampil default codeigniter pertama kali -->
            (Menambahkan route method GET ex:$routes->get('/test', Home:test))
            <!-- page tampil output string dari dalam class test() secara langsung dari app/Controllers/Home.php-->
            Membuat file Razan.php khusus untuk sekumpulan class() soal perkenalan
            (Menambahkan route method GET ex:$routes->get('/razan', Razan:index))
            <!-- output string "My Name Is Bruce Wayne" dari dalam class index() secara langsung dari app/Controllers/Razan.php-->
            Kustom Property $this->jobs = "Web Developer" di file app/Controllers/BaseController.php
            (Menambahkan route method GET ex:$routes->get('/razan/developer', Razan:jobs))
            <!-- output string "My Name Is Bruce Wayne As Web Developer" dari dalam class index() secara langsung dari app/Controllers/Razan.php-->
3.  
## Chapter 2 
