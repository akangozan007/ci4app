<?php

namespace App\Controllers;

use App\Models\Guru;
use App\Models\Siswa;
use CodeIgniter\Validation\StrictRules\Rules;
use CodeIgniter\Files\File;

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
                // rules nama
                'rules' => 'required|alpha_space',
                // kustom pesan error
                'errors' => [
                    'required'=>'{field} Wajib diiisi',
                    'alpha_space'=>'{field}Berlaku hanya alphabet dan spasi',
                ],
            ],
            'mapel' => [
                // rules nama
                'rules' => 'required|alpha_space',
                // kustom pesan error
                'errors'=>[
                    'required'=>'{field}mapel Wajib diisi',
                    'alpha_space'=>'{field} Berlaku hanya alphabet dan spasi'
                ],
            ],
            'nip'=> [
                  // rules nip
                'rules' => 'required|integer|is_unique[guru.nip]|max_length[14]',
                // kustom pesan error
                'errors' => [
                    'required'=>'{field} NIP Wajib diisi',
                    'integer'=>'{field} Tipe data harus angka',
                    'is_unique[guru.nip]'=>'{field} Data NIP belum ditemukan',
                    'max_length[14]'=>'{field} Maksimal 14 karakter',
                ],
            ],
            'ponsel'=>[
                'rules'=>'required|numeric|regex[^\+?[0-9]+$]|max_length[12]',
                'errors'=>[
                    'required'=>'{field} Nomor whatsapp Wajib diisi',
                    'numeric'=> '{field} haruslah angka',
                    'regex[^\+?[0-9]+$]' => '{field} nomor cuma angka & +',
                    'max_length[12]'=> '{field} inputan maksimal 12 karakter',
                ],
            ],

            'gambar'=>[
                'rules' => 'uploaded[gambar]|max_size[gambar, 5024]|is_image[gambar]|mime_in[gambar, image/jpeg, image/jpg, image/png]',
                'errors'=>[
                   'uploaded[gambar]'=>'wajib upload gambar',
                   'max_size[gambar, 5024]'=>'Maksimal 5Mb',
                   'is_image[gambar]'=>'Hanya gambar yang diperbolehkan',
                   'mime_in[gambar,image/jpeg,image/jpg,image/png]'=>'Hanya berformat png, jpg dan jpeg',
   
                ]
           ]

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
                // file
                $avatar = $this->request->getFile('gambar');
                $avatarName = $avatar->getRandomName();
                $avatar->move('img/guru/',$avatarName);

                $this->guruModel->save([
                    'nama'=>$this->request->getVar('nama'),
                    'nip'=>$this->request->getVar('nip'),
                    'mata_pelajaran'=>$this->request->getVar('mapel'),
                    'alamat'=>$this->request->getVar('alamat'),
                    'no_hp'=>$this->request->getVar('no_hp'),
                    'gambar'=>$avatarName,
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
        if ($this->validate([
            'nama' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => '{field} Wajib diiisi',
                    'alpha_space' => '{field} Berlaku hanya alphabet dan spasi',
                ],
            ],
            'nis' => [
                'rules' => 'required|integer|is_unique[siswa.nis]|max_length[14]',
                'errors' => [
                    'required' => '{field} Wajib diisi',
                    'integer' => '{field} Inputan hanya berlaku angka',
                    'is_unique[siswa.nis]' => '{field} Data sudah ada sebelumnya',
                    'max_length[14]' => '{field} Jumlah angka maksimal 14 digit',
                ],
            ],
            'kelas' => 'required|alpha_numeric_punct',
            'walikelas' => 'required|integer',
            'gambar' => [
                'rules' => [
                    'uploaded[gambar]',
                    'is_image[gambar]',
                    'mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    'max_size[gambar,1000]', // Tetap batasi ukuran maksimal 1MB
                    // Hapus max_dims agar tidak validasi ukuran dimensi
                ],
                'errors' => [
                    'uploaded' => 'Gambar wajib diunggah',
                    'is_image' => 'File harus berupa gambar',
                    'mime_in' => 'Format gambar tidak didukung',
                    'max_size' => 'Ukuran gambar maksimal 1MB',
                ]
            ]
        ])) {
            $nama = $this->request->getVar('nama');
            $avatar = $this->request->getFile('gambar');

            // Validasi file secara manual jika tidak valid
            if (!$avatar->isValid()) {
                session()->setFlashdata('pesan', 'Upload gambar gagal: ' . $avatar->getErrorString());
                return redirect()->back()->withInput();
            }

            $avatarName = $avatar->getRandomName();
            // dd($avatarName); // sebelum move()
            $avatar->move('img/siswa/', $avatarName);

            // Slug generator UUID
            $date = date('d-m-y');
            $slug = md5($nama . $date);
            $formatted = substr($slug, 0, 8) . '-' .
                substr($slug, 8, 4) . '-' .
                substr($slug, 12, 4) . '-' .
                substr($slug, 16, 4) . '-' .
                substr($slug, 20, 12);

            $this->siswaModel->save([
                'nama' => $nama,
                'nis' => $this->request->getVar('nis'),
                'kelas' => $this->request->getVar('kelas'),
                'alamat' => $this->request->getVar('alamat'),
                'id_guru_wali' => $this->request->getVar('walikelas'),
                'gambar' => $avatarName,
                'slug' => $formatted,
                'created_at' => $date,
                'updated_at' => $date,
            ]);

            session()->setFlashdata('pesan', 'Data ' . $nama . ' berhasil ditambahkan');
            return redirect()->to('/sekolah/siswa/addsiswa');
        } else {
            $validation = \Config\Services::validation();
            return redirect()->to('/sekolah/siswa/addsiswa')->withInput()->with('validation', $validation);
        }
    }

    
    // edit guru
    public function editguru($slug)
    {
        session();
         $data = [
             'title'=>"Edit data Guru",
            //  'guru'=>$this->guruModel->getGuru(),
            'guru' => $this->guruModel->getGuruBySlug($slug),
             'validation'=>\Config\Services::validation(),
            //  'siswa'=>$this->siswaModel->getSiswa(),
         ];
         
         // Cek apakah ada flashdata 'validation' dari redirect
         if (session()->has('validation')) {
             $data['validation'] = session('validation');
         }

         return view('/sekolah/editguru', $data);
    }
      // edit siswa
      public function updatesiswa($slug)
      {
        session();
        // ambil data berdasarkan slug
        $siswa = $this->siswaModel->getSiswaBySlug($slug);
        //   $uploaded_profile = $this->request->getFile('gambar');
        //   dd($uploaded_profile);
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
            'walikelas'=>'required|integer',
            'gambar'=>[
                'rules' => 'uploaded[gambar]|max_size[gambar, 5024]|is_image[gambar]|mime_in[gambar, image/jpeg, image/jpg, image/png]',
                'errors'=>[
                   'uploaded[gambar]'=>'wajib upload gambar',
                   'max_size[gambar, 5024]'=>'Maksimal 5Mb',
                   'is_image[gambar]'=>'Hanya gambar yang diperbolehkan',
                   'mime_in[gambar,image/jpeg,image/jpg,image/png]'=>'Hanya berformat png, jpg dan jpeg',
   
                ]
           ]
        ])) {
            $avatar = $this->request->getFile('gambar');
            $avatarName = $avatar->getRandomName();
            $avatar->move('img/siswa/',$avatarName);
            
            $date = date('d-m-y');
            $data = [
              'nama'=>$this->request->getVar('nama'),
              'nis'=>$this->request->getVar('nis'),
              'kelas'=>$this->request->getVar('kelas'),
              'alamat'=>$this->request->getVar('alamat'),
              'id_guru_wali'=>$this->request->getVar('walikelas'),
              'gambar'=>$avatarName,
              'created_at'=>$date,
              'updated_at'=>$date,
            ];
             // Cek apakah ada flashdata 'validation' dari redirect
             if (session()->has('validation')) {
                 $data['validation'] = session('validation');
             }
              //  update
             $this->siswaModel->update($siswa['id_siswa'], $data);
             session()->setFlashdata('pesan', 'Data siswa '.$siswa['nama'].' diupdate.');
          //    return view('/sekolah/siswa/editsiswa/'.$slug, $data);
            return redirect()->to('/sekolah/siswa/editsiswa/'.$siswa['slug']);
        }else {
            // Simpan error validasi ke flashdata
            return redirect()->to('/sekolah/siswa/editsiswa/'.$siswa['slug'])
            ->withInput()
            ->with('validation', \Config\Services::validation());
        } 

      }
   // edit guru
   public function updateguru($slug)
   {
    session();
     // ambil data berdasarkan slug
     $guru = $this->guruModel->getGuruBySlug($slug);
    //  $uploaded_profile = $this->request->getFile('gambar');
    //  dd($uploaded_profile);
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
        'nip' => [
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
        'mapel'=>[
            'rules' => 'required|alpha_numeric_punct|min_length[3]|max_length[50]',
            'errors' => [
                    'required'=>'{field} wajib diisi',
                    'alpha_numeric_punct'=>'{field} Hanya boleh berisi huruf (A-Z, a-z), angka (0-9), spasi, dan tanda baca tertentu: `~ ! # $ % & * - _ + = ',
                    'min_length[3]'=>'{field} Minimal 3 karakter',
                    'max_length[50]'=>'{field} Maksimal 50 karakter',
            ]       
        ],
        'alamat'=>[
            'rules' => 'required|regex_match[/^[a-zA-Z0-9\s\/\.,\-]+$/]|min_length[5]|max_length[100]',
            'errors' => [
                'required'=>'{field} Wajib diisi',
                'regex_match[/^[a-zA-Z0-9\s\/\.,\-]+$/]'=>'{field} diperbolehkan: garis miring /, titik ., koma ,, dan dash -',
                'min_length[5]'=>'{field} Minimal 5 karakter',
                'max_length[100]'=>'{field} Maksimal 100 karakter',
            ],
        ],
        'ponsel'=>[
            'rules' => 'required|regex_match[/^(\+62|0)[0-9]{9,13}$/]|min_length[10]|max_length[15]',
            'errors' =>[
                'required'=>'{field} wajib diisi',
                'regex_match[/^[a-zA-Z0-9\s\/\.,\-]+$/]'=>'{field} Gunakan +62 atau 08',
                'max_length[15]'=>'{field} Maksimal 15 karakter',
                'min_length[12]'=>'{field} Maksimal 12 karakter',
            ]
        ],
        'gambar'=>[
             'rules' => 'uploaded[gambar]|max_size[gambar,5024]|is_image[gambar]|mime_in[gambar, image/jpeg, image/jpg, image/png]',
             'errors'=>[
                'uploaded[gambar]'=>'wajib upload file',
                'max_size[gambar, 5024]'=>'Maksimal 5Mb',
                'is_image[gambar]'=>'Hanya gambar yang diperbolehkan',
                'mime_in[gambar, image/jpeg, image/jpg, image/png]'=>'Hanya berformat png, jpg dan jpeg',

             ]
        ]   
    ])) {
        $avatar = $this->request->getFile('gambar');
        $avatarName = $avatar->getRandomName();
        $avatar->move('img/guru/',$avatarName);
        $date = date('d-m-y');
          $data = [
            'nama'=>$this->request->getVar('nama'),
            'nip'=>$this->request->getVar('nip'),
            'mata_pelajaran'=>$this->request->getVar('mapel'),
            'alamat'=>$this->request->getVar('alamat'),
            'no_hp'=>$this->request->getVar('ponsel'),
            'gambar'=>$avatarName,
            'created_at'=>$date,
            'updated_at'=>$date,
          ];
           // Cek apakah ada flashdata 'validation' dari redirect
       // Cek apakah ada flashdata 'validation' dari redirect
       if (session()->has('validation')) {
           $data['validation'] = session('validation');
       }
    //    debuggin uploaded file
    //    dd($data['gambar']);
       
       //  update
       $this->guruModel->update($guru['id_guru'], $data);
       session()->setFlashdata('pesan', 'Data Guru '.$guru['nama'].' diupdate.');

        return redirect()->to('/sekolah/guru/editguru/'.$guru['slug']);
    }else{
        // Simpan error validasi ke flashdata
        return redirect()->to('/sekolah/guru/editguru/'.$guru['slug'])
        ->withInput()
        ->with('validation', \Config\Services::validation());
    }   

   }
}
