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
    protected $allowedFields    = ['customer_id', 'call_date', 'call_time', 'description', 'call_type', 'related'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'customer_id' => 'required',
        'call_date' => 'required',
        'call_time' => 'required',
        'description' => 'required',
        'call_type' => 'required',
        'related' => 'related'
    ];
    protected $validationMessages   = [
        'cusotmer_id' => [
            'required' => 'Customer name required'
        ],
        'call_date' => [
            'required' => 'Call date required'
        ],
        'call_time' => [
            'required' => 'Call time required'
        ],
        'description' => [
            'required' => 'Description required'
        ],
        'call_type' => [
            'required' => 'Call type required'
        ],
        'related' => [
            'required' => 'Call related required'
        ]
    ];
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

    // public function findAll($limit=0, $offset=0){
    //     $result = array();
    //     $calls = $this->get()->getResult();
    //     foreach($calls as $c):
    //         $result['call'] = $this->where('id', $c->id)->get()->getResult();
    //         $result['customer'] => 
    //     endforeach;
    //     return $calls;
    // }

}