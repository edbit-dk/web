<!-- Content Headers -->
<div class="line ">
    <div class="unit latest-news size3of5">
        <div class="unit size1of5">
            <img  src="img/banner-small.png">
        </div>
        <div class="unit size2of4">
            <h2> Seneste nyheder </h2>
        </div>
        <div class="unit size2of5">
            <img  src="img/banner-medium.png">
        </div>
    </div>

    <div class="unit size2of5 top-talents">
        <div class="unit size1of5">
            <img  src="img/banner-small.png">
        </div>
        <div class="unit size2of4">
            <h2> Top talenter </h2>
        </div>
        <div class="unit size2of5">
            <img  src="img/banner-medium.png">
        </div>
    </div>
</div>

<!-- Content Wrappers -->
<div class="line ">
    <div class="unit size3of5">
        <?php
// GET NEWS ID
        if ($ID == null) {
// 3. Perform db query
            $query = $handler->query('SELECT  *  FROM `rrf_news`
ORDER BY news_posted DESC
LIMIT 3');
            while ($result = $query->fetch()) {
                echo "<div class=\"date\">";
                echo "<p>" . $result['news_day'] . "<p>";
                echo "</div>";
                echo "<div class=\"content\">";
                echo "<div class=\"line\">";
                echo "<div class=\"unit  size1of1\">";
                echo "<div class=\"content-bubble\">";
                echo "<div class=\"inner-content\">";
                echo "<div class=\"line\">";
                echo "<div class=\"module-header\">";
                echo "<div class=\"unit size2of3\">";
                echo "<h3>" . $result['news_author'] . "</h3>";
                echo "</div>";
                echo "<div class=\"unit size1of3 lastUnit\">";
                echo "<h3>" . $result['news_date'] . "</h3>";
                echo "</div>";
                echo "</div>";

                echo "<div class=\"unit size1of1 lastUnit\">";
                echo "<div class=\"module-content\">";
                echo "<h2>" . $result['news_teaser'] . "</h2>";
                echo "</div>";
                echo "</div>";

                echo "<div class=\"unit size1of1\">";
                echo "<div class=\"module-footer\">";
                echo "<a class=\"btn-ns\" href=\"index.php?page=2&ID=" . $result['news_ID'] . "\">Læs mere</a>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        }
        ?>
    </div>

    <?php
    if ($ID == null) {
// 3. Perform db query
        $query = $handler->query('SELECT  *  FROM `rrf_events` where event_talents = 1');
        while ($result = $query->fetch()) {
            echo "<div class=\"unit size2of5 sidebar-left\">";
            echo "<div class=\"line\">";
            echo "<div class=\"unit sidebar-bubble  size1of1\">";
            echo "<a><img  src=\"img/" . $result['event_talents_image'] . "\"></a>";
            echo "<div class=\"inner-sidebar\">";
            echo "<h3>" . $result['event_talents_content'] . "</h3>";
            echo "</div>";
            echo "</div>";
        }
    }
    ?>

    <div class="unit sidebar-bubble  size1of1 ">
        <div class="unit size1of1">

            <div class="unit size1of1">
                <div class="unit size1of5 social-icon">
                    <img  src="img/twitter.png">
                </div>
                <div class="unit size4of5 ">
                    <h3>Støt Rocken På Twitter</h3>
                </div>

                <div class="unit size1of5 social-icon">
                    <img  src="img/facebook.png">
                </div>
                <div class="unit size4of5 ">
                    <h3>Støt Rocken På facebook</h3>
                </div>

                <div class="unit size1of5 social-icon">
                    <img  src="img/vimeo.png">
                </div>
                <div class="unit size4of5 ">
                    <h3>Støt Rocken På Vimeo</h3>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
</div>