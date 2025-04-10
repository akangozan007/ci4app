<?php

namespace App\Controllers;

use App\Models\Guru;
use App\Models\Siswa;
use CodeIgniter\Validation\StrictRules\Rules;

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
        session();
        $data = [
            'title'=>"Tambah Guru",
            'validation'=>\Config\Services::validation(),
        ];


        // Cek apakah ada flashdata 'validation' dari redirect
        if (session()->has('validation')) {
            $data['validation'] = session('validation');
        }

        return view('sekolah/addGuru', $data);
    }
    //Form Menambahkan Data Siswa
    public function addsiswa()
    {
        session();
        $data = [
            'title'=>"Tambah Siswa",
            'guru'=>$this->guruModel->getGuru(),
            'validation'=>\Config\Services::validation(),
        ];
        
    // Cek apakah ada flashdata 'validation' dari redirect
    if (session()->has('validation')) {
        $data['validation'] = session('validation');
    }

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
            'nama' => [
                // rules
                'rules' => 'required|alpha_space',
                // kustom pesan error
                'errors' => [
                    'required'=>'{field} Wajib diiisi',
                    'alpha_space'=>'{field}Berlaku hanya alphabet dan spasi',
                ],
            ],
            'mapel' => 'required|alpha_space',
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

        }else{
             // Validasi gagal
             $validation = \Config\Services::validation();
             // dd($validation->getErrors());// debugging error validate
             return redirect()->to('/sekolah/guru/addguru')->withInput()->with('validation', $validation);
        }
       

    }
    //Form Menyimpan Data Siswa
    public function saveSiswa()
    {
        // debug dump data
        // dd($this->request->getVar());

        if ($this->validate([
            'nama' => [
                // rules
                'rules' => 'required|alpha_space',
                // kustom pesan error
                'errors' => [
                    'required'=>'{field} Wajib diiisi',
                    'alpha_space'=>'{field} Berlaku hanya alphabet dan spasi',
                ],
            ],
            // 'nis'=> 'required|integer|is_unique[siswa.nis]|max_length[14]',
            'nis' => [
                // rules
                'rules' => 'required|integer|is_unique[siswa.nis]|max_length[14]',
                // kustom pesan error
                'errors' => [
                    'required'=>'{field} Wajib diisi',
                    'integer'=>'{field} Inputan hanya berlaku angka',
                    'is_unique[siswa.nis]'=>'{field} Data sudah ada sebelumnya',
                    'max_length[14]'=>'{field} Jumlah angka maksimal 14 digit',
                ],
            ],
            'kelas' => 'required|alpha_numeric_punct',
        ])) {
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
            return redirect()->to('/sekolah/siswa/addsiswa');
        }else{
            // Validasi gagal
            $validation = \Config\Services::validation();
            // dd($validation->getErrors());// debugging error validate
            return redirect()->to('/sekolah/siswa/addsiswa')->withInput()->with('validation', $validation);
            
        }
               
            
        }

       
}
