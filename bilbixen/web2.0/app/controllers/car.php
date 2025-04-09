<?php

/**
 * Class Cars
 */
class Car extends Controller {

    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/cars/index
     */
    public function index() {

        $cars_model = $this->loadModel('CarModel');

        $cats1 = $cars_model->getAllCarsByCategory(1);
        $cats2 = $cars_model->getAllCarsByCategory(2);
        $cats3 = $cars_model->getAllCarsByCategory(3);

        // load views. 
        require TEMPLATES . 'header.php';
        require VIEWS . 'car/index.php';
        require TEMPLATES . 'footer.php';
    }

    /**
     * PAGE: detail
     * This method handles what happens when you move to http://yourproject/cars/detail/
     */
    public function detail($ID) {
        $cars_model = $this->loadModel('CarModel');

        $cars = $cars_model->getCar($ID);
        $errors[] = Session::flash('errors');
        $com_model = $this->loadModel('CommentModel');
        $coms = $com_model->getComment($ID);

        // load views. 
        require TEMPLATES . 'header.php';
        require VIEWS . 'car/detail.php';
        require TEMPLATES . 'footer.php';
    }

    /**
     * ACTION: add Comment
     * This method handles what happens when you move to http://yourproject/cars/detail/addcomment
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "add a comment" form on cars/detail
     * directs the user after the form submit. This method handles all the POST data from the form and then redirects
     * the user back to cars/index via the last line: header(...)
     * This is an example of how to handle a POST request.
     */
    public function addComment() {

        if (isset($_POST["submit_add_comment"])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            // load model, perform an action on the model
            $cars_model = $this->loadModel('CarModel');
            $cars_model->addComment($_POST["name"], $_POST["email"], $_POST["comment"], $url[2]);
        }

        // where to go after item has been added
        header('location: ' . URL . 'cars/detail/' . $url[2]);
    }

    /**
     * ACTION: add Car
     */
    public function addCar() {

        if (isset($_POST["submit_add_car"])) {
            $cars_model = $this->loadModel('CarModel');
            $cars_model->addCar($_POST["car_name"], $_POST["car_price"], $_POST["car_year"]);
        }

        header('location: ' . URL . 'car/index');
    }

    /**
     * ACTION: delete Car
     */
    public function deleteCar($car_id) {


        if (isset($car_id)) {

            $cars_model = $this->loadModel('CarsModel');
            $cars_model->deleteCar($car_id);
        }

        header('location: ' . URL . 'cars/index');
    }

}
