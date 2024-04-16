<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class CustomerModel extends Model{
    protected $table = 'customer';
    
    protected $allowedFields = [
        'fname',
        'lname',
        'email',
        'phone',
        'center_name',
        'location',
        'password',
        'created_at'
    ];
    
}


