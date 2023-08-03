<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use CodeIgniter\Database\BaseBuilder;
use App\Models\EmployeeModel;
use App\Models\CompanyDataEmployeeModel;
use App\Models\PositionsModel;
use CodeIgniter\I18n\Time;

class Employee extends BaseController
{
    

    public function index(){

        // echo "employee module";

        $session = session();
        $data = [];

        if(!$this->checkAuthLogin()){ return redirect()->to(base_url('/')); }else{
            
            $data['page_title'] = $session->get('isLoggedIn');
            echo view('main_layout');
            echo view('employee/index');
            echo view('includes/footer');

        }


    }
    
    /*
     * get all employee data
     * fetch to datatable
    */
    public function getEmployee(){

       $request = service('request');
       $postData = $request->getPost();
       $dtpostData = $postData['data'];
       $response = array();

       ## Read value
       $draw = $dtpostData['draw'];
       $start = $dtpostData['start'];
       $rowperpage = $dtpostData['length']; // Rows display per page
       $columnIndex = $dtpostData['order'][0]['column']; // Column index
       $columnName = $dtpostData['columns'][$columnIndex]['data']; // Column name
       $columnSortOrder = $dtpostData['order'][0]['dir']; // asc or desc
       $searchValue = $dtpostData['search']['value']; // Search value

       ## Total number of records without filtering
       $employee = new EmployeeModel();
       $totalRecords = $employee->select('id')
                     ->countAllResults();

       ## Total number of records with filtering
       $totalRecordwithFilter = $employee->select('id')
            ->orLike('employee_id', $searchValue)
            ->orLike('firstname', $searchValue)
            ->orLike('middlename', $searchValue)
            ->orLike('lastname', $searchValue)
            ->orLike('birthdate', $searchValue)
            ->orLike('address', $searchValue)
            ->orLike('personal_email', $searchValue)
            ->orLike('company_email', $searchValue)
            ->countAllResults();

       ## Fetch records
       $records = $employee->select('*')
            ->orLike('employee_id', $searchValue)
            ->orLike('firstname', $searchValue)
            ->orLike('middlename', $searchValue)
            ->orLike('lastname', $searchValue)
            ->orLike('birthdate', $searchValue)
            ->orLike('address', $searchValue)
            ->orLike('personal_email', $searchValue)
            ->orLike('company_email', $searchValue)
            ->orderBy($columnName,$columnSortOrder)
            ->findAll($rowperpage, $start);

       $data = array();

       foreach($records as $record ){

            $url_edit = base_url('employee/edit/'.$record['id']);

          $data[] = array( 
             "employee_id"=>$record['employee_id'],
             "name"=>$record['lastname'].", ".$record['firstname']. " ". $record['middlename'],
             "company_email"=>$record['company_email'],
             "birthdate"=>$this->calc_age($record['birthdate']),
             "action" => '<a href="'.$url_edit.'" class="btn btn-default" target="_blank">
                        <i class="glyph-icon icon-eye"></i>
                    </a>'
          ); 
       }

       ## Response
       $response = array(
        "draw" => intval($draw),
        "iTotalRecords" => $totalRecords,
        "iTotalDisplayRecords" => $totalRecordwithFilter,
        "aaData" => $data,
        "token" => csrf_hash() // New token hash
       );

       return $this->response->setJSON($response);
   }

   /**
    * VIew and Update employee information
    * */ 
    public function edit($id){

        $session = session();
         $data = array();

        if(!$this->checkAuthLogin()){ return redirect()->to(base_url('/')); }else{

            $employee = new EmployeeModel();
            $position = new PositionsModel();
            $company_data = new CompanyDataEmployeeModel();

            $records_employee = $employee->getEmployeeData($id);
            $employee_positions = $position->getEmployeePosition($records_employee['pos_id']);
            $records_company_data = $company_data->getCompanyData($records_employee['id']);
            // echo $records_employee['id'];

            $data['page_title'] = $session->get('isLoggedIn');
            $data['employee_data'] = $records_employee;
            $data['employee_position'] = $employee_positions;
            $data['company_data'] = $records_company_data;
            $data['age'] = $this->calc_age($records_employee['birthdate']);

            // var_dump($records_employee['employee_id']);
            echo view('main_layout');
            echo view('employee/edit',$data);
            echo view('includes/footer');

        }

    }

