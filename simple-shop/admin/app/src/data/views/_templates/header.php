<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">
        <?php
        if (!empty($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
           $title =str_replace('/', '  ', ucfirst($url));
           echo $title;
        } else {
            echo 'Velkommen';
        }
        ?>
    </h1>
