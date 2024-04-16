<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class UserModel extends Model{
    protected $table = 'users';
    
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


