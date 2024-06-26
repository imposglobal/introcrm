<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class UserModel extends Model{
    protected $table = 'users';
    protected $primarykey = 'id';
    protected $allowedFields = [
        'fname',
        'lname',
        'email',
        'phone',
        'center_name',
        'location',
        'username',
        'password',
        'role',
        'created_at'
    ];
    
}

?>
