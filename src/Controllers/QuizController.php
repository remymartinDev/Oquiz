<?php

namespace Oquiz\Controllers;

use Oquiz\Models\QuizModel;
use Oquiz\Models\QuestionModel;

class QuizController extends CoreController {

    public function quiz($param) {

        $quizzId = (int) $param['id'];
        $quizz = QuizModel::find($quizzId);

        $questionsList = QuestionModel::getQuestionsByQuizzId($quizzId);

        $question = QuestionModel::findAll();

        $props = QuestionModel::getProps($quizzId);

        echo $this->templates->render('main/quiz', [
            'quizzId' => $quizzId,
            'quizz' => $quizz,
            'questionsList' => $questionsList,
            'question' => $question,
            'props' => $props
        ]);
    }
}
