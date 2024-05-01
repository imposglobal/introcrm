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
        // Load email library
        $email = \Config\Services::email();

        $inviteModel = new InviteModel();
        $fname = $this->request->getPost('fname');
        $lname = $this->request->getPost('lname');
        $center = $this->request->getPost('center_name');
        $to = $this->request->getPost('email');

        
        // Set email subject
        $subject = 'Welcome to Eco4 Portal!';
    
       // Email message with HTML content
        $message = '<div style="width: 600px; margin: 0 auto; background: #f5f5f5; padding: 20px; font-family: Arial, sans-serif;">';
        $message .= '<h2 style="color: #333; text-align: center;">Welcome to Eco4 Portal!</h2>';
        $message .= '<p style="color: #333;">Dear ' . $fname . ' ' . $lname . ',</p>';
        $message .= '<p style="color: #333;">We are thrilled to welcome you and excited to have you onboard!</p>';
        $message .= '<p style="color: #333;">To get started with your onboarding process, please click the link below:</p>';
        $message .= '<div style="text-align: center; margin-top: 20px; margin-bottom: 20px;">';
        $message .= '<a href="'.base_url().'/onboard?center=' . $center . '&role=introducer" style="background-color: #007bff; color: #fff; text-decoration: none; padding: 10px 20px; border-radius: 5px; display: inline-block;">Complete Onboarding</a>';
        $message .= '</div>';
        $message .= '<p style="color: #333;">By completing the onboarding process, you will gain access to all the features and benefits of our service.</p>';
        $message .= '<p style="color: #333;">If you have any questions or need assistance at any point during the Onboarding process, our dedicated support team is here to help you.
        </p>';
        $message .= '<p style="color: #333;">Feel free to reach out to us at support@eco4.doodlo.in</p>';
        $message .= '<p style="color: #333;">We look forward to working with you and helping you achieve your goals!</p>';
        $message .= '<p style="color: #333;">Eco4 Team</p>';
        $message .= '</div>';


        // Set email parameters
        $email->setTo($to);
        $email->setFrom('support@eco4.doodlo.in');
        $email->setSubject($subject);
        $email->setMessage($message);
    
        // Send email
        if($email->send()){
            $data = [
                'fname' => $fname,
                'lname' => $lname,
                'center_name' => $center,
                'email' => $to,
               
            ];
        
             $inviteModel->save($data);
            echo "Mail sent successfully";
            return redirect()->back();
        } else {
            // Display error if email sending fails
            $data = $email->printDebugger(['headers']);
            print_r($data);
        }
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