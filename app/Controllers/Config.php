<?php

namespace App\Controllers;

use App\Models\ConfigModel;
//use CodeIgniter\Model\ConfigModel;
use \Hermawan\DataTables\DataTable;
use Box\Spout\Writer\WriterFactory;
use Box\Spout\Common\Type;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;

use CodeIgniter\I18n\Time;
use Kint\Zval\Value;

class Config extends BaseController
{
    //show view 
    public function index()
    {
        helper(['form', 'url']);
        $model= new ConfigModel();
        $type =$model->gettype('');
        $input = $this->request->getVar();
        $data = [
            "input" => $input,
            "type" => $type,
        ];
        $name = $this->request->getVar('name');
        $short_name= $this->request->getVar('short_name');
        $type= $this->request->getVar('type');
        $session = session();
        $search_data = [
            
            'name' => $name,
            'short_name' => $short_name,
            'type' => $type
        ];
        $session->set('search',$search_data); 
        return view('Config/config', $data);
    }
    //get list 
    public function configList()
    {
        $json_data= $this->ConfigModel->configlist();
        echo json_encode($json_data);
    }
    //redirect to /config with data search 
    public function searchconfig()
    {
        $model=new ConfigModel();
        $name = $this->request->getVar('name');
        $short_name= $this->request->getVar('short_name');
        $type= $this->request->getVar('type');
        $start = $this->request->getVar('start');
        $length = $this->request->getVar('length');
        $json_data= $model->searchconfig($name,$short_name,$type,$start,$length);
        
        echo json_encode($json_data);        
    }    
    
    //create new modal
    public function addconfig()
    {
        
        $model=new ConfigModel();
           
            $name = $this->request->getPost('addname');
            if($name=="")
            {
                echo "Please enter name config!";
                exit;
            }
            else
            {               
                $model=new ConfigModel();
                $data=$model->countID($this->request->getPost('typeid'));   
                $typelist=$model->gettype($this->request->getPost('typeid'));
                //echo ($typelist[0]['name_type']);               
                //exit;
                if(count($typelist)>0)
                {
                     $id_child=count($data)+1;                     
                }
                else
                {
                    $id_child=1;       
                }      
                $createarray= array(
                    'name' => $this->request->getPost('addname'),
                    'short_name'  => $this->request->getPost('addshort_name'),
                    'name_type'=> $this->request->getPost('typeid'),
                    'id_type_child'=>$id_child,                    
                    //'id_type_child'=>$this->$model->countID($this->request->getPost('configtype'))+1,
                    'note'  => $this->request->getPost('addnote'),         
                    'del_flag'=>0,
                    'updated_time'=>null,
                    'updated_user'=>null,
                    'created_time'=>Time::now()->toDateTimeString(),
                    'created_user'=>session()->get('users')['id']
                );
                
                $model->addconfig($createarray);
                //session()->setFlashdata('successedit', 'Success! edit completed.');
                
                echo "ok";
                exit;
            }
        
    }
    //edit config use modal
    public function editconfig ()
    {
        $model=new ConfigModel();
        $id = $this->request->getPost('id');
        $edit= array(
            'name' => $this->request->getPost('name'),
            'short_name'  => $this->request->getPost('short_name'),
            'note'  => $this->request->getPost('note'), 
            'updated_time'=>Time::now()->toDateTimeString(),
            'updated_user'=>session()->get('users')['id'],        
            
         );
         
         $model->editconfig($edit,$id);
         return redirect()->to('/config');
    }
    //delete config use modal 
    public function deleteconfig()
    {
        $model=new ConfigModel();
        $id = $this->request->getPost('id');
        $edit=array(
            'del_flag' => 1,
            'updated_time'=>Time::now()->toDateTimeString(),
            'updated_user'=>session()->get('users')['id'],
        );
        $model->editconfig($edit,$id);
         return redirect()->to('/config');
    }
    public function export()
    {
        $model=new ConfigModel();
        helper(['form', 'url']);
        $name = $this->request->getVar('name');
        $short_name = $this->request->getVar('short_name');

        $input = [            
            'name' => $name,
            'short_name' => $short_name,
        ];
        $datas = $model->exportExcel($input);

        $fileName = 'config.xlsx';  
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Id');
        $sheet->setCellValue('B1', 'Name');
        $sheet->setCellValue('C1', 'Short Name');
        $sheet->setCellValue('D1', 'Note');
        $sheet->getStyle('A1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('00BFFF');
        $sheet->getStyle('B1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('00BFFF');
        $sheet->getStyle('C1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('00BFFF');
        $sheet->getStyle('D1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('00BFFF');
             
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

    //lay danh sach loai config
    public function gettype()
    {
        $model=new ConfigModel();
        $s=$model->typelist(trim($_GET['key']));
        
        return json_encode($s);
    }
    
}

