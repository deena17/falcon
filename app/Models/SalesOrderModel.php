<?php

namespace App\Models;

use CodeIgniter\Model;

class SalesOrderModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'sales_order';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'customer_id',
        'order_number',
        'order_date',
        'due_date',
        'currency_id',
        'customer_name',
        'contact_number',
        'contact_landline',
        'street',
        'city',
        'district',
        'state',
        'pincode',
        'area',
        'total_amount',
        'discount',
        'grand_total',
        'status',
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

    public function generate_order_number(){
        $result = $this->select('order_number')->orderBy('id DESC')->get()->getRow();
        $year = date("Y");
        if(empty($result)){
            return "SAL/00001/$year";
        }
        $split = explode("/", $result->order_number);
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
        return "SAL/$next_number/$year";
    }
}
