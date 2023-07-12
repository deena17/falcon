<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\PaymentMethodModel;

class Paymentmethod extends BaseController
{
    public function index()
    {
        $model = new PaymentMethodModel();
        $data = [
            'pageTitle' => 'Payment Methods',
        ];
        return view('master/paymentMethod', $data);
    }  
}
