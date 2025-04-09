<br>
<!-- Static navbar -->
<nav class="navbar navfix navbar-default">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            Sider
        </button>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
            <?php
            $title = $page->Title;
            if (!empty($data->menus)) {

                foreach ($data->menus as $menu) {
                    ?>
                    <li
                    <?php if ($menu->Title === $page->Title || 
                            $page->Title === 'Info' && $menu->Title === 'Butikken'
                            || $page->Title === 'Kategori' && $menu->Title === 'Butikken'
                             || $page->Title === 'Kassen' && $menu->Title === 'Butikken') { ?>
                            class="active"
                        <?php } ?>
                        >
                        <a href="<?php echo URL . $menu->Link; ?>"><?php echo $menu->Title; ?></a>
                    </li>
                    <?php
                }
            }
            ?>
        </ul>
    </div><!--/.nav-collapse -->
</nav>
<?php if ($page->Title === 'Butikken' 
        || $page->Title === 'Kategori' 
        || $page->Title === 'Info' 
        || $page->Title === 'Kassen') { ?>
    <nav class="navbar subnav subbar navbar-default">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#subbar" aria-expanded="false" aria-controls="navbar">
                Kategorier
            </button>
        </div>
        <div id="subbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">


                <?php
                $url = filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL);
                $ID = preg_replace("/[^0-9]/", "", $url);
                if (!empty($data->product_categories)) {
                    foreach ($data->product_categories as $product_category) {
                        
                    }
                }

                if (!empty($data->categories)) {
                    foreach ($data->categories as $category) {
                        ?>

                        <li
                        <?php if ($page->Title === 'Info' && $category->ID === $product_category->Category_ID) {
                            ?>
                                class="active"
                            <?php } elseif ($page->Title === 'Kategori' && $category->ID === $ID) {
                                ?>
                                class="active"
                            <?php } ?>
                            ><a href="<?php echo URL; ?>kategori/<?php echo $category->ID; ?>"><?php echo $category->Title; ?></a></li>

                        <?php
                    }
                }
                ?>
            </ul>
        </div><!--/.nav-collapse -->
    </nav>
<?php } ?>

<div class="container">
    <div class="row">