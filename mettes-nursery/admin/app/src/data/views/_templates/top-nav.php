<nav class="navbar navbar-inverse navbar-fixed-top">
    <a class="navbar-brand" href="<?php echo URL; ?>../">Mettes Planteskole</a>
    <div class="container-fluid top-nav">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li ><a href="<?php echo URL; ?>">Oversigt</a></li>
                <li><a href="<?php echo URL; ?>ordrer">Ordrer</a></li>
                <li><a href="<?php echo URL; ?>produkter">Produkter</a></li>
                <li><a href="<?php echo URL; ?>kunder">Kunder</a></li>
                <li><a href="<?php echo URL; ?>beskeder">Beskeder</a></li>
                <li><a href="<?php echo URL; ?>delete/cache"><b>Tøm cache</b></a></li>
                <li><a class="navbar-brand logout" href="<?php echo URL; ?>../logout">Log ud</a></li>
            </ul>
        </div>
    </div>

</nav>