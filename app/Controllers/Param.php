<?php

namespace App\Controllers;

class Param extends BaseController
{
    // menambahkan parameter
    public function index($usia = '', $nama = '', $domisili = '')
    {
        echo 'ex: /param/18/razan/kaligawe<br>';
        
        $data = [$usia, $nama, $domisili];
        
        echo '<ul>';
        foreach ($data as $item) {
            echo '<li>' . htmlspecialchars($item) . '</li>';
        }
        echo '</ul>';
    }

    
}
?>
