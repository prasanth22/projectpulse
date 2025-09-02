<?php
namespace App\Controllers;

use App\Models\QuestionModel;
use App\Models\AnswerModel;
use App\Models\ProjectTopicModel;

class QuestionsController extends BaseController
{

    public function store()
    {
        $questionModel = new QuestionModel();

        //print_r($this->request->getPost());exit;


        $questionModel->save([
            'project_topic_id' => $this->request->getPost('project_topic_id'),
            'user_id' => session()->get('user')['id'],
            'content' => $this->request->getPost('content'),
        ]);

        return redirect()->to('/answers')->with('success', 'Question posted successfully!');
    }



}
