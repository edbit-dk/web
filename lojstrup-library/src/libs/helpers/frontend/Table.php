<?php

/*
 * Copyright (C) 2015 thom855j
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

class Table
{

    public static
            function start($options = null)
    {
        return <<<START
<table $options>
START;
    }

    public static
            function rowStart($options = null)
    {
        return <<<ROW
<tr $options>
ROW;
    }

    public static
            function rowEnd()
    {
        return <<<ROW
</tr>
ROW;
    }

    public static
            function head($inputs = array(), $options = null)
    {
        $th = '';
        foreach ($inputs as $input)
        {
            $th .= "<th $options>$input</th>";
        }
        return <<<HEAD
   <thead><tr>$th</tr></thead>
HEAD;
    }

    public static
            function data($inputs = array(), $options = null)
    {
        $td = '';
        foreach ($inputs as $input)
        {
            $td .= "<td $options>$input</td>";
        }
        return "</tbody><tr>$td</tr></tbody>";
    }

    public static
            function end()
    {
        return <<<END
</table>
END;
    }

}
