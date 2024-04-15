<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UserModel;

class Home extends BaseController
{
    public function index()
    {
        $currentURL = current_url();
        // Get the base URL
        $baseURL = base_url();
        helper(['form']);
         // Pass the data to the view
         $data = [
            'currentURL' => $currentURL,
            'baseURL' => $baseURL
        ];

       
         return view('signup_signin/login', $data);
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
                    'name' => $data['fname'],
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


}

