<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\ProjectTopicModel;
use App\Models\UserModel;

class Dashboard extends BaseController
{
    public function index()
    {
        if (!session()->get('is_admin')) {
            return redirect()->to('/')->with('error', 'Unauthorized access.');
        }

        $project_topic_Model = new ProjectTopicModel();
        $userModel = new UserModel();

        $data = [
            'projectCount' => $project_topic_Model->where('type', 'project')->countAllResults(),
            'topicCount'   => $project_topic_Model->where('type', 'topic')->countAllResults(),
            'userCount'    => $userModel->where('role !=', 'admin')->countAllResults(),
            'recentProjects' => $project_topic_Model->orderBy('id', 'DESC')->limit(5)->findAll(),
        ];

        return view('admin/dashboard', $data);
    }
}
