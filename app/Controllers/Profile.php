<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use App\Models\CommentModel;
use App\Models\UserModel;

class Profile extends BaseController
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
public function View() {
    $userModel = new UserModel();
    $session = session();
    $center = $session->get('center');
    $role = $session->get('role');
    $userid = $session->get('id');
   
    // Query all customers and order them by the 'lead_id' column in descending order
    $result = $userModel->where('id', $userid)->findAll();
    
    // Combine the fetched data with additional data (if any)
    $data = [
        'users' => $result,
    ];

    // Merge additional data if $this->data is set
    if (isset($this->data)) {
        $data = array_merge($data, $this->data);
    }

    // Pass the data to the view
    return view('Profile/profile', $data);
}

public function update()
{

            $userModel = new UserModel();
            $session = session();
            $center = $session->get('center');
            $role = $session->get('role');
            $userid = $session->get('id');

            $data = [
                'fname' => $this->request->getPost('fname'),
                'lname' => $this->request->getPost('lname'),
                'email' => $this->request->getPost('email'),
                'phone' => $this->request->getPost('mobile'),
                'center_name' => $this->request->getPost('center'),
                'location' => $this->request->getPost('location'),
        
            ];
           
                    // Perform the update
                    $result = $userModel->update($userid, $data);
                    if ($result) {
                        // Set success flash message
                        session()->setFlashdata('alrt', 'Profile updated successfully.');
                        return redirect()->back();
                    } else {
                        // Handle update failure if needed
                        return redirect()->back()->with('error', 'Failed to update Profile data.');
                    } 
   }


   public function changePassword()
{

            $userModel = new UserModel();
            $session = session();
            $center = $session->get('center');
            $role = $session->get('role');
            $userid = $session->get('id');

            $data = [
                'password' => $this->request->getPost('pwd')
            ];
           
                    // Perform the update
                    $result = $userModel->update($userid, $data);
                    if ($result) {
                        // Set success flash message
                        session()->setFlashdata('alrtp', 'Password Changed successfully.');
                        return redirect()->back();
                    } else {
                        // Handle update failure if needed
                        return redirect()->back()->with('error', 'Failed to Changed Password.');
                    } 
   }

}