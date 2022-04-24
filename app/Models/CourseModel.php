<?php

namespace App\Models;

use CodeIgniter\Model;
use PHPSQLParser\builders\Builder;
use PHPSQLParser\builders\InsertBuilder;
use PHPSQLParser\builders\InsertColumnListBuilder;

use function PHPSTORM_META\type;

class CourseModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'course';
   
    
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name','course_type','time','weekdays','start_date','end_date','note','del_flag','updated_time','updated_user','created_time','created_user'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    
    public function searchcourse($name,$Startfrom,$Endfrom,$Coursetype,$Startto,$Endto,$Weekdays,$Time){
       
      
        $search = ' where del_flag = 0 ';
        
        if(strlen($name) >0 ){
            $search .= '  and  name like "%' . $name .'%"';
        }
        
        if(strlen($Startfrom) >0 ){
          
            $search .=' and  start_date >= "'.$Startfrom. '"' ;
        }
       
        if(strlen($Endfrom) >0 ){
            
            $search .=' and end_date >= "'.$Endfrom. '"';
        }
       
        if(strlen($Startto) >0 ){
            
            $search .=' and  start_date <= "'.$Startto. '"';
        }
        
        if(strlen($Endto) >0 ){
           
            $search .= ' and  end_date <= "'.$Endto. '"';
        }
       
        if(strlen($Weekdays) >0 ){
            
            $search .= ' and weekdays ="'.$Weekdays.'"';
        }
       
        if(strlen($Time) >0 ){
            
            $search .= ' and time ="'.$Time.'"';
        }
        
        if(strlen($Coursetype) >0 ){
            
            $search .= ' and  course_type ="'.$Coursetype.'"';
        }
        $order = $_REQUEST['order'];
        $sortname=$order[0]['column'] ;
        $sorttype=$order[0]['dir'] ;
        $sort='raw';
        if($sortname=='0'){
            $sort=' row ';
        }
        else if($sortname=='1'){
            $sort=' name ';
        }
        else if($sortname=='2'){
            $sort=' course_type ';
        }
        else if($sortname=='3'){
            $sort=' start_date ';
        }
        else if($sortname=='4'){
            $sort=' end_date ';
        }
        else if($sortname=='5'){
            $sort=' weekdays ';
        }
        else if($sortname=='6'){
            $sort=' time ';
        }
        else if($sortname=='7'){
            $sort=' note ';
        }
        else if($sortname=='8'){
            $sort=' id ';
        }

        

        $params['draw'] = $_REQUEST['draw'];
        $start = $_REQUEST['start'];
        $length = $_REQUEST['length'];
         $total_count = $this->db->query("SELECT  @row := @row + 1 AS row, c.* from course c , (SELECT @row := 0) r $search ORDER BY $sort $sorttype ")->getResult();

        $data = $this->db->query("SELECT  @row := @row + 1 AS row, c.* from course c , (SELECT @row := 0) r $search ORDER BY $sort $sorttype limit $start, $length  ")->getResult();
    
    
        $json_data = array(
            "draw" => intval($params['draw']),
            "recordsTotal" => count($total_count),
            "recordsFiltered" => count($total_count),
            "data" => $data   // total data array
        );
        return $json_data;
        
        
         
    }
    public function addcourse($arraycourse){
        $this->db->transBegin();
        $this->db->table($this->table)->insert($arraycourse);
        $this->primaryKey=$this->db->insertID();
        
        $this->db->transComplete();
        if($this->db->transStatus()==false){
            $this->db->transRollback();
            return false;
        }
        else{
            $this->db->transCommit();
            return true;
        }

    }
    public function getdata($id){
        $data=$this->db->table($this->table)->where($id)->get(1)->getResult();
        return $data;
    }
    public function updatecurse($arraycourse,$id){
        $this->db->transBegin();
        $this->db->table($this->table)->where($id )->update($arraycourse);
        $this->primaryKey=$this->db->insertID();
        
        $this->db->transComplete();
        if($this->db->transStatus()==false){
            $this->db->transRollback();
            return false;
        }
        else{
            $this->db->transCommit();
            return true;
        }

        
        
    }

    //lay danh sach loai 
    public function getType()
        {
            $data=$this->db->query('SELECT name FROM `config` where name_type="course-type"'  )->getResultArray();        
            return $data;
        }

}
