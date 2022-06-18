<?php

namespace App\Controllers;
use app\Models\EquipmentsModel;
use app\Models\ProfilesModel;
use CodeIgniter\API\ResponseTrait;
use \Hermawan\DataTables\DataTable;
use CodeIgniter\I18n\Time;
use PHPUnit\Util\Xml\Validator;

class Manager extends BaseController
{
    
    public function index()
    {
        helper(['form', 'url']);
        $type=$this->EquipmentsModel->getName();
        $data_equip=$this->EquipmentsModel->getEquipNoUser();
        $dataNull=[
            'id'=>'',
            'name'=>'',
            'position'=>'',
            'department'=>'',
            'data'=>null,
            "type"=>$type,
            "data_equip"=>$data_equip,
        ];
        // echo json_encode($data);
        // exit;
        return  view('Manager/ManagerEquipmentView',$dataNull);
    }
    
    public function getUser($id)
    {
        $json_data = $this->EquimentsModel->getEquipUser($id);
        echo json_encode($json_data);
    }

    public function searchUser()
    {
        $id = $this->request->getPost('userID');
        // echo json_encode($id);
        // exit;
        $session = session();
        $type=$this->EquipmentsModel->getName();
        $data_equip=$this->EquipmentsModel->getEquipNoUser();
        if($id==null)
        {
            $session->setFlashdata('msgNull', 'Please enter ID User!');
            //return view('Manager/ManagerEquipmentView',$dataNull);
            return redirect()->to('/manager');
        }
        if(!is_numeric($id))
        {
            $session->setFlashdata('msgNull', 'Value must be a number!');
            //return view('Manager/ManagerEquipmentView',$dataNull);
            return redirect()->to('/manager');
        }
        $user=$this->ProfilesModel->getUser($id);
        if($user==null)
        {
            $session->setFlashdata('msgNull', 'User ID is incorrect!');
            //return view('Manager/ManagerEquipmentView',$dataNull);
            return redirect()->to('/manager');
        }
        $position=$this->PositionsModel->getName($user[0]['position_id']);
        $department=$this->DepartmentsModel->getName($user[0]['department_id']);
        $data=[
            'id'=>$id,
            'name'=>$user[0]['name'],
            'position'=>$position[0]['name'],
            'department'=>$department[0]['name'],
            'data'=>$this->EquipmentsModel->getEquipUser($id),
            "type"=>$type,
            "data_equip"=>$data_equip,
        ];
        // echo json_encode($data);
        // exit;
        return view('Manager/ManagerEquipmentView',$data);
    }

    public function addEquip()
    {
        //kiem tra da nhap nguoi truoc khi add chua
        $name = $this->request->getPost('iduser');
        $result="ok";
        if($name=="")
        {
            $result="Please enter user!";
            return $result;
            
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
        $result="ok";
        if($name=="")
        {
            $result="Please enter user!";
            return $result;
            
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


