<div class="col-sm-3 col-md-2 sidebar">
    <ul class="nav nav-sidebar">
        <li <?php
        if ($page == null) {
            echo "class=\"active\"";
        }
        ?>><a href="index.php">Oversigt</a></li>
    </ul>

    <ul class="nav nav-sidebar">
        <li <?php
        if ($page == 'ads') {
            echo "class=\"active\"";
        }
        ?>><a href="index.php?page=ads">Annoncer</a></li>
        <li <?php
        if ($page == 'create_ad') {
            echo "class=\"active\"";
        }
        ?>><a href="index.php?page=create_ad">Ny Annonce</a></li>
               <li <?php
        ;
        if ($page == 'comments') {
            echo "class=\"active\"";
        }
        ?>><a href="index.php?page=comments">Kommentare</a></li>
    </ul>
    
    <ul class="nav nav-sidebar">
        <li <?php
        if (isset($_SESSION['admin'])) {

            if ($page == 'users') {
                echo "class=\"active\"";
            }
            ?>><a href="index.php?page=users">Brugere</a></li>
            <li <?php
            if ($page == 'create_user') {
                echo "class=\"active\"";
            }
            ?>><a href="index.php?page=create_user">Ny Bruger</a></li><?php
            }
            ?>
    </ul>
    
</div>
