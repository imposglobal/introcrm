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
    //view add customer page 
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

/****************************************************************************************************/
/* Add Customer to database with duplicate check */
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
        //for image uploading
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
            'additional_notes' => $this->request->getPost('add_notes'),
            'created_agent_date' => $this->request->getPost('created_agent_date'),
            'status' => 'New Customer',
            'agent_name' => $name,
            'userid' => $id
        ];
        
        // Save customer data to the database
        $customerModel->save($data);
        $status = "added";
    }

    return redirect()->to('customer?status=' . urlencode($status));


}

/****************************************************************************************************/
public function showCustomer($lead_id){
    $session = session();
    $center = $session->get('center');
    $name = $session->get('fname') . " " . $session->get('lname');
    $aid = $session->get('id');
    $email = $this->request->getPost('email');

    $customerModel = new CustomerModel();
    $result = $customerModel->where('lead_id', $lead_id)->first();
    $viewData = [
        'result' => $result,
        'center' => $center,
        'name' => $name,
        'aid' => $aid,
        // 'status'=>$status,
    ];

    return view('customers/edit_customer', $viewData + $this->data);
}

/****************************************************************************************************/

public function update()
{

    $session = session();
    $customerModel = new CustomerModel();
    $center = $session->get('center');
    $name = $session->get('fname') . " " . $session->get('lname');
    $id = $session->get('id');
    // $customerModel=find($lead_id);
     $lead_id=$this->request->getPost('lead_id');
     //for image uploading
     $prevImageData=$this->request->getPost('prevImg');
     $imageNames = []; // Initialize an array to hold image names
     if ($this->request->getFileMultiple('images')) {
        $imageNames = []; // Initialize an empty array to store image names
        foreach ($this->request->getFileMultiple('images') as $file) {
            if ($file->isValid() && !$file->hasMoved()) {
                // Move the uploaded file to the destination directory
                $file->move(WRITEPATH . '../assets/images/uploads');
                $imageNames[] = $file->getClientName(); // Add image name to the array
            }
        }
        // Convert array of image names to a comma-separated string
        $imageNamesString = implode(',', $imageNames);
        $newImageData = $prevImageData . ',' . $imageNamesString;
    } else {
        $newImageData = $prevImageData;
    }


         
        $data = [
            'upload_image' => $newImageData, 
            //'type'  => $file->getClientMimeType(),
            
            'center_name' => $center,
            
            'fname' => $this->request->getPost('fname'),
            'lname' => $this->request->getPost('lname'),
            'email' => $this->request->getPost('email'),
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
            'additional_notes' => $this->request->getPost('add_notes'),
            'created_agent_date' => $this->request->getPost('created_agent_date'),
            'lead_id' => $this->request->getPost('lead_id'),
            'lead_date' => $this->request->getPost('lead_date'),
            'survey_status' => $this->request->getPost('survey_status'),
            'job_status' => $this->request->getPost('job_status'),
            'payment_status' => $this->request->getPost('payment_status'),
            'status' => $this->request->getPost('status'),
            'measures' => $this->request->getPost('measures'),
            'epc_link' => $this->request->getPost('epc_link'),
            'gas_safe_link' => $this->request->getPost('gas_safe_link'),
            'gas_safe_link' => $this->request->getPost('gas_safe_link'),
            'boiler_efficiency_link' => $this->request->getPost('boiler_efficiency_link'),
            'processing_notes' => $this->request->getPost('processing_notes'),
            'previous_grant_work' => $this->request->getPost('previous_grant_work'),
            'contact_center_notes' => $this->request->getPost('contact_center_notes'),
            
        ];
    
            // Perform the update
            $result = $customerModel->update($lead_id, $data);

            // Define the base URL for redirection
            $baseUrl = base_url('customer/');

            // Check if the update was successful
            if ($result) {
                // Append status parameter for success
                $redirectURL = $baseUrl .$lead_id. '?status=success';
            } else {
                // Append status parameter for error
                $redirectURL = $baseUrl .$lead_id. '?status=error';
            }
            // Redirect to the updated URL
            return redirect()->to($redirectURL);
}
}





