<?php

namespace App\Models;

use CodeIgniter\Model;

class Guru extends Model
{
    protected $table = 'guru';
    protected $primaryKey = 'id_guru';
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    // data yang diizinkan untuk ditambahkan ke server
    protected $allowedFields  = ['nama','nip','mata_pelajaran','alamat','no_hp','slug', 'gambar'];

    public function getGuru($slug = false)
    {
        if ($slug == false) {
            // sama seperti select * from guru;
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }

    public function getGuruBySlug($slug)
    {
        return $this->where('slug', $slug)->first();
    }

}