<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\InvoiceStatusModel;

class Invoicestatus extends BaseController
{
    public function index()
    {
        $model = new InvoiceStatusModel();
        $data = [
            'pageTitle' => 'Invoice Status',
        ];
        return view('master/invoiceStatus', $data);
    }  
}
