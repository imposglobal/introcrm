<?php 
namespace App\Controllers;
//use App\Models\FormModel;
use CodeIgniter\Controller;
class SendMail extends Controller
{
    public function index() 
	{

        echo "testing email";
       
        $to='imposglobal1806@gmail.com';
        $subject='Email sent successfully';
        $message='<h1>Hello Krushna</h1> <br> <p>This is a test email.</p>';
        $email= \Config\Services::email();
        $email->setTo($to);
        $email->setFrom('krushna.phad@doodlodesigns.com');
        $email->setSubject($subject);
        $email->setMessage($message);

        if($email->send()){
            echo "Mail sent successfully";
        }else{
            $data = $email->printDebugger(['headers']);
            print_r($data);
        }

        //return view('form_view');
    }
    
}