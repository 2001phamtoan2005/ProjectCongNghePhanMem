<?php

namespace App\Controllers;
use app\Models\DepartmentsModel;
use CodeIgniter\API\ResponseTrait;
use \Hermawan\DataTables\DataTable;
use CodeIgniter\I18n\Time;

class Department extends BaseController
{
    public function index()
    {
        helper(['form', 'url']);

        $input = $this->request->getVar();
        $data = [
            "input" => $input,
        ];
        return view('Department/department', $data);
    }
    
    public function getAllDepartment()
    {
        $json_data = $this->DepartmentsModel->getFullNameDepartment();
        echo json_encode($json_data);
    }
    //redirect to /Department with data search 
    public function searchDepartment()
    {
        
        $name = $this->request->getVar('name');
        $short_name= $this->request->getVar('short_name');
        $start = $this->request->getVar('start');
        $length = $this->request->getVar('length');
        $json_data= $this->DepartmentsModel->searchDepartment($name,$short_name,$start,$length);

        echo json_encode($json_data);
    }
    //redirect to view create Department
    //-> cancel, use modal to create new Department
    public function createDepartment()
    {
        helper(['form', 'url']);
        return view('Master/CreateDepartment');
    }
    //create new Department modal
    public function addDepartment()
    {
            $name = $this->request->getPost('addname');
            if($name=="")
            {
                echo "Please enter name Department!";
                exit;
            }
            else
            {
                $model=new DepartmentsModel();
                $createarray= array(
                    'name' => $this->request->getPost('addname'),
                    'short_name'  => $this->request->getPost('addshort_name'),
                    'note'  => $this->request->getPost('addnote'),         
                    'del_flag'=>0,
                    'updated_time'=>null,
                    'updated_user'=>null,
                    'created_time'=>Time::now()->toDateTimeString(),
                    'created_user'=>session()->get('users')['id']
                );
                $model->addDepartment($createarray);
                session()->setFlashdata('success', 'Success! edit completed.');
                echo "ok";
                exit;
            }
        
    }
    //edit Department use modal
    public function editDepartment ()
    {
        $model=new DepartmentsModel();
        $id = $this->request->getPost('id');
        $edit= array(
            'name' => $this->request->getPost('name'),
            'short_name'  => $this->request->getPost('short_name'),
            'note'  => $this->request->getPost('note'),         
            'updated_time'=>Time::now()->toDateTimeString(),
            'updated_user'=>session()->get('users')['id'],
         );
         $model->editDepartment($edit,$id);
         return redirect()->to('/Department');
    }
    //delete Department use modal 
    public function deleteDepartment()
    {
        $model=new DepartmentsModel();
        $id = $this->request->getPost('id');
        $edit=array(
            'del_flag' => 1,
            'updated_time'=>Time::now()->toDateTimeString(),
            'updated_user'=>session()->get('users')['id'],
        );
        $model->editDepartment($edit,$id);
         return redirect()->to('/Department');
    }

    public function getName($id)
    {
        $data=$data=$this->db->query('SELECT name FROM `departments` WHERE id='.$id  )->getResultArray();        
        return $data;
    }

}

