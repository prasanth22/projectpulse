<?php

namespace App\Controllers;

class UserHome extends BaseController
{
    public function index()
    {
        $user = session()->get('user');

        if (!$user) {
            return redirect()->to('/');
        }

        $postModel = new \App\Models\PostModel();
        $posts = $postModel->getPostsWithProject_Topic();

        return $this->renderView('user_home', ['user' => $user, 'posts' => $posts]);

    }
}
