<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class UserController extends BaseController
{
    public function index()
    {
        $model = new \App\Models\UserModel();
        $data['user'] = $model->findAll();
        return $this->response->setJSON($data);
    }

    public function prosesRegister()
    {
        $model = new \App\Models\UserModel();
        $password = $this->request->getPost('password');
        if ($password) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        } else {
            $hashedPassword = password_hash('123456', PASSWORD_DEFAULT);
        }
        $data = [
            'nama_user' => $this->request->getPost('nama_user'),
            'telepon' => $this->request->getPost('telepon'),
            'email' => $this->request->getPost('email'),
            'username' => $this->request->getPost('username'),
            'password' => $hashedPassword,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'level' => 'ibu',
        ];
        $model->insert($data);
        session()->setFlashdata('success_register', 'Anda berhasil mendaftar');
        return redirect()->to('/login');
    }

    public function prosesLogin()
    {
        $model = new \App\Models\UserModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $data = $model->where('username', $username)->first();
        if ($data) {
            if (password_verify($password, $data['password'])) {
                session()->set('id_user', $data['id_user']);
                session()->set('nama_user', $data['nama_user']);
                session()->set('telepon', $data['telepon']);
                session()->set('email', $data['email']);
                session()->set('username', $data['username']);
                session()->set('level', $data['level']);

                if ($data['level'] == 'ibu') {
                    return redirect()->to('/user/dashboard');
                } elseif ($data['level'] == 'admin') {
                    return redirect()->to('/admin');
                }
            } else {
                $error = 'Incorrect password. Please try again.';
                // use flash data
                session()->setFlashdata('error_login', $error);
                return redirect()->to('/login');
            }
        } else {

            $error = 'Incorrect username. Please try again.';
            // use flash data
            session()->setFlashdata('error_login', $error);
            return redirect()->to('/login');
        }
        $error = 'Incorrect username. Please try again.';
        return view('login', ['error' => $error]);
    }
}
