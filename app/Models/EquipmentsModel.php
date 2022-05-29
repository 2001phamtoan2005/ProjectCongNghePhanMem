<?php

namespace App\Models;

use CodeIgniter\Model;

class EquipmentsModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'equipments';

  


    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['equipment_id','profile_id','type_id','name','manufacture_id','purchase_date','warranty_period','series','position','note','img','del_flag','updated_time','updated_user','created_time','created_user','status'];

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

    public function gettypeequipment(){
        $data=$this->db->query('SELECT name FROM `equipments` group by name'  )->getResultArray();        
        return $data;
    }
    public function getmanufacture(){
        $data=$this->db->table('manufacturer')->get()->getResult();
        return $data;
    }
    public function searchequipment($name,$Equipmenttype,$manufacture,$status,$start,$length)
    {   
        $builder = $this->db->table($this->table);
        $builder->select('id, equipment_id, profile_id, name, manufacture_id, purchase_date, warranty_period,series,status,note');
        $builder->where('del_flag',0);
        $builder->orderBy('created_time','desc',);
        $recordsTotal = $builder->countAllResults(false);
        if (!empty($name))
        {
            $builder->like('name', $name);
        }
        if (!empty($Equipmenttype)) {
            $builder->like('type_id', $Equipmenttype);
        }
        if (!empty($manufacture)) {            
                $builder->like('manufacture_id', $manufacture);
        }
        if (!empty($status)) {            
            $builder->like('status', $status);
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
    public function addequipment($arraycourse){
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
        $data=$this->db->query('SELECT  equipments.*, profiles.employee_id from equipments,profiles ' )->getResult();
        return $data;
    }
    public function updateequipment($array,$id){
        $this->db->transBegin();
        $this->db->table($this->table)->where($id )->update($array);
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
    public function getdataemployee($key){
        if(strlen($key)==0){
            $data=$this->db->query('SELECT   profiles.employee_id as "value" , profiles.name as "label"   from profiles '  )->getResult();
     
        }
        else{
            $data=$this->db->query('SELECT    profiles.employee_id as "value" , profiles.name as "label"  from profiles where  name like "%'.$key.'%" or employee_id  like "%'.$key.'%"'  )->getResult();
    
        }
        return $data;
    }
    
    public function getUsingEquipment()
    {
        $data=$this->db->query('SELECT count(*) as "value",YEAR(created_time) as "label"  FROM `equipments` WHERE status="using" GROUP by YEAR(created_time)'  )->getResult();        
        return $data;
    }

    public function getLaptop($year)
    {
        if($year=='All')
            $data=$this->db->query('SELECT count(*) as "value",series as "label"  FROM `equipments` WHERE name="laptop" GROUP by series'  )->getResult();        
        else
        $data=$this->db->query('SELECT count(*) as "value",series as "label"  FROM `equipments` WHERE name="laptop" and YEAR(created_time)='.$year.' GROUP by series'  )->getResult();
            return $data;
    }
    
    public function getPC($year)
    {
        if($year=='All')
            $data=$this->db->query('SELECT count(*) as "value",series as "label"  FROM `equipments` WHERE name="pc" GROUP by series'  )->getResult();        
        else
        $data=$this->db->query('SELECT count(*) as "value",series as "label"  FROM `equipments` WHERE name="pc" and YEAR(created_time)='.$year.' GROUP by series'  )->getResult();        
        return $data;
    }

    public function getMonitor($year)
    {
        if($year=='All')
            $data=$this->db->query('SELECT count(*) as "value",series as "label"  FROM `equipments` WHERE name="monitor" GROUP by series'  )->getResult();        
        else
        $data=$this->db->query('SELECT count(*) as "value",series as "label"  FROM `equipments` WHERE name="monitor" and YEAR(created_time)='.$year.' GROUP by series'  )->getResult();        
        return $data;
    }
    
    public function getYear()
    {
        $data=$this->db->query('SELECT YEAR(created_time) as "label"  FROM `equipments` GROUP BY YEAR(created_time) ORDER BY YEAR(created_time) '  )->getResultArray();        
        return $data;
    }
    public function getName()
    {
        $data=$this->db->query('SELECT `name` FROM `equipments` group by name'  )->getResultArray();        
        return $data;
    }
    public function getTotal()
    {
        $data=$this->db->query('SELECT count(name) as `total` FROM `equipments` GROUP by name'  )->getResultArray();        
        return $data;
    }
    public function getOld()
    {
        $data=$this->db->query('SELECT name,count(*) as `total` FROM `equipments` where  YEAR(created_time)<year(curdate())-1 group  by name'  )->getResultArray();        
        return $data;
    }
    public function getNew()
    {
        $data=$this->db->query('SELECT name,count(*) as `total` FROM `equipments` where  YEAR(created_time)>=year(curdate())-1 group  by name'  )->getResultArray();        
        return $data;
    }
    public function getUse()
    {
        $data=$this->db->query('SELECT name,count(*) as `total` FROM `equipments` where status="using" group  by name'  )->getResultArray();        
        return $data;
    }
    public function getEquipInYear($year,$name)
    {
        $data=$this->db->query('SELECT count(*) as `total` FROM `equipments` where year(created_time)="'.$year.'" and name="'.$name.'" '  )->getResultArray();        
        return $data;
    }

    public function getEquipUser($id)
    {
        $data=$data=$this->db->query('SELECT equipment_id,name,note FROM `equipments` WHERE profile_id='.$id  )->getResultArray();        
        return $data;
    }

    public function getEquipNoUser()
    {
        $data=$data=$this->db->query('SELECT equipment_id,name,note FROM `equipments` WHERE profile_id is NULL'  )->getResultArray();        
        return $data;
    }

    public function addUserToEquip($data,$id)
    {
        $query = $this->db->table('equipments')->update($data, array('equipment_id' => $id));
        return $query;
    }

    


}
