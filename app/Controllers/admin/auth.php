<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        return view('admin/login');
    }


    public function doLogin()
    {
        $email = trim($this->request->getPost('email'));
        $password = trim($this->request->getPost('password'));

        $userModel = new \App\Models\UserModel();
        $user = $userModel->where('email', $email)->first();
    

        if ($user && password_verify($password, $user['password'])) {
            if ($user['status'] !== 'active') {
                return redirect()->back()->with('error', 'User is inactive.');
            }

            if ($user['role'] !== 'admin') {
                return redirect()->back()->with('error', 'Not an admin.');
            }

            session()->set('is_admin', true);
            session()->set('admin_user', $user);

            return redirect()->to('/admin/dashboard');
        }

        return redirect()->back()->with('error', 'Invalid email or password.');
    }


    public function logout()
    {
        session()->remove('is_admin');
        return redirect()->to('/admin/login');
    }
}
