<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace thom855j\html;

class Listing
{

    public static
            function ul($li = array(), $options = null)
    {
        $data = '';
        foreach ($li as $value)
        {
            $data .= $value;
        }
        echo "<ul $options>$data</ul>";
    }

    public static
            function li($href = null, $options = null)
    {
        return "<li $options>$href</li>";
    }

    public static
            function href($url, $name)
    {
        return "<a href='$url'>$name</a>";
    }


    public static
            function loop_array($array = array(), $parent_id = 0)
    {
        if (!empty($array[$parent_id]))
        {
            echo '<ul>';
            foreach ($array[$parent_id] as $items)
            {
                echo "<li><a href='" .$items['Name'] ."'>";
                echo $items['Label'];
                echo "</a>";
                self::loop_array($array, $items['ID']);
                echo "</li>";
            }
            echo '</ul>';
        }
    }

    public static
            function display_menus_revised($data)
    {

        $array = array();

        if (count($data))
        {
            while ($rows = $data)
            {
                $array[$rows['Parent_ID']][] = $rows;
            }
            self::loop_array($array);
        }
    }

}
