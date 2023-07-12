<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
	public $data = [];

	protected $viewsFiles;

	protected $ionAuth;

	public function __construct()
	{
		$this->viewsFiles = '\App\Views\dashboard';
		$this->ionAuth = new \App\Libraries\IonAuth();
	}

	public function index()
	{
		return redirect()->to('dashboard/admin');
	}

	public function admin()
	{
		$this->data['pageTitle'] = 'Dashboard';
		return view($this->viewsFiles.'/'.'admin');
	}

	public function engineer(){
		$this->data['pageTitle'] = 'Dashboard';
		return view('dashboard/engineer', $this->data);
	}


	protected function renderPage(string $view, $data = null, bool $returnHtml = true): string
	{
		$viewdata = $data ?: $this->data;

		$viewHtml = view($view, $viewdata);

		if ($returnHtml) {
			return $viewHtml;
		} else {
			echo $viewHtml;
		}
	}
}