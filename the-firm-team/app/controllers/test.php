<?php

class Test extends Controller {

    public function index() {

        $str = 'Thomas   Lange';
        $data   = preg_split('/\s+/', $str);
//        $words = explode(" ", $data);
//preg_match_all('/\s+/', $string, $matches);
//$result = array_map('strlen', $matches[0]);
//var_dump($result);
        var_dump($data);
        echo $data[0], $data[1];

        $model = $this->loadModel('Upload', '../img/');

        $this->view('test/index', (object) array(
                    'upload' => (object)  $model
        ));
    }

}