    /**
     * Update employee information
     * */
    public function update_employee_data(){
        $session = session();
        $employee = new EmployeeModel();
        $company_data = new CompanyDataEmployeeModel();

        $emp_id = $this->request->getPost('id');
        $emp_no = $this->request->getPost('emp_no');
      
        // $data = array();

        $data_employee = [
            'firstname' => $this->request->getPost('firstname'),
            'middlename' => $this->request->getVar('middlename'),
            'lastname' => $this->request->getPost('lastname'),
            'birthdate' => $this->request->getPost('birthdate'),
            'address' => $this->request->getPost('address'),
            'personal_email' => $this->request->getPost('personal_email'),
            'contact_no' => $this->request->getPost('contact_no'),
            'nationality' => $this->request->getPost('nationality'),
            'marital_status' => $this->request->getPost('marital_status'),
            'tin_no' => $this->request->getPost('tin_no'),
            'sss_no' => $this->request->getPost('sss_no'),
            'pag_ibig_no' => $this->request->getPost('pagibig_no'),
            'philhealth_no' => $this->request->getPost('philhealth_no'),
            'emergency_contact_name' => $this->request->getPost('emergency_contact_name'),
            'emergency_contact_relationship' => $this->request->getPost('emergency_contact_relationship'),
            'emergency_contact_no' => $this->request->getPost('emergency_contact_no'),
            'emergency_contact_address' => $this->request->getPost('emergency_contact_address')

        ];

        
        $data_company_employee = [
            'emp_id' => $emp_id,
            'emp_no' => $emp_no,
            'date_hired' => $this->request->getPost('emp_datehired'),
            'job_title' => $this->request->getPost('emp_job_title'),
            'job_desc' => $this->request->getPost('emp_job_desc'),
            'sub_unit' => $this->request->getPost('emp_sub_unit'),
            'emp_status' => $this->request->getPost('emp_status'),
            'location' => $this->request->getPost('emp_location'),
            'monthly_salary' => $this->request->getPost('emp_monthly_salary'),
            'basic_salary' => $this->request->getPost('emp_basic_salary'),
            'hrs_per_rate' => $this->request->getPost('emp_hours_per_rate'),
            'allowance' => $this->request->getPost('emp_allowance'),
            'contri_sss' => $this->request->getPost('emp_contri_sss'),
            'contri_pagibig' => $this->request->getPost('emp_contri_pagibig'),
            'contri_philhealth' => $this->request->getPost('emp_contri_philhealth'),
        ];   


        // var_dump($data_company_employee);
        // echo $data_;
        $employee->update($emp_id, $data_employee);
        $company_data->checkRecords($emp_no, $data_company_employee);

       
        // // logs
        // $this->z_logs($session->get('id'), 'update empoloyee data | employee.id: '.$emp_id);


        session()->setFlashdata('message_emp', ' Data updated successfully!');
        session()->setFlashdata('alert-class', 'alert-success');
        return 'success';

    } 

   /**
    * Calculate Age 
    * */ 
   public function calc_age($birthdate){
        
        $birthdate = strtotime($birthdate);

        $age = date('Y') - date('Y', $birthdate);

        if (date('md') < date('md', $birthdate)) {
            $age--;
        }

        return $age;
   }

     // File upload and Insert records
   public function upload_csv(){
    $session = session();
      // Validation
      $input = $this->validate([
         'file' => 'uploaded[file]|max_size[file,1024]|ext_in[file,csv],'
      ]);

      if (!$input) { // Not valid
         $data['validation'] = $this->validator;

        session()->setFlashdata('message', 'Invalid file format. Upload .csv file only.');
        session()->setFlashdata('alert-class', 'alert-danger');
      }else{ // Valid

         if($file = $this->request->getFile('file')) {
            if ($file->isValid() && ! $file->hasMoved()) {

                // file name
                $fileName = $file->getName();

               // Get random file name
               $newName = $file->getRandomName();

               // Store file in public/csvfile/ folder
               $file->move('../public/csvfile/', $newName);

               // Reading file
               $file = fopen("../public/csvfile/".$newName,"r");
               $i = 0;
               $numberOfFields = 10; // Total number of fields

               $importData_arr = array();

               // Initialize $importData_arr Array
               while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                  $num = count($filedata);

                  // Skip first row & check number of fields
                  if($i > 0 && $num == $numberOfFields){ 
                     
                     // Key names are the insert table field names - name, email, city, and status
                     $importData_arr[$i]['employee_id'] = $filedata[0];
                     $importData_arr[$i]['firstname'] = $filedata[1];
                     $importData_arr[$i]['middlename'] = $filedata[2];
                     $importData_arr[$i]['lastname'] = $filedata[3];
                     $importData_arr[$i]['birthdate'] = $filedata[4];
                     $importData_arr[$i]['address'] = $filedata[5];
                     $importData_arr[$i]['personal_email'] = $filedata[6];
                     $importData_arr[$i]['company_email'] = $filedata[7];
                     $importData_arr[$i]['contact_no'] = $filedata[8];
                     $importData_arr[$i]['pos_id'] = $filedata[9];
                  }

                  $i++;

               }
               fclose($file);
 
               // Insert data
               $count = 0;
               foreach($importData_arr as $userdata){
                  $employee = new EmployeeModel();

                  // $employee->where('employee_id', $userdata['employee_id'])->update($userdata);
                  // Check record
                  $checkrecord = $employee->where('employee_id',$userdata['employee_id'])->countAllResults();

                  if($checkrecord == 0){

                     ## Insert Record
                     if($employee->insert($userdata)){
                         $count++;
                     }
                  }else{
                    $employee->where('employee_id',$userdata['employee_id'])->set($userdata)->update();
                  }

               }

               $this->z_logs($session->get('id'), 'uploaded csv file '.$fileName.'|'.$newName);

               // Set Session
               session()->setFlashdata('message', $count.' Record inserted successfully!');
               session()->setFlashdata('alert-class', 'alert-success');
              

            }else{
               // Set Session
               session()->setFlashdata('message', 'File not imported.');
               session()->setFlashdata('alert-class', 'alert-danger');
            }
         }else{
            // Set Session
            session()->setFlashdata('message', 'File not imported.');
            session()->setFlashdata('alert-class', 'alert-danger');
         }

      }
      
      // return redirect()->route('/employee'); 
      return redirect()->to(base_url('employee'));
   }
}