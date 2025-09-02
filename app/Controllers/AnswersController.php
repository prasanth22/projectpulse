<?php
namespace App\Controllers;

use App\Models\QuestionModel;
use App\Models\AnswerModel;
use App\Models\ProjectTopicModel;

class AnswersController extends BaseController
{
    public function index()
    {
        $questionModel = new QuestionModel();

        // Join with users, topics, and count answers
        $questions = $questionModel
            ->select('questions.*, users.name as author_name, projects_topics.name as project_topic_title, COUNT(answers.id) as total_answers')
            ->join('users', 'users.id = questions.user_id')
            ->join('projects_topics', 'projects_topics.id = questions.project_topic_id')
            ->join('answers', 'answers.question_id = questions.id', 'left')
            ->groupBy('questions.id')
            ->orderBy('questions.created_at', 'DESC')
            ->findAll();

        return $this->renderView('answers/index', ['questions' => $questions]);
    }


    public function store()
    {
        $answerModel = new AnswerModel();

        // Validate input
        $rules = [
            'question_id' => 'required|integer',
            'content'     => 'required|min_length[5]'
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->with('error', 'Please write a valid answer.');
        }

        // Prepare data
        $data = [
            'question_id' => $this->request->getPost('question_id'),
            'user_id'     => session()->get('user.id'), // assuming user is logged in
            'content'     => $this->request->getPost('content'),
            'created_at'  => date('Y-m-d H:i:s'),
        ];

        // Save answer
        if ($answerModel->insert($data)) {
            return redirect()->back()->with('success', 'Your answer has been posted!');
        } else {
            return redirect()->back()->with('error', 'Failed to post your answer. Please try again.');
        }
    }

    public function view($id)
    {
        $answerModel = new AnswerModel();
        $questionModel = new QuestionModel();

        // Fetch the question
        $question = $questionModel->find($id);
        if (!$question) {
            return redirect()->to('/answers')->with('error', 'Question not found.');
        }

        // Fetch answers for the question
        $answers = $answerModel->getAnswersByQuestion($id);

        // Current logged-in user’s answer
        $userId = session()->get('user.id');  // adjust if your session key is different
        $userAnswer = null;
        if ($userId) {
            $userAnswer = $answerModel
                ->where('question_id', $id)
                ->where('user_id', $userId)
                ->first();
        }

        return $this->renderView('answers/view_answers', [
            'question' => $question,
            'answers'  => $answers,
            'userAnswer' => $userAnswer,
        ]);
    }

    public function update($id)
    {
        $answerModel = new AnswerModel();
        $userId = session()->get('user.id');

        $answer = $answerModel->find($id);

        if (!$answer || $answer['user_id'] != $userId) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        $answerModel->update($id, [
            'content' => $this->request->getPost('content'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('/answers/view/' . $answer['question_id'])
                        ->with('success', 'Answer updated successfully.');
    }


    
}
