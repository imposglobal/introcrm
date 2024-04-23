<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\CustomerModel;
use CodeIgniter\API\ResponseTrait;

class FilterCustomer extends BaseController
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

/**************************************filter funtionality*********************************************************/

    public function search(){
        // Get the search query from the request
        $searchQuery = $this->request->getGet('searchQuery');

        // Search for customers in the database based on email or mobile number
        $customerModel = new CustomerModel();
        $customers = $customerModel
                        ->like('email', $searchQuery)
                        ->orLike('mobile', $searchQuery)
                        ->findAll();
        

        // Check if any customers were found
        if (!empty($customers)) {
            // Customers found, return "Duplicate"
            $response = ['message' => 'Duplicate Customer Found'];
        } else {
            // No customers found, return "No Duplicate"
            $response = ['message' => 'No Duplicate Customer Found'];
        }

        // Convert the response array to JSON
        $jsonResponse = json_encode($response);

        // Output the JSON response
        echo $jsonResponse;
    }


/***********************************************************************************************/


}
