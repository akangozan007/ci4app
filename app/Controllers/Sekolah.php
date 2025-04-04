<?php

namespace App\Controllers;

class Sekolah extends BaseController
{
//Controller DB Handler untuk database sekolah
    public function index()
   {
        // Data Siswa dan Guru
        $data = [
            'title'=>'Tabel Data Siswa Dan Guru',
        ];
        // app\Views\sekolah\index.php
        return view('sekolah/index', $data);
        // silahkan buka app\Views\sekolah\index.php
   }

}
