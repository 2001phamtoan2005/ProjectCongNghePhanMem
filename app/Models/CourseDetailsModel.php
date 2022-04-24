<?php

namespace App\Models;

use CodeIgniter\Model;

class CourseDetailsModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'course_details';
   

    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['course_id','profile_id','del_flag','updated_time','updated_user','created_time','created_user'];

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

    public function updatecursedetail($arraycoursedetail,$id){
        $this->db->transBegin();
        $this->db->table($this->table)->where($id )->update($arraycoursedetail);
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

    public function paticipantlist($id){
        $params['draw'] = $_REQUEST['draw'];
        $start = $_REQUEST['start'];
        $length = $_REQUEST['length'];
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
            $sort=' employeeid ';
        }
        else if($sortname=='3'){
            $sort=' coursename ';
        }
        else if($sortname=='4'){
            $sort=' start_date ';
        }
        else if($sortname=='5'){
            $sort=' end_date ';
        }
        else if($sortname=='6'){
            $sort=' weekdays ';
        }
        else if($sortname=='7'){
            $sort=' time ';
        }
        else if($sortname=='8'){
            $sort=' note ';
        }
        else if($sortname=='9'){
            $sort=' id ';
        }

        // count all data
        $total_count = $this->db->query("select @row := @row + 1 AS row, profiles.name  ,profiles.employee_id as 'employeeid', course.name as 'coursename' 
        ,course.start_date,course.end_date,course.weekdays,course.time,course.note ,course_details.id from course_details ,course,profiles, (SELECT @row := 0) r
        where course_details.del_flag = 0 and course_details.profile_id=profiles.id and course_details.course_id=course.id and course.id=$id ORDER BY $sort $sorttype ")->getResult();

        $data = $this->db->query("select @row := @row + 1 AS row, profiles.name  ,profiles.employee_id as 'employeeid', course.name as 'coursename' ,course.start_date,course.end_date,
        course.weekdays,course.time,course.note ,course_details.id from course_details ,course,profiles , (SELECT @row := 0) r
        where course_details.del_flag = 0 and course_details.profile_id=profiles.id and course_details.course_id=course.id and course.id=$id ORDER BY $sort $sorttype  limit  $start, $length")->getResult();
    
        $json_data = array(
            "draw" => intval($params['draw']),
            "recordsTotal" => count($total_count),
            "recordsFiltered" => count($total_count),
            "data" => $data   // total data array
        );
        return $json_data;
    }

    public function getprofileid($employeeid){
        
        return  $this->db->query(' select  * from profiles where employee_id ='. $employeeid)->getRow();
         
    }
    public function checkcoursedetail($datacheck){
        
        return $this->db->table($this->table)->select()->where($datacheck)->countAllResults();

    }
    public function addcoursedetail($arraycourse){
        $this->db->transBegin();
        $this->db->table($this->table)->insert($arraycourse);
        $this->primaryKey=$this->db->insertID();
        
        $this->db->transComplete();
        if($this->db->transStatus()==false){
            $this->db->transRollback();
            return 'false';
        }
        else{
            $this->db->transCommit();
            return 'true';
        }

    }

}
