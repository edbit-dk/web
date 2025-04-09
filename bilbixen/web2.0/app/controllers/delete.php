<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Delete extends Controller {

    public function ad($ID) {
        if (Input::exists()) {
            $model = $this->loadModel('CarModel');

            $car = $model->getCar($ID);
            $file = $car{0}->car_image;
            unlink(UPLOADS_FOLDER . $file);

            $model->delete($ID);
            $model->removeFromCategory($ID);

            Session::flash('errors', '<p style="color: green;">Ad removed successfully!</p>');
            Redirect::to(URL . 'controlpanel/ads');
        } else {
            require_once TEMPLATES . 'backend/header.php';
            ?>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <p>Are you sure you want to delete ad <?php echo $ID; ?>?</p>
                <form method="post" action="">
                    <input class="btn btn-danger" type="submit" name="submit" value="Yes">
                </form>
                <a class="btn btn-success" href="<?php echo URL; ?>controlpanel/ads">Nej</a>
            </div>
            <?php
            require_once TEMPLATES . 'backend/footer.php';
        }
    }

    public function comment($ID) {
        if (Input::exists()) {
            $model = $this->loadModel('CommentModel');

            $model->delete($ID);

            Session::flash('errors', '<p style="color: green;">Comment removed successfully!</p>');
            Redirect::to(URL . 'controlpanel/comments');
        } else {
            require_once TEMPLATES . 'backend/header.php';
            ?>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <p>Are you sure you want to delete comment <?php echo $ID; ?>?</p>
                <form method="post" action="">
                    <input class="btn btn-danger" type="submit" name="submit" value="Yes">
                </form>
                <a class="btn btn-success" href="<?php echo URL; ?>controlpanel/comments">Nej</a>
            </div>
            <?php
            require_once TEMPLATES . 'backend/footer.php';
        }
    }

    public function department($ID) {
        if (Input::exists()) {
            $model = $this->loadModel('DepartmentModel');

            $model->delete($ID);

            Session::flash('errors', '<p style="color: green;">Department removed successfully!</p>');
            Redirect::to(URL . 'controlpanel/departments');
        } else {
            require_once TEMPLATES . 'backend/header.php';
            ?>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <p>Are you sure you want to delete department #<?php echo $ID; ?>?</p>
                <form method="post" action="">
                    <input class="btn btn-danger" type="submit" name="submit" value="Yes">
                </form>
                <a class="btn btn-success" href="<?php echo URL; ?>controlpanel/departments">Nej</a>
            </div>
            <?php
            require_once TEMPLATES . 'backend/footer.php';
        }
    }

}
