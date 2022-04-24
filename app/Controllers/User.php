<?php

namespace App\Controllers;

use \Hermawan\DataTables\DataTable;
class User extends BaseController
{
    
    public function index()
    {
        helper(['form', 'url']);
        return view('User/index');
    }
    public function userList()
    {
        $json_data= $this->UserModel->userlist();
        echo json_encode($json_data);
    }
    
}

