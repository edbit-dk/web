<?php
// CONNECT DATABASE
    require_once("errors.php");
require_once("assets/conf/dbconfig.php");
$rand = mt_rand(1,2); 
?>
<!DOCTYPE html>

<html>
    <?php include "assets/inc/_head.php"; ?>
    <body>
        <div class="wrapper">     
            <?php include "assets/inc/header.php"; ?>
            <main>
            	<?php
// 3. Perform db query
$query = $handler->query('SELECT  *  FROM pp_celebs
ORDER BY id ASC');
while($result = $query->fetch()){
 echo "<article>";
                    echo "<h2>CELEBRITY PROFILE <a href='gallery.php?celeb=" . $result['name'] . "'> " . $result['name'] . "</h2></a>";
                   echo "<section>";
                       echo "<a href='gallery.php?celeb=" . $result['name'] . "'><img src='assets/img/celebs/" . $result['file'] . "' alt=''></a>";
                       echo "<img src='assets/img/banners/add_0" . $rand .".jpg' alt=''>";
                   echo "</section>";
                echo "</article>";
                echo "<div class='split'></div>";
            } 
            ?>
                <?php include "assets/inc/footer.php"; ?>
            </main>
        </div>
    </body>
</html>  			
<?php
// CLOSE DATABASE
require_once("assets/conf/dbclose.php");
?>  


