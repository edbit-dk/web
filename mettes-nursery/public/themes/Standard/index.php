<?php
eval($page->Code);
require_once 'assets/inc/header.php';
require_once 'assets/inc/nav.php';
require_once 'assets/inc/sidebar-left.php';
?>


<div id="page-id-<?php echo $page->ID; ?>" class="index col-md-6">
    <!--<?php echo date(DATE_FORMAT, $page->Timestamp); ?>-->
    <h3><?php echo $page->Title; ?></h3>
    <?php
    if (!empty($data->feedback)) {
        foreach ($data->feedback as $feedback) {
            echo $feedback;
        }
    }

    if (Session::exists('ERRORS')) {
        foreach (Session::flash('ERRORS') as $error) {
            echo "<p style='color: red;' >$error</p>";
        }
    }
    ?>
    <?php Output::decode(eval($page->Content)); ?>

</div>



<?php
require_once 'assets/inc/sidebar-right.php';
require_once 'assets/inc/footer.php';

