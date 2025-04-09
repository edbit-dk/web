<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace thom855j\html;

class Form
{

    public static
            function start($action, $method, $file_upload = false,
                           $options = null)
    {
        if ($file_upload == true)
        {
            $file = "enctype='multipart/form-data'";
        }
        else
        {
            $file = null;
        }
        if(is_null($action)){
            $form_action = 'action=""';
        } else{
            $form_action = "action='$action'";
        }
        echo <<<FORM
<form $form_action method="$method" $file $options>
FORM;
    }

    public static
            function create($action, $method, $inputfields = array(),
                            $options = null)
    {
        $inputs = "<input />";
        if (isset($inputfields))
        {
            foreach ($inputfields as $input)
            {
                $inputs .=$input;
            }
        }
        echo <<<FORM
<form action="$action" method="$method" $options>$inputs</form>
FORM;
    }

    public static
            function input($type, $name, $value = null, $options = null)
    {
        if ($value == null)
        {
            $value = '';
        }
        else
        {
            $value = "value='$value'";
        }
        echo <<<INPUT
<input type="$type" id="$name" name="$name" $value $options/>
INPUT;
    }

    public static
            function submit($name = null, $value = null, $options = null)
    {
        if ($value == null)
        {
            $value = '';
        }
        else
        {
            $value = "value='$value'";
        }
        echo <<<SUBMIT
<input type="submit" name="$name" $value $options/>
SUBMIT;
    }

    public static
            function textarea($name, $options = null, $content = null)
    {
        echo <<<TEXTAREA
  <textarea name="$name" id="$name" $options>$content</textarea>
TEXTAREA;
    }

    public static
            function options($key, $value, $extra = null)
    {
       return <<<OPTIONS
<option value='$key' $extra>$value</option>
OPTIONS;
    }

    public static
            function select($name, $options = null, $extra = null)
    {
        $data = '';
        foreach ($options as $option)
        {
            $data .= $option;
        }
        echo <<<SELECT
<select name="$name" $extra>
$data
</select>
SELECT;
    }
    
    public static 
            function space($amount = 1){
        for ($x = 1; $x <= $amount; $x++) {
            echo "<br>";
            } 
    }
    
    public static function label($for, $text, $options = null){
        echo "<br><label for='$for' $options>$text</label><br>";
    }

    public static
            function end()
    {
        echo <<<FORM
</form>
FORM;
    }

}
