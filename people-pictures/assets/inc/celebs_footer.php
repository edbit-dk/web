<div class="split"></div>
<div class="left">
    <?php

$query = $handler->prepare('SELECT * FROM pp_celebs WHERE name  =  :name');
$query->bindValue(':name', $id, PDO::PARAM_STR);
$query->execute();
$result = $query->fetch();
echo "<h3>" . $result['name'] . " in the news</h3>";
?>
   <div class="news-list">

<?php

$query = $handler->prepare('SELECT * FROM pp_news WHERE celeb  =  :name ORDER BY date DESC');
$query->bindValue(':name', $id, PDO::PARAM_STR);
$query->execute();
while ($result = $query->fetch()) {
                echo "<a href='news.php?celeb=" . $result['celeb'] . "&ID=" .  $result['id'] . "'>" . $result['title'] . "</a>";
}
?>
   </div>
</div>

<div class="right">
        <?php
$query = $handler->prepare('SELECT * FROM pp_celebs WHERE name  =  :name');
$query->bindValue(':name', $id, PDO::PARAM_STR);
$query->execute();
$result = $query->fetch();
echo "<h3>" . $result['name'] . " in motion</h3>";
?>
   <div class="movie-list">
        <img src="assets/img/movie_screen.png" alt="">
       <?php
              // 3. Perform db query
                        $query = $handler->prepare('SELECT * FROM pp_celebs WHERE name  =  :name');
                        $query->bindValue(':name', $id, PDO::PARAM_STR);
                        $query->execute();
                        $result = $query->fetch();
        echo "<a href='movies.php?celeb=" . $result['name'] . "'>" . $result['name'] . "</a>";
            ?>
    </div>
</div>
