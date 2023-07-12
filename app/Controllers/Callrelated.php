<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CallRelatedModel;

class Callrelated extends BaseController{

    public function index()
    {
        $model = new CallRelatedModel();
        $data = [
            'pageTitle' => 'Call Related',
            'designation' => $model->findAll()
        ];
        return view('master/callRelated', $data);
    }  
}
