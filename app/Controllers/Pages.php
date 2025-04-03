<?php

namespace App\Controllers;

class Pages extends BaseController
{
   
    public function index()
    {
        $data = ['title' => 'Laman | Beranda'];
    
        return view('pages/homepage', $data);
    }
    
    public function about()
    {
    $data = ['title' => 'Laman | Tentang'];

    return view('pages/about', $data);
    }
    
}
