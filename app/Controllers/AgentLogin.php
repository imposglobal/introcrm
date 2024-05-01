<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\IpModel;
use App\Models\LogModel;



class AgentLogin extends BaseController
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
        $session = session();
        $ipModel = new IpModel();
        $request = service('request');
        $userIP = $request->getIPAddress();
        //  $userIP= '192.168.1.1';
        $ipdata = $ipModel->select('ip_address')->findAll(); 
    
        $isUserIPAuthorized = false; // Initialize a variable to track if user IP is authorized
    
        foreach ($ipdata as $row) {
            if ($row['ip_address'] === $userIP) { // Access 'ip_address' as an array key
                $isUserIPAuthorized = true;
                break; // Exit the loop if a match is found
            }
        }
    
        if ($isUserIPAuthorized == true) {
            // User's IP is authorized, proceed with your logic
            // echo "User IP is authorized.";
            return view('agent/agent_login', $this->data);
        } else {
            // User's IP is not authorized
            //echo "you are not authorized user to access this portal. ";
            return view('agent/view_ip_errorr', $this->data);

        }
    
       
    }
    
    


    // login function
    public function Agentlogin()
    {
        // echo "testt".' ';
        $session = session();
        $userModel = new UserModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        //    echo $username.' ';
        //    echo $password.' ' ;
        
       
         $data = $userModel->where('username', $username)->first();
        //  print_r($data);

        if($data){
            $pass = $data['password'];
            
            if($password == $pass){
                $ses_data = [
                    'id' => $data['id'],
                    'fname' => $data['fname'],
                    'lname' => $data['lname'],
                    'username' => $data['username'],
                    'center' => $data['center_name'],
                    'role' => $data['role'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);

                $this->logActivity($data['fname'] . ' ' . $data['lname'], 'Logged in');


                return redirect()->to('/dashboard');

            }else{
                $session->setFlashdata('msg', 'User Name or Password is incorrect.');
                return redirect()->to('/agent/login');
            }
        }
        else{
            $session->setFlashdata('msg', 'User Name  or password incorrect.');
            return redirect()->to('/agent/login');
        }
    }


    private function logActivity($userName, $action)
    {
        $logModel = new LogModel(); 
        $logData = [
            'user_id' => session()->get('id'), 
            'action' => $action,
            'user_name' => $userName,
            'timestamp' => date('Y-m-d H:i:s')
        ];
        $logModel->insert($logData);
}


    
  



}

