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

class Edit extends Controller {

    public function page($ID) {
        $page_model = $this->loadModel('PageModel');
        $pages = $page_model->getPageByID($ID);
        foreach ($pages as $page) {
            ?>
            <form action="<?php echo URL; ?>update/page/<?php echo $page->ID; ?>" method="post">
                <textarea cols="100" rows="25" name="content">
                    <?php echo Output::decode($page->Content); ?>
                </textarea>
                <input type="submit" re>
            </form>
            <?php
        }
    }

}
