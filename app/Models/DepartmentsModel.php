<?php

namespace App\Models;

use CodeIgniter\Model;

class DepartmentsModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'departments';
    
    

    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name','short_name','note','del_flag','updated_time','updated_user','created_time','created_user'];

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

    public function getNameByID($id){
        // count all data
        $builder = $this->db->table($this->table);

        $builder->select('id,name');
        $builder->where('id',$id);
        $result = $builder->get();
        $data = $result->getResultArray();
        return $data[0]['name'];
        
    }
    //get Name Department //writer Dai
    public function getAll(){
        // count all data
        $builder = $this->db->table($this->table);
        $builder->select('id,name');
        $result = $builder->get();
        $data = $result->getResultArray();
        return $data;
    }
    //tim kiem Department
    public function searchDepartment($name,$short_name,$start,$length)
    {   
        $builder = $this->db->table($this->table);

        $builder->select('id, name, short_name, note');
        $builder->where('del_flag',0);
        $builder->orderBy('created_time','esc',);
        $recordsTotal = $builder->countAllResults(false);
        
        if (!empty($name))
        {
            $builder->like('name', $name);
        }
        if (!empty($short_name)) {
            $builder->like('short_name', $short_name);
        }
        
        $builder->limit($length, $start);
  

        $result = $builder->get();
       
        $recordsFiltered = $builder->countAllResults(false);
        $data = $result->getResultArray();

        
        return [
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $data,
        ];
    }
    public function addDepartment($arraycourse){
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
    public function editDepartment ($data,$id){
        
        $query = $this->db->table('Departments')->update($data, array('id' => $id));
        return $query;

    }
}
