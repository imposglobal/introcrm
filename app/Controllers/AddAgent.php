<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UserModel;

class AddAgent extends BaseController
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

    public function index()
    {
   
         return view('agent/add_agent', $this->data);
    }
  

    public function store(){
    $userModel = new UserModel();
    $data = [
        'fname' => $this->request->getPost('fname'),
        'role' => $this->request->getPost('role'),
        'lname' => $this->request->getPost('lname'),
        'email' => $this->request->getPost('email'),
        'phone' => $this->request->getPost('phone'),
        'center_name' => $this->request->getPost('center_name'),
        'location' => $this->request->getPost('location'),
        'password' => $this->request->getPost('password')
    ];
    // print_r($data);
    $userModel->save($data);
    return view('agent/view_agent', ['alrt' => 'Agent added successfully'] + $this->data);

  }
  



}

