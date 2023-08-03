<?php 

namespace App\Models;  

use CodeIgniter\Model;
// use CodeIgniter\Database\ConnectionInterface;
  
class CompanyDataEmployeeModel extends Model{
    protected $table = 'company_employee_data';
    protected $db;

    
    protected $allowedFields = [
        'id',
        'emp_id',
        'emp_no',
        'date_hired',
        'job_title',
        'job_desc',
        'sub_unit',
        'emp_status',
        'location',
        'basic_salary',
        'monthly_salary',
        'hrs_per_rate',
        'allowance',
        'contri_sss',
        'contri_pagibig',
        'contri_philhealth',

    ];



    public function getCompanyData($emp_id){
        return $this->where('emp_id', $emp_id)->first();
    }

    public function checkRecords($emp_no, $data){
        $checkrecord = $this->where('emp_no',$emp_no)->countAllResults();

        if($checkrecord == 0){
            return $this->insert($data);
        }else{
            return $this->where('emp_no',$emp_no)->set($data)->update();
        }

    }
    
}