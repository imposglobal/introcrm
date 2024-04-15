<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UserModel;

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
        // instead of public function initController we can use this for base url
        // $currentURL = current_url();
        // // Get the base URL
        // $baseURL = base_url();
        // helper(['form']);
        //  // Pass the data to the view
        //  $data = [
        //     'currentURL' => $currentURL,
        //     'baseURL' => $baseURL
        // ];

       
         return view('signup_signin/login', $this->data);
    }


    // login function
    public function loginAuth()
    {
        $session = session();
        $userModel = new UserModel();
        $email = $this->request->getVar('email');
        // echo $email;
        
        $password = $this->request->getVar('password');
        // echo $password;
        $data = $userModel->where('email', $email)->first();
        print_r($data);

        if($data){
            $pass = $data['password'];
            
            if($password == $pass){
                $ses_data = [
                    'id' => $data['id'],
                    'fname' => $data['fname'],
                    'email' => $data['email'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);

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

    public function logout(){
        $session=session();
        $session->destroy();
        return redirect()->to('/');
    }


    public function register(){

       
         return view('signup_signin/onboard', $this->data);


    }

    public function store(){

    $userModel = new UserModel();
    $data = [
        'fname'=> $this->request->getVar('fname'),
        'lname'=> $this->request->getVar('lname'),
        'email'=> $this->request->getVar('email'),
        'phone'=> $this->request->getVar('phone'),
        'center_name'=> $this->request->getVar('center_name'),
        'location'=> $this->request->getVar('location'),
        'password'=> $this->request->getVar('password')
    ];
    $userModel->save($data);
    return redirect()->to('/');
  }



}

