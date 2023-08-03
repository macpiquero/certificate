<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use CodeIgniter\Database\BaseBuilder;
use App\Models\MemberModel;

class Churchmember extends BaseController
{
    

    public function index(){

        $session = session();
        $data = [];

        if(!$this->checkAuthLogin()){ return redirect()->to(base_url('/')); }else{
            
            $data['page_title'] = $session->get('isLoggedIn');
            echo view('main_layout');
            echo view('church_member/index');
            echo view('includes/footer.php');

        }


    }
   

    public function addNew(){
        $session = session();

        if(!$this->checkAuthLogin()){ return redirect()->to(base_url('/')); }else{
            
            $data['page_title'] = $session->get('isLoggedIn');
            echo view('main_layout');
            echo view('church_member/add_new_cell_member');
            echo view('includes/footer.php');

        }
    }

    public function AjaxRequestData(){

        try {
            if($this->request->isAJAX()){
                $session = session();
                $memberModel = new MemberModel();
                // $AjaxData =  $this->request->getJSON();
                $firstname = $this->request->getVar('firstname');
                $lastname = $this->request->getVar('lastname');
                $email = $this->request->getVar('email');
                $cell_leader_id = $this->request->getVar('cell_leader_id');
                $if_cell_leader = $this->request->getVar('if_cell_leader');

                $pre_encounter = $this->request->getVar('pre_encounter');
                $encounter = $this->request->getVar('encounter');
                $post_encounter = $this->request->getVar('post_encounter');
                $sol1 = $this->request->getVar('sol1');
                $sol2 = $this->request->getVar('sol2');
                $sol3 = $this->request->getVar('sol3');
                

                $c_id;

                if($if_cell_leader){$c_id = 1;}else{$c_id = 0;}

                $data = [
                    'firstname' => $firstname,
                    'lastname' =>  $lastname,
                    'email' =>  $email,
                    'cell_leader_id' =>  $cell_leader_id,
                    'if_cell_leader' =>  $c_id,
                    'pre_encounter' =>  $pre_encounter,
                    'encounter' =>  $encounter,
                    'post_encounter' =>  $post_encounter,
                    'sol1' =>  $sol1,
                    'sol2' =>  $sol2,
                    'sol3' =>  $sol3,
                    'created_at' => date('Y-m-d h:i:s A'),
                ];


                $memberModel->save($data);
                $this->z_logs($session->get('id'), 'Add new Member | churchmember module');
                // \DB::table('member_info')->insert(['firstname' => $firstname, 'lastname' => $lastname ]);

           

                return json_encode(['success' => 'success', 'query' => $data]);

                
            }
        } catch (\Exception $e) {
            exit($e->getMessage());
        }

        

    }

    public function ajaxCellLeaderList(){


        $memberModel = new MemberModel();
        $rs = $memberModel->getAllCellLeader();
        $json = json_encode($rs);
        return $json;
    }
}