<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProjectModel;
use App\Models\UserModel;

class ProjectController extends BaseController
{
    protected $projectModel;
    protected $userModel;

    public function __construct()
    {
        $this->projectModel = new ProjectModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $projects = $this->projectModel
                        ->select('projects.*, users.name as head_name')
                        ->join('users', 'users.id = projects.project_head')
                        ->findAll();

        return view('admin/projects/index', compact('projects'));
    }

    public function create()
    {
        $employees = $this->userModel->where('role !=', 'admin')->findAll();
        return view('admin/projects/create', compact('employees'));
    }

    public function store()
    {
        $data = $this->request->getPost();
        $this->projectModel->save($data);

        return redirect()->to('/admin/projects')->with('success', 'Project Created');
    }

    public function edit($id)
    {
        $project = $this->projectModel->find($id);
        $employees = $this->userModel->where('role !=', 'admin')->findAll();
        return view('admin/projects/edit', compact('project', 'employees'));
    }

    public function update($id)
    {
        $data = $this->request->getPost();
        $this->projectModel->update($id, $data);

        return redirect()->to('/admin/projects')->with('success', 'Project Updated');
    }

    public function delete($id)
    {
        $this->projectModel->delete($id);
        return redirect()->to('/admin/projects')->with('success', 'Project Deleted');
    }
}
