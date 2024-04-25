<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class CommentModel extends Model{
    protected $table = 'comments';
    protected $primaryKey = 'com_id';
    
    protected $allowedFields = [
        'cid',
        'comments',
        'byname',
        'time_stamp'
        
    ];
    
}
