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
		if($this->request->getGet('report')){
			session()->setFlashdata('info', 'O relatório semanal foi entregue.');
		}
		echo view('templates/header');
		echo view('pages/home', $data);
		echo view('templates/footer');
	}
}
