<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use App\Models\CommentModel;
use App\Models\UserModel;

class Client extends BaseController
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
    
    //view all Customer in Tables
public function View() {
    $userModel = new UserModel();
    $session = session();
    $center = $session->get('center');
    $role = $session->get('role');
    $userid = $session->get('id');
   
    // Query customers and order them by the 'lead_id' column in descending order
    $result['users'] = $userModel->where('role', '3')->orderBy('id', 'desc')->paginate();
    
    
    // Retrieve the pager for pagination
    $result['pager'] = $userModel->pager;
    
    // Pass additional data to the view, if needed ($this->data seems to be additional data)
    // You can merge it with the $result array using the '+' operator
    return view('clients/clients', $result + $this->data);
}

public function store(){
    $userModel = new UserModel();
    // get data from agent form in db fields using getpost
    $data = [
        'fname' => $this->request->getPost('fname'),
        'role' => $this->request->getPost('role'),
        'lname' => $this->request->getPost('lname'),
        'email' => $this->request->getPost('email'),
        'username' => $this->request->getPost('username'),
        'password' => $this->request->getPost('password')
    ];
    // print_r($data);
    $userModel->save($data);
    // return redirect()->back();
    return redirect()->to('clients/clients')->with('alrt', 'Client added successfully');
}

}