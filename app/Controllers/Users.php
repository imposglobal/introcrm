<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UserModel;

class Users extends BaseController
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

    public function Introducer()
    {
        
        $userModel = new UserModel();
        $session = session();
        $center = $session->get('center');
        $role = $session->get('role');
        $userid = $session->get('id');
        
            // Query customers and order them by the 'lead_id' column in descending order
            $result['users'] = $userModel->where('role','1')
            ->orderBy('id', 'desc')->paginate();

        
        
        // Retrieve the pager for pagination
        $result['pager'] = $userModel->pager;
        
        // Pass additional data to the view, if needed ($this->data seems to be additional data)
        // You can merge it with the $result array using the '+' operator
        return view('intro/introducer', $result + $this->data);
    }
}