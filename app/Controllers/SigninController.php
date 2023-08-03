<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\UserModel;

  
class SigninController extends BaseController{
   
   public function index(){

       if(!$this->checkAuthLogin()){
            helper(['form']);
            echo view('login_layout');
        }else{
            return redirect()->to(base_url('dashboard'));
        }
   }

   public function loginAuth(){

        $config         = new \Config\Encryption();
        $encrypter = \Config\Services::encrypter($config);

        $session = session();
        $userModel = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $data = $userModel->where('email', $email)->first();


        
        $ciphertext = $encrypter->encrypt($password);

        // var_dump($password);

        if($data){
            $pass = $data['password'];
            // $authenticatePassword = password_verify($password, $pass);
            // var_dump($authenticatePassword);
            if($pass){
                $ses_data = array(
                    'id' => $data['id'],
                    'name' => $data['firstname'] . " " . $data['lastname'],
                    'email' => $data['email'],
                    'isLoggedIn' => 'logged'
                
                );
                    

                $session->set($ses_data);
                

                 // return redirect()->to('/');
                // echo $session->get('isLoggedIn');
                $this->z_logs($data['id'], 'login');
                return redirect()->to(base_url('dashboard'));
            }else{
                $session->setFlashdata('msg', 'Password is incorrect.');
                return redirect()->to(base_url('/'));
                // echo $data['password']  ;
            }
        }else{
            $session->setFlashdata('msg', 'Email does not exist!');
            return redirect()->to(base_url('/'));
        }

   }

   public function logout(){
        $session = session();
        $this->z_logs($session->get('id'), 'logout');
        $session->remove('isLoggedIn');
        return redirect()->to(base_url('/'));

   }
}