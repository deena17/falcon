<?php

    namespace App\Controllers;
    use App\Controllers\BaseController;

    class Home extends BaseController{

        public function __construct(){
            $this->ionAuth = new \App\Libraries\IonAuth();
        }

        public function index(){
            if (!$this->ionAuth->loggedIn())
            {
                return redirect()->to('/auth/login');
            }
        }
    }
