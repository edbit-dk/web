<?php

/**
 * This is the "base controller class". All other "real" controllers extend this class.
 */
class Controller {

    protected function loadModel($model, $params = null) {
        require_once(MODELS . $model . '.php');
        return new $model($params);
    }

    protected function loadPlugin($folder, $model, $params = null) {
        require_once(PLUGINS . $folder . '/models/' . $model . '.php');
        return new $model($params);
    }

    public function pluginView($folder, $subfolder, $view) {
        $user = $this->loadModel('UserModel');
        if (!$user->isLoggedIn()) {
            if (file_exists(PLUGINS . "$folder/$subfolder/$view.php")) {
                require_once(VIEWS . 'admin/_templates/header.php');
                require_once(PLUGINS . "$folder/$subfolder/$view.php");
                require_once(VIEWS . 'admin/_templates/footer.php');
            } else {
                Redirect::to(URL . 'admin/plugins');
            }
        } else {
            Redirect::to(URL);
        }
    }

    public function adminView($view = null, $data = array()) {
        $user = $this->loadModel('UserModel');
        if ($user->isLoggedIn() && $user->role('admin')) {
            require_once(VIEWS . '_templates/head.php');
            require_once(VIEWS . '_templates/side-nav.php');
            require_once(VIEWS . '_templates/header.php');
            require_once(VIEWS . '_templates/top-nav.php');
            $feedback[] = Session::flash('FEEDBACK');
            if (!empty($feedback)) {
                foreach ($feedback as $feedback) {
                    echo $feedback;
                }
            }
            require_once(VIEWS . $view . '.php');
            require_once(VIEWS . '_templates/footer.php');
        } else {
            Session::flash('FEEDBACK', '<p style="color: red;">Ingen adgang! Log ind som admin for at fortsætte.</p>');
            Redirect::to('login');
        }
    }

    public function view($view = null, $data = array()) {
        require_once(VIEWS . $view . '.php');
    }

}
