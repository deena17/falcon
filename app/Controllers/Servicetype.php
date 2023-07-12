<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\ServiceTypeModel;

class Servicetype extends BaseController
{
    public function index()
    {
        $model = new ServiceTypeModel();
        $data = [
            'pageTitle' => 'Service Types',
        ];
        return view('master/serviceType', $data);
    }  
}