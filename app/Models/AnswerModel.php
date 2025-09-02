<?php

namespace App\Models;

use CodeIgniter\Model;

class AnswerModel extends Model
{
    protected $table            = 'answers';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields    = [
        'question_id',
        'user_id',
        'content',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // ✅ Fetch answers for a question with user info
    public function getAnswersByQuestion($questionId)
    {
        return $this->select('answers.*, users.name as author_name')
                    ->join('users', 'users.id = answers.user_id')
                    ->where('question_id', $questionId)
                    ->orderBy('answers.created_at', 'ASC')
                    ->findAll();
    }
}
