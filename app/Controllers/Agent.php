<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UserModel;

class Agent extends BaseController
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
    // return redirect()->back();
    return redirect()->to('agent/view')->with('alrt', 'Agent added successfully');

  }
  
//view all Customer in Tables
public function View() {
    $userModel = new UserModel();

    // Query customers and order them by the 'lead_id' column in descending order
    $result['users'] = $userModel->orderBy('id', 'desc')->paginate();
    
    // Retrieve the pager for pagination
    $result['pager'] = $userModel->pager;
    
    // Pass additional data to the view, if needed ($this->data seems to be additional data)
    // You can merge it with the $result array using the '+' operator
    return view('agent/view_agent', $result + $this->data);
}



}

