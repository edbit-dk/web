<div class="page-wrapper">
    <?php
    $Username = USER_USERNAME;
    $Firstname = USER_FIRSTNAME;
    $Lastname = USER_LASTNAME;
    $Email = USER_EMAIL;
    $Phone = USER_PHONE;
    $Address = USER_ADDRESS;
    $Zipcode = USER_ZIPCODE;
    ?>

    <div class="grid grid-pad">
        <div class="col-3-12">
            <div class="content">
                <h3 class="heading">Options</h3>
                <ul class="noLi">
                    <?php if ($user->role("Admin")) { ?>
                        <li><a href="<?php echo URL; ?>controlpanel">Controlpanel</a></li>
                    <?php } ?>
                    <li><a href="<?php echo URL; ?>account/auctions">My Auctions</a></li>
                    <li><a href="<?php echo URL; ?>account/purchases">My Purchases</a></li>
                    <li><a href="<?php echo URL; ?>account/create/auction" >Create Auction</a></li>
                    <li><a href="<?php echo URL; ?>account/profile">Profile</a></li>
                    <li><a href="<?php echo URL; ?>account/settings">Settings</a></li>
                </ul>
            </div>
        </div>
        <div class="col-9-12">
            <div class="content">