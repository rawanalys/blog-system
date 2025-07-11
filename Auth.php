<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends BaseController
{
    public function index()
    {
        return view('auth/login');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function save()
    {
        $userModel = new \App\Models\UserModel();

        $data = [
            'name'       => $this->request->getPost('name'),
            'email'      => $this->request->getPost('email'),
            'password'   => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'created_at' => date('Y-m-d H:i:s')
        ];

        $userModel->insert($data);

        return redirect()->to('/auth')->with('success', 'Registered successfully. Please login.');
    }

    public function login()
    {
        $session = session();
        $model = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $data = $model->where('email', $email)->first();

        if ($data) {
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);

            if ($authenticatePassword) {
                $sessionData = [
                    'id'       => $data['id'],
                    'name'     => $data['name'],
                    'email'    => $data['email'],
                    'loggedIn' => true,
                ];
                session()->regenerate();
                $session->set($sessionData);
                return redirect()->to('/dashboard'); 
            } else {
                return redirect()->back()->with('error', 'Incorrect email or password.');
            }
        } else {
            return redirect()->back()->with('error', 'Email not found.');
        }
    }

    // public function logout()
    // {
    //     session()->destroy();
    //     return redirect()->to('/auth');
    // }

    public function getFrontend()
    {
        return redirect()->to('/');
    }
}