<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class InviteModel extends Model{
    protected $table = 'invite';
    protected $primaryKey = 'invite_id ';
    
    protected $allowedFields = [
        'invite_id',
        'fname',
        'lname',
        'center_name',
        'email',
        'created_at'
        
    ];
    
}


