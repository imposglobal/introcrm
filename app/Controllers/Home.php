<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\LogModel;

class Home extends BaseController
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
       
         return view('signup_signin/login', $this->data);
    }


    // login function
    public function loginAuth()
    {
        $session = session();
        $userModel = new UserModel();
        $email = $this->request->getVar('email');   // get email from user login form
        $password = $this->request->getVar('password'); // get password from user login form

        $data = $userModel->where('email', $email)->first();  // get email data form database 
        if($data){
            $pass = $data['password'];  // get password from database using $data variable which stores all data
            
            if($password == $pass){ // compare password enter by user i.e 4password and from database i.e $pass
                $ses_data = [
                    'id' => $data['id'],
                    'fname' => $data['fname'],
                    'lname' => $data['lname'],
                    'email' => $data['email'],
                    'center' => $data['center_name'],
                    'role' => $data['role'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);

                $this->logActivity($data['fname'] . ' ' . $data['lname'], 'Logged in');


                return redirect()->to('/dashboard');

            
            }else{
                $session->setFlashdata('msg', 'Email or Password is incorrect.');
                return redirect()->to('/');
            }
        }
        else{
            $session->setFlashdata('msg', 'Email or password incorrect.');
            return redirect()->to('/');
        }
    }

    private function logActivity($userName,$action)
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

    public function logout(){
        $session=session();
        $userModel = new UserModel();
        $role = $session->get('role');

        if ($role == 2) {
            $session->destroy(); 
            return redirect()->to('/agent/login'); 
        } else{
            $session->destroy(); 
            return redirect()->to('/'); 
        }
        
    }


    public function register(){

       
         return view('signup_signin/onboard', $this->data);


    }

    public function store(){

    $userModel = new UserModel();
    $data = [
        'fname' => $this->request->getPost('fname'),
        'lname' => $this->request->getPost('lname'),
        'email' => $this->request->getPost('email'),
        'phone' => $this->request->getPost('phone'),
        'role' => '1',
        'center_name' => $this->request->getPost('center_name'),
        'location' => $this->request->getPost('location'),
        'password' => $this->request->getPost('password')
    ];
    
    $userModel->save($data);
    return view('signup_signin/login', ['alrt' => 'Onboarding successfully,<br> Please login to access your portal'] + $this->data);

  }
  



}

