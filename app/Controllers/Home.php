<?php

namespace App\Controllers;

class Home extends BaseController
{
    // public function index(): string
    // {
    //     return view('welcome_message');
    // }
    public function index()
    {
        // return view('welcome_message');
        echo '<h1>My First CodeIgniter Development<h1>';
    }
    public function test()
    {
        // return view('welcome_message');
        echo '<h1>Testing Route And Controller<h1>';
    }
    
}
