<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\UserModel;
  
class SignupController extends Controller
{
    public function index()
    {
        helper(['form']);
        $data = [];
        echo view('signup', $data);
    }
    

    public function store(){
        helper('form');
        $rules = [
            'firstname' => 'required|max_length[50]',
            'lastname' => 'required|max_length[50]',
            'email' => 'required|min_length[8]|max_length[100]|valid_email|is_unique[user_info.email]',
            'password' => 'required|min_length[4]|max_length[50]',
            'confirmpassword' => 'matches[password]'
        ];

        if($this->validate($rules)){
            $userModel = new UserModel();
            // date_default_timezone_set('Asia/Manila');

                                // echo date('Y-m-d h:i:s A');
            $data = [
                'firstname' => $this->request->getVar('firstname'),
                'lastname' => $this->request->getVar('lastname'),
                'email' => $this->request->getVar('email'),
                // 'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'password'=> $this->request->getVar('password'),
                'created_at' => date('Y-m-d h:i:s A'),
            ];

            $userModel->save($data);
            $data['success'] = 'New participant added successfully!';
            echo view('signup', $data);


            // var_dump($data);

        }else{
            $data['validation'] = $this->validator;
            echo view('signup', $data);
        }
    }
    
  
}