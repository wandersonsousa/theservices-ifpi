<?php

namespace App\Controllers;

use App\Models\ServiceViewModel;

class Errors extends BaseController
{
	public function premium_only()
	{
		$data = array();
		$serviceModel = new ServiceViewModel();
		$data['services'] = $serviceModel->findAll();
		
		return view('templates/header');
	}
}
