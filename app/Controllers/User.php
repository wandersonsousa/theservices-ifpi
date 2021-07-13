<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    public function index()
    {
        return redirect()->to("login");
    }

    public function register()
    {
        $this->logout();
        $data = array();
        helper(['form', 'my_password']);

        if ($this->request->getMethod() == "post") {
            $rules = [
                "email" => "required|min_length[3]|max_length[50]|valid_email|is_unique[user.user_email]",
                "name" => "required|min_length[2]|max_length[50]",
                'cep' => 'required|min_length[8]|string',
                'is_premium' => 'permit_empty',
                "password" => "required|min_length[4]|max_length[50]",
            ];

            if ($this->validate($rules)) {
                $userModel = new UserModel();
                $newUser = [
                    "user_name" => $this->request->getPost("name"),
                    "user_email" => $this->request->getPost("email"),
                    'cep' => $this->request->getPost('cep'),
                    'is_premium' => intval($this->request->getPost('is_premium')),
                    "user_password" => $this->request->getPost("password"),
                ];
                $userModel->insert($newUser);

                $user = $userModel->getUserByLogin($newUser);
                $this->setLoggedUserSession($user);

                return redirect()->to("/");
            }
        }

        $data['validation'] = $this->validator;
        echo view('templates/header_login');
        echo view('pages/register', $data);
    }

    public function login()
    {
        $data = array();
        helper(['form']);
        if ($this->request->getMethod() == "post") {
            $userModel = new UserModel();

            $loginData = [
                "user_name" => $this->request->getPost("name"),
                "user_email" => $this->request->getPost("email"),
                "user_password" => $this->request->getPost("password"),
            ];
            
            $user = $userModel->getUserByLogin($loginData);
            if ($user) {
                $this->setLoggedUserSession($user);
                return redirect()->to("/");
            } else {
                session()->setFlashdata("fail", "Usuário ou senha inválidos");
            }
        }
        echo view('templates/header_login');
        echo view('pages/login');
    }

    public function update()
    {
        $data = array();
        helper(['form', 'my_password']);

        $userModel = new UserModel();
        $user = $userModel->find(session()->get('user_id'));

        if ($this->request->getMethod() == "post") {
            $is_unique_email = '';
            if (!$user['user_email'] == strval($this->request->getPost("email")))
                $is_unique_email = '|is_unique[user.user_email]';

            $rules = [
                "email" => "required|min_length[3]|max_length[50]|valid_email" . $is_unique_email,
                "name" => "required|min_length[2]|max_length[50]"
            ];

            if ($this->validate($rules)) {
                $newUser = [
                    "user_name" => $this->request->getPost("name"),
                    "user_email" => $this->request->getPost("email")
                ];
                $userModel->update(session()->get('user_id'), $newUser);

                $this->setLoggedUserSession($userModel->find(session()->get('user_id')));

                return redirect()->to("/");
            }
        }

        $data['user'] = $user;
        $data['validation'] = $this->validator;
        echo view('templates/header');
        echo view('pages/profileUpdate', $data);
        echo view('templates/footer');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }

    private function setLoggedUserSession(array $userData)
    {
        $session = session();
        $sessionData = [
            "user_name" => $userData["user_name"],
            "user_email" => $userData["user_email"],
            "is_full" => $userData["is_full"],
            "is_premium" => $userData["is_premium"],
            "logged_in" => true
        ];
        if (isset($userData["id_user"])) {
            $sessionData["user_id"] = $userData["id_user"];
        }
        return $session->set($sessionData);
    }
}
