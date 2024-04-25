<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class CommentModel extends Model{
    protected $table = 'comments';
    protected $primaryKey = 'com_id';
    
    protected $allowedFields = [
        
        'comments',
        'byname',
        'time_stamp'
        
    ];
    
}
