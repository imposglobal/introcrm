<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class CustomerModel extends Model{
    protected $table = 'customers';
    protected $primaryKey = 'lead_id';
    
    protected $allowedFields = [
        'lead_date',
        'center_name',
        'fname',
        'lname',
        'dob',
        'mobile',
        'telephone',
        'email',
        'address_1',
        'address_2',
        'post_code',
        'tenure',
        'council',
        'boiler_age',
        'boiler_make',
        'boiler_model',
        'benefit_flex',
        'epc_rating',
        'additional_notes',
        'upload_image',
        'created_agent_date',
        'survey_status',
        'job_status',
        'payment_status',
        'status',
        'measures',
        'epc_link',
        'gas_safe_link',
        'boiler_efficiency_link',
        'processing_notes',
        'previous_grant_work',
        'contact_center_notes',
        'update_date_introducer',
        'update_date_admin',
        'userid',
        'agent_name',
        'calltime',
        'calldate',
        'lead_no',
        'boiler_effi',
        'gas_registered',
        'update_client_name',
        'update_client_date'
    ];
    
}


