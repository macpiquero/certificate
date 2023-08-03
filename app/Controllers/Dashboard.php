<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
   
    public function index(){

        $session = session();

        if(!$this->checkAuthLogin()){ return redirect()->to(base_url('/')); }else{
            
            $data['page_title'] = $session->get('isLoggedIn');
            echo view('main_layout');
            echo view('dashboard/dashboard');
            echo view('includes/footer.php');

        }


    }
    // public function view($page = 'home')
    // {
    //     if (! is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
    //         // Whoops, we don't have a page for that!
    //         throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
    //     }

    //     $data['title'] = ucfirst($page); // Capitalize the first letter

    //     return view('templates/header', $data)
    //         . view('pages/' . $page)
    //         . view('templates/footer');
    // }
}