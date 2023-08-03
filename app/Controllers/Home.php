<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
       $this->data['page_title'] = "Pages Controller";

     
         return view('App\Views\login_layout',$this->data);
    }
}
