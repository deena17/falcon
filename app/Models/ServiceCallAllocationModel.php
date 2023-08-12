<?php

namespace App\Models;

use CodeIgniter\Model;

class ServiceCallAllocationModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'service_call_allocation';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'call_id',
        'engineer_id',
        'due_date', 
        'remarks', 
        'created_by',
        'updated_by',
        'display'
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

    public function customer_calls($customer){
        return $this->select('*')->where('customer_id', $customer)->get()->getResult();
    }

    public function get_calls($allocate_status=0){
        return $result = $this->select('call_number, call_date, service_call.contact_number, customer.customer_name, complaint_nature, service_call.id')
                ->join('customer', "service_call.customer_id=customer.id")
                ->where('service_call.allocate_status', $allocate_status)
                ->get()->getResult();
    }

    public function get_call_detail($call){
        return $result = $this->select('
                    call_number, 
                    call_date, 
                    service_call.contact_number, 
                    service_call.contact_name, 
                    customer.customer_name, 
                    complaint_nature, 
                    service_call.id, 
                    mst_department.name,
                    service_call.remarks,
                    service_call.installation_date
                ')
                ->join('customer', "service_call.customer_id=customer.id")
                ->join('mst_department', "service_call.department_id=mst_department.id")
                ->where('service_call.id', $call)
                ->get()->getRow();
    }
}
