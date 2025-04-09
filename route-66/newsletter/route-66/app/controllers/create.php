<?php

/*
 * Copyright (C) 2015 ThomasElvin
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * Description of create
 *
 * @author ThomasElvin
 */
class Create extends Controller {

    public function competition() {
        if (Input::exists()) {
            //Set date
            $start_date = date('Y-m-d H:i:s');
            $new_date = date('Y-m-d H:i:s', strtotime(" +1 month", strtotime($start_date)));
            $end_date = date('Y-m-d H:i:s', strtotime($new_date));

            //Create question
            $question = $this->loadModel('QuestionModel');
            $question->create(array(
                'start_date' => $start_date,
                'end_date' => $end_date,
                'Question' => Input::encode(Input::get('question'))
            ));

            //Get last id from
            $ID = $question->lastID();

            $answer_1 = 0;
            $answer_2 = 0;
            $answer_3 = 0;

            if (Input::get('correct_answer') == 1) {
                $answer_1 = 1;
            } elseif (Input::get('correct_answer') == 2) {
                $answer_2 = 1;
            } elseif (Input::get('correct_answer') == 3) {
                $answer_3 = 1;
            }

            $answer = $this->loadModel('AnswerModel');
            $answer->create(array(
                'Answer' => Input::encode(Input::get('answer1')),
                'Correct_answer' => $answer_1,
                'Question_ID' => $ID
            ));
            $answer = $this->loadModel('AnswerModel');
            $answer->create(array(
                'Answer' => Input::encode(Input::get('answer2')),
                'Correct_answer' => $answer_2,
                'Question_ID' => $ID
            ));
            $answer = $this->loadModel('AnswerModel');
            $answer->create(array(
                'Answer' => Input::encode(Input::get('answer3')),
                'Correct_answer' => $answer_3,
                'Question_ID' => $ID
            ));


            Session::flash('admin_feedback', '<h2 class="text-success" >Competiton added successfully!</h2>');
            Redirect::to(URL . '#controlpanel');
        }
    }

    public function winner() {
        if (Input::exists()) {
            $winner_model = $this->loadModel('WinnerModel');
            $winner_model->create(array(
                'Participant_ID' => Input::get('Participant_ID'),
                'Question_ID' => Input::get('Question_ID'),
                'Date' => date('Y-m-d H:i:s'),
                'Price_ID' => Input::get('Price_ID')
            ));

//            Email
            $EmailFrom = EMAIL_FROM;
            $EmailTo = Input::get('Email');
            $username = Input::get('Name');
            $price = Input::get('Price');
            $question = Input::get('Question');
            $answer = Input::get('Answer');

            $Subject = "Congratulation, $username!";
            $Body = "Dear $username <br> You are among the 3 winners of Route 66 '$price' competetion!<br><br>
                The correct answer on the question '$question' was indeed
                <b>'$answer'!</b><br><br>
                Regards, Route66";
            // Email Headers with UTF-8 encoding
            $email_header = "From: $EmailFrom \r\n";
            $email_header .= "Content-Type: text/html; charset=UTF-8\r\n";
            $email_header .= "Reply-To: $EmailFrom \r\n";
            mail($EmailTo, $Subject, $Body, $email_header);

            Session::flash('admin_feedback', '<h2 class="text-success" >Participant added as winner!</h2>');
            Redirect::to(URL . '#controlpanel');
        }
    }

