<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
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
    
    public function index()
    {
        $currentURL = current_url();
        $startDate = date('Y-m-01'); // Start date of the current month
        $endDate = date('Y-m-t'); // End date of the current month

        // Get the base URL
        $baseURL = base_url();
        
         // Pass the data to the view
         $totalWorkingDays = $this->countWorkingDays($startDate, $endDate);
         $data = [
            'currentURL' => $currentURL,
            'baseURL' => $baseURL,
            'total_working_days' => $totalWorkingDays
        ];


            return view('dashboard/dashboard', $data);
    }
}
