<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $currentURL = current_url();
        // Get the base URL
        $baseURL = base_url();
         // Pass the data to the view
         $data = [
            'currentURL' => $currentURL,
            'baseURL' => $baseURL
        ];

        // Load the header, main view, and footer
        echo view('dashboard/header', $data);
        echo view('dashboard/sidebar', $data);
        echo view('dashboard/dashboard', $data);
        echo view('dashboard/footer', $data);

        // return view('dashboard/header.php', $data);
    }
}
