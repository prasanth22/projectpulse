<?php

namespace App\Controllers;

use App\Models\ProjectTopicModel;
use App\Models\PostModel;

use App\Controllers\BaseController;


class TopicsController extends BaseController
{
    public function index()
    {
        $project_topicModel = new ProjectTopicModel();
        //$data['projects'] = $projectModel->findAll();
        $data['topics_with_post_c'] = $project_topicModel->getTopicsWithPostCount();

        // echo '<pre>';
        // print_r($data['projects']);
        // echo '</pre>';
        // exit;

        return $this->renderView('topics/index', [
            'projects_with_post_c' => $data['topics_with_post_c']
        ]);
    }

    public function view($projectId)
    {
        $projecttopicModel = new ProjectTopicModel();
        $postModel = new PostModel();

        $topic = $projecttopicModel->find($projectId);
        $posts = $postModel
                    ->where('project_topic_id', $projectId)
                    ->orderBy('created_at', 'DESC')
                    ->findAll();

        if (!$topic) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Project with ID $projectId not found");
        }

        return $this->renderProjectView('topics/view', [
            'topic' => $topic,
            'posts' => $posts
        ]);
    }
}
