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
    public function gettypeequipment(){
        $data=$this->db->query('SELECT name FROM `equipments` group by name'  )->getResultArray();        
        return $data;
    }
    public function getmanufacture(){
        $data=$this->db->table('manufacturer')->get()->getResult();
        return $data;
    }
    public function searchequipment($name,$purchasedatefrom,$warrantyperiodfrom,$Equipmenttype,$purchasedateto,$warrantyperiodto,$series,$position,$manufacture,$status){
       
       
        $search = ' where type_equiments.id=equipments.type_id and profiles.id=equipments.profile_id and equipments.del_flag = 0 and manufacturer.id=equipments.manufacture_id ';
        
        if(strlen($name) >0 ){
            $search .= '  and  equipments.name like "%' . $name .'%"';
        }
        
        if(strlen($purchasedatefrom) >0 ){
          
            $search .=' and  equipments.purchase_date >= "'.$purchasedatefrom.'"' ;
        }
        if(strlen($manufacture) >0 ){
          
            $search .=' and  manufacturer.id = '.$manufacture ;
        }
        
       
        if(strlen($warrantyperiodfrom) >0 ){
            
            $search .=' and equipments.warranty_period >= " '.$warrantyperiodfrom.'"';
        }
       
        if(strlen($purchasedateto) >0 ){
            
            $search .=' and equipments.purchase_date <= " '.$purchasedateto.'"';
        }
        
        if(strlen($warrantyperiodto) >0 ){
           
            $search .= ' and  equipments.warranty_period <= " '.$warrantyperiodto.'"';
        }
       
        if(strlen($series) >0 ){
            
            $search .= ' and equipments.series ="'.$series.'"';
        }
       
        if(strlen($position) >0 ){
            
            $search .= ' and equipments.position ="'.$position.'"';
        }
        
        if(strlen($Equipmenttype) >0 ){
            
            $search .= ' and  equipments.type_id ="'.$Equipmenttype.'"';
        }
        if(strlen($status) >0 ){
            
            $search .= ' and  equipments.status ="'.$status.'"';
        }
        $order = $_REQUEST['order'];
        $sortname=$order[0]['column'] ;
        $sorttype=$order[0]['dir'] ;
        $sort='row';
        if($sortname=='0'){
            $sort=' row ';
        }
        else if($sortname=='1'){
            $sort=' equipments.name ';
        }
        else if($sortname=='2'){
            $sort=' type_equiments.name ';
        }
        else if($sortname=='3'){
            $sort=' equipments.img ';
        }
        else if($sortname=='4'){
            $sort=' manufacturer.name ';
        }
        else if($sortname=='5'){
            $sort=' profiles.name ';
        }
        else if($sortname=='6'){
            $sort=' equipments.purchase_date ';
        }
        else if($sortname=='7'){
            $sort=' equipments.warranty_period ';
        }
        else if($sortname=='8'){
            $sort=' equipments.series ';
        }
        else if($sortname=='9'){
            $sort=' equipments.position ';
        }
        else if($sortname=='10'){
            $sort=' equipments.note ';
        }
        else if($sortname=='11'){
            $sort=' equipments.id ';
        }
        else if($sortname=='12'){
            $sort=' equipments.status ';
        }

        $params['draw'] = $_REQUEST['draw'];
        $start = $_REQUEST['start'];
        $length = $_REQUEST['length'];
         $total_count = $this->db->query("SELECT  @row := @row + 1 AS row,equipments.id , equipments.name,type_equiments.name as 'Equipmenttype',equipments.img ,profiles.name as 'profilename' , manufacturer.name  as 'manufacturer' ,equipments.purchase_date,equipments.warranty_period,equipments.series,equipments.position,equipments.note from equipments  , (SELECT @row := 0) r ,profiles ,type_equiments,manufacturer  $search ORDER BY $sort $sorttype ")->getResult();

        $data = $this->db->query("SELECT  @row := @row + 1 AS row,equipments.id , equipments.name,type_equiments.name as 'Equipmenttype'  ,equipments.img ,profiles.name as 'profilename' , manufacturer.name  as 'manufacturer' ,equipments.purchase_date,equipments.warranty_period,equipments.series,equipments.position,equipments.note from equipments  , (SELECT @row := 0) r ,profiles ,type_equiments,manufacturer   $search ORDER BY $sort $sorttype limit $start, $length  ")->getResult();
        // print_r("SELECT  @row := @row + 1 AS row,equipments.id , equipments.name,type_equiments.name as 'Equipmenttype'  ,equipments.img ,profiles.name as 'profilename' , manufacturer.name  as 'manufacturer' ,equipments.purchase_date,equipments.warranty_period,equipments.series,equipments.position,equipments.note from equipments  , (SELECT @row := 0) r ,profiles ,type_equiments,manufacturer   $search ORDER BY $sort $sorttype limit $start, $length  ");
    
        $json_data = array(
            "draw" => intval($params['draw']),
            "recordsTotal" => count($total_count),
            "recordsFiltered" => count($total_count),
            "data" => $data   // total data array
        );
        return $json_data; 
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
