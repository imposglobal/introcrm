<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\CustomerModel;
use App\Models\UserModel;

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
        $session = session();
        $customerModel = new CustomerModel();
        $center = $session->get('center');
        $role = $session->get('role');
        $name = $session->get('fname') . " " . $session->get('lname');
        $id = $session->get('id');

        
    
        if($parameter == 'today'){
            // For introducer 
            if($role == 1){
                $result['customers'] = $customerModel
                            ->where('DATE(lead_date)', date('Y-m-d')) // Filter by today's date
                            ->where('center_name', $center)
                            ->orderBy('lead_id', 'desc')
                            ->paginate();
                $totalCustomers = $customerModel->where('center_name', $center)
                            ->where('DATE(lead_date)', date('Y-m-d'))
                            ->countAllResults();
            // For agent
            } elseif($role == 2){
                $result['customers'] = $customerModel
                            ->where('DATE(lead_date)', date('Y-m-d')) // Filter by today's date
                            ->where('center_name', $center)
                            ->where('userid', $id)
                            ->orderBy('lead_id', 'desc')
                            ->paginate();
                $totalCustomers = $customerModel->where('center_name', $center)
                            ->where('userid', $id)
                            ->where('DATE(lead_date)', date('Y-m-d'))
                            ->countAllResults();
            // For admin & master
            } else {
                $result['customers'] = $customerModel
                            ->where('DATE(lead_date)', date('Y-m-d')) // Filter by today's date
                            ->orderBy('lead_id', 'desc')
                            ->paginate();
                $totalCustomers = $customerModel
                            ->where('DATE(lead_date)', date('Y-m-d'))
                            ->countAllResults();
            }
        } elseif ($parameter == 'yesterday') {
            // For yesterday
            $yesterday = date('Y-m-d', strtotime('-1 day'));
            // Implement role-based filtering here
            if($role == 1){
                $result['customers'] = $customerModel
                            ->where('DATE(lead_date)', $yesterday)
                            ->where('center_name', $center)
                            ->orderBy('lead_id', 'desc')
                            ->paginate();
                $totalCustomers = $customerModel
                            ->where('DATE(lead_date)', $yesterday)
                            ->where('center_name', $center)
                            ->countAllResults();
            } elseif($role == 2){
                $result['customers'] = $customerModel
                            ->where('DATE(lead_date)', $yesterday)
                            ->where('center_name', $center)
                            ->where('userid', $id)
                            ->orderBy('lead_id', 'desc')
                            ->paginate();
                $totalCustomers = $customerModel
                            ->where('DATE(lead_date)', $yesterday)
                            ->where('center_name', $center)
                            ->where('userid', $id)
                            ->countAllResults();
            } else {
                $result['customers'] = $customerModel
                            ->where('DATE(lead_date)', $yesterday)
                            ->orderBy('lead_id', 'desc')
                            ->paginate();
                $totalCustomers = $customerModel
                            ->where('DATE(lead_date)', $yesterday)
                            ->countAllResults();
            }
        } elseif ($parameter == 'week') {
            // For week
            $startOfWeek = date('Y-m-d', strtotime('last Monday'));
            $endOfWeek = date('Y-m-d', strtotime('next Sunday'));
            // Implement role-based filtering here
            if($role == 1){
                $result['customers'] = $customerModel
                            ->where('lead_date >=', $startOfWeek)
                            ->where('lead_date <=', $endOfWeek)
                            ->where('center_name', $center)
                            ->orderBy('lead_id', 'desc')
                            ->paginate();
                $totalCustomers = $customerModel
                            ->where('lead_date >=', $startOfWeek)
                            ->where('lead_date <=', $endOfWeek)
                            ->where('center_name', $center)
                            ->countAllResults();
            } elseif($role == 2){
                $result['customers'] = $customerModel
                            ->where('lead_date >=', $startOfWeek)
                            ->where('lead_date <=', $endOfWeek)
                            ->where('center_name', $center)
                            ->where('userid', $id)
                            ->orderBy('lead_id', 'desc')
                            ->paginate();
                $totalCustomers = $customerModel
                            ->where('lead_date >=', $startOfWeek)
                            ->where('lead_date <=', $endOfWeek)
                            ->where('center_name', $center)
                            ->where('userid', $id)
                            ->countAllResults();
            } else {
                $result['customers'] = $customerModel
                            ->where('lead_date >=', $startOfWeek)
                            ->where('lead_date <=', $endOfWeek)
                            ->orderBy('lead_id', 'desc')
                            ->paginate();
                $totalCustomers = $customerModel
                            ->where('lead_date >=', $startOfWeek)
                            ->where('lead_date <=', $endOfWeek)
                            ->countAllResults();
            }
        } elseif ($parameter == 'month') {
            // For month
            $startOfMonth = date('Y-m-01');
            $endOfMonth = date('Y-m-t');
            // Implement role-based filtering here
            if($role == 1){
                $result['customers'] = $customerModel
                            ->where('DATE(lead_date) >=', $startOfMonth)
                            ->where('DATE(lead_date) <=', $endOfMonth)
                            ->where('center_name', $center)
                            ->orderBy('lead_id', 'desc')
                            ->paginate();
                $totalCustomers = $customerModel
                            ->where('DATE(lead_date) >=', $startOfMonth)
                            ->where('DATE(lead_date) <=', $endOfMonth)
                            ->where('center_name', $center)
                            ->countAllResults();
            } elseif($role == 2){
                $result['customers'] = $customerModel
                            ->where('DATE(lead_date) >=', $startOfMonth)
                            ->where('DATE(lead_date) <=', $endOfMonth)
                            ->where('center_name', $center)
                            ->where('userid', $id)
                            ->orderBy('lead_id', 'desc')
                            ->paginate();
                $totalCustomers = $customerModel
                            ->where('DATE(lead_date) >=', $startOfMonth)
                            ->where('DATE(lead_date) <=', $endOfMonth)
                            ->where('center_name', $center)
                            ->where('userid', $id)
                            ->countAllResults();
            } else {
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
        }
    
        // Merge total count with results
        $result['totalCustomers'] = $totalCustomers;
        $result['pager'] = $customerModel->pager;
    
        // Pass data to the view
        return view('customers/view_customers', $result + $this->data);
    }
    

    /**************************************************filter by date functionality*************************************************************/

    public function filterByDate(){
        // Get the search query from the request
        $customerModel = new CustomerModel();
        $start = $this->request->getPost('from');
        $end = $this->request->getPost('to');
        $session = session();
        $center = $session->get('center');
        $role = $session->get('role');
        $id = $session->get('id');

        // $userModel = new UserModel();
        // $centerName['users']=$userModel->findAll();
        //var_dump($centerName['users']);
                        
        if($role == 1){
            $result['customers'] = $customerModel
                        ->where('DATE(lead_date) >=', $start)
                        ->where('DATE(lead_date) <=', $end)
                        ->where('center_name', $center)
                        ->orderBy('lead_id', 'desc')
                        ->paginate();
            $totalCustomers = $customerModel
                        ->where('DATE(lead_date) >=', $start)
                        ->where('DATE(lead_date) <=', $end)
                        ->where('center_name', $center)
                        ->countAllResults();
        } elseif($role == 2){
            $result['customers'] = $customerModel
                        ->where('DATE(lead_date) >=', $start)
                        ->where('DATE(lead_date) <=', $end)
                        ->where('center_name', $center)
                        ->where('userid', $id)
                        ->orderBy('lead_id', 'desc')
                        ->paginate();
            $totalCustomers = $customerModel
                        ->where('DATE(lead_date) >=', $start)
                        ->where('DATE(lead_date) <=', $end)
                        ->where('center_name', $center)
                        ->where('userid', $id)
                        ->countAllResults();
        } else {
            $result['customers'] = $customerModel
                        ->where('DATE(lead_date) >=', $start)
                        ->where('DATE(lead_date) <=', $end)
                        ->orderBy('lead_id', 'desc')
                        ->paginate();
            $totalCustomers = $customerModel
                        ->where('DATE(lead_date) >=', $start)
                        ->where('DATE(lead_date) <=', $end)
                        ->countAllResults();
        }
    
        // Merge total count with results
        $result['totalCustomers'] = $totalCustomers;
        $result['pager'] = $customerModel->pager;
    
        // Pass data to the view
        return view('customers/view_customers', $result + $this->data);
        // return view('customers/view_customers', ['result' => $result, 'centerName' => $centerName] + $this->data);

    }
    

    /**************************************searching customers from tables only *********************************************************/

    public function searchingCustomer(){
        $customerModel = new CustomerModel();
        $search = $this->request->getPost('searching'); // Accept input from form field using name "searching" in view_customer.php
        $session = session();
        $center = $session->get('center');
        $role = $session->get('role');
        $id = $session->get('id');
    
        if (strpos($search, "EC-") === 0) { // Check if $res starts with "EC-"
            $search = str_replace("EC-", "", $search);
        }
    
        if($role == 1){
            $result['customers'] = $customerModel
                        ->like('center_name', $search) // Use like() for partial matches
                        ->where('center_name', $center)
                        ->orLike('fname', $search)
                        ->orLike('agent_name', $search)
                        ->orLike('mobile', $search)
                        ->orLike('telephone', $search)
                        ->orWhere('lname', $search)
                        ->orWhere('lead_id', $search)
                        ->orWhere('lead_no', $search)
                        ->paginate();
            $totalCustomers = $customerModel
                        ->like('center_name', $search) // Use like() for partial matches
                        ->where('center_name', $center)
                        ->orLike('fname', $search)
                        ->orLike('agent_name', $search)
                        ->orLike('mobile', $search)
                        ->orLike('telephone', $search)
                        ->orWhere('lname', $search)
                        ->orWhere('lead_id', $search)
                        ->orWhere('lead_no', $search)
                        ->countAllResults();
        } elseif($role == 2){
            $result['customers'] = $customerModel
                        ->like('center_name', $search) // Use like() for partial matches
                        ->where('center_name', $center)
                        ->where('userid', $id)
                        ->orLike('fname', $search)
                        ->orLike('agent_name', $search)
                        ->orLike('mobile', $search)
                        ->orLike('telephone', $search)
                        ->orWhere('lname', $search)
                        ->orWhere('lead_id', $search)
                        ->orWhere('lead_no', $search)
                        ->paginate();
            $totalCustomers = $customerModel
                        ->like('center_name', $search) // Use like() for partial matches
                        ->where('center_name', $center)
                        ->where('userid', $id)
                        ->orLike('fname', $search)
                        ->orLike('agent_name', $search)
                        ->orLike('mobile', $search)
                        ->orLike('telephone', $search)
                        ->orWhere('lname', $search)
                        ->orWhere('lead_id', $search)
                        ->orWhere('lead_no', $search)
                        ->countAllResults();
        } else {
            $result['customers'] = $customerModel
                        ->like('center_name', $search) // Use like() for partial matches
                        ->orLike('fname', $search)
                        ->orLike('agent_name', $search)
                        ->orLike('mobile', $search)
                        ->orLike('telephone', $search)
                        ->orWhere('lname', $search)
                        ->orWhere('lead_id', $search)
                        ->orWhere('lead_no', $search)
                        ->paginate();
            $totalCustomers = $customerModel
                        ->like('center_name', $search) // Use like() for partial matches
                        ->orLike('fname', $search)
                        ->orLike('agent_name', $search)
                        ->orLike('mobile', $search)
                        ->orLike('telephone', $search)
                        ->orWhere('lname', $search)
                        ->orWhere('lead_id', $search)
                        ->orWhere('lead_no', $search)
                        ->countAllResults();
        }
    
        // Merge total count with results
        $result['totalCustomers'] = $totalCustomers;
        $result['pager'] = $customerModel->pager;
    
        // Pass data to the view
        return view('customers/view_customers', $result + $this->data);
    }
    
