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

    public function filterByDays(string $parameter){
        // Get the search query from the request
        $customerModel = new CustomerModel();

        if($parameter == 'today'){
            $result['customers'] = $customerModel
                            ->where('DATE(lead_date)', date('Y-m-d')) // Filter by today's date
                            ->orderBy('lead_id', 'desc')
                            ->paginate();
        }elseif ($parameter == 'yesterday') {
            $yesterday = date('Y-m-d', strtotime('-1 day'));
            $result['customers'] = $customerModel
                            ->where('DATE(lead_date)', $yesterday)
                            ->orderBy('lead_id', 'desc')
                            ->paginate();
        }elseif ($parameter == 'week') {
            $startOfWeek = date('Y-m-d', strtotime('last Monday'));
            $endOfWeek = date('Y-m-d', strtotime('next Sunday'));
            $result['customers'] = $customerModel
                            ->where('lead_date >=', $startOfWeek)
                            ->where('lead_date <=', $endOfWeek)
                            ->orderBy('lead_id', 'desc')
                            ->paginate();
        }elseif ($parameter == 'month') {
            $startOfMonth = date('Y-m-01');
            $endOfMonth = date('Y-m-t');
            $result['customers'] = $customerModel
                            ->where('DATE(lead_date) >=', $startOfMonth)
                            ->where('DATE(lead_date) <=', $endOfMonth)
                            ->orderBy('lead_id', 'desc')
                            ->paginate();
        }
        
        
        // Search for customers in the database based on email or mobile number
        
        

                        $result['pager'] = $customerModel->pager;
    
                        // Pass additional data to the view, if needed ($this->data seems to be additional data)
                        // You can merge it with the $result array using the '+' operator
                        return view('customers/view_customers', $result + $this->data);
    }


/***********************************************************************************************/

public function filterByDate(){
    $customerModel = new CustomerModel();
    $start = $this->request->getPost('from');
    $end = $this->request->getPost('to');
    $result['customers'] = $customerModel
                    ->where('DATE(lead_date) >=', $start)
                    ->where('DATE(lead_date) <=', $end)
                    ->orderBy('lead_id', 'desc')
                    ->paginate();

    $result['pager'] = $customerModel->pager;
    
    // Pass additional data to the view, if needed ($this->data seems to be additional data)
    // You can merge it with the $result array using the '+' operator
    return view('customers/view_customers', $result + $this->data);

}


}
