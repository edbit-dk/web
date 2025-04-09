<?php

/**
 * This is the "base controller class". All other "real" controllers extend this class.
 */
class Controller {

    protected function loadModel($model, $params = null) {
        require_once MODELS . $model . '.php';
        return new $model($params);
    }

    public function template($template) {
        require_once TEMPLATES . $template . '.php';
    }

    public function errors($error) {
        require_once ERRORS . $error . '.php';
    }

    public function view($view, $data = array(), $noTemplates = false) {

        if ($noTemplates == true) {
            require_once VIEWS . $view . '.php';
        } else {
            require_once TEMPLATES . 'header.php';
            require_once VIEWS . $view . '.php';
            require_once TEMPLATES . 'footer.php';
        }
        
        if (DEBUG == TRUE) {
            echo '<pre>';
            print_r($data);
            echo '</pre>';
        }
    }

}
