<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\StatusModel;

class Status extends BaseController
{
    public function index()
    {
        $model = new StatusModel();
        $data = [
            'pageTitle' => 'Status',
        ];
        return view('master/status', $data);
    }  
}
