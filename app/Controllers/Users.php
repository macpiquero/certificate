<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use CodeIgniter\Database\BaseBuilder;
use App\Models\ParticipantsModel;
use App\Models\LessonsModel;
use App\Models\CertificateModel;

class Users extends BaseController
{
    public function index(){

        $session = session();
        $data = [];

        if(!$this->checkAuthLogin()){ return redirect()->to(base_url('/')); }else{
            
            $data['page_title'] = $session->get('isLoggedIn');
            echo view('main_layout');
            echo view('user_info/index');
            echo view('includes/footer');

        }

    }

    public function add_participant(){
        helper('form');
        $rules = [
            'firstname' => 'required|max_length[50]',
            'lastname' => 'required|max_length[50]',
            
        ];

        if($this->validate($rules)){
            $userModel = new ParticipantsModel();
            // date_default_timezone_set('Asia/Manila');

                                // echo date('Y-m-d h:i:s A');
            $data = [
                'firstname' => $this->request->getVar('firstname'),
                'lastname' => $this->request->getVar('lastname'),
                'email' => $this->request->getVar('email'),
                'created_at' => date('Y-m-d h:i:s A'),
            ];

            $userModel->save($data);

            $data['success'] = 'New participant added successfully!';
            echo view('main_layout');
            echo view('user_info/index', $data);
            echo view('includes/footer');

            // return redirect()->to(base_url('/'));

            // var_dump($data);

        }else{
            $data['validation'] = $this->validator;
             echo view('main_layout');
            echo view('user_info/index', $data);
            echo view('includes/footer');
        }
    }

    /*
     * get all employee data
     * fetch to datatable
    */
    public function getParticipant(){

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
       $employee = new ParticipantsModel();
       $totalRecords = $employee->select('id')
                     ->countAllResults();

       ## Total number of records with filtering
       $totalRecordwithFilter = $employee->select('id')
            ->orLike('firstname', $searchValue)
            ->orLike('lastname', $searchValue)
            ->countAllResults();

       ## Fetch records
       $records = $employee->select('*')
            ->orLike('id', $searchValue)
            ->orLike('firstname', $searchValue)
            ->orLike('lastname', $searchValue)
            ->orderBy($columnName,$columnSortOrder)
            ->findAll($rowperpage, $start);

       $data = array();

       foreach($records as $record ){

            $url_edit = base_url('participants/edit/'.$record['id']);
            $url_delete = base_url('participants/delete/'.$record['id']);
            $url_certificate = base_url('participants/certificate/'.$record['id']);

              $data[] = array( 
                 "id"=>$record['id'],
                 "name"=>$record['lastname'].", ".$record['firstname'],
                 "action" => '<a href="'.$url_edit.'" class="btn btn-default" target="_blank">
                            <i class="glyph-icon icon-eye"></i>
                        </a><a href="'.$url_delete.'" class="btn btn-default" >
                            <i class="glyph-icon icon-trash"></i>
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

            $participants = new ParticipantsModel();
            $lessons = new LessonsModel();
            

            $records_participants = $participants->getParticipantData($id);
            
            // echo $records_employee['id'];

            $data['page_title'] = $session->get('isLoggedIn');
            $data['participants'] = $records_participants;
            $data['lessons'] = $lessons->getLessons();
            // var_dump($records_employee['employee_id']);
            echo view('main_layout');
            echo view('user_info/edit',$data);
            echo view('includes/footer');

        }

    }

     /**
     * Update employee information
     * */
    public function update_participant(){
        $session = session();
        $participants = new ParticipantsModel();

        $id = $this->request->getPost('id');
      
        // $data = array();

        $data_participants = [
            'firstname' => $this->request->getPost('firstname'),
            'lastname' => $this->request->getPost('lastname'),
        ];

        
        $participants->update($id, $data_participants);

       
        // // logs
        // $this->z_logs($session->get('id'), 'update empoloyee data | employee.id: '.$emp_id);


        session()->setFlashdata('message_emp', ' Data updated successfully!');
        session()->setFlashdata('alert-class', 'alert-success');
        return 'success';

    }

    public function delete_participant($id){
        $participants = new ParticipantsModel();

        
        $participants->delete($id);

        $data['success'] = 'Participant deleted!';
        echo view('main_layout');
        echo view('user_info/index', $data);
        echo view('includes/footer');
    } 



    public function add_certificate(){

         $certificate = new CertificateModel();
            // date_default_timezone_set('Asia/Manila');

                                // echo date('Y-m-d h:i:s A');
            $data = [
                'participant_id' => $this->request->getPost('participant_id'),
                'lesson_id' => $this->request->getPost('lesson_id'),
                'path' => $this->request->getPost('path'),
                'created_at' => date('Y-m-d h:i:s A'),
            ];

            $certificate->save($data);

    }

}
