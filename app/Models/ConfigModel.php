<?php

namespace App\Models;

use CodeIgniter\Model;

class ConfigModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'config';
  


    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name','short_name','name_type','id_type_child','note','del_flag','updated_time','updated_user','created_time','created_user'];

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
    
    //tim kiem
    public function searchconfig($name,$short_name,$type,$start,$length)
    {   
        $builder = $this->db->table($this->table);
        $builder->select('id, name, short_name, name_type, id_type_child, note');
        $builder->where('del_flag',0);
        $builder->orderBy('created_time','desc',);
        $recordsTotal = $builder->countAllResults(false);
        if (!empty($name))
        {
            $builder->like('name', $name);
        }
        if (!empty($short_name)) {
            $builder->like('short_name', $short_name);
        }
        if (!empty($type)) {            
                $builder->like('name_type', $type);
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
    public function addconfig($array){
        $this->db->transBegin();
        $this->db->table($this->table)->insert($array);
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
    public function editconfig ($data,$id){
        
        $query = $this->db->table('config')->update($data, array('id' => $id));
        return $query;

    }

    public function exportExcel($input)
    {
        

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
    public function countID($type)
    {
        $builder = $this->db->table($this->table);
        $builder->select('id');
        $builder->where('name_type',$type);
        $result = $builder->get();

        $data = $result->getResultArray();
        return $data;

    }

    public function gettype($key){
        
        $builder = $this->db->table($this->table);
        $builder->select('name_type');
        if($key!='all')       
            $builder->like('name_type',$key);
        $builder->groupBy('name_type');
        $result = $builder->get();
        $data= $result->getResultArray();        
        return $data;
    }
    public function typelist($key)
    {
        if(strlen($key)==0){
            $data=$this->db->query('SELECT   config.id as "value" , config.name_type as "label"   from config group by name_type'  )->getResult();

        }
        else{
            $data=$this->db->query('SELECT    config.id as "value" , config.name_type as "label"  from config where  name_type like "%'.$key.'%"  group by name_type '  )->getResult();

        }
        return $data;
    }

    public function typelistforchart()
    {
        
        $data=$this->db->query('SELECT count(*) as "value",YEAR(created_time) as "label"  FROM `equipments` WHERE 1 GROUP by YEAR(created_time)'  )->getResult();        
        return $data;
    }
    //lay danh sach status cua equipment
    public function getStatusEquip()
    {
        $data=$this->db->query('SELECT name FROM `config` WHERE name_type="equipment-status"'  )->getResultArray();        
        return $data;
    }

}

