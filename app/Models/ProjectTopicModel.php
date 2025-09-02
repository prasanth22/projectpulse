<?php

namespace App\Models;

use CodeIgniter\Model;

class ProjectTopicModel extends Model
{
    protected $table            = 'projects_topics';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['name', 'description', 'project_head', 'type', 'created_at', 'updated_at'];
    protected $useTimestamps    = true;

    public function getProjectsWithPostCount()
    {
        return $this->select('projects_topics.*, COUNT(posts.id) as post_count')
                    ->join('posts', 'posts.project_topic_id = projects_topics.id', 'left')
                    ->where('projects_topics.type', 'project')
                    ->groupBy('projects_topics.id')
                    ->findAll();
    }

    
    public function getTopicsWithPostCount()
    {
        return $this->select('projects_topics.*, COUNT(posts.id) as post_count')
                    ->join('posts', 'posts.project_topic_id = projects_topics.id', 'left')
                    ->where('projects_topics.type', 'topic')
                    ->groupBy('projects_topics.id')
                    ->findAll();
    }
}
