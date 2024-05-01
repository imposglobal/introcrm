<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class LogModel extends Model{
    protected $table = 'log';
    protected $primaryKey = 'log_id';
    
    protected $allowedFields = [
        
        'user_id',
        'user_name',
        'action',
        'created_at'
        
    ];
    
}


