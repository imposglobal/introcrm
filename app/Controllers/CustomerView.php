<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\CustomerModel;

class CustomerView extends BaseController
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

    public function index(){
       
        $customerModel = new CustomerModel();
        $result['customers'] = $customerModel->orderBy('lead_id ', 'ASC')->findAll();
        
        // return view('customers/view_customer', $result);
        return view('customers/view_customer', $result + $this->data);

    }

   

    

   
  



}

