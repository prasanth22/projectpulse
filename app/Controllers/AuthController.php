<?php

namespace App\Controllers;

use App\Models\User;

class AuthController extends BaseController
{
    // public function register()
    // {
    //     return view('auth/register');
    // }

    public function registerSubmit()
    {
        $userModel = new User();

        $data = [
            'name'     => $this->request->getPost('name'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'     => 'employee'
        ];

        $userModel->insert($data);

        return redirect()->to('/');
    }

    // public function login()
    // {
    //     return view('auth/login');
    // }

    public function loginSubmit()
    {
        $userModel = new User();
        $user = $userModel->where('email', $this->request->getPost('email'))->first();

        if ($user && password_verify($this->request->getPost('password'), $user['password'])) {
            session()->set('user', [
                'id'    => $user['id'],
                'role'  => $user['role']
            ]);

            if($user['role'] === 'admin') {
                session()->set('is_admin', true);
                return redirect()->to('/admin/dashboard');
            }else{
                return redirect()->to('/home');
            }
        }

        return redirect()->back()->with('error', 'Invalid credentials');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
