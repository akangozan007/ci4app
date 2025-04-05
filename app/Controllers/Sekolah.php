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
    //Form Menambahkan Data Guru
    public function addguru()
    {
        $data = ['title'=>"Tambah Guru"];

        return view('sekolah/addGuru', $data);
    }
    //Form Menambahkan Data Siswa
    public function addsiswa()
    {
        $data = [
            'title'=>"Tambah Siswa",
            'guru'=>$this->guruModel->getGuru(),
        ];

        return view('sekolah/addSiswa', $data);
    }
    //Form Menyimpan Data Guru
    public function saveGuru()
    {
        // debug
        // dd($this->request->getVar());
        // validation
        // required (harus diisi)
        // alpha_space (harus alphabet dan spasi input)
        if ($this->validate([
            'nama' => 'required|alpha_space',
            'nip'=> 'required|integer|is_unique[guru.nip]|max_length[14]',
            'ponsel'=>'required|numeric|regex[^\+?[0-9]+$]|max_length[12]',
        ])) {
            # code...

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
       

    }
    //Form Menyimpan Data Siswa
    public function saveSiswa()
    {
        // debug dump data
        // dd($this->request->getVar());

        if ($this->validate([
            'nama' => 'required|alpha_space',
            'nis'=> 'required|integer|is_unique[siswa.nis]|max_length[14]',
            'kelas' => 'required|alpha_numeric_punct',
        ])) {
            # code...
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
                session()->setFlashdata('pesan', 'data '.$nama.' berhasil ditambahkan');
                // jika berhasil update maka redirect ke page index sekolah
                return redirect()->to('/sekolah');
            }
        }

       
}
