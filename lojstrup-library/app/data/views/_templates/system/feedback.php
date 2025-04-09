<?php

// echo out positive messages
if (Session::exists('SUCCESS'))
{
    foreach ((array) Session::flash('SUCCESS') as $feedback)
    {
        echo '<div  class="feedback success">' . $feedback . '</div>';
    }
}

// echo out negative messages
if (Session::exists('ERRORS'))
{
    foreach ((array) Session::flash('ERRORS') as $feedback)
    {
        echo '<div class="feedback error">' . $feedback . '</div>';
    }
}

// echo out negative messages
if (Session::exists('INFO'))
{
    foreach ((array) Session::flash('INFO') as $feedback)
    {
        echo '<div class="feedback info">' . $feedback . '</div>';
    }
}