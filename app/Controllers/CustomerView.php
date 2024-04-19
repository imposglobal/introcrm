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
public function index() {
    $customerModel = new CustomerModel();
    
    // Query customers and order them by a specific column in descending order
    $result['customers'] = $customerModel->orderBy('lead_id', 'desc')->paginate();
    
    $result['pager'] = $customerModel->pager;
    
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




public function delete($lead_id = null) {
    $customerModel = new CustomerModel();
    $result['customers'] = $customerModel->where('lead_id', $lead_id)->delete();

    // Check if the delete operation was successful
    if ($result['customers']) {
        // Get the referral URL from the HTTP_REFERER header
        $referrer = $this->request->getServer('HTTP_REFERER');
        
        // Redirect to the referral URL after successful deletion
        return redirect()->to($referrer);
    } else {
        // Handle the case where the delete operation failed
        return "Error deleting customer with lead_id: $lead_id";
    }
}

public function viewCustomerAPI($id){
    

    // Search for customers in the database based on email or mobile number
    $customerModel = new CustomerModel();
    $customers = $customerModel
                ->where('id', $id);
    

    // Convert the response array to JSON
    $jsonResponse = json_encode($customers);

    // Output the JSON response
    echo $jsonResponse;
}


}
