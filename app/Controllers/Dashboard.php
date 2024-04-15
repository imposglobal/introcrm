<?php

namespace App\Controllers;

class Dashboard extends BaseController
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


            return view('dashboard/dashboard', $data);
    }
}