    public function participant() {
        if (Input::exists()) {
            $validate = $this->loadModel('ValidateModel');
            $validation = $validate->check($_POST, array(
                'name' => array(
                    'required' => true,
                    'min' => 4,
                    'max' => 64,
                    'notTaken' => 'Participants'
                ),
                'email' => array(
                    'required' => true,
                    'min' => 4,
                    'max' => 64,
                    'validEmail' => Input::get('email'),
                    'notTaken' => 'Participants'
                )
            ));

            $answer = $this->loadModel('AnswerModel');
            $result = $answer->getCorrectAnswer(Input::get('question_id'));

            if (Input::get('answer') === $result) {
                $answer = 1;
            } else {
                $answer = 0;
            }

            if ($validation->passed()) {
                try {
                    $pariticpant = $this->loadModel('ParticipantModel');
                    $pariticpant->create(array(
                        'Name' => Input::encode(Input::get('name')),
                        'Email' => Input::encode(Input::get('email')),
                        'Registered' => date('Y-m-d H:i:s'),
                        'Correct_answer' => $answer,
                        'Question_ID' => Input::get('question_id')
                    ));

                    //Email
                    $EmailFrom = EMAIL_FROM;
                    $EmailTo = Input::encode(Input::get('email'));
                    $username = Input::encode(Input::get('name'));

                    $Subject = "Registration Successful, $username";
                    $Body = "Dear $username <br> Your registration for the competion on Route 66 was successfull!<br> Regards, Route66";
                    // Email Headers with UTF-8 encoding
                    $email_header = "From: $EmailFrom \r\n";
                    $email_header .= "Content-Type: text/html; charset=UTF-8\r\n";
                    $email_header .= "Reply-To: $EmailFrom \r\n";
                    mail($EmailTo, $Subject, $Body, $email_header);

                    Session::flash('feedback', '<h2 class="text-success" >Your answer has been submitted!</h2>');

                    Redirect::to(URL . '#top');
                } catch (Exception $e) {
                    die($e->getMessage());
                }
            } else {
                foreach ($validation->errors() as $error) {
                    $errors[] = $error;
                }
                Session::flash('feedback', $errors);
                Redirect::to(URL . '#top');
            }
        }
    }

    public function randomwinner() {
        $pariticpants = $this->loadModel('ParticipantModel');
        $pariticpant = $pariticpants->getCorrectRandomParticipant();

        foreach ($pariticpant as $winner) {
            $winner_model = $this->loadModel('WinnerModel');
            $winner_model->create(array(
                'Participant_ID' => $winner->ID,
                'Question_ID' => Input::get('Question_ID'),
                'Date' => date('Y-m-d H:i:s'),
                'Price_ID' => Input::get('Price_ID')
            ));


            //Email
            $EmailFrom = EMAIL_FROM;
            $EmailTo = $winner->Email;
            $username = $winner->Name;

            $Subject = "Congratulation, $username!";
            $Body = "Dear $username <br> You have won our competition!<br> Regards, Route66";
            // Email Headers with UTF-8 encoding
            $email_header = "From: $EmailFrom \r\n";
            $email_header .= "Content-Type: text/html; charset=UTF-8\r\n";
            $email_header .= "Reply-To: $EmailFrom \r\n";
            mail($EmailTo, $Subject, $Body, $email_header);
        }
        Session::flash('admin_feedback', '<h2 class="text-success" >Participants added as winner!</h2>');
        Redirect::to(URL . '#controlpanel');
    }

    public function subscriber() {
        if (Input::exists()) {
            $validate = $this->loadModel('ValidateModel');
            $validation = $validate->check($_POST, array(
                'Name' => array(
                    'required' => true,
                    'min' => 4,
                    'max' => 64
                ),
                'Email' => array(
                    'required' => true,
                    'min' => 4,
                    'max' => 64,
                    'validEmail' => Input::get('Email'),
                    'notTaken' => 'Subscribers'
                )
            ));

            if ($validation->passed()) {
                $subscribe_model = $this->loadModel('SubscribeModel');
                $subscribe_model->create(array(
                    'Date' => time(),
                    'Name' => Input::get('Name'),
                    'Email' => Input::get('Email')
                ));
                Session::flash('feedback', '<h2 class="text-success" >Email is now subscribing!</h2>');
                Redirect::to(URL . '#newsletter');
            } else {
                foreach ($validation->errors() as $error) {
                    $errors[] = $error;
                }
                Session::flash('feedback', $errors);
                Redirect::to(URL . '#newsletter');
            }
        }
    }

    public function newsletter() {
        $newsletter_model = $this->loadModel('NewsletterModel');
        $newsletter_model->create(array(
            'Date' => time(),
            'Name' => Input::get('name'),
            'Body' => Input::get('body')
        ));
        Session::flash('admin_feedback', '<h2 class="text-success" >Newsletter created!</h2>');
        Redirect::to(URL . '#controlpanel');
    }

}
