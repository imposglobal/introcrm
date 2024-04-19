<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class CustomerModel extends Model{
    protected $table = 'customers';
    protected $primaryKey = 'lead_id';
    
    protected $allowedFields = [
        
    ];
    
}


