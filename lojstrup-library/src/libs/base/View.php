<?php

/**
 * Class View
 * The part that handles all the output
 */
class View
{

    /**
     * simply includes (=shows) the view. this is done from the controller. In the controller, you usually say
     * $this->view->render('help/index'); to show (in this example) the view index.php in the folder help.
     * Usually the Class and the method are the same like the view, but sometimes you need to show different views.
     * @param string $filename Path of the to-be-rendered view, usually folder/file(.php)
     * @param array $data Data to be used in the view
     */
    public
            function render($filenames = array(), $data = null, $multidata = null)
    {
        if ($data)
        {
            foreach ($data as $data)
            {
                foreach ($data as $key => $value)
                {
                    $this->{$key} = $value;
                }
            }
        }


        foreach ($filenames as $filename)
        {
            require_once $filename . '.php';
        }
    }

    /**
     * Similar to render, but accepts an array of separate views to render between the header and footer. Use like
     * the following: $this->view->renderMulti(array('help/index', 'help/banner'));
     * @param array $filenames Array of the paths of the to-be-rendered view, usually folder/file(.php) for each
     * @param array $data Data to be used in the view
     * @return bool
     */
    public
            function renderMulti($filenames, $data = null)
    {
        if (!is_array($filenames))
        {
            self::render($filenames, $data);
            return false;
        }

        if ($data)
        {
            foreach ($data as $key => $value)
            {
                $this->{$key} = $value;
            }
        }


        require PATH_TEMPLATES . 'header.php';
        foreach ($filenames as $filename)
        {
            require PATH_VIEWS . $filename . '.php';
        }
        require PATH_TEMPLATES . 'footer.php';
    }

    /**
     * Same like render(), but does not include header and footer
     * @param string $filename Path of the to-be-rendered view, usually folder/file(.php)
     * @param mixed $data Data to be used in the view
     */
    public
            function renderFile($filename, $data = null)
    {
        if ($data)
        {
            foreach ($data as $key => $value)
            {
                $this->{$key} = $value;
            }
        }


        require PATH_VIEWS . $filename . '.php';
    }

    /**
     * Renders pure JSON to the browser, useful for API construction
     * @param $data
     */
    public
            function renderJson($data)
    {
        echo json_encode($data);
    }

    /**
     * renders the feedback messages into the view
     */
    public
            function renderFeedback()
    {
        // echo out the feedback messages (errors and success messages etc.),
        // they are in $_SESSION["feedback_positive"] and $_SESSION["feedback_negative"]
        require PATH_TEMPLATES . 'system/feedback.php';
        // delete these messages (as they are not needed anymore and we want to avoid to show them twice
    }

}
