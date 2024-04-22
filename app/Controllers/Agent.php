<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UserModel;

class Agent extends BaseController
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

    public function index()
    {
        
         return view('agent/add_agent', $this->data);
    }
  

    public function store(){
            $userModel = new UserModel();
            // get data from agent form in db fields using getpost
            $data = [
                'fname' => $this->request->getPost('fname'),
                'role' => $this->request->getPost('role'),
                'lname' => $this->request->getPost('lname'),
                'email' => $this->request->getPost('email'),
                'phone' => $this->request->getPost('phone'),
                'center_name' => $this->request->getPost('center_name'),
                'location' => $this->request->getPost('location'),
                'password' => $this->request->getPost('password')
            ];
            // print_r($data);
            $userModel->save($data);
            // return redirect()->back();
            return redirect()->to('agent/view')->with('alrt', 'Agent added successfully');
  }
  
//view all Customer in Tables
public function View() {
    $userModel = new UserModel();

    // Query customers and order them by the 'lead_id' column in descending order
    $result['users'] = $userModel->orderBy('id', 'desc')->paginate();
    
    // Retrieve the pager for pagination
    $result['pager'] = $userModel->pager;
    
    // Pass additional data to the view, if needed ($this->data seems to be additional data)
    // You can merge it with the $result array using the '+' operator
    return view('agent/view_agent', $result + $this->data);
}

public function delete($id = null) {
    $userModel = new UserModel();
    $result['users'] = $userModel->where('id', $id)->delete();

    // Check if the delete operation was successful
    if ($result['users']) {
        // Get the referral URL from the HTTP_REFERER header
        $referrer = $this->request->getServer('HTTP_REFERER');
        
        // Redirect to the referral URL after successful deletion
        return redirect()->to($referrer);
    } else {
        // Handle the case where the delete operation failed
        return "Error deleting customer with lead_id: $id";
    }
}


 public function update()
{
    echo "testttt";
    
//  $userModel = new UserModel();
//      $id=$this->request->getPost('id');
    
 
//      $data = [
//         'fname' => $this->request->getPost('fname'),
//         'role' => $this->request->getPost('role'),
//         'lname' => $this->request->getPost('lname'),
//         'email' => $this->request->getPost('email'),
//         'phone' => $this->request->getPost('phone'),
//         'center_name' => $this->request->getPost('center_name'),
//         'location' => $this->request->getPost('location'),
//         'password' => $this->request->getPost('password')
//     ];
//     print_r($data);
//             // Perform the update
//             $result = $userModel->update(id, $data);

//             // Define the base URL for redirection
//             $baseUrl = base_url('customer/');

//             // Check if the update was successful
//             if ($result) {
//                 // Append status parameter for success
//                 $redirectURL = $baseUrl .$lead_id. '?status=success';
//             } else {
//                 // Append status parameter for error
//                 $redirectURL = $baseUrl .$lead_id. '?status=error';
//             }
//             // Redirect to the updated URL
//             return redirect()->to($redirectURL);
}


}

