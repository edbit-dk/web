<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Form
{

    public static
            function start($action, $method, $file_upload = false, $options = null)
    {
        if ($file_upload == true)
        {
            $file = "enctype='multipart/form-data'";
        }
        else
        {
            $file = null;
        }
        return <<<FORM
<form action="$action" method="$method" $file $options>
FORM;
    }

    public static
            function create($action, $method, $inputfields = array(), $options = null)
    {
        $inputs = "<input />";
        if (isset($inputfields))
        {
            foreach ($inputfields as $input)
            {
                $inputs .=$input;
            }
        }
        return <<<FORM
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
        return <<<INPUT
<input type="$type" name="$name" $value $options/>
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
        return <<<SUBMIT
<input type="submit" name="$name" $value $options/>
SUBMIT;
    }

    public static
            function textarea($name, $options = null, $content = null)
    {
        return <<<TEXTAREA
  <textarea name="$name" $options>$content</textarea>
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
        return <<<SELECT
<select name="$name" $extra>
$data
</select>
SELECT;
    }

    public static
            function end()
    {
        return <<<FORM
</form>
FORM;
    }

}
