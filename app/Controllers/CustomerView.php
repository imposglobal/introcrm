<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\CustomerModel;
use CodeIgniter\API\ResponseTrait;

class CustomerView extends BaseController
{
    use ResponseTrait;
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
/***********************************************************************************************/
//view all Customer in Tables
    public function index(){
       
        $customerModel = new CustomerModel();
        $result['customers'] = $customerModel->orderBy('lead_id ', 'DESC')->findAll();
        
        // return view('customers/view_customer', $result);
        return view('customers/view_customers', $result + $this->data);

    }
/***********************************************************************************************/
//search funtionality
    public function searchCustomer(){
        // Get the search query from the request
        $searchQuery = $this->request->getPost('searchQuery');

        // Search for customers in the database based on email or mobile number
        $customerModel = new CustomerModel();
        $customers = $customerModel
                        ->like('email', $searchQuery)
                        ->orLike('mobile', $searchQuery)
                        ->findAll();

        // Return the search results as JSON
        return $this->respond($customers);
    }


/***********************************************************************************************/
}
