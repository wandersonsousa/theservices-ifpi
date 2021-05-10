<?php

namespace App\Controllers;

use App\Models\ServiceViewModel;

class Home extends BaseController
{
	public function index()
	{
		$data = array();
		$serviceModel = new ServiceViewModel();
		$data['services'] = $serviceModel->findAll();
		
		echo view('templates/header');
		echo view('pages/home', $data);
		echo view('templates/footer');
	}
}
