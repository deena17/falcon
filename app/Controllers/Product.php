<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\ProductModel;

class Product extends BaseController
{

    public $data = [];

    protected $helpers;

    protected $viewsFolder = '\App\Views\product';

    public function __construct(){
        $this->helpers = ['form', 'url'];
        $this->ionAuth = new \App\Libraries\IonAuth();
    }

    public function index()
    {
        if(!$this->ionAuth->checkPermission('view_master'));
        $model = new ProductModel();
        $data = [
                'pageTitle' => 'Products'
            ];
        return view('master/productList', $data);
    }

    public function addFlatKnitting(){
        $this->data['pageTitle'] = 'Add Flat Knitting';

        return view($this->viewsFolder .'/'.'flatknitting/add', $this->data);
    }

    public function addCircularKnitting(){
        $this->data['pageTitle'] = 'Add Circular Knitting';

        return view($this->viewsFolder .'/'.'circularknitting/add', $this->data);
    }

    public function addEmbroidery(){
        $this->data['pageTitle'] = 'Add Embroidery';

        return view($this->viewsFolder .'/'.'embroidery/add', $this->data);
    }
}