<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class IpModel extends Model{
    protected $table = 'ipadress';
    protected $primaryKey = 'ip_id ';
    
    protected $allowedFields = [
        
        'ip_address',
        'center'
        
    ];
    
}


