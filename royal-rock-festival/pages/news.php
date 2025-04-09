<!-- Content Headers -->
<div class="line ">
    <div class="unit size1of5">

    </div>

    <div class="unit latest-news size3of5">
        <div class="unit size1of5">
            <img  src="img/banner-small.png">
        </div>
        <div class="unit size2of4">
            <h2> Nyheder </h2>
        </div>
        <div class="unit size2of5">
            <img  src="img/banner-medium.png">
        </div>
    </div>

    <div class="unit size1of5">

    </div>
</div>

<!-- Content Wrappers -->
<div class="line ">
    <div class="unit size1of5">

    </div>

    <div class="unit size3of5">
        <?php
// GET NEWS ID

        if ($ID == null) {
// 3. Perform db query
$query = $handler->query('SELECT  *  FROM rrf_news
ORDER BY news_posted DESC
LIMIT 0, 3');
while($result = $query->fetch()){
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
                echo "<h2>" . $result['news_teaser']  . "</h2>";
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
        } else {
// 3. Perform db query
$query = $handler->prepare('SELECT * FROM rrf_news WHERE news_ID  =  :ID');
$query->bindValue(':ID', $ID, PDO::PARAM_STR);
$query->execute();
while($result = $query->fetch()){
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
                echo "<h2>" . $result['news_title']  . "</h2>";
                echo "<p>" . $result['news_content'] . "</p>";
                echo "</div>";
                echo "</div>";

                echo "<div class=\"unit size1of1\">";
                echo "<div class=\"module-footer\">";
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

    <div class="unit size1of5">

    </div>
</div>



