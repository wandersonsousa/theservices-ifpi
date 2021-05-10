<?php

namespace App\Controllers;

use App\Models\ServiceViewModel;
use App\Models\ServiceModel;

class Service extends BaseController
{
	public function index($id)
	{
		$data['id'] = $id;
		$serviceModel = new ServiceViewModel();
		$data['service'] = $serviceModel->find($id);

		echo view('templates/header');
		echo view('pages/service_detail', $data);
		echo view('templates/footer');
	}

	public function listAll()
	{
		$data = array();
		$serviceModel = new ServiceViewModel();
		$data['services'] = $serviceModel->findAll();
		
		echo view('templates/header');
		echo view('pages/home', $data);
		echo view('templates/footer');
	}

	public function newService()
	{
		$data = array();
		helper(['form']);

		if ($this->request->getMethod() == 'post') {
			$rules = [
				'name' => 'required|min_length[5]|max_length[45]|string',
				'description' => 'required|min_length[20]|max_length[255]|string',
				'price' => 'required|numeric',
				'service-img' => [
					'rules' => 'uploaded[service-img]|max_size[service-img,2000]|is_image[service-img]',
					'errors' => [
						'is_image' => 'O arquivo enviado não é uma imagem válida.'
					]
				],
			];

			if ($this->validate($rules)) {
				$serviceModel = new ServiceModel();

				$serviceImgFile = $this->request->getFile('service-img');
				$newFileName = $serviceImgFile->getRandomName();
				$serviceImgFile->move('uploads/img/services', $newFileName);

				$userId = intval(session()->get('user_id'));
				$newService = [
					'service_name' => $this->request->getPost('name'),
					'service_description' => $this->request->getPost('description'),
					'service_price' => $this->request->getPost('price'),
					'id_user' => $userId,
					'service_img' => $newFileName
				];

				$serviceModel->insert($newService);
				session()->setFlashdata('success', 'serviço publicado com sucesso.');
				return redirect()->to('/');
			}
		}
		$data['validation'] = $this->validator;
		echo view('templates/header');
		echo view('pages/newService', $data);
		echo view('templates/footer');
	}

	public function delete(){
		$data = array();
		if ($this->request->getMethod() == 'post') {
			$serviceModel = new ServiceModel();
			$serviceModel->delete($this->request->getPost('id'));

			session()->setFlashdata('success', 'serviço excluido com sucesso.');
			return redirect()->to('/');
		}else{
			return redirect()->to('/');
		}

	}

	public function updateService($id)
	{
		$data = array();
		
		helper(['form']);

		if ($this->request->getMethod() == 'post') {
			$rules = [
				'name' => 'required|min_length[5]|max_length[45]|string',
				'description' => 'required|min_length[20]|max_length[255]|string',
				'price' => 'required|numeric',
				'service-img' => [
					'rules' => 'uploaded[service-img]|max_size[service-img,2000]|is_image[service-img]',
					'errors' => [
						'is_image' => 'O arquivo enviado não é uma imagem válida.'
					]
				],
			];
			$isValidImgFile = $this->request->getFile('service-img')->isValid();
			if (!$isValidImgFile) {
				unset($rules['service-img']);
			}


			if ($this->validate($rules)) {
				$serviceModel = new ServiceModel();

				$userId = intval(session()->get('user_id'));
				$serviceImgFile = $this->request->getFile('service-img');
				$newFileName = $serviceImgFile->getRandomName();

				$newService = [
					'id_service' => $id,
					'service_name' => $this->request->getPost('name'),
					'service_description' => $this->request->getPost('description'),
					'service_price' => $this->request->getPost('price'),
					'id_user' => $userId,
					'service_img' => $newFileName
				];

				if (!$isValidImgFile) {
					unset($newService['service_img']);
				} else {
					$serviceImgFile->move('uploads/img/services', $newFileName, true);
				}

				$userId = intval(session()->get('user_id'));
				$serviceModel->save($newService);

				return redirect()->to('/');
			}
		}
		$serviceModel = new ServiceViewModel();
		$data['service'] = $serviceModel->find($id);
		
		if( intval($data['service']['id_user']) !== intval(session()->get('user_id')) ) return redirect()->to('/');

		$data['validation'] = $this->validator;
		echo view('templates/header');
		echo view('pages/updateService', $data);
		echo view('templates/footer');
	}


	public function myServices(){
		$data = array();
		$serviceModel = new ServiceViewModel();

		$data['services'] = $serviceModel->where('id_user', session()->get('user_id'))->findAll();

		echo view('templates/header');
		echo view('pages/listServices', $data);
		echo view('templates/footer');
	}
}
