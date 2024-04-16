<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class Customers extends BaseController
{
    public function customer()
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

    //
    public function store(){

        $userModel = new CustomerModel();
        $data = [
            'fname' => $this->request->getPost('fname'),
            'lname' => $this->request->getPost('lname'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'center_name' => $this->request->getPost('center_name'),
            'location' => $this->request->getPost('location'),
            'password' => $this->request->getPost('password')
        ];
        
        $userModel->save($data);
        return view('signup_signin/login', ['alrt' => 'Onboarding successfully,<br> Please login to access your portal'] + $this->data);
    
      }
}
