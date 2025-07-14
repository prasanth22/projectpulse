<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\ProjectModel;
use App\Models\UserModel;

class Dashboard extends BaseController
{
    public function index()
    {
        if (!session()->get('is_admin')) {
            return redirect()->to('/admin/login');
        }

        $projectModel = new ProjectModel();
        $userModel = new UserModel();

        $data = [
            'projectCount' => $projectModel->countAll(),
            'userCount'    => $userModel->where('role !=', 'admin')->countAllResults(),
            'recentProjects' => $projectModel->orderBy('id', 'DESC')->limit(5)->findAll(),
        ];

        return view('admin/dashboard', $data);
    }
}
