<?php

namespace App\Models;

use CodeIgniter\Model;

class QuotationModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'quotation';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'customer_id',
        'quotation_number',
        'quotation_date',
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

    public function generate_quotation_number(){
        $result = $this->select('quotation_number')->orderBy('id DESC')->get()->getRow();
        $year = date("Y");
        if(empty($result)){
            return "QUO/00001/$year";
        }
        $split = explode("/", $result->quotation_number);
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
        return "QUO/$next_number/$year";
    }
}
