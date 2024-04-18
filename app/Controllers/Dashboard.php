<?php

namespace App\Controllers;
use App\Models\CustomerModel;

class Dashboard extends BaseController
{

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
        
    }

    /****************************************************************************************************/
    //show dashboard page 
    public function index()
    {
        //session start
        $session = session();
        $role = $session->get('role');
        $id = $session->get('id');
        $center = $session->get('center');

        $currentURL = current_url();
        $startDate = date('Y-m-01'); // Start date of the current month
        $endDate = date('Y-m-t'); // End date of the current month

        // Get the base URL
        $baseURL = base_url();

         // Pass the data to the view
         $totalWorkingDays = $this->countWorkingDays($startDate, $endDate);
         $totaCurlWorkingDays = $this->countWorkingDaysUntilToday($startDate);
         $totalCustomer = $this->getTotalCustomers($role,$id,$center);
         $data = [
            'currentURL' => $currentURL,
            'baseURL' => $baseURL,
            'total_working_days' => $totalWorkingDays,
            'curworking_days'=> $totaCurlWorkingDays,
            'totalCustomer' => $totalCustomer
        ];


            return view('dashboard/dashboard', $data);
    }
}
