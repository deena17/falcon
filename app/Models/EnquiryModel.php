<?php

namespace App\Models;

use CodeIgniter\Model;

class EnquiryModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'enquiry';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'customer_id',
        'enquiry_number',
        'enquiry_date',
        'department_id',
        'customer_name',
        'contact_number',
        'contact_landline',
        'street',
        'city',
        'district',
        'state',
        'pincode',
        'area',
        'distance',
        'from_time',
        'to_time',
        'marketing_reference',
        'travelling_kms',
        'forward_to',
        'status',
        'customer_type',
        'remarks',
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

    public function generateEnquiryNumber(){
        $result = $this->select('enquiry_number')->orderBy('id DESC')->get()->getRow();
        $year = date("Y");
        if(empty($result)){
            return "ENQ/00001/$year";
        }
        $split = explode("/", $result->enquiry_number);
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
        return "ENQ/$next_number/$year";
    }

    public function enquiry_detail($customer=null){
        if(empty($customer)){
            $result = $this->select('enquiry.id, enquiry_number, enquiry_date, customer_name, d.name as department_name, s.status')
                    ->join('mst_department as d', "enquiry.department_id=d.id")
                    ->join('mst_status as s', "enquiry.status=s.id")
                    ->where('enquiry.display', 'Y')
                    ->get()->getResult();
        }
        else{
            $result = $this->select('enquiry.id, enquiry_number, enquiry_date, customer_name, d.name as department_name, s.status')
                    ->join('mst_department as d', "enquiry.department_id=d.id")
                    ->join('mst_status as s', "enquiry.status=s.id")
                    ->where('enquiry.display', 'Y')
                    ->where("customer_id = $customer")
                    ->get()->getResult();
        }
        return $result;
    }
}
