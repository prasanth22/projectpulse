<?php 

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table = 'posts';
    protected $allowedFields = ['project_id', 'title', 'content', 'user_id'];
    protected $useTimestamps = true;

    public function getPostsWithProject()
    {
        return $this->select('posts.*, projects.project_name as project_name, users.name as author_name')
                    ->join('projects', 'projects.id = posts.project_id')
                    ->join('users', 'users.id = posts.user_id')
                    ->orderBy('posts.created_at', 'DESC')
                    ->findAll();
    }
}
