<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class LogsModel extends Model{
    protected $table = 'z_logs';
    
    protected $allowedFields = [
        'id',
        'user_id',
        'activity',
        'log_time'
    ];


    
}