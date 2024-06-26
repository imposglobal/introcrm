<?php

namespace App\Controllers;
use App\Models\CustomerModel;

class Dashboard extends BaseController
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



    //total working days
    public function countWorkingDays($startDate, $endDate) {
        $startDate = strtotime($startDate);
        $endDate = strtotime($endDate);
        
        $workingDays = 0;
    
        while ($startDate <= $endDate) {
            $currentDayOfWeek = date("N", $startDate); // 1 (Monday) to 7 (Sunday)
            if ($currentDayOfWeek < 6) { // Monday to Friday
                $workingDays++;
            }
            $startDate = strtotime("+1 day", $startDate);
        }
    
        return $workingDays;
    }

    /****************************************************************************************************/

    //get current total working days
    function countWorkingDaysUntilToday($startDate) {
        $startDate = strtotime($startDate);
        $endDate = strtotime('today');
    
        $workingDays = 0;
    
        while ($startDate <= $endDate) {
            $currentDayOfWeek = date("N", $startDate); // 1 (Monday) to 7 (Sunday)
            if ($currentDayOfWeek < 6) { // Monday to Friday
                $workingDays++;
            }
            $startDate = strtotime("+1 day", $startDate);
        }
    
        return $workingDays;
    }

    /****************************************************************************************************/
    // get total customer as per roles
    function getTotalCustomers($role,$id,$center) {
        $customerModel = new CustomerModel();
        /* 1 == introducer | 2 = Agents | 0 = Master admin | 3 == Admin */
        if($role == 2 ){
            $totalCustomers = $customerModel->where('userid', $id)
                                     ->where('center_name', $center)
                                     ->countAllResults();
        }elseif($role == 1){
            $totalCustomers = $customerModel->where('userid', $id)
                                     ->where('center_name', $center)
                                     ->countAllResults();

        }elseif($role == 0 || $role == 3){
            $totalCustomers = $customerModel->countAllResults();
        }
        return $totalCustomers;
    }

    /****************************************************************************************************/
    function getStatusCount($status,$role,$id,$center) {
        $customerModel = new CustomerModel();
        if($role == 1 /* for introducer */){
        // Query to count total status count based status
        $totalAccepted = $customerModel
            ->where('status', $status)
            ->where('center_name', $center)
            ->countAllResults();
        }elseif($role == 2 /* for Agent */){
            // Query to count total status count based status
            $totalAccepted = $customerModel->where('userid', $id)
            ->where('status', $status)
            ->countAllResults();
        }else{ /* for Admins and mastera admin */
            // Query to count total status count based status
            $totalAccepted = $customerModel
            ->where('status', $status)
            ->countAllResults();
        }
    
        return $totalAccepted;
    }
 
    /****************************************************************************************************/
    //show dashboard page 
    public function index()
    {
        date_default_timezone_set('Europe/London');
        //session start
        $session = session();
        $role = $session->get('role');
        $id = $session->get('id');
        $center = $session->get('center');
        // $status = $session->get('status');
          $status='callback';
         $today = date('Y-m-d');
         $time = date('H:i');
        $currentURL = current_url();
        $startDate = date('Y-m-01'); // Start date of the current month
        $endDate = date('Y-m-t'); // End date of the current month

        // show call back status table on dashboard
        $customerModel = new CustomerModel();


        if($role == 1){

             // Query customers and order them by the 'lead_id' column in descending order
             $callback['customers'] = $customerModel
             ->where('status', $status) 
             ->where('calldate',$today)
             ->where('calltime',$time)
             ->where('center_name',$center)
             ->orderBy('lead_id', 'desc')
             ->paginate();

            //get call back customer by exact time 
            // Query customers and order them by the 'lead_id' column in descending order
            $result['customers'] = $customerModel
            ->where('status', $status) 
            ->where('calldate',$today)
            ->where('center_name',$center)
            ->orderBy('lead_id', 'desc')
            ->paginate();

        }else{

            // Query customers and order them by the 'lead_id' column in descending order
            $callback['customers'] = $customerModel
            ->where('status', $status) 
            ->where('calldate',$today)
            ->where('calltime',$time)
            ->orderBy('lead_id', 'desc')
            ->paginate();

           //get call back customer by exact time 
           // Query customers and order them by the 'lead_id' column in descending order
           $result['customers'] = $customerModel
           ->where('status', $status) 
           ->where('calldate',$today)
           ->orderBy('lead_id', 'desc')
           ->paginate();

        }
           
                                
        // Retrieve the pager for pagination
        $result['pager'] = $customerModel->pager;

        // Get the base URL
        $baseURL = base_url();

         // Pass the data to the view
         $totalWorkingDays = $this->countWorkingDays($startDate, $endDate);
         $totaCurlWorkingDays = $this->countWorkingDaysUntilToday($startDate);
         $totalCustomer = $this->getTotalCustomers($role,$id,$center);
         $countAccept = $this->getStatusCount('Accepted',$role,$id,$center);
         $countRejected = $this->getStatusCount('Rejected',$role,$id,$center);
         $countDWPSubmitted = $this->getStatusCount('DWP Submitted',$role,$id,$center);
         $countSurvey = $this->getStatusCount('Survey Booked',$role,$id,$center);
         $countCompleted = $this->getStatusCount('Completed',$role,$id,$center);
         $countPaid = $this->getStatusCount('Paid',$role,$id,$center);
         $countCallback = $this->getStatusCount('Callback',$role,$id,$center);
         $countRetransfer = $this->getStatusCount('Retransfer',$role,$id,$center);
         $countReady = $this->getStatusCount('Ready to Start',$role,$id,$center);
         $countLaflex = $this->getStatusCount('LAFLEX',$role,$id,$center);
         $countonHold = $this->getStatusCount('On Hold',$role,$id,$center);


         $data = [
            'currentURL' => $currentURL,
            'baseURL' => $baseURL,
            'total_working_days' => $totalWorkingDays,
            'curworking_days'=> $totaCurlWorkingDays,
            'totalCustomer' => $totalCustomer,
            'countAccept' => $countAccept,
            'countRejected' => $countRejected,
            'countDWPSubmitted' => $countDWPSubmitted,
            'countSurvey' => $countSurvey,
            'countCompleted' => $countCompleted,
            'countCallback' => $countCallback,
            'countPaid' => $countPaid,
            'countLaflex' => $countLaflex,
            'countRetransfer' => $countRetransfer,
            'result' => $result,
            'countReady' => $countReady,
            'countonHold' => $countonHold,
            'callback'=>$callback
        ];

            return view('dashboard/dashboard', $data);
    }

/**********************************************************************************************************/



public function ViewCallback(){
    $session = session();
    $role = $session->get('role');
    $center = $session->get('center');

    $customerModel = new CustomerModel();
    $status='callback';
    $today = date('Y-m-d');
 
    // Query customers and order them by the 'lead_id' column in descending order

    if($role == 1){
        $result['customers'] = $customerModel
        ->where('status', $status) 
        ->where('center_name', $center) 
        ->orderBy('lead_id', 'desc')
        ->paginate();
    }else{
    $result['customers'] = $customerModel
                        ->where('status', $status) 
                        ->orderBy('lead_id', 'desc')
                        ->paginate();
    }              
// Retrieve the pager for pagination
$result['pager'] = $customerModel->pager;
// print_r($result); 
    // echo "test";
     return view('callback/view_callback', $result + $this->data);
}


}
