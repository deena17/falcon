<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\CurrencyModel;

class Currency extends BaseController
{
    public function index()
    {
        $model = new CurrencyModel();
        $data = [
            'pageTitle' => 'Currency',
        ];
        return view('master/currency', $data);
    }  
}
