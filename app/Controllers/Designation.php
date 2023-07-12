<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DesignationModel;

class Designation extends BaseController
{
    protected $modelName = 'App\Models\DesignationModel';

    public function index()
    {
        $model = new DesignationModel();
        $data = [
            'pageTitle' => 'Designations',
            'designation' => $model->findAll()
        ];
        return view('master/designation', $data);
    }   
}
