<?php

class Events extends Controller {

    public function index($limit = 2147483647) {
        $user = $this->loadModel('User');
        if (!$user->isLoggedIn()) {
            Session::flash('errors', '<p>You need to login to continue.</p>');
            Redirect::to(URL . 'account/login');
        } else {
            $errors[] = Session::flash('errors');

            $Company_ID = $user->data()->Company_ID;
            $User_ID = $user->data()->ID;

            $model = $this->loadModel('Event');
            $events = $model->getEventsByCompany($Company_ID, $User_ID, $limit);

            // load views
            $this->view('events/index', (object) array(
                        'events' => (object) $events,
                        'errors' => $errors
            ));
        }
    }

    public function signups($limit = 2147483647) {
        $user = $this->loadModel('User');
        if (!$user->isLoggedIn()) {
            Session::flash('errors', '<p>You need to login to continue.</p>');
            Redirect::to(URL . 'account/login');
        } else {
            $errors[] = Session::flash('errors');

            $User_ID = $user->data()->ID;

            $model = $this->loadModel('Signup');
            $events = $model->getSignups($User_ID, $limit);
            // load views
            $this->view('events/signups', (object) array(
                        'events' => (object) $events,
                        'errors' => $errors
            ));
        }
    }

    public function create() {
        if (Input::exists()) {
            try {
                $event = $this->loadModel('Event');
                $event->create(array(
                    'Content' => Input::escape(Input::get('Content')),
                    'Date' =>  Input::escape(Input::get('Date')),
                    'Name' => Input::escape(Input::get('Name')),
                    'User_ID' => Input::escape(Input::get('User')),
                    'Company_ID' => Input::escape(Input::get('Company'))
                ));

                Session::flash('errors', "<p>Event added successfully!</p>");
                Redirect::to(URL . 'controlpanel/events');
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
    }

    public function update($ID) {
        if (Input::exists()) {
            try {
                $event = $this->loadModel('Event');
                $event->update(array(
                    'Content' => Input::escape(Input::get('Content')),
                    'Date' => Input::escape(Input::get('Date')),
                    'Name' => Input::escape(Input::get('Name'))
                        ), $ID);

                Session::flash('errors', "<p>Event updated successfully!</p>");
                Redirect::to(URL . 'controlpanel/edit/event/' . $ID);
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
    }

    public function delete($ID) {
        $model = $this->loadModel('Event');
        $news = $model->delete($ID);

        Session::flash('errors', '<p>Event deleted successfully!</p>');
        Redirect::to(URL . 'controlpanel/events');
    }

}
