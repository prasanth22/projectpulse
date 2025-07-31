<?php

namespace App\Controllers;

use App\Models\ProjectModel;
use App\Models\PostModel;

use App\Controllers\BaseController;


class ProjectsController extends BaseController
{
    public function index()
    {
        $projectModel = new ProjectModel();
        //$data['projects'] = $projectModel->findAll();
        $data['projects_with_post_c'] = $projectModel->getProjectsWithPostCount();

        // echo '<pre>';
        // print_r($data['projects']);
        // echo '</pre>';
        // exit;

        return $this->renderView('projects/index', [
            'projects_with_post_c' => $data['projects_with_post_c']
        ]);
    }

    public function view($projectId)
    {
        $projectModel = new ProjectModel();
        $postModel = new PostModel();

        $project = $projectModel->find($projectId);
        $posts = $postModel
                    ->where('project_id', $projectId)
                    ->orderBy('created_at', 'DESC')
                    ->findAll();

        if (!$project) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Project with ID $projectId not found");
        }

        return $this->renderProjectView('projects/view', [
            'project' => $project,
            'posts' => $posts
        ]);
    }
}
