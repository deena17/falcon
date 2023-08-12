<?php

namespace App\Models;

use CodeIgniter\Model;

class CallModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'customer_calls';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['customer_id', 'call_date', 'call_time', 'description', 'call_type_id', 'related'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
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

    public function get_calls(){
        $result = $this->select('call_number, call_date, c.customer_name, complaint_nature')
                ->join('customer as c', "service_call.customer_id=service_call.id")
                ->get()->getResult();
    }

    public function customer_calls($customer){
        
    }

}