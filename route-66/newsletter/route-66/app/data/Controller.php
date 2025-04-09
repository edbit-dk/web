<?php

/**
 * This is the "base controller class". All other "real" controllers extend this class.
 */
class Controller {

    protected function loadModel($model, $params = null) {
        require_once(MODELS . $model . '.php');
        return new $model($params);
    }

    public function view($view = '', $data = array(), $global = '', $template = '', $backend = false, $noTemplates = false) {
        if ($noTemplates == true) {
            require_once VIEWS . $view . '.php';
        } elseif ($backend == true) {
            require_once(GLOBAL_HEADER . $global . '/header.php');
            require_once(BACKEND_HEADER);
            require_once(BACKEND_TEMPLATE . $template . '/header.php');
            require_once(VIEWS . $view . '.php');
            require_once(BACKEND_TEMPLATE . $template . '/footer.php');
            require_once(BACKEND_FOOTER);
            require_once(GLOBAL_FOOTER . $global . '/footer.php');
        } else {
            require_once(GLOBAL_HEADER . $global . '/header.php');
            require_once(FRONTEND_HEADER);
            require_once(FRONTEND_TEMPLATE . $template . '/header.php');
            require_once(VIEWS . $view . '.php');
            require_once(FRONTEND_TEMPLATE . $template . '/footer.php');
            require_once(FRONTEND_FOOTER);
            require_once(GLOBAL_FOOTER . $global . '/footer.php');
        }

        if (DEBUG == true && $backend == true) {
            ?>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <?php
                echo '<pre>';
                print_r($data);
                print_r($_SESSION);
                echo '</pre>';
                ?>
            </div>
            <?php
        } elseif (DEBUG == true) {
            echo '<pre>';
            print_r($data);
            print_r($_SESSION);
            echo '</pre>';
        }
    }

}
