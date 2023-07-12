<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PermissionModel;

class Permission extends BaseController
{
    public function index()
    {
        $model = new PermissionModel();
        $data = [
            'pageTitle' => 'Permissions',
        ];
        return view('auth/permission', $data);
    }
}