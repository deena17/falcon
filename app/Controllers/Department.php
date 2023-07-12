<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DepartmentModel;

class Department extends BaseController
{
    
    public function __construct(){
        $this->ionAuth    = new \App\Libraries\IonAuth();
        $this->session    = \Config\Services::session();
    }

    public function index()
    {
        $userId = $this->session->get('user_id');

        if(!$this->ionAuth->checkPermission($userId, 'view_master')){
            return view('auth/403', ['pageTitle' => 'Access Denied']);
        }
        else{
            $model = new DepartmentModel();
            $data = [
                'pageTitle' => 'Departments',
                'department' => $model->findAll()
            ];
            return view('master/department', $data);
        }
    }
}