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
public function index()
{
    $customerModel = new CustomerModel();

    // Get the current page from the URL segment (default to 1 if not set)
    $currentPage = $this->request->getVar('page') ?? 1;

    // Define the number of items per page
    $perPage = 10; // Adjust this value as needed

    // Get customers data with pagination
    $customers = $customerModel->orderBy('lead_id', 'DESC')
                               ->paginate($perPage, 'page', $currentPage);

    // Get pagination links
    $pager = $customerModel->pager;

    // Get the base URL
    $base = base_url('CustomerView/index'); // Adjust your_controller/index as needed

    // Determine if there are previous and next pages
    $hasPreviousPage = $currentPage > 1;
    $hasNextPage = $currentPage < $pager->getLastPage();

    // Pass customers data, pager object, base URL, hasPreviousPage, and hasNextPage to the view
    $data = [
        'customers' => $customers,
        'pager' => $pager,
        'base' => $base,
        'hasPreviousPage' => $hasPreviousPage,
        'hasNextPage' => $hasNextPage,
    ];

    return view('customers/view_customers', $data + $this->data );
}



/**************************************search funtionality*********************************************************/

   
    }
