<?php 

namespace App\Models;  

use CodeIgniter\Model;
// use CodeIgniter\Database\ConnectionInterface;
  
class EmployeeModel extends Model{
    protected $table = 'employee';
    protected $db;

    
    protected $allowedFields = [
        'id',
        'employee_id',
        'firstname',
        'middlename',
        'lastname',
        'birthdate',
        'address',
        'personal_email',
        'company_email',
        'contact_no',
        'pos_id',
        'nationality',
        'marital_status',
        'tin_no',
        'sss_no',
        'pag_ibig_no',
        'philhealth_no',
        'emergency_contact_name',
        'emergency_contact_relationship',
        'emergency_contact_no',
        'emergency_contact_address'

    ];



    public function getEmployeeData($id){
        return $this->where('id', $id)->first();
    }

    public function getEmployeePosition($id){
        return $this->where('id', $id)->first();
    }
    
}