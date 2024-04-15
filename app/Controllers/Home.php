<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $currentURL = current_url();
        // Get the base URL
        $baseURL = base_url();
         // Pass the data to the view
         $data = [
            'currentURL' => $currentURL,
            'baseURL' => $baseURL
        ];
<<<<<<< HEAD
       
         return view('signup_signin/login', $data);
    }

=======
         return view('signup_signin/login',$data);
    }

   
>>>>>>> bdf39e9921e2239659a6e9e74e7d7f5d4303aef6
    // login function
    public function loginAuth()
    {
        $session = session();
        $userModel = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        
        $data = $userModel->where('email', $email)->first();
        
        if($data){
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if($authenticatePassword){
                $ses_data = [
                    'id' => $data['id'],
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
<<<<<<< HEAD
                return redirect()->to('/dashboard');
=======
                return redirect()->to('/layout/layout');
>>>>>>> bdf39e9921e2239659a6e9e74e7d7f5d4303aef6
            
            }else{
                $session->setFlashdata('msg', 'Email or Password is incorrect.');
                return redirect()->to('/login');
            }
        }else{
            $session->setFlashdata('msg', 'Email or password incorrect.');
            return redirect()->to('/login');
        }
    }


}

