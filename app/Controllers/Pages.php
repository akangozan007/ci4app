<?php

namespace App\Controllers;

class Pages extends BaseController
{
    // public function index(): string
    // {
    //     return view('welcome_message');
    // }
    // public function index()
    // {
    //     // menampilan file ci4app\app\Views\pages\homepage.php
    //     return view('pages/homepage');
    // }
    // public function about()
    // {
    //     // menampilan file ci4app\app\Views\pages\homepage.php
    //     return view('pages/about');
    // }

    public function index()
    {
        // page home dengan header dan footer
        echo view('layout/header');
        echo view('pages/homepage');
        echo view('layout/footer');
    }
    public function about()
    {
        // page about dengan header dan footer
        echo view('layout/header');
        echo view('pages/about');
        echo view('layout/footer');
    }
    
}
