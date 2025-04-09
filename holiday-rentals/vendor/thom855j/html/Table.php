<?php
namespace thom855j\html;

class Table
{

    public static
            function start($options = null)
    {
        echo "<table $options>";
    }

    public static
            function rowStart($options = null)
    {
        echo "<tr $options>";
    }

    public static
            function rowEnd()
    {
        echo "</tr>";
    }

    public static
            function head($inputs = array(), $options = null)
    {
        $th = '';
        foreach ($inputs as $input)
        {
            $th .= "<th $options>$input</th>";
        }
        echo    "<thead><tr>$th</tr></thead>";
    }

    public static
            function data($inputs = array(), $options = null)
    {
        $td = '';
        foreach ($inputs as $input)
        {
            $td .= "<td $options>$input</td>";
        }
        echo "</tbody><tr>$td</tr></tbody>";
    }

    public static
            function end()
    {
        echo "</table>";

    }

}