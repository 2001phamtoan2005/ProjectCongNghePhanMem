<?php

namespace App\Controllers;
use app\Models\EquipmentsModel;
use app\Models\ProfilesModel;
use CodeIgniter\API\ResponseTrait;
use \Hermawan\DataTables\DataTable;
use CodeIgniter\I18n\Time;

class Manager extends BaseController
{
    
    public function index()
    {
        helper(['form', 'url']);
        return view('Manager/ManagerEquipmentView');
    }
    
    public function getUser($id)
    {
        $json_data = $this->EquimentsModel->getEquipUser();
        echo json_encode($json_data);
    }

    public function searchUser()
    {
        $id = $this->request->getVar('userID');
        if($id==null)
            return null;
        $user=$this->ProfilesModel->getUser($id);
        $name=$this->$user['name'];
        $position_id=$user['position_id'];
        $department_id=$user['department_id'];
        $data_table=$this->EquimentsModel->getEquipUser();
        $data=[
            'name'=>$name,
            'position'=>$this->PositionsModel->getName($position_id),
            'department'=>$this->DepartmentsModel->getName($department_id),
            'data'=>$data_table
        ];
        echo json_encode($data);
        exit;
    }
    
}


