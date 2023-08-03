<?php 

namespace App\Models;  

use CodeIgniter\Model;
// use CodeIgniter\Database\ConnectionInterface;
  
class PositionsModel extends Model{
    protected $table = 'positions';
    protected $db;

    
    protected $allowedFields = [
        'id',
        'position_name',
        'position_desc',
        'position_acronym',
        'status',
        'created_at'
    ];


    public function getEmployeePosition($id){
        return $this->where('id', $id)->first();
    }
    
}