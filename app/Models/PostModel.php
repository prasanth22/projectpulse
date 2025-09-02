<?php 

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table = 'posts';
    protected $allowedFields = ['project_topic_id', 'title', 'content', 'user_id'];
    protected $useTimestamps = true;

    public function getPostsWithProject_Topic()
    {
        return $this->select('posts.*, projects_topics.name as project_name, users.name as author_name')
                    ->join('projects_topics', 'projects_topics.id = posts.project_topic_id')
                    ->join('users', 'users.id = posts.user_id')
                    ->orderBy('posts.created_at', 'DESC')
                    ->findAll();
    }
}
