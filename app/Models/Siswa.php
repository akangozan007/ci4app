<?php

namespace App\Models;

use CodeIgniter\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'id_siswa';
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    // data yang diizinkan untuk ditambahkan ke server
    protected $allowedFields  = ['nama','nis','kelas','alamat','id_guru_wali','slug', 'gambar'];

    public function getSiswa($slug = false)
    {
        if ($slug == false) {
            // sama seperti select * from siswa;
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }
    public function getSiswaBySlug($slug)
    {
        return $this->where('slug', $slug)->first();
    }
    
    
}

