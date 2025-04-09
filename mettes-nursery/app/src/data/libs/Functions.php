<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function get_content() {
    $page = new Page();
    return $data = $page->get_page();
}

function get_menus() {
    $menus = new Menus();
    return $data = $menus->return_menus();
}

function display_children($parent, $level) {
    $result = mysql_query("SELECT a.id, a.label, a.link, Deriv1.Count FROM `menu` a  LEFT OUTER JOIN (SELECT parent, COUNT(*) AS Count FROM `menu` GROUP BY parent) Deriv1 ON a.id = Deriv1.parent WHERE a.parent=" . $parent);
    echo "<ul>";
    while ($row = mysql_fetch_assoc($result)) {
        if ($row['Count'] > 0) {
            echo "<li><a href='" . $row['link'] . "'>" . $row['label'] . "</a>";
            display_children($row['id'], $level + 1);
            echo "</li>";
        } elseif ($row['Count'] == 0) {
            echo "<li><a href='" . $row['link'] . "'>" . $row['label'] . "</a></li>";
        } 
            else;
    }
    echo "</ul>";
}


