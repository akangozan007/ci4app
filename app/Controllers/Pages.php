<?php

namespace App\Controllers;

class Pages extends BaseController
{
//    page home
    public function index()
    {
        $data = ['title' => 'Laman | Beranda'];
    
        return view('pages/homepage', $data);
    }
//    page about
    public function about()
    {
    $data = ['title' => 'Laman | Tentang'];

    return view('pages/about', $data);
    }
//    page contact
    public function contact()
    {
     $data = [
        'title' => 'Laman | Kontak',
        'alamat' => [
            'rumah'=>'Desa Kaligawe Kulon',
            'rt'=>'001 003',
            'kota'=>'cirebon'
        ],
    ];
     return view('pages/contact', $data);   
    }

}
