<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\ProductModel;

class Product extends BaseController
{
    public function index()
    {
        $model = new ProductModel();
        $data = [
                'pageTitle' => 'Products'
            ];
        return view('master/productList', $data);
    }
}