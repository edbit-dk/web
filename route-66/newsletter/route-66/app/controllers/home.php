<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Home extends Controller {

    public function index($ID = 1) {
        //Load models
        $participant_model = $this->loadModel('ParticipantModel');
        $question_model = $this->loadModel('QuestionModel');
        $answer_model = $this->loadModel('AnswerModel');
        $winner_model = $this->loadModel('WinnerModel');
        $price_model = $this->loadModel('PriceModel');
        $subscribe_model = $this->loadModel('SubscribeModel');
        $newsletter_model = $this->loadModel('NewsletterModel');

        $feedback = Session::flash('feedback');
        $admin_feedback = Session::flash('admin_feedback');
        $user = $this->loadModel('UserModel');

        if ($user->isLoggedIn()) {
            $all_questions = $question_model->getQuestions();
            $question_id = $question_model->getQuestionID($ID);
            $questions = $question_model->getQuestion($ID);
            $answer_to_question = $answer_model->getAnswersToQuestion($question_id{'0'}->ID);
            $participants = $participant_model->getParticipants();
            $answers = $answer_model->getAnswers();
            $winners = $winner_model->getWinners();
            $prices = $price_model->getPrices();
            $subscribers = $subscribe_model->getSubscribers();
            $newsletters = $newsletter_model->getNewsletters();

            $this->view('home/index', (object) array(
                        'answer_to_question' => (object) $answer_to_question,
                        'questions' => (object) $questions,
                        'all_questions' => (object) $all_questions,
                        'admin_feedback' => (object) $admin_feedback,
                        'winners' => (object) $winners,
                        'participants' => (object) $participants,
                        'answers' => (object) $answers,
                        'prices' => (object) $prices,
                        'user' => $user,
                        'subscribers' => (object) $subscribers,
                        'newsletters' => (object) $newsletters
            ));
        } else {
            $winners = $winner_model->getWinners();
            $question_id = $question_model->getQuestionID($ID);
            $questions = $question_model->getQuestion($ID);
            $answer_to_question = $answer_model->getAnswersToQuestion($question_id{'0'}->ID);


            $this->view('home/index', (object) array(
                        'answer_to_question' => (object) $answer_to_question,
                        'questions' => (object) $questions,
                        'feedback' => (object) $feedback,
                        'winners' => (object) $winners
            ));
        }
    }

}
