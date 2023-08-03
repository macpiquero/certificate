<?php 

namespace App\Models;  

use CodeIgniter\Model;
// use CodeIgniter\Database\ConnectionInterface;
  
class TimeSheetLogsModel extends Model{
    protected $table = 'timesheet_logs';
    protected $db;

    
    protected $allowedFields = [
        'id',
        'employee_id',
        'employee_no',
        'date_time',
        'time_in_out',
        'action',
        'created_at'
    ];


    
    
}