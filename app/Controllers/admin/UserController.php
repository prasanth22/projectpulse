<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\UserModel;

class UserController extends BaseController
{
    public function index()
    {
        if (!session()->get('is_admin')) return redirect()->to('/admin/login');

        $userModel = new UserModel();
        $users = $userModel->findAll();
        //dd($users); // For debugging, remove in production
        return view('admin/users', ['users' => $users]);
    }

    public function blockUser($id)
    {
        $userModel = new UserModel();
        $userModel->update($id, ['status' => 'blocked']);
        return redirect()->to('/admin/users')->with('success', 'User blocked');
    }

    public function activateUser($id)
    {
        $userModel = new UserModel();
        $userModel->update($id, ['status' => 'active']);
        return redirect()->to('/admin/users')->with('success', 'User activated');
    }
}
