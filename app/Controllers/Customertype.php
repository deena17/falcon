<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\CustomerTypeModel;

class Customertype extends BaseController
{
    public function index()
    {
        $model = new CustomerTypeModel();
        $data = [
            'pageTitle' => 'Currency',
        ];
        return view('master/customerType', $data);
    }  
}
