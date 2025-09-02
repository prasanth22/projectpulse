<?php

namespace App\Controllers;

class PostsController extends BaseController
{
    public function create()
    {
        $project_topic_Model = new \App\Models\ProjectTopicModel();
        $projects = $project_topic_Model->where('type', 'project')->findAll();
        $topics = $project_topic_Model->where('type', 'topic')->findAll();

        return $this->renderView_no_sidebar('posts/create_post', [
            'projects' => $projects,
            'topics' => $topics
        ]);
    }
    public function store()
    {
        helper('html');

        $type = $this->request->getPost('type');
        $project_topic_id = $type === 'project' ? $this->request->getPost('project_id') : $this->request->getPost('topic_id');

        $content = $this->request->getPost('content');
        $content = preg_replace('/<img([^>]+)>/', '<img class="img-full"$1>', $content);
        $cleanContent = sanitize_html($content);
        // print_r($content);
        // print_r($cleanContent);
        // exit;
        $data = [
            'project_topic_id' => $project_topic_id,
            'user_id'    => session()->get('user')['id'],
            'title'      => $this->request->getPost('title'),
            'content'    => $cleanContent,
        ];

        $postModel = new \App\Models\PostModel();
        $postModel->save($data);

        return redirect()->to('/home')->with('success', ucfirst($type) . ' post created successfully!');
    }


    public function view($id)
    {
        $postModel = new \App\Models\PostModel();
        $userModel = new \App\Models\UserModel();
        $projectModel = new \App\Models\ProjectTopicModel();

        $post = $postModel
            ->select('posts.*, users.name AS author_name, users.email AS author_email, projects_topics.name AS name')
            ->join('users', 'users.id = posts.user_id')
            ->join('projects_topics', 'projects_topics.id = posts.project_topic_id')
            ->find($id);

        if (!$post) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Post not found");
        }

        $canEdit = session()->get('user')['id'] == $post['user_id'];

        return $this->renderView('posts/view_post', [
            'post' => $post,
            'canEdit' => $canEdit
        ]);
    }

    public function edit($id)
    {
        $postModel = new \App\Models\PostModel();
        $userModel = new \App\Models\UserModel();
        $projectTopicModel = new \App\Models\ProjectTopicModel();


        $post = $postModel->find($id);

        //print_r($post); exit;
    

        if (!$post || session()->get('user')['id'] != $post['user_id']) {
            return redirect()->to('/home')->with('error', 'Unauthorized action');
        }

        // Determine type from stored project_topic_id
        $type = null;
        $project = $projectTopicModel->where('type', 'project')->find($post['project_topic_id']);
        if ($project) {
            $type = 'project';
        } else {
            $topic = $projectTopicModel->where('type', 'topic')->find($post['project_topic_id']);
            if ($topic) {
                $type = 'topic';
            }
        }

        $project_topic_Model = new \App\Models\ProjectTopicModel();
        $projects = $project_topic_Model->where('type', 'project')->findAll();
        $topics = $project_topic_Model->where('type', 'topic')->findAll();

        return $this->renderView_no_sidebar('posts/edit_post', [
            'post' => $post,
            'type'     => $type,
            'projects' => $projects,
            'topics' => $topics
        ]);
    }

    public function update($id)
    {
        $postModel = new \App\Models\PostModel();
        $post = $postModel->find($id);

        if (!$post || session()->get('user')['id'] != $post['user_id']) {
            return redirect()->to('/home')->with('error', 'Unauthorized action');
        }

        helper('html');


         $type = $this->request->getPost('type');

        $content = $this->request->getPost('content');
        $content = preg_replace('/<img([^>]+)>/', '<img class="img-full"$1>', $content);
        $cleanContent = sanitize_html($content);

        $postModel->update($id, [
            'title' => $this->request->getPost('title'),
            'content' => $cleanContent
        ]);

        return redirect()->to('/posts/view/' . $id)->with('success', 'Post updated successfully!');
    }

    public function uploadImage()
    {
        $file = $this->request->getFile('image');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/', $newName); // or FCPATH.'uploads/'

            // Return public URL (adjust if needed)
            return base_url('uploads/' . $newName);
        }

        return $this->response->setStatusCode(400)->setBody('Upload failed.');
    }



}

