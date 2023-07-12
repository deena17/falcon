<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\CallTypeModel;

class Calltype extends BaseController
{
    public function index()
    {
        $model = new CallTypeModel();
        $data = [
            'pageTitle' => 'Call Types',
        ];
        return view('master/callType', $data);
    }  
}
