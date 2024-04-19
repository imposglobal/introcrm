<?php 
namespace App\Controllers;
use App\Models\InviteModel;
use CodeIgniter\Controller;
class SendMail extends Controller
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
        $inviteModel = new InviteModel();

        $result['invite'] = $inviteModel->orderBy('invite_id ', 'desc')->paginate();
        
         $result['pager'] = $inviteModel->pager;
        return view('email/email_view',$result + $this->data);

    }
    public function EmailInvite(){
        
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

    public function SaveInvite(){

        $inviteModel = new InviteModel();

        $data = [
                'fname' => $this->request->getPost('fname'),
                'lname' => $this->request->getPost('lname'),
                'center_name' => $this->request->getPost('center_name'),
                'email' => $this->request->getPost('email'),
               
            ];
        
             $inviteModel->save($data);
             return redirect()->back();

    }
  
}