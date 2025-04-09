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

    public function view($view = null, $data = array()) {
        require_once(VIEWS . $view . '.php');
    }

}
