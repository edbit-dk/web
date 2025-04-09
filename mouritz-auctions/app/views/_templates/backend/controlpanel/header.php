<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?php echo URL; ?>home">Mouritz Auktioner</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo URL; ?>account/logout">Logout</a></li>
            </ul>
            <form class="navbar-form navbar-right">
                <input type="text" class="form-control" placeholder="Søg...">
            </form>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li><a href="<?php echo URL; ?>controlpanel">Oversigt</a></li>
            </ul>

            <ul class="nav nav-sidebar"> 
                <li><a href="<?php echo URL; ?>controlpanel/auctions">Auctions</a></li>
                 <li><a href="<?php echo URL; ?>controlpanel/bids">Bids</a></li>
                <li><a href="<?php echo URL; ?>controlpanel/comments">Comments</a></li>
                <li><a href="<?php echo URL; ?>controlpanel/users">Users</a></li>
            </ul>
        </div>