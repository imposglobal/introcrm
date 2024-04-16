<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class Customers extends BaseController
{
    protected $currentURL;
    protected $baseURL;
    protected $data;

    // Initialize controller properties
    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        // Call parent initController method
        parent::initController($request, $response, $logger);

        // Initialize variables
        $this->currentURL = current_url();
        $this->baseURL = base_url();
        helper(['form']);

        // Set data array
        $this->data = [
            'currentURL' => $this->currentURL,
            'baseURL' => $this->baseURL
        ];
    }

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

    //Add Customer
    public function store(){
        $session = session();
        $center = $session->get('center');
        $email = $this->request->getPost('email');
        $customerModel = new CustomerModel();
        $result = $customerModel->where('email', $email)->first();
        if($result['email'] === $email){
            $status = "duplicate";
        }else{
            $data = [
                'fname' => $this->request->getPost('fname'),
                'lname' => $this->request->getPost('lname'),
                'email' => $email,
                'phone' => $this->request->getPost('phone'),
                'center_name' => $this->request->getPost('center_name'),
                'location' => $this->request->getPost('location'),
                'password' => $this->request->getPost('password')
            ];
            $customerModel->save($data);
            $status = "added";
        }
        
        
        
        return view('customers/add_customer', ['status' => $status] + $this->data);
    
      }
}
