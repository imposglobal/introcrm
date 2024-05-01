<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\IpModel;

class IpControle extends BaseController
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
        $ipModel = new IpModel();
        $session = session();
        $role = $session->get('role');
        $center = $session->get('center');

        if($role == 1){
            $result['ipadress'] = $ipModel->orderBy('ip_id  ', 'desc')
            ->where('center',$center)
            ->paginate(); // fetch data from database
            $result['pager'] = $ipModel->pager;

        }else{
            $result['ipadress'] = $ipModel->orderBy('ip_id  ', 'desc')
            ->paginate(); // fetch data from database
            $result['pager'] = $ipModel->pager;

        }
      
        
        
      return view('ipcontrole/add_ipcontrole', $result + $this->data);
    }
  /***************************************************************************************************/
    public function store()
    {
         $ipModel = new IpModel();
         $session = session();
         $center = $session->get('center');
       $data=[
        'ip_address' => $this->request->getPost('ip_address'),
        'center' => $center
       ];
        
       $ipModel->save($data);
      return redirect()->to('ip/Management')->with('alrt', 'Ip  added successfully');


    }
/**************************************************************************** */
public function delete($ip_id = null) {
    $ipModel = new IpModel();
    $result['ipadress'] = $ipModel->where('ip_id', $ip_id)->delete();

    // Check if the delete operation was successful
    if ($result['ipadress']) {
        // Get the referral URL from the HTTP_REFERER header
        $referrer = $this->request->getServer('HTTP_REFERER');
        
        // Redirect to the referral URL after successful deletion
        return redirect()->to($referrer);
    } else {
        // Handle the case where the delete operation failed
        return "Error deleting customer with lead_id: $ip_id";
    }
}




  

}

