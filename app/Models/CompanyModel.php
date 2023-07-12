<?php

namespace App\Models;

use CodeIgniter\Model;

class CompanyModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'mst_company';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'name',
        'phone',
        'landline',
        'street',
        'city',
        'district',
        'state',
        'pincode',
        'email',
        'website',
        'pan_number',
        'gst_number',
        'logo', 
        'is_active'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'name' => 'required',
        'phone' => 'required',
        'landline' => 'required',
        'street' => 'required',
        'city' => 'required',
        'district' => 'required',
        'state' => 'required',
        'pincode' => 'required|max_length[6]',
        'email' => 'required|valid_email',
        'website' => 'required',
        'pan_number' => 'required|max_length[10]',
        'gst_number' => 'required',
        'logo' => 'required', 
    ];
    protected $validationMessages   = [
        'name' => [
            'required' => 'Company Name required',
        ],
        'phone' => [
            'required' => 'Phone number required',
        ],
        'landline' => [
            'required' => 'Landline number required',
        ],
        'street' => [
            'required' => 'Street name required',
        ],
        'city' => [
            'required' => 'City name required'
        ],
        'district' => [
            'required' => 'District name required'
        ],
        'state' => [
            'required' => 'State name required'
        ],
        'pincode' => [
            'required' => 'Pincode required',
            'max_length' => 'Pincode should be 6 characters length'
        ],
        'email' => [
            'required' => 'E-Mail required',
            'valid_email' => 'Enter valid email address'
        ],
        'website' => [
            'required' => 'Website required'
        ],
        'pan_number' => [
            'required' => 'PAN number required',
            'max_length' => 'PAN number should be 10 charecters length'
        ],
        'gst_number' => [
            'required' => 'GST number required'
        ],
        'logo' => [
            'required' => 'Logo required'
        ], 
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
}
