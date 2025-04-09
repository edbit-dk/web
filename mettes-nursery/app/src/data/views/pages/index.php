<?php

if (!empty($data->page)) {
    foreach ($data->page as $page) {
        
    }
}

if (file_exists(THEME_FOLDER . $data->url->scalar . '.php')) {
    require_once(THEME_FOLDER . $data->url->scalar . '.php');
} else {
    require_once(THEME_FOLDER . 'index.php');
}

