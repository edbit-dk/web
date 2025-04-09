<!-- Content Headers -->
<div class="line ">
    <?php
    if ($ID > null) {
        echo "<div class=\"unit size1of5\">";
        echo "</div>";
    }
    ?>
    <div class="unit latest-news size3of5">
        <div class="unit size1of5">
            <img  src="img/banner-small.png">
        </div>
        <div class="unit size2of4">
            <h2> Kommende Events </h2>
        </div>
        <div class="unit size2of5">
            <img  src="img/banner-medium.png">
        </div>
    </div>
    <?php
    if ($ID > null) {
        echo "<div class=\"unit size1of5\">";
        echo "</div>";
    }
    ?>
    <?php
    if ($ID == null) {
        echo "<div class=\"unit size2of5 top-talents\">";
        echo "<div class=\"unit size1of5\">";
        echo "<img  src=\"img/banner-small.png\">";
        echo "</div>";
        echo "<div class=\"unit size2of4\">";
        echo "<h2> Top Events </h2>";
        echo "</div>";
        echo "<div class=\"unit size2of5\">";
        echo "<img  src=\"img/banner-medium.png\">";
        echo "</div>";
        echo "</div>";
    }
    ?>
</div>

<!-- Content Wrappers -->
<div class="line ">
    <?php
    if ($ID > null) {
        echo "<div class=\"unit size1of5\">";
        echo "</div>";
    }
    ?>
    <div class="unit size3of5">

        <?php
        if ($ID == null) {
// 3. Perform db query
            $query = $handler->query('SELECT  *  FROM rrf_events
ORDER BY event_date DESC
LIMIT 0, 3');
            while ($result = $query->fetch()) {
                echo "<div class=\"date\">";
                echo "<p>" . $result['event_start'] . "<p>";
                echo "</div>";
                echo "<div class=\"content\">";
                echo "<div class=\"line\">";
                echo "<div class=\"unit  size1of1\">";
                echo "<div class=\"content-bubble\">";
                echo "<div class=\"inner-content\">";
                echo "<div class=\"line\">";
                echo "<div class=\"unit size1of1 lastUnit\">";
                echo "<div class=\"module-content\">";
                echo "<h2>" . $result['event_title'] . "</h2>";
                echo "<h3>" . $result['event_place'] . "</h3>";
                echo "<p>" . $result['event_day'] . "</p>";
                echo "</div>";
                echo "</div>";

                echo "<div class=\"unit size1of2\">";
                echo "<div class=\"module-footer-left\">";
                echo "Kommende Events";
                echo "</div>";
                echo "</div>";
                echo "<div class=\"unit size1of2\">";
                echo "<div class=\"module-footer\">";
                echo "<a class=\"btn-ns\" href=\"index.php?page=3&ID=" . $result['event_ID'] . "\">Læs mere</a>";
                echo "</div>";
                echo "</div>";

                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        } else {
// 3. Perform db query
            $query = $handler->prepare('SELECT * FROM rrf_events WHERE event_ID  =  :parameter');
            $query->bindParam(':parameter', $ID, PDO::PARAM_STR);
            $query->execute();
            while ($result = $query->fetch()) {
                echo "<div class=\"date\">";
                echo "<p>" . $result['event_start'] . "<p>";
                echo "</div>";
                echo "<div class=\"content\">";
                echo "<div class=\"line\">";
                echo "<div class=\"unit  size1of1\">";
                echo "<div class=\"content-bubble\">";
                echo "<div class=\"inner-content\">";
                echo "<div class=\"line\">";
                echo "<div class=\"unit size1of1 lastUnit\">";
                echo "<div class=\"module-content\">";
                echo "<h2>" . $result['event_title'] . "</h2>";
                echo "<h3>" . $result['event_place'] . "</h3>";
                echo "<h4>" . $result['event_day'] . "</h4>";
                echo "<p>" . $result['event_content'] . "</p>";
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
        $query = $handler->query('SELECT  *  FROM rrf_events WHERE event_top = 1');
        while ($result = $query->fetch()) {
            echo "<div class=\"unit size2of5 sidebar-left\">";
            echo "<div class=\"line\">";
            echo "<div class=\"unit sidebar-bubble  size1of1\">";
            echo "<a><img  src=\"img/" . $result['event_talents_image'] . "\"></a>";
            echo "<div class=\"inner-sidebar\">";
            echo "<h2>" . $result['event_title'] . "</h2>";
            echo "<h3>" . $result['event_place'] . "</h3>";
            echo "<p>" . $result['event_day'] . "</p>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    }
    ?>
    <?php
    if ($ID > null) {
        echo "<div class=\"unit size1of5\">";
        echo "</div>";
    }
    ?>
</div>
