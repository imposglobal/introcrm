<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UserModel;

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
       
       return view('agent/agent_login', $this->data);
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

    // public function Agentlogout(){
    //     $session=session();
    //     $session->destroy();
    //     return redirect()->to('/');
    // }


    
  



}

