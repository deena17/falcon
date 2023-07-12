<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\BusinessTypeModel;

class Businesstype extends BaseController
{

    public function __construct(){
        $this->ionAuth    = new \App\Libraries\IonAuth();
        $this->session    = \Config\Services::session();
    }

    public function index()
    {
        $userId = $this->session->get('user_id');

        if(!$this->ionAuth->checkPermission($userId, 'view_master')){
            return view('auth/403',['pageTitle' => 'Access Denined']);
        }
        else{
            $model = new BusinessTypeModel();
            $data = [
                    'types' => $model->findAll(),
                    'pageTitle' => 'Business Types'
                ];
            return view('master/businessType', $data);
        }
    }
}