<!-- header -->

<?php
$logoLang = array("da", "de", "en", "es", "fr", "ir", "it", "la", "nl", "no", "pl", "se", "zu");
shuffle($logoLang);
?>


<div class="page-wrapper center">
    <div class="logo-wrapper">
        <a class="logoLink" href="<?php echo URL; ?>home"><img
                src="<?php echo URL; ?>img/logos/logo_<?php echo $logoLang[1]; ?>.png" alt="Logo"></a>
    </div>

</div>
<div class="margin-top" data-margin="500"></div>

<div class="grid grid-pad">

    <form style="text-align: center;" action="<?php echo URL_UPLOADS; ?>auctions/search" method="GET" class="search-form">

        <div class="search-group">
            <input class="search-input" name="keywords" type="text" placeholder="Type keywords" list="search_index"
                   autocomplete="off" required>
            <!-- <span class="input-group-addon search-icon"><i class="fa fa-search fa-fw"></i></span> -->
            <button type="submit" class="search-icon"><i class="fa fa-search fa-fw"></i></button>
        </div>
        <datalist id="search_index">
            <?php foreach ($data->auctions as $auction): ?>
                <option value="<?php echo $auction->title; ?>">
                <?php endforeach; ?>
        </datalist>

    </form>

</div>

<div class="nav-wrapper">
    <div class="grid grid-pad">
        <div class="col-1-1">
            <div class="content">
                <nav id="mainNav" class="mainNav">
                    <ul class="nav">
                        <?php
                        $user = $this->loadModel('UserModel');
                        if (!$user->isLoggedIn()) {
                            ?>
                            <li class="navItem"><a href="<?php echo URL; ?>home">Home</a></li>
                            <li class="navItem"><a href="<?php echo URL; ?>about">About</a></li>
                            <li class="navItem"><a href="<?php echo URL; ?>auctions">Auctions</a></li>
                            <li class="navItem"><a href="<?php echo URL; ?>login">Login</a></li>
                            <li class="navItem"><a href="<?php echo URL; ?>register">Register</a></li>
                            <li class="navItem"><a href="<?php echo URL; ?>contact">Contact</a></li>
                        <?php } ?>
                        <?php
                        if ($user->isLoggedIn()) {
                            ?>
                            <li class="navItem"><a href="<?php echo URL; ?>home">Home</a></li>
                            <li class="navItem"><a href="<?php echo URL; ?>about">About</a></li>
                            <li class="navItem"><a href="<?php echo URL; ?>auctions">Auctions</a></li>
                            <li class="navItem"><a href="<?php echo URL; ?>account">Account</a></li>
                            <li class="navItem"><a href="<?php echo URL; ?>account/logout">Log out</a></li>
                            <?php } ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>


