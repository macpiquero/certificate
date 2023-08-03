<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class UserModel extends Model{
    protected $table = 'user_info';
    
    protected $allowedFields = [
        'id',
        'firstname',
        'lastname',
        'email',
        'password',
        'created_at'
    ];


    
}