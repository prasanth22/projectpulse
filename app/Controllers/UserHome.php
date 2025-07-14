<?php

namespace App\Controllers;

class UserHome extends BaseController
{
    public function index()
    {
        $user = session()->get('user');

        if (!$user) {
            return redirect()->to('/login');
        }

        $postModel = new \App\Models\PostModel();
        $posts = $postModel->getPostsWithProject();

        //return view('user_home/index', ['trendingProjects' => $trendingProjects, 'user' => $user]);
        return $this->renderView('user_home', ['user' => $user, 'posts' => $posts]);

        //return view('dashboard/index', ['user' => $user]);
    }
}
