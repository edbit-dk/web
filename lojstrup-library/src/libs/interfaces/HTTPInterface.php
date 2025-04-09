<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

interface HTTPInterface
{

    public static
            function post($name);

    public static
            function get($name, $array = false);

    public static
            function put($name);

    public static
            function delete();
}
