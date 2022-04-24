<?php

namespace App\Controllers;

use \Hermawan\DataTables\DataTable;
class ManagerEquipment extends BaseController
{
    
    public function index()
    {
        // helper(['form', 'url']);
        return view('Manager/ManagerEquipmentView.php');
    }
    // public function userList()
    // {
    //     $json_data= $this->UserModel->userlist();
    //     echo json_encode($json_data);
    // }
    
}

