<?php

namespace App\Controllers;

use App\Models\Guru;
use App\Models\Siswa;

 
class Sekolah extends BaseController
{
    // membuat var property data Guru
    protected $guruModel;
    // membuat var property data Guru
    protected $siswaModel;
    public function __construct(){
        // Call the Guru Model
        $this->guruModel = new Guru();
         // Call the Siswa Model
        $this->siswaModel = new Siswa();
    }
//Controller DB Handler untuk database sekolah
    public function index()
   {    
        // Data Siswa dan Guru
        // $guru = $this->guruModel->findAll();
        // $siswa = $this->siswaModel->findAll();
        $data = [
            'title'=>'Tabel Data Siswa Dan Guru',
            'guru'=> $this->guruModel->getGuru(),
            'siswa'=> $this->siswaModel->getSiswa(),
        ];
        // app\Views\sekolah\index.php
        return view('sekolah/index', $data);
        // silahkan buka app\Views\sekolah\index.php
   }
   public function detail($slug)
   {
    // test output
    // echo $slug;
    $siswa = $this->siswaModel->getSiswa($slug);
    // dd($siswa);
    $guru = $this->guruModel->getGuru($slug);
    // dd($guru);
    $data = [
        'title'=>'Detail Page',
        'guru'=>$this->guruModel->getGuru($slug),
        'siswa'=>$this->siswaModel->getSiswa($slug),
    ];
    return view('sekolah/detail', $data);

   }

}
