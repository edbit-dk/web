<?php
require_once "errors.php";
require_once "assets/inc/db.php";
?>
<!DOCTYPE html>
<html>
    <?php include "assets/inc/_head.php"; ?>
    <body>
        <div class="wrapper">     
            <?php include "assets/inc/header.php"; ?>
            <main>
                <article>
                	 <?php
                    echo "<h2>CELEBRITY PROFILE - " . $result['name'] . "</h2>";
                   	echo "<section>";
                       
                        // 3. Perform db query
                        $query = $handler->prepare('SELECT * FROM pp_celebs WHERE name  =  :name');
                        $query->bindValue(':name', $id, PDO::PARAM_STR);
                        $query->execute();
                        $result = $query->fetch();
                        echo "<img src='assets/img/celebs/" . $result['file'] . "' alt='" . $result['file'] . "'>";
                        ?>
                       <img src="assets/img/banners/add_0<?php $random = mt_rand(1,2); echo $random; ?>.jpg" alt="">
                    </section>
                </article>
                <div class="split"></div>
                <div class="left">
                    <?php
// 3. Perform db query
$query = $handler->prepare('SELECT * FROM pp_celebs WHERE name  =  :name');
$query->bindValue(':name', $id, PDO::PARAM_STR);
$query->execute();
$result = $query->fetch();
$celeb = $result['name'];

                    $query = $handler->prepare('SELECT * FROM pp_news WHERE celeb  =  :celeb AND id = :ID  ORDER BY date DESC
LIMIT 0, 1');
                    $query->bindValue(':celeb', $celeb, PDO::PARAM_STR);
                     $query->bindValue(':ID', $ID, PDO::PARAM_STR);
                    $query->execute();
                    while ($result = $query->fetch()) {
                        echo "<h3>News: " . $result['date'] . "</h3>";
                        echo "<div class='news-text'>";
                        echo "<p>" . $result['content'] . "</p>";
                        echo "</div>";
                    }
                    ?>
                </div>
                <div class="right">
                    <h3>Biography Info</h3>
                    <div class="biography">
                    	<?php
require_once("assets/inc/bio.php");
?>
                    </div>
                </div>
                <?php include "assets/inc/celebs_footer.php"; ?>
                <?php include "assets/inc/footer.php"; ?>
            </main>
        </div>
    </body>
</html>
<?php
// CLOSE DATABASE
require_once("assets/conf/dbclose.php");
?>  
