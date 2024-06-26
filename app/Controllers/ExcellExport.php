<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\CustomerModel;
use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait;
// Office Excell Libraray
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExcellExport extends BaseController
{
    use ResponseTrait;
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
/***********************************************************************************************/

public function index()
{
    $userModel = new UserModel();
    $result['users']=$userModel
    ->where('role', '1')
    ->findAll();
    //print_r($result);
    return view('reports/get_reports', $result + $this->data);
}

/*************************************status wise export excell report**********************************************************/

public function ExportFullExcellReport()
{
    $session = session();
    $center = $session->get('center');
    $role = $session->get('role');

    $customerModel = new CustomerModel();
    $userModel = new UserModel();
    $filename='CustomersReport.xlsx';

    $ops = $this->request->getPost('ops');

     switch ($ops) {
        case "datewise":
            $start = $this->request->getPost('start');
            $end = $this->request->getPost('end');
            if($role == 1){
                $records = $customerModel
                ->where('DATE(lead_date) >=', $start)
                ->where('DATE(lead_date) <=', $end)
                ->where('center_name', $center)
                ->orderBy('lead_id', 'desc')
                ->findAll();
            }else{
                $records = $customerModel
                ->where('DATE(lead_date) >=', $start)
                ->where('DATE(lead_date) <=', $end)
                ->orderBy('lead_id', 'desc')
                ->findAll();
            }
            

                $filename='CustomersReport('.$start.' to '.$end.').xlsx';
            break;
            
            case "statuswise":
                $status = $this->request->getPost('status');

                if($role == 1){
                    $records = $customerModel->where('status', $status)
                    ->where('center_name', $center)
                    ->orderBy('lead_id', 'desc')
                    ->findAll();
                }else{
                    $records = $customerModel->where('status', $status)
                    ->orderBy('lead_id', 'desc')
                    ->findAll();
                }
                
                $filename='CustomersReport('.$status.').xlsx';
                break;

            case "centerwise":
                $center = $this->request->getPost('center');
                $records = $customerModel->where('center_name', $center)
                ->orderBy('lead_id', 'desc')
                ->findAll();
                $filename='CustomersReport('.$center.').xlsx';
                break;
        default:
            $records = $customerModel
                ->orderBy('lead_id', 'desc')
                ->findAll();
            break;
    }
    
    $spreadsheet = new Spreadsheet();
    $sheet=$spreadsheet->getActiveSheet();

    $sheet->setCellValue('A1','Lead ID');
    $sheet->setCellValue('B1','Source');
    $sheet->setCellValue('C1','Status ');
    $sheet->setCellValue('D1','Lead Date');
    $sheet->setCellValue('E1','DOB ');
    $sheet->setCellValue('F1','Customer Name');
    $sheet->setCellValue('G1','Address');
    $sheet->setCellValue('H1','Post Code');
    $sheet->setCellValue('I1','Telephone ');
    $sheet->setCellValue('J1','Mobile');
    $sheet->setCellValue('K1','Boiler Age ');
    $sheet->setCellValue('L1','Boiler Make ');
    $sheet->setCellValue('M1','Boiler Model');
    $sheet->setCellValue('N1','Benefit Flex ');
    $sheet->setCellValue('O1','EPC Rating ');
    $sheet->setCellValue('P1','Email');
    $sheet->setCellValue('Q1','Tenure ');
    $sheet->setCellValue('R1','Council ');  
    $sheet->setCellValue('S1','Survey Status ');
    $sheet->setCellValue('T1','Job Status ');
    $sheet->setCellValue('U1','Payment Status ');
    $sheet->setCellValue('V1','Call Date ');
    $sheet->setCellValue('W1','Call time ');
    $sheet->setCellValue('X1','Measures ');
    $sheet->setCellValue('Y1','EPC Link ');
    $sheet->setCellValue('Z1','Gas safe Link ');
    $sheet->setCellValue('AA1','Boiler Efficeincy Link ');
    $sheet->setCellValue('AB1','Created Agent Name ');
    $sheet->setCellValue('AC1','Last Updated By ');
 
        $rows = 2;
        foreach ($records as $val){
            $sheet->setCellValue('A'.$rows, 'EC-'. $val['lead_no']);
            $sheet->setCellValue('B'.$rows, $val['center_name']);
            $sheet->setCellValue('C'.$rows, $val['status']);
            $sheet->setCellValue('D'.$rows, date('d-m-Y H:i:s', strtotime($val['lead_date'])));
            $sheet->setCellValue('E'.$rows, date('d-m-Y', strtotime($val['dob'])));
            $sheet->setCellValue('F'.$rows, $val['fname']);
            $sheet->setCellValue('G'.$rows, $val['address_1']);
            $sheet->setCellValue('H'.$rows, $val['post_code']);
            $sheet->setCellValue('I'.$rows, $val['telephone']);
            $sheet->setCellValue('J'.$rows, $val['mobile']);
            $sheet->setCellValue('K'.$rows, $val['boiler_age']);
            $sheet->setCellValue('L'.$rows, $val['boiler_make']);
            $sheet->setCellValue('M'.$rows, $val['boiler_model']);
            $sheet->setCellValue('N'.$rows, $val['benefit_flex']);
            $sheet->setCellValue('O'.$rows, $val['epc_rating']);   
            $sheet->setCellValue('P'.$rows, $val['email']);
            $sheet->setCellValue('Q'.$rows, $val['tenure']);
            $sheet->setCellValue('R'.$rows, $val['council']);
            $sheet->setCellValue('S'.$rows, $val['survey_status']);
            $sheet->setCellValue('T'.$rows, $val['job_status']);
            $sheet->setCellValue('U'.$rows, $val['payment_status']);
            $sheet->setCellValue('V'.$rows, $val['calldate']);
            $sheet->setCellValue('W'.$rows, $val['calltime']);
            $sheet->setCellValue('X'.$rows, $val['measures']);
            $sheet->setCellValue('Y'.$rows, $val['epc_link']);
            $sheet->setCellValue('Z'.$rows, $val['gas_safe_link']);
            $sheet->setCellValue('AA'.$rows, $val['boiler_efficiency_link']);
            $sheet->setCellValue('AB'.$rows, $val['agent_name']);
            $sheet->setCellValue('AC'.$rows, $val['update_client_name']." on ".$val['update_client_date']);
           
            $rows++;
        }
        $writer = new Xlsx($spreadsheet);
        $writer->save($filename);

        header("content-Type: application/vnd.ms-excel");
        header('content-Disposition: attachment; filename="' . basename($filename) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length:' . filesize($filename));

        flush();
        readfile($filename);
        exit; 
}

/************************************************show centers **************************************************** */
/*************************************************************************************************** */



}