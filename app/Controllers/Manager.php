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

        $id=1;
        $user=$this->ProfilesModel->getUser($id);
        // echo json_encode($user);
        // exit;
        //$name=$this->$user['name'];
        //$position_id=$user['position_id'];
        //$department_id=$user['department_id'];
        //$data_table=$this->EquimentsModel->getEquipUser();
        $type=$this->EquipmentsModel->getName();
        $data_equip=$this->EquipmentsModel->getEquipNoUser();
        $data=[
            'id'=>$id,
            'name'=>$user[0]['name'],
            'position'=>$this->PositionsModel->getName($user[0]['position_id']),
            'department'=>$this->DepartmentsModel->getName($user[0]['department_id']),
            'data'=>$this->EquipmentsModel->getEquipUser($id),
            "type"=>$type,
            "data_equip"=>$data_equip,
        ];
        // echo json_encode($data);
        // exit;
        return view('Manager/ManagerEquipmentView',$data);
    }
    
    public function getUser($id)
    {
        $json_data = $this->EquimentsModel->getEquipUser($id);
        echo json_encode($json_data);
    }

    public function searchUser()
    {
        //return view('Manager/ManagerEquipmentView');
        $id = $this->request->getPost('userID');
        echo json_encode($id);
        exit;
        if($id==null)
            return null;
        $user=$this->ProfilesModel->getUser($id);
        $name=$this->$user['name'];
        $position_id=$user['position_id'];
        $department_id=$user['department_id'];
        $data_table=$this->EquimentsModel->getEquipUser();
        $data=[
            'id'=>$id,
            'name'=>$name,
            'position'=>$this->PositionsModel->getName($position_id),
            'department'=>$this->DepartmentsModel->getName($department_id),
            'data'=>$data_table
        ];
        return view('Manager/ManagerEquipmentView',$data);
        
    }
    public function addEquip()
    {
        //kiem tra da nhap nguoi truoc khi add chua
        $name = $this->request->getPost('iduser');
            if($name=="")
            {
                echo "Please enter user!";
                exit;
            }
        $id = $this->request->getPost('id');
        $data=array(
            'profile_id'=>$name,
            'updated_time'=>Time::now()->toDateTimeString(),
            'updated_user'=>session()->get('users')['id'],
        );
        // echo json_encode($data);
        // echo json_encode($id);
        // exit;
        $model= new EquipmentsModel();
        $model->addUserToEquip($data,$id);
        return redirect()->to('/manager');
    }

    public function reomveEquip()
    {
        //kiem tra da nhap nguoi truoc khi add chua
        $name = $this->request->getPost('iduser');
        
            if($name=="")
            {
                echo "Please enter user!";
                exit;
            }
        $id = $this->request->getPost('id');
        $data=array(
            'profile_id'=>null,
            'updated_time'=>Time::now()->toDateTimeString(),
            'updated_user'=>session()->get('users')['id'],
        );
        
        $model= new EquipmentsModel();
        $model->addUserToEquip($data,$id);
        return redirect()->to('/manager');
    }
    
}


