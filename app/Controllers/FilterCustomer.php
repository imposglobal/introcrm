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

    /**************************************filter functionality*********************************************************/

    public function filterByDays(string $parameter){
        // Get the search query from the request
        $customerModel = new CustomerModel();

        if($parameter == 'today'){
            $result['customers'] = $customerModel
                            ->where('DATE(lead_date)', date('Y-m-d')) // Filter by today's date
                            ->orderBy('lead_id', 'desc')
                            ->paginate();
            $totalCustomers = $customerModel
                            ->where('DATE(lead_date)', date('Y-m-d'))
                            ->countAllResults();
        } elseif ($parameter == 'yesterday') {
            $yesterday = date('Y-m-d', strtotime('-1 day'));
            $result['customers'] = $customerModel
                            ->where('DATE(lead_date)', $yesterday)
                            ->orderBy('lead_id', 'desc')
                            ->paginate();
            $totalCustomers = $customerModel
                            ->where('DATE(lead_date)', $yesterday)
                            ->countAllResults();
        } elseif ($parameter == 'week') {
            $startOfWeek = date('Y-m-d', strtotime('last Monday'));
            $endOfWeek = date('Y-m-d', strtotime('next Sunday'));
            $result['customers'] = $customerModel
                            ->where('lead_date >=', $startOfWeek)
                            ->where('lead_date <=', $endOfWeek)
                            ->orderBy('lead_id', 'desc')
                            ->paginate();
            $totalCustomers = $customerModel
                            ->where('lead_date >=', $startOfWeek)
                            ->where('lead_date <=', $endOfWeek)
                            ->countAllResults();
        } elseif ($parameter == 'month') {
            $startOfMonth = date('Y-m-01');
            $endOfMonth = date('Y-m-t');
            $result['customers'] = $customerModel
                            ->where('DATE(lead_date) >=', $startOfMonth)
                            ->where('DATE(lead_date) <=', $endOfMonth)
                            ->orderBy('lead_id', 'desc')
                            ->paginate();
            $totalCustomers = $customerModel
                            ->where('DATE(lead_date) >=', $startOfMonth)
                            ->where('DATE(lead_date) <=', $endOfMonth)
                            ->countAllResults();
        }

       

        // Merge total count with results
        $result['totalCustomers'] = $totalCustomers;
        $result['pager'] = $customerModel->pager;

        // Pass data to the view
        return view('customers/view_customers', $result + $this->data);
    }

    /**************************************************filter by date functionality*************************************************************/

    public function filterByDate(){
        $customerModel = new CustomerModel();
        $start = $this->request->getPost('from');
        $end = $this->request->getPost('to');
        $result['customers'] = $customerModel
                        ->where('DATE(lead_date) >=', $start)
                        ->where('DATE(lead_date) <=', $end)
                        ->orderBy('lead_id', 'desc')
                        ->paginate();

        // Get total count of customers
        $totalCustomers = $customerModel
                        ->where('DATE(lead_date) >=', $start)
                        ->where('DATE(lead_date) <=', $end)
                        ->countAllResults();

        // Merge total count with results
        $result['totalCustomers'] = $totalCustomers;
        $result['pager'] = $customerModel->pager;

        // Pass data to the view
        return view('customers/view_customers', $result + $this->data);
    }

    /**************************************searching customers from tables only *********************************************************/

    public function searchingCustomer(){
        $customerModel = new CustomerModel();

        $search = $this->request->getPost('searching'); // Accept input from form field using name "searching" in view_customer.php

        $result['customers'] = $customerModel
                        ->like('center_name', $search) // Use like() for partial matches
                        ->orWhere('fname', $search)
                        ->orWhere('lname', $search)
                        ->orWhere('lead_id', $search)
                        ->paginate();

        // Get total count of customers
        $totalCustomers = $customerModel
                        ->like('center_name', $search) // Use like() for partial matches
                        ->orWhere('fname', $search)
                        ->orWhere('lname', $search)
                        ->orWhere('lead_id', $search)
                        ->countAllResults();

        // Merge total count with results
        $result['totalCustomers'] = $totalCustomers;
        $result['pager'] = $customerModel->pager;

        // Pass data to the view
        return view('customers/view_customers', $result + $this->data);
    }


//get customer by status
public function getStatusbyCustomer(string $status) {
    $customerModel = new CustomerModel();
    
    // Query to count total status count based status
    $result['customers'] = $customerModel
        ->where('status', $status)
        ->orderBy('lead_id', 'desc')
        ->paginate();

    // Get total count of customers
    $totalCustomers = $customerModel
    ->where('status', $status)
    ->countAllResults();

    // Merge total count with results
    $result['totalCustomers'] = $totalCustomers;
    $result['pager'] = $customerModel->pager;

// Pass data to the view
return view('customers/view_customers', $result + $this->data);
}
}
