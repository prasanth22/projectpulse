<?php

namespace App\Controllers;

class PostsController extends BaseController
{
    public function create()
    {
        $data = [
            'project_id' => $this->request->getPost('project_id'),
            'user_id'    => session()->get('user')['id'],
            'title'      => $this->request->getPost('title'),
            'content'    => $this->request->getPost('content'),
        ];

        $postModel = new \App\Models\PostModel();
        $postModel->save($data);

        return redirect()->to('/home')->with('success', 'Post created successfully!');
    }

    public function view($id)
    {
        $postModel = new \App\Models\PostModel();
        $userModel = new \App\Models\UserModel();
        $projectModel = new \App\Models\ProjectModel();

        $post = $postModel
            ->select('posts.*, users.name AS author_name, users.email AS author_email, projects.project_name AS project_name')
            ->join('users', 'users.id = posts.user_id')
            ->join('projects', 'projects.id = posts.project_id')
            ->find($id);

        if (!$post) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Post not found");
        }

        $canEdit = session()->get('user')['id'] == $post['user_id'];

        return $this->renderView('view_post', [
            'post' => $post,
            'canEdit' => $canEdit
        ]);
    }

    public function update($id)
    {
        $postModel = new \App\Models\PostModel();
        $post = $postModel->find($id);

        if (!$post || session()->get('user')['id'] != $post['user_id']) {
            return redirect()->to('/home')->with('error', 'Unauthorized action');
        }

        $postModel->update($id, [
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content')
        ]);

        return redirect()->to('/posts/view/' . $id)->with('success', 'Post updated successfully!');
    }


}

