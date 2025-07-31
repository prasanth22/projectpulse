<?php

namespace App\Models;

use CodeIgniter\Model;

class ProjectModel extends Model
{
    protected $table = 'projects';
    protected $primaryKey = 'id';
    protected $allowedFields = ['project_name', 'description', 'project_head'];
    protected $useTimestamps = true;

   public function getProjectsWithPostCount()
    {
        return $this->select('projects.*, COUNT(posts.id) as post_count')
                    ->join('posts', 'posts.project_id = projects.id', 'left')
                    ->groupBy('projects.id')
                    ->findAll();
    }


}
