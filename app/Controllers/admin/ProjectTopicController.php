<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProjectTopicModel;
use App\Models\UserModel;

class ProjectTopicController extends BaseController
{
    protected $projectTopicModel;
    protected $userModel;

    public function __construct()
    {
        $this->projectTopicModel = new ProjectTopicModel();
        $this->userModel = new UserModel();
    }

   public function index()
    {
        // Fetch Projects (with real head names)
        $projects = $this->projectTopicModel
            ->where('type', 'project')
            ->select('projects_topics.*, users.name as head_name')
            ->join('users', 'users.id = projects_topics.project_head')
            ->findAll();

        // Fetch Topics (assume project_head is always admin)
        $topics = $this->projectTopicModel
            ->where('type', 'topic')
            ->select('projects_topics.*, users.name as head_name')
            ->join('users', 'users.id = projects_topics.project_head')
            ->findAll();

        return view('admin/projects_topics/index', compact('projects', 'topics'));
    }


    public function create()
    {
        $employees = $this->userModel->where('role !=', 'admin')->findAll();
        return view('admin/projects_topics/create', compact('employees'));
    }

    public function store()
    {
        $data = $this->request->getPost();

        // Validate common fields
        if (empty($data['type']) || empty($data['name']) || empty($data['description'])) {
            return redirect()->back()->withInput()->with('error', 'All fields are required.');
        }

        // Set project_head based on type
        if ($data['type'] === 'project') {
            if (empty($data['project_head'])) {
                return redirect()->back()->withInput()->with('error', 'Please select a project head.');
            }
        } else {
            // topic: force admin (id=1) as project_head
            $data['project_head'] = 1;
        }

        // Save the data to DB
        $this->projectTopicModel->save([
            'name'        => $data['name'],
            'type'         => $data['type'],
            'description'  => $data['description'],
            'project_head' => $data['project_head'],
        ]);

        $msg = ucfirst($data['type']) . ' Created Successfully!';
        return redirect()->to('/admin/projects_topics')->with('success', $msg);
    }


    public function edit($id)
    {
        $project = $this->projectTopicModel->find($id);
        $employees = $this->userModel->where('role !=', 'admin')->findAll();
        return view('admin/projects_topics/edit', compact('project', 'employees'));
    }

    public function update($id)
    {
        $data = $this->request->getPost();
        //$data['type'] = 'project'; // preserve project type

        // print_r($data); // Debugging line, remove in production
        // exit;

        $this->projectTopicModel->update($id, $data);

        $msg = ucfirst($data['type']) . ' Updated Successfully!';

        return redirect()->to('/admin/projects_topics')->with('success', $msg);
    }

    public function delete($id)
    {
        $item = $this->projectTopicModel->find($id);

        if (!$item) {
            return redirect()->to('/admin/projects_topics')->with('error', 'Record not found.');
        }

        $this->projectTopicModel->delete($id);

        $msg = ($item['type'] === 'topic') ? 'Topic Deleted' : 'Project Deleted';

        return redirect()->to('/admin/projects_topics')->with('success', $msg);
    }

}
