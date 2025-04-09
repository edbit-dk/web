<?php

/**
 * Class Cars
 */
class Cars extends Controller {

    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/cars/index
     */
    public function index() {

        $cars_model = $this->loadModel('CarsModel');
        //$cars = $cars_model->getAllCars();

        $cats1 = $cars_model->getAllCarsByCategory(1);
        $cats2 = $cars_model->getAllCarsByCategory(2);
        $cats3 = $cars_model->getAllCarsByCategory(3);



        // load views. 
        require 'application/views/_templates/header.php';
        require 'application/views/cars/index.php';
        require 'application/views/_templates/footer.php';
    }

    /**
     * PAGE: detail
     * This method handles what happens when you move to http://yourproject/cars/detail/
     */
    public function detail() {
        $cars_model = $this->loadModel('CarsModel');
        $url = rtrim($_GET['url'], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);

        $cars = $cars_model->getCarById($url[2]);

        $coms = $cars_model->getComById($url[2]);

        require 'application/views/_templates/header.php';
        require 'application/views/cars/detail.php';
        require 'application/views/_templates/footer.php';
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
            $cars_model = $this->loadModel('CarsModel');
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
            $cars_model = $this->loadModel('CarsModel');
            $cars_model->addCar($_POST["car_name"], $_POST["car_price"], $_POST["car_year"]);
        }

        header('location: ' . URL . 'cars/index');
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
