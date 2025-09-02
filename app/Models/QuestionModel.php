<?php

namespace App\Models;

use CodeIgniter\Model;

class QuestionModel extends Model
{
    protected $table            = 'questions';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields    = [
        'user_id',
        'project_topic_id',
        'content',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // ✅ Fetch question with related user and project/topic
    public function getQuestionsWithRelations()
    {
        return $this->select('questions.*, users.name as author_name, project_topics.name as project_topic_name')
                    ->join('users', 'users.id = questions.user_id')
                    ->join('project_topics', 'project_topics.id = questions.project_topic_id')
                    ->orderBy('questions.created_at', 'DESC')
                    ->findAll();
    }
}