/************************************************get customer by status*******************************************************************/

public function getStatusbyCustomer(string $status) {
    $customerModel = new CustomerModel();
    $session = session();
    $center = $session->get('center');
    $role = $session->get('role');
    $id = $session->get('id');

    if($status == "All"){
        if($role == 1){
            $result['customers'] = $customerModel
                        ->where('center_name', $center)
                        ->orderBy('lead_id', 'desc')
                        ->paginate();
            $totalCustomers = $customerModel
                        ->where('center_name', $center)
                        ->countAllResults();
        } elseif($role == 2){
            $result['customers'] = $customerModel
                        ->where('center_name', $center)
                        ->where('userid', $id)
                        ->orderBy('lead_id', 'desc')
                        ->paginate();
            $totalCustomers = $customerModel
                        ->where('center_name', $center)
                        ->where('userid', $id)
                        ->countAllResults();
        } else {
            $result['customers'] = $customerModel
                        ->orderBy('lead_id', 'desc')
                        ->paginate();
            $totalCustomers = $customerModel->countAllResults();
        }
    } else {
        if($role == 1){
            $result['customers'] = $customerModel
                        ->where('center_name', $center)
                        ->where('status', $status)
                        ->orderBy('lead_id', 'desc')
                        ->paginate();
            $totalCustomers = $customerModel
                        ->where('center_name', $center)
                        ->where('status', $status)
                        ->countAllResults();
        } elseif($role == 2){
            $result['customers'] = $customerModel
                        ->where('center_name', $center)
                        ->where('userid', $id)
                        ->where('status', $status)
                        ->orderBy('lead_id', 'desc')
                        ->paginate();
            $totalCustomers = $customerModel
                        ->where('center_name', $center)
                        ->where('userid', $id)
                        ->where('status', $status)
                        ->countAllResults();
        } else {
            $result['customers'] = $customerModel
                        ->where('status', $status)
                        ->orderBy('lead_id', 'desc')
                        ->paginate();
            $totalCustomers = $customerModel
                        ->where('status', $status)
                        ->countAllResults();
        }
    }

    // Merge total count with results
    $result['totalCustomers'] = $totalCustomers;
    $result['pager'] = $customerModel->pager;

    // Pass data to the view
    return view('customers/view_customers', $result + $this->data);
}

/*****************************************callback search filetr by date*******************************************************************/

public function CallbackFilter(){
    $customerModel = new CustomerModel();
    $start = $this->request->getPost('from');
    
    $end = $this->request->getPost('to');
    $result['customers'] = $customerModel
                    ->where('DATE(calldate) >=', $start)
                    ->where('DATE(calldate) <=', $end)
                    ->orderBy('lead_id', 'desc')
                    ->paginate();

    $result['pager'] = $customerModel->pager;

    // Pass data to the view
    return view('callback/view_callback', $result + $this->data);

}


}
