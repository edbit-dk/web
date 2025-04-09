<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//INCLUDE CLASS FROM OTHER FILE
include('Timer.php');
 
//INITIALIZE COUNTER CLASS
$counter= new Timer();
 
//START COUNTER
$counter->startCounter();
 
//DO SOMETHING WORTH TIMING
 
//STOP COUNTER
$counter->stopCounter();
 
//OUTPUT RESULT
echo $counter->getElapsedTime();