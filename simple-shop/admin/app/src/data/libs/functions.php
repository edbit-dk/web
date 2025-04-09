<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function get_content() {
    $content = new Page();
    $page = $content->get_page();
    return $page;
}
