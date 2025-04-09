<div class="col-sm-3 col-md-2 sidebar">
    <ul class="nav nav-sidebar">
        <li <?php
        $title = "Home";
        if ($page == null) {
            echo "class=\"active\"";
        }
        ?>><a href="index.php">Oversigt</a></li>
    </ul>
    <ul class="nav nav-sidebar">
        <li <?php
        $title = "Home";
        if ($page == 15) {
            echo "class=\"active\"";
        }
        ?>><a href="index.php?page=15">Statestik</a></li>
    </ul>
    <ul class="nav nav-sidebar">
        <li <?php
        $title = "Home";
        if ($page == 20) {
            echo "class=\"active\"";
        }
        ?>><a href="index.php?page=20">Tilmeldte</a></li>
    </ul>
    <ul class="nav nav-sidebar">
        <li <?php
;
            if ($page == 2) {
                echo "class=\"active\"";
            }
            ?>><a href="index.php?page=2">Beskeder</a></li>
    </ul>
    <ul class="nav nav-sidebar">
        <li <?php
            if ($page == 5) {
                echo "class=\"active\"";
            }
            ?>><a href="index.php?page=5">Nyheder</a></li>  
        <li <?php
            if ($page == 6) {
                echo "class=\"active\"";
            }
            ?>><a href="index.php?page=6">Ny Nyhed</a></li>  
    </ul>
    <ul class="nav nav-sidebar">
        <li <?php
        if ($page == 9) {
            echo "class=\"active\"";
        }
        ?>><a href="index.php?page=9">Events</a></li>
        <li <?php
        if ($page == 10) {
            echo "class=\"active\"";
        }
        ?>><a href="index.php?page=10">Ny Event</a></li>
    </ul>
    <ul class="nav nav-sidebar">
        <li <?php
        if ($page == 13) {
            echo "class=\"active\"";
        }
        ?>><a href="index.php?page=13">Brugere</a></li>
        <li <?php
        if ($page == 12) {
            echo "class=\"active\"";
        }
        ?>><a href="index.php?page=12">Ny Bruger</a></li>
    </ul>
</div>
