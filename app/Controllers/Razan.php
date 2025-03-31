<?php

namespace App\Controllers;

class Razan extends BaseController
{
    // public function index(): string
    // {
    //     return view('welcome_message');
    // }
    public function index()
    {
        // return view('welcome_message');
        echo '<h1>My Name Is Bruce Wayne<h1>';
    }
    public function developer()
    {
        // return view('welcome_message');
        echo '<h1>My Name Is Bruce Wayne my job as '.$this->jobs.'<h1>';
    }
    
}
