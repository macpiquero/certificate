<?php

namespace App\Controllers;
use App\Models\TimeSheetLogsModel;
use App\Models\EmployeeModel;

class Time extends BaseController
{
   
    public function index(){

        $session = session();

        if(!$this->checkAuthLogin()){ return redirect()->to(base_url('/')); }else{
            
            $data['page_title'] = $session->get('isLoggedIn');
            echo view('main_layout');
            echo view('time/index');
            echo view('includes/footer.php');

        }


    }
   

   /*
     * get all employee data
     * fetch to datatable
    */
    public function getEmployeInOut(){

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
       $timesheetlogs = new TimeSheetLogsModel();

       $totalRecords = $timesheetlogs->select('id')
                     ->countAllResults();

       ## Total number of records with filtering
       $totalRecordwithFilter = $timesheetlogs->select('id')
            ->orLike('employee_no', $searchValue)
            ->orLike('date_time', $searchValue)
            ->countAllResults();

       ## Fetch records
       $records = $timesheetlogs->select('*')
            ->orLike('employee_id', $searchValue)
            ->orLike('employee_no', $searchValue)
            ->orLike('date_time', $searchValue)
            ->orLike('time_in_out', $searchValue)
            ->orLike('action', $searchValue)
            ->orderBy($columnName,$columnSortOrder)
            ->findAll($rowperpage, $start);

       $data = array();

       foreach($records as $record ){

            $url_edit = base_url('employee/edit/'.$record['id']);

            $employee_info = $employee->getEmployeeData($record['employee_id']);

              $data[] = array( 
                 "employee_id"=>$record['employee_no'],
                 "name"=> $employee_info['firstname'],
                 "time"=>$record['date_time'],
                 "status"=>$record['time_in_out'],
                 "action" => '<a href="'.$url_edit.'" class="btn btn-default" target="_blank">
                            <i class="glyph-icon icon-eye"></i>
                        </a>'
              ); 
       }

       ## Response
       $response = array(
        "draw" => intval($draw),
        "iTotalRecords" => $totalRecords,
        "iTotalDisplayRecords" => $totalRecords,
        "aaData" => $data,
        "token" => csrf_hash() // New token hash
       );

       return $this->response->setJSON($response);
   }

    public function upload_file(){

        $timelogs = new TimeSheetLogsModel();
        $employee = new EmployeeModel();

        $input = $this->validate([
            'file' => 'uploaded[file]|max_size[file,2048]|ext_in[file,csv],'
        ]);

        if (!$input) {
            $data['validation'] = $this->validator;
             session()->setFlashdata('message', 'Invalid file format. Upload .csv file only.');
        session()->setFlashdata('alert-class', 'alert-danger');
        }else{
            if($file = $this->request->getFile('file')) {
                if ($file->isValid() && ! $file->hasMoved()) {
                    $newName = $file->getRandomName();
                    $file->move('../public/timelogs/', $newName);
                    $file = fopen("../public/timelogs/".$newName,"r");
                    $i = 0;
                    $numberOfFields = 3;

                    $csvArr = array();
                    
                    while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                        $num = count($filedata);
                        if($i > 0 && $num == $numberOfFields){ 

                            $getEmployee_id = $employee->where('employee_id', $filedata[0])->first();

                            $csvArr[$i]['employee_id'] = $getEmployee_id['id'];
                            $csvArr[$i]['employee_no'] = $filedata[0];
                            $csvArr[$i]['date_time'] = $filedata[1];
                            $csvArr[$i]['time_in_out'] = $filedata[2];
                            $csvArr[$i]['action'] = 'Upload Biometrics';
                            $csvArr[$i]['created_at'] = date('Y-m-d h:i:s A');

                            
                        }
                        $i++;


                    }
                    fclose($file);

                    $count = 0;
                    // var_dump($csvArr);
                   
                    foreach($csvArr as $userdata){
                        if($timelogs->insert($userdata)){
                                $count++;
                            }
                    }
                    session()->setFlashdata('message', $count.' rows successfully added.');
                    session()->setFlashdata('alert-class', 'alert-success');
                }else{
                    session()->setFlashdata('message', 'CSV file coud not be imported.');
                    session()->setFlashdata('alert-class', 'alert-danger');
                }
            }else{
                session()->setFlashdata('message', 'CSV file coud not be imported.');
                session()->setFlashdata('alert-class', 'alert-danger');
            }
        }
        return redirect()->route('time');       
    }
}