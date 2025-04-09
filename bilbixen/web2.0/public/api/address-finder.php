<?php
if (isset($_POST) && !empty($_POST['postFromClient']) ) { 
//Strip whitespace (or other chraracters) from 
    $postnr = trim($_POST['postFromClient']); 

    $search = file_get_contents("http://postnummerapi.dk/api/Postalcode/GetByCode/$postnr"); 
    $data = json_decode($search, true); 

    $city = ''; 
    if (empty($data)) { 
      echo $city = 0; 
    } else { 
        foreach ($data as $value) { 
            echo $value['City']; 
        } 
    } 

}