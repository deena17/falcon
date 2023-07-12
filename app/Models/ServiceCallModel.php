<?php

namespace App\Models;

use CodeIgniter\Model;

class ServiceCallModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'service_call';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'department_id',
        'call_number', 
        'call_date', 
        'call_time', 
        'customer_id', 
        'contact_name', 
        'contact_number', 
        'product_id', 
        'product_model_id', 
        'installation_date', 
        'expiry_date', 
        'service_type_id', 
        'complaint_nature', 
        'remarks', 
        'status_id', 
        'is_combined_call'
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

    public function generateCallNumber(){
        $result = $this->select('call_number')->orderBy('id DESC')->get()->getRow();
        $year = date("Y");
        if(empty($result)){
            return "CAL/00001/$year";
        }
        $split = explode("/", $result->call_number);
        $next_number = $split[1] + 1;
        if(strlen($next_number) == 1){
            $next_number = '0000'.$next_number;
        }
        if(strlen($next_number) == 2){
            $next_number = '000'.$next_number;
        }
        if(strlen($next_number) == 3){
            $next_number = '00'.$next_number;
        }
        if(strlen($next_number) == 4){
            $next_number = '0'.$next_number;
        }
        return "CAL/$next_number/$year";
    }

    public function customerCalls($customer){
        return $this->select('*')->where('customer_id', $customer)->get()->getResult();
    }
}
