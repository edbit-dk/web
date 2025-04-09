<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of changelog
 *
 * @author ThomasElvin
 */
class Changelog extends Controller {

    public function index() {
        $json = file_get_contents(URL . "public/uploads/changelog.json");
        $array = json_decode($json, true);

        $this->view('changelog/index', (object) array(
                    'changelog' => $array
        ));
    }

}
