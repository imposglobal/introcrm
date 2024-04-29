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

        
        $result['ipadress'] = $ipModel->orderBy('ip_id  ', 'desc')->paginate(); // fetch data from database
        
         $result['pager'] = $ipModel->pager;

        // print_r($result);
        
      return view('ipcontrole/add_ipcontrole', $result + $this->data);
    }
  /***************************************************************************************************/
    public function store()
    {
        echo "test";
         $ipModel = new IpModel();

       $data=[
        'ip_address' => $this->request->getPost('ip_address'),
       ];
        print_r($data);
       $ipModel->save($data);
      return redirect()->to('ip/Management')->with('alrt', 'Ip  added successfully');


    }
/**************************************************************************** */




  

}

