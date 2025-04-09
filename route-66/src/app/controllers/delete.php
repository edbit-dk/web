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
 * Description of delete
 *
 * @author ThomasElvin
 */
class Delete extends Controller {

    public function winner() {
        if (Input::exists()) {
            $winner_model = $this->loadModel('WinnerModel');
            $winner_model->delete(Input::get('Participant_ID'));
            Session::flash('admin_feedback', '<h2 class="text-danger" >Participant removed as winner!</h2>');
            Redirect::to(URL . '#controlpanel');
        }
    }

    public function participant() {
        if (Input::exists()) {
            $participant_model = $this->loadModel('ParticipantModel');
            $participant_model->delete(Input::get('ID'));
            Session::flash('admin_feedback', '<h2 class="text-danger" >Participant deleted!</h2>');
            Redirect::to(URL . '#controlpanel');
        }
    }

    public function subscriber() {
        if (Input::exists()) {
            $subscribe_model = $this->loadModel('SubscribeModel');
            $subscribe_model->delete(Input::get('email'));
            Session::flash('feedback', '<h2 class="text-danger" >Email unsubscribed!</h2>');
            Redirect::to(URL . '#newsletter');
        }
    }

    public function newsletter() {
        if (Input::exists()) {
            $newsletter_model = $this->loadModel('NewsletterModel');
            $newsletter_model->delete(Input::get('ID'));
            Session::flash('admin_feedback', '<h2 class="text-danger" >Newsletter Deleted!</h2>');
            Redirect::to(URL . '#controlpanel');
        }
    }

}
