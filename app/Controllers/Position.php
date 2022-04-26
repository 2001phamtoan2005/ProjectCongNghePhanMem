<?php

namespace App\Controllers;

use App\Models\PositionsModel;
use CodeIgniter\Model\PositonModel;
use \Hermawan\DataTables\DataTable;
use Box\Spout\Writer\WriterFactory;
use Box\Spout\Common\Type;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;

class Position extends BaseController
{
    //show view position
    public function index()
    {
        helper(['form', 'url']);

        $input = $this->request->getVar();
        $data = [
            "input" => $input,
        ];
        return view('Master/Position', $data);
    }
    //get list position
    public function positionList()
    {
        $json_data= $this->PositionsModel->positionlist();
        echo json_encode($json_data);
    }
    //redirect to /position with data search 
    public function searchposition()
    {
        
        $name = $this->request->getVar('name');
        $short_name= $this->request->getVar('short_name');
        $start = $this->request->getVar('start');
        $length = $this->request->getVar('length');
        $json_data= $this->PositionsModel->searchposition($name,$short_name,$start,$length);

        echo json_encode($json_data);
    }
    //redirect to view create position
    //-> cancel, use modal to create new position
    public function createposition()
    {
        helper(['form', 'url']);
        return view('Master/Createposition');
    }

    public function getALL(){
        $json_data= $this->PositionsModel->getAll();

        echo json_encode($json_data);
    }
    
    
    //create new position modal
    public function addposition()
    {
        
            $name = $this->request->getPost('addname');
            if($name=="")
            {
                echo "Please enter name position!";
                exit;
            }
            else
            {
                $model=new PositionsModel();
                $createarray= array(
                    'name' => $this->request->getPost('addname'),
                    'short_name'  => $this->request->getPost('addshort_name'),
                    'note'  => $this->request->getPost('addnote'),         
                    'del_flag'=>0,
                    'updated_time'=>null,
                    'updated_user'=>null,
                    'created_time'=>date('m/d/Y h:i:s a', time()),
                    'created_user'=>session()->get('users')['id']
                );
                $model->addposition($createarray);
                //session()->setFlashdata('successedit', 'Success! edit completed.');
                echo "ok";
                exit;
            }
        
    }
    //edit position use modal
    public function editposition ()
    {
        $model=new PositionsModel();
        $id = $this->request->getPost('id');
        $edit= array(
            'name' => $this->request->getPost('name'),
            'short_name'  => $this->request->getPost('short_name'),
            'note'  => $this->request->getPost('note'), 
            'updated_time'=>date('m/d/Y h:i:s a', time()),
            'updated_user'=>session()->get('users')['id'],        
            
         );
         $model->editposition($edit,$id);
         return redirect()->to('/position');
    }
    //delete position use modal 
    public function deleteposition()
    {
        $model=new PositionsModel();
        $id = $this->request->getPost('id');
        $edit=array(
            'del_flag' => 1,
            'updated_time'=>date('m/d/Y h:i:s a', time()),
            'updated_user'=>session()->get('users')['id'],
        );
        $model->editposition($edit,$id);
         return redirect()->to('/position');
    }
    public function export()
    {
        helper(['form', 'url']);
        $name = $this->request->getVar('name');
        $short_name = $this->request->getVar('short_name');

        $input = [            
            'name' => $name,
            'short_name' => $short_name,
        ];
        $datas = $this->PositionsModel->exportExcel($input);

        $fileName = 'position.xlsx';  
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Id');
        $sheet->setCellValue('B1', 'Name');
        $sheet->setCellValue('C1', 'Short Name');
        $sheet->setCellValue('D1', 'Note');
             
        $rows = 2;
        foreach ($datas as $val){
            $sheet->setCellValue('A' . $rows, $val['id']);
            $sheet->setCellValue('B' . $rows, $val['name']);
            $sheet->setCellValue('C' . $rows, $val['short_name']);
            $sheet->setCellValue('D' . $rows, $val['note']);          
            $rows++;
        } 
        
        $writer = new Xlsx($spreadsheet);
        $writer->save($fileName);
         header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'. urlencode($fileName).'"');
        header('Content-Type: application/vnd.ms-excel');
        header("Content-Disposition: attachment; filename=".$fileName);
        $writer->save("php://output");
        exit;
    }

    public function getName($id)
    {
        $data=$data=$this->db->query('SELECT name FROM `positions` WHERE id='.$id  )->getResultArray();        
        return $data;
    }
    
}

