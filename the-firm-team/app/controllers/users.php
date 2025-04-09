<?php

class Users extends Controller {

   public function index() {
       //load model
        $model = $this->loadModel('User');
        $user = $model->getAllUsers();

       $this->view('users/index', (object) array(
                   'users' => (object) $user
        ));
   }

    public function create() {
        if (Input::exists()) {
            try {
                $event = $this->loadModel('Event');
                $event->create(array(
                    'Content' => Input::escape(Input::get('Content')),
                    'Date' => Input::escape(Input::get('Date')),
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

    public function edit($ID) {
        $model = $this->loadModel('User');
        $user = $model->getUser($ID);

        $this->view('users/edit', (object) array(
                    'user' => (object) $user
        ));
    }

    public function login() {
//Login validation
        if (Input::exists()) {

                $validate = $this->loadModel('Validate');
                $validation = $validate->check($_POST, array(
                    USER_NAME => array('required' => true),
                    USER_PASSWORD => array('required' => true)
                ));

                if ($validation->passed()) {
                    $user = $this->loadModel('User');
                    $remember = (Input::escape(Input::get('remember')) === 'on') ? true : false;
                    $login = $user->login(Input::escape(Input::get(USER_NAME)), Input::escape(Input::get(USER_PASSWORD)), $remember);

                    if ($login) {
                        Session::flash('errors', '<p>You have logged in successfully.</p>');
                        Redirect::to(URL . 'account');
                    } else {
                        Session::flash('errors', '<p>Sorry. Login failed.</p>');
                        Redirect::to(URL . 'account/login');
                    }
                } else {
                    foreach ($validation->errors() as $error) {
                        $errors[] = $error;
                    }
                    Session::flash('errors', $errors);
                    Redirect::to(URL . 'account/login');
                }
        }
    }

    public function register() {
        if (Input::exists()) {
            if (Token::check(Input::get(TOKEN_NAME))) {
                $validate = $this->loadModel('Validate');
                $validation = $validate->check($_POST, array(
                    USER_CODE => array(
                        'required' => true,
                        'min' => 3,
                        'max' => 20,
                        'exists' => COMPANY_TABLE
                    ),
                    USER_NAME => array(
                        'required' => true,
                        'min' => 6,
                        'max' => 20,
                        'notTaken' => USERS_TABLE
                    ),
                    USER_EMAIL => array(
                        'required' => true,
                        'min' => 6,
                        'max' => 60,
                        'validEmail' => Input::escape(Input::get(USER_EMAIL)),
                        'notTaken' => USERS_TABLE
                    )
                ));

                if ($validation->passed()) {
                    try {
                        $user = $this->loadModel('User');
                        $code = $user->code(Input::escape(Input::get(USER_CODE)));
                        $password = md5(mt_srand() . microtime());
                        $user->create(array(
                            USER_NAME => Input::escape(Input::get(USER_NAME)),
                            USER_EMAIL => Input::escape(Input::get(USER_EMAIL)),
                            USER_PASSWORD => $password,
                            USER_COMPANY => $code[0]->ID,
                            USER_ROLE => 1
                        ));
                        //Email
                        $EmailFrom = EMAIL_FROM;
                        $EmailTo = Output::escape(Input::get(USER_EMAIL));
                        $username = Output::escape(Input::get(USER_NAME));
                        $firstname = Output::escape(Input::get(USER_FIRSTNAME));
                        $lastname = Output::escape(Input::get(USER_LASTNAME));

                        $Subject = "Registration Successful, $username";
                        $Body = "Dear $username <br> Your registration was successful and here is the username $username and password you need to login for the first time: $password";
                        // Email Headers with UTF-8 encoding
                        $email_header = "From: $EmailFrom \r\n";
                        $email_header .= "Content-Type: text/html; charset=UTF-8\r\n";
                        $email_header .= "Reply-To: $EmailFrom \r\n";
                        mail($EmailTo, $Subject, $Body, $email_header);

                        Session::flash('errors', "<p>You have been registered and a password has been send yo your email $EmailTo.</p>");

                        Redirect::to(URL . 'account/login');
                    } catch (Exception $e) {
                        die($e->getMessage());
                    }
                } else {
                    foreach ($validation->errors() as $error) {
                        $errors[] = $error;
                    }
                    Session::flash('errors', $errors);
                    Session::flash('input', $_POST);
                    Redirect::to(URL . 'account/register');
                }
            }
        }
    }

    public function profile() {
        if (Input::exists()) {
            if (Token::check(Input::get(TOKEN_NAME))) {
                $validate = $this->loadModel('Validate');
                $validation = $validate->check($_POST, array(
                    USER_FIRSTNAME => array(
                        'required' => true,
                        'min' => 6,
                        'max' => 20
                    ),
                    USER_LASTNAME => array(
                        'required' => true,
                        'min' => 6,
                        'max' => 20
                    ),
                    USER_EMAIL => array(
                        'required' => true,
                        'min' => 6,
                        'max' => 60,
                        'validEmail' => Input::escape(Input::get(USER_EMAIL))
                    )
                ));

                if ($validation->passed()) {
                    try {
                        $user = $this->loadModel('User');
                        $user->update(array(
                            USER_EMAIL => Input::escape(Input::get(USER_EMAIL)),
                            USER_FIRSTNAME => Input::escape(Input::get(USER_FIRSTNAME)),
                            USER_LASTNAME => Input::escape(Input::get(USER_LASTNAME))
                        ));
                        Session::flash('errors', 'Your details have been updated!');
                        Redirect::to(URL . 'account/profile');
                    } catch (Exception $e) {
                        die($e->getMessage());
                    }
                } else {
                    foreach ($validation->errors() as $error) {
                        $errors[] = $error;
                    }
                    Session::flash('errors', $errors);
                    Session::flash('data', $_POST);
                    Redirect::to(URL . 'account/settings');
                }
            }
        }
    }

    public function password() {
        if (Input::exists()) {
            if (Token::check(Input::get(TOKEN_NAME))) {
                $validate = $this->loadModel('Validate');
                $validation = $validate->check($_POST, array(
                    PASSWORD_NEW => array(
                        'required' => true,
                        'min' => 6
                    ),
                    PASSWORD_CHECK => array(
                        'required' => true,
                        'min' => 6,
                        'matches' => 'password_new'
                    )
                ));

                if ($validation->passed()) {
                    if (Input::escape(Input::get(USER_PASSWORD) != $user->data()->Password)) {
                        Session::flash('errors', 'Your current password is wrong.');
                        Redirect::to(URL . 'account/change');
                    } else {
                        $user = $this->loadModel('User');
                        $user->update(array(
                            USER_PASSWORD => Input::escape(Input::get(PASSWORD_NEW))
                        ));

                        Session::flash('errors', 'Your password has been changed!');
                        Redirect::to(URL . 'account/profile');
                    }
                } else {
                    foreach ($validation->errors() as $error) {
                        $errors[] = $error;
                    }
                    Session::flash('errors', $errors);
                    Session::flash('data', $_POST);
                    Redirect::to(URL . 'account/change');
                }
            }
        }
    }

    public function update() {
        if (Input::exists()) {
            if (Token::check(Input::get(TOKEN_NAME))) {
                $validate = $this->loadModel('Validate');
                $validation = $validate->check($_POST, array(
                    USER_FIRSTNAME => array(
                        'required' => true,
                        'min' => 6,
                        'max' => 20
                    ),
                    USER_LASTNAME => array(
                        'required' => true,
                        'min' => 6,
                        'max' => 20
                    ),
                    USER_EMAIL => array(
                        'required' => true,
                        'min' => 6,
                        'max' => 60,
                        'validEmail' => Input::escape(Input::get(USER_EMAIL))
                    )
                ));

                if ($validation->passed()) {
                    try {
                        $user = $this->loadModel('User');
                        $user->update(array(
                            USER_EMAIL => Input::escape(Input::get(USER_EMAIL)),
                            USER_FIRSTNAME => Input::escape(Input::get(USER_FIRSTNAME)),
                            USER_LASTNAME => Input::escape(Input::get(USER_LASTNAME))
                        ));
                        Session::flash('errors', 'Your details have been updated!');
                        Redirect::to(URL . 'account/profile');
                    } catch (Exception $e) {
                        die($e->getMessage());
                    }
                } else {
                    foreach ($validation->errors() as $error) {
                        $errors[] = $error;
                    }
                    Session::flash('errors', $errors);
                    Session::flash('data', $_POST);
                    Redirect::to(URL . 'controlpanel/edit/user/' . Input::escape(Input::get(USER_ID)));
                }
            }
        }
    }

    public function delete($ID) {
        if (Input::exists()) {
            if (Token::check(Input::get(TOKEN_NAME))) {

                $user = $this->loadModel('User');
                $user->delete($ID);
            }
        }
        Session::flash('errors', 'User deleted!');
        Redirect::to(URL . 'controlpanel/users');
    }

    public function signup($Event_ID) {

        $user = $this->loadModel('User');

        $model = $this->loadModel('Signup');
        $model->create(array(
            'Event_ID' => $Event_ID,
            'User_ID' => $user->data()->ID
        ));

        Session::flash('errors', 'You successfully signed up for this event!');
        Redirect::to(URL . 'events/signups');
    }

    public function cancel($Event_ID) {

        $model = $this->loadModel('Signup');
        $model->delete($Event_ID);

        Session::flash('errors', 'You have successfully this signup for this event!');
        Redirect::to(URL . 'events/signups');
    }

    public function logout() {
        $model = $this->loadModel('User');
        $user = $model->logout();
        Session::flash('errors', '<p>You have been logged out.</p>');
        Redirect::to(URL . 'account/login');
    }

    public function search() {
        //load model

        $user = $this->loadModel('User');
        if (!$user->isLoggedIn()) {
            Session::flash('errors', '<p>You need to login to continue.</p>');
            Redirect::to(URL . 'account/login');
        } else {
            if (Input::exists()) {
                $model = $this->loadModel('User');

                $data = preg_split('/\s+/', Input::escape(Input::get('search')));

                $firstname = $data[0];
                $lastname = $data[1];

                $users = $model->getUsersByCompany($firstname, $lastname);

                $this->view('employees/search', (object) array(
                            'users' => (object) $users
                ));
            }
        }
    }

}
