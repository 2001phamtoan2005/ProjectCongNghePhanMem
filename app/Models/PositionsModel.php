<?php

namespace App\Models;

use CodeIgniter\Model;

class PositionsModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'positions';
  


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

    public function __construct()
    {
        parent::__construct();
        try{
            $this->db = \Config\Database::connect();
        }catch(\Exception $e){
            log_message('error', '[ERROR] {exception}', ['exception' => $e]);
        }
    }

    public function positionlist(){
        // count all data
        $builder = $this->db->table($this->table);

        $builder->select('id, name, short_name, note');
        $builder->where('del_flag',0);
        $recordsTotal = $builder->countAllResults(false);
        $result = $builder->get();
        $recordsFiltered = $builder->countAllResults(false);
        $data = $result->getResultArray();
        return [
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $data,
        ];
        
    }
    //get Name Position //writer Dai
    public function getAll(){
        // count all data
        $builder = $this->db->table($this->table);
        $builder->select('id,name');
        $result = $builder->get();
        $data = $result->getResultArray();
        return $data;
    }
    //writer Dai
    public function getNameByID($id){
        // count all data
        $builder = $this->db->table($this->table);

        $builder->select('name');
        $builder->where('id',$id);
        $result = $builder->get();
        $data = $result->getResultArray();
        return $data[0]['name'];
        
    }

   
    
    //tim kiem position
    public function searchposition($name,$short_name,$start,$length)
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

        // if (isset($status)) {
        //     $builder->where('status', $status);
        // }
  

        $result = $builder->get();
       
        $recordsFiltered = $builder->countAllResults(false);
        $data = $result->getResultArray();

        
        return [
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $data,
        ];
    }
    public function addposition($arraycourse){
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
    public function editposition ($data,$id){
        $query = $this->db->table('positions')->update($data, array('id' => $id));
        return $query;

    }

    public function exportExcel($input)
    {
        $positionModel = new PositionsModel();

        $builder = $this->db->table($this->table);

        $builder->select('id, name, short_name, note');
        $builder->where('del_flag', 0);
        $recordsTotal = $builder->countAllResults(false);

        if (!empty($input['name'])) {
            $builder->like('name', $input['name']);
        }
        if (!empty($input['short_name'])) {
            $builder->where('short_name', $input['short_name']);
        }

        $result = $builder->get();

        $recordsFiltered = $builder->countAllResults(false);

        $data = $result->getResultArray();
        
        return  $data;

    }

}

