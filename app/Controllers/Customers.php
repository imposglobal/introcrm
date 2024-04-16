<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class Customers extends BaseController
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

    public function customer()
    {
        $currentURL = current_url();
        // Get the base URL
        $baseURL = base_url();
         // Pass the data to the view
         $data = [
            'currentURL' => $currentURL,
            'baseURL' => $baseURL
        ];


            return view('customers/add_customer', $data);
    }

   // Add Customer
public function store()
{
    $session = session();
    $center = $session->get('center');
    $name = $session->get('fname') . " " . $session->get('lname');
    $id = $session->get('id');
    $email = $this->request->getPost('email');
    $customerModel = new CustomerModel();
    $result = $customerModel->where('email', $email)->first();
    $date = date('Y-m-d H:i:s');
    if ($result !== null && $result['email'] === $email) {
        $status = "duplicate";
    } else {
        $imageNames = []; // Initialize an array to hold image names
        if ($this->request->getFileMultiple('images')) {
            foreach ($this->request->getFileMultiple('images') as $file) {
                $file->move(WRITEPATH . '../assets/images/uploads');
                $imageNames[] = $file->getClientName(); // Add image name to the array
            }
        }
        // Convert array of image names to a comma-separated string
        $imageNamesString = implode(',', $imageNames);

        $data = [
            'upload_image' => $imageNamesString, // Save comma-separated string of image names
            'type'  => $file->getClientMimeType(),
            'lead_date' => $date,
            'center_name' => $center,
            'email' => $email,
            'fname' => $this->request->getPost('fname'),
            'lname' => $this->request->getPost('lname'),
            'dob' => $this->request->getPost('dob'),
            'mobile' => $this->request->getPost('mobile'),
            'telephone' => $this->request->getPost('telephone'),
            'address_1' => $this->request->getPost('address_1'),
            'address_2' => $this->request->getPost('address_2'),
            'post_code' => $this->request->getPost('post_code'),
            'tenure' => $this->request->getPost('tenure'),
            'council' => $this->request->getPost('council'),
            'boiler_age' => $this->request->getPost('boiler_age'),
            'boiler_make' => $this->request->getPost('boiler_make'),
            'boiler_model' => $this->request->getPost('boiler_model'),
            'benefit_flex' => $this->request->getPost('benefit'),
            'epc_rating' => $this->request->getPost('epc'),
            'additional_notes' => $this->request->getPost('additional_notes'),
            'created_agent_date' => $this->request->getPost('created_agent_date'),
            'agent_name' => $name,
            'userid' => $id
        ];
        
        // Save customer data to the database
        $customerModel->save($data);
        $status = "added";
    }

    return view('customers/add_customer', ['status' => $status] + $this->data);
}
}
