<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use App\Models\CommentModel;
use App\Models\UserModel;

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
    $mobile = $this->request->getPost('mobile');
    $customerModel = new CustomerModel();   
    $getid = $customerModel->orderBy('lead_id', 'desc')->first();
    $leadno = intval($getid['lead_no']) + 1;

    $result = $customerModel->where('mobile', $mobile)->first();
    $date = date('Y-m-d H:i:s');
    if ($result !== null && $result['mobile'] === $mobile) {
        $status = "duplicate";
    } else {
        $images = $this->request->getFileMultiple('images');

        $validImages = [];
        foreach ($images as $file) {
            if ($file->getSize() > 0) {
                $validImages[] = $file;
            }
        }

        if (!empty($validImages)) {
            $imageNames = [];
            foreach ($validImages as $file) {
                $file->move(WRITEPATH . '../assets/images/uploads');
                $imageNames[] = $file->getClientName(); // Add image name to the array
            }
            $imageNamesString = implode(',', $imageNames); // Convert array of image names to a comma-separated string
            $type = $validImages[0]->getClientMimeType(); // Get the MIME type of the first file
        } else {
            $imageNamesString = null; // No valid images uploaded, set to null
            $type = null;
        }

        $data = [
            'upload_image' => $imageNamesString,
            'type' => $type,
            'lead_date' => $date,
            'center_name' => $center,
            'email' => $email,
            'fname' => $this->request->getPost('fname'),
            'dob' => $this->request->getPost('dob'),
            'mobile' => $this->request->getPost('mobile'),
            'telephone' => $this->request->getPost('telephone'),
            'address_1' => $this->request->getPost('address_1'),
            'post_code' => $this->request->getPost('post_code'),
            'tenure' => $this->request->getPost('tenure'),
            'council' => $this->request->getPost('council'),
            'boiler_age' => $this->request->getPost('boiler_age'),
            'boiler_make' => $this->request->getPost('boiler_make'),
            'boiler_model' => $this->request->getPost('boiler_model'),
            'boiler_effi' => $this->request->getPost('boiler_effi'),
            'gas_registered' => $this->request->getPost('gas_registered'),
            'benefit_flex' => $this->request->getPost('benefit'),
            'epc_rating' => $this->request->getPost('epc'),
            'additional_notes' => $this->request->getPost('add_notes'),
            'created_agent_date' => $this->request->getPost('created_agent_date'),
            'epc_link' => $this->request->getPost('epc_link'),
            'gas_safe_link' => $this->request->getPost('gas_safe_link'),
            'boiler_efficiency_link' => $this->request->getPost('boiler_efficiency_link'),
            'status' => 'New Lead',
            'agent_name' => $name,
            'userid' => $id,
            'lead_no' => $leadno
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

    $userModel = new UserModel();
    $resultu=$userModel
    ->where('role', '1')
    ->findAll();

    $customerModel = new CustomerModel();
    $result = $customerModel->where('lead_id', $lead_id)->first();
    $viewData = [
        'result' => $result,
        'center' => $center,
        'name' => $name,
        'aid' => $aid,
        'users'=> $resultu
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
    $role = $session->get('role');
    $timestamp = date('d/m/Y H:i:s');
    if($role == 3){
        $updatedfromclient = $name;
    }else{
        $updatedfromclient = "";
    }
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
            
            'center_name' => $this->request->getPost('center'),
            
            'fname' => $this->request->getPost('fname'),
            // 'lname' => $this->request->getPost('lname'),
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
            // 'additional_notes' => $this->request->getPost('add_notes'),
            'created_agent_date' => $this->request->getPost('created_agent_date'),
            'lead_id' => $this->request->getPost('lead_id'),
            'lead_date' => $this->request->getPost('lead_date'),
            'survey_status' => $this->request->getPost('survey_status'),
            'job_status' => $this->request->getPost('job_status'),
            'payment_status' => $this->request->getPost('payment_status'),
            'status' => $this->request->getPost('status'),
            'calldate' => $this->request->getPost('calldate'),
            'calltime' => $this->request->getPost('calltime'),
            'measures' => $this->request->getPost('measures'),
            'epc_link' => $this->request->getPost('epc_link'),
            'boiler_effi' => $this->request->getPost('boiler_effi'),
            'gas_registered' => $this->request->getPost('gas_registered'),
            'gas_safe_link' => $this->request->getPost('gas_safe_link'),
            'gas_safe_link' => $this->request->getPost('gas_safe_link'),
            'boiler_efficiency_link' => $this->request->getPost('boiler_efficiency_link'),
            // 'processing_notes' => $this->request->getPost('processing_notes'),
            // 'previous_grant_work' => $this->request->getPost('previous_grant_work'),
            // 'contact_center_notes' => $this->request->getPost('contact_center_notes'),
            'update_client_date' => $timestamp,
            'update_client_name' => $updatedfromclient

            
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


    /* Add comments function */
    public function addComment()
{
    $commentModel = new CommentModel();
    $session = session();
    $center = $session->get('center');
    $name = $session->get('fname') . " " . $session->get('lname');
    $id = $session->get('id');

    $comment = $this->request->getPost('comments');
    $cid = $this->request->getPost('lead_id');

    $data = [
        'cid' => $cid,
        'comments' => $comment,
        'byname' => $name,
        'time_stamp' => date('Y-m-d H:i:s')
    ];

    // Save comment and check the result
    $result = $commentModel->save($data);
    if ($result) {
        $message = "Comment added successfully.";
        // You can also redirect or do other actions here if needed.
    } else {
        // Log the error for debugging purposes
        log_message('error', 'Error occurred while saving comment: ' . $commentModel->errors());
        $message = "An error occurred while adding the comment. Please try again later.";
        // You might want to redirect back to the form or show an error message to the user.
    }

    // Return message
    return $message;
}



public function getComments($lead_id = null) {
    $customerModel = new CustomerModel();
    $custcomments = $customerModel->where('lead_id', $lead_id)
                ->orderBy('lead_id', 'desc')
                ->findAll();

    // *******************************************************
     $commentModel = new CommentModel();
     $comments = $commentModel->where('cid', $lead_id)
                 ->orderBy('com_id', 'desc')
                 ->findAll();

    if (!empty($custcomments) || !empty($comments)) {

        foreach ($custcomments as $customer) {
            echo "<div class='pb-3 time'>";
            echo "<h5><b>" . $customer['fname']."</b></h5>";
            echo "<hr>"; // Separator between comments
            echo "</div>";

        }
       
             // Iterate over comments and print each one
        foreach ($comments as $comment) {
            echo "<div class='pb-3 time'>";
            echo "" . $comment['comments'];
            echo "<small><b>By: " . $comment['byname']." </b>(";
            echo  $comment['time_stamp'] . ")</small><br>";
            echo "<hr>"; // Separator between comments
            echo "</div>";
        }
             // Iterate over comments and print each one
        foreach ($custcomments as $comment) {
            echo "<div class='pb-3 time'>";
            echo "" . $comment['additional_notes']."<br>";
            echo "<small><b>By : " . $comment['agent_name']."</b>  (";
            echo  $comment['lead_date'] . ")</small><br>";
            echo "<hr>"; // Separator between comments
            echo "</div>";

        }
        
    }else{
        echo"No Comments Found";
    }


}



}




