<?php

namespace App\Controllers;

class Customers extends BaseController
{
    public function add_customer()
    {
        $currentURL = current_url();
        // Get the base URL
        $baseURL = base_url();
         // Pass the data to the view
         $data = [
            'currentURL' => $currentURL,
            'baseURL' => $baseURL
        ];


            return view('customers/add_customer', $data);
    }
}
