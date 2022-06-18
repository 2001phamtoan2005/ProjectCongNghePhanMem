<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\Exceptions\DatabaseException;
class ProfilesModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'profiles';
    protected $table_user       = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'employee_id', 'name', 'email', 'birthday', 'position_id', 'department_id', 'status', 'address',
        'telephone', 'mobile', 'official_date', 'probation_date', 'gender', 'image', 'del_flag', 'updated_time', 'updated_user', 'created_time', 'created_user'
    ];

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

    //
    protected $defaultImageBase64 = "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"; 

    public function __construct()
    {
        parent::__construct();
        try {
            $this->db = \Config\Database::connect();
        } catch (\Exception $e) {
            log_message('error', '[ERROR] {exception}', ['exception' => $e]);
        }
    }
    /**
     * Count all Data
     * 
     */
    public function userlist()
    {
        $builder = $this->db->table($this->table);

        $builder->select('id,name, gender,birthday, email,employee_id,position_id,department_id,official_date, image,probation_date, status');
        $builder->where('del_flag', 0);
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


    /**
     * Search AJAX
     * 
     */
    public function searchAJAX($input)
    {
        $positionModel = new PositionsModel();
        $departmentModel = new DepartmentsModel();

        $builder = $this->db->table($this->table);

        $builder->select('id, name, gender,birthday, email,employee_id,position_id,department_id,official_date, image,probation_date, status');
        $builder->where('del_flag', 0);
        $recordsTotal = $builder->countAllResults(false);

        if (!empty($input['name'])) {
            $builder->like('name', $input['name']);
        }
        if (!empty($input['email'])) {
            $builder->where('email', $input['email']);
        }

        if (!empty($input['id'])) {
            $builder->where('id', $input['id']);
        }

        if (!empty($input['position_id'])) {
            $builder->where('position_id', $input['position_id']);
        }

        if (!empty($input['department_id'])) {
            $builder->where('department_id', $input['department_id']);
        }

 
        foreach ($input['orders'] as $key => $value) {
            if (isset($input['orders'][$key])) {
                $builder->orderBy($key,($value)?'ASC':'DESC');
            }
        }


        $builder->limit($input['length'], $input['start']);

        $result = $builder->get();

        $recordsFiltered = $builder->countAllResults(false);
 
        $data = $result->getResultArray();

        

        foreach ($data as $key => $value) {
            $data[$key]["image"] = 'data:image/png;base64,'.((!empty($data[$key]["image"]))?base64_encode($data[$key]["image"]):$this->defaultImageBase64);
            $data[$key]['position_name'] = $positionModel->getNameByID($data[$key]['position_id']);
            $data[$key]['department_name'] = $departmentModel->getNameByID($data[$key]['department_id']);
        }
        return [
            'draw' => $input['draw'],
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $data,
        ];
    }
    
    public function create($input,$user){
        try {
                $this->db->transBegin();
                $profile = $this->db->table($this->table);
                $profile->insert($input);
                if($this->db->affectedRows() > 0){
                    $users = $this->db->table($this->table_user);
                    $users ->insert($user);
                    if($this->db->affectedRows() > 0){
                        log_message('info', "[SUCCESS] --> Use function: {function}.\n Query: {last_query}.\n update by --> {id}", ['function' => __FUNCTION__, 'last_query' => $this->db->getLastQuery(),'id' =>  session()->get('users') ? session()->get('users')['login_id']:'']);  
                        $this->db->transCommit();
                        return true;
                    }
                    
                }
            
        $this->db->transRollback();
        return false; 
    }catch(DatabaseException $db_e){
        $query = $this->db->getLastQuery();
        log_message('error', '[ERROR] --> Use function: {function}. {exception} '."\n".'[MYSQL] "{query}"', ['exception' => $db_e,'function' => __FUNCTION__,'query' => $query]);
        $this->db->transRollback();
        
        return false;
    } catch (\Exception $e) {
        $query = $this->db->getLastQuery();
        log_message('error', '[ERROR] --> Use function: {function}. {exception} '."\n".'[MYSQL] "{query}"', ['exception' => $e,'function' => __FUNCTION__,'query' => $query]);
        
        return false;
    }
    }

    /**
     * Count data by $id
     * 
     */
    public function getDataByID($id){
        $builder = $this->db->table($this->table);

        $builder->select('id,name, gender,birthday, email,employee_id,position_id,department_id,official_date, image,telephone,mobile,probation_date,address, status');
        $builder->where('id',$id);
        $result = $builder->get();
        $data = $result->getResult();
        return $data;
        
    }

    /**
     * Update by $id
     * 
     */
    public function updateById($id,$input){
        try {
                $this->db->transBegin();
                $profile = $this->db->table($this->table);
                $profile->where('id', $id);
                $profile->update($input);
                if($this->db->affectedRows() > 0){
                    $this->db->transCommit();
                    log_message('info', "[SUCCESS] --> Use function: {function}.\n Query: {last_query}.\n update by --> {id}", ['function' => __FUNCTION__, 'last_query' => $this->db->getLastQuery(),'id' =>  session()->get('users') ? session()->get('users')['login_id']:'']); 
                    return true;
                }
            $this->db->transRollback();
            return false; 
        }catch(DatabaseException $db_e){
            $query = $this->db->getLastQuery();
            log_message('error', '[ERROR] --> Use function: {function}. {exception} '."\n".'[MYSQL] "{query}"', ['exception' => $db_e,'function' => __FUNCTION__,'query' => $query]);
            $this->db->transRollback();
            
            return false;
        } catch (\Exception $e) {
            $query = $this->db->getLastQuery();
            log_message('error', '[ERROR] --> Use function: {function}. {exception} '."\n".'[MYSQL] "{query}"', ['exception' => $e,'function' => __FUNCTION__,'query' => $query]);
            
            return false;
        }
    }

    public function deleteById($id){
        try {
            
            $data = [
                "del_flag" => 1,
            ];
            $this->db->transBegin();
            $profile = $this->db->table($this->table);
            $profile->where('id', $id);
            $profile->update($data);
            // $login = $this->db->table($this->table);
            // $login->where('profile_id', $id);
            // $login->update($data);
            if($this->db->affectedRows() > 0){
                log_message('info', "[SUCCESS] --> Use function: {function}.\n Query: {last_query}.\n update by --> {id}", ['function' => __FUNCTION__, 'last_query' => $this->db->getLastQuery(),'id' =>  session()->get('users') ? session()->get('users')['login_id']:'']); 
                $this->db->transCommit();
                return true;
            }
            $this->db->transRollback();
            return false; 
        }catch(DatabaseException $db_e){
            $query = $this->db->getLastQuery();
            log_message('error', '[ERROR] --> Use function: {function}. {exception} '."\n".'[MYSQL] "{query}"', ['exception' => $db_e,'function' => __FUNCTION__,'query' => $query]);
            $this->db->transRollback();
            
            return false;
        } catch (\Exception $e) {
            $query = $this->db->getLastQuery();
            log_message('error', '[ERROR] --> Use function: {function}. {exception} '."\n".'[MYSQL] "{query}"', ['exception' => $e,'function' => __FUNCTION__,'query' => $query]);
            
            return false;
        }
    }

    public function getUser($id)
    {
        $data=$this->db->query('SELECT name, position_id, department_id FROM `profiles` WHERE employee_id='.$id  )->getResultArray();        
        return $data;
    }
}