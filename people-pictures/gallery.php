<?php
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
                     echo "<h2>CELEBRITY PROFILE " . $result['name'] . "</h2>";
                     ?>
                    <section>
                        <?php

        if ($id == null) {
// 3. Perform db query
$query = $handler->query('SELECT  *  FROM pp_gallery
ORDER BY id DESC');
  $result = $query->fetch();
echo "<img src='assets/img/gallery/". $result['file'] ."' alt=''>";

        } else {
                        // 3. Perform db query
                        $query = $handler->prepare('SELECT * FROM pp_celebs WHERE name  =  :name');
                        $query->bindValue(':name', $id, PDO::PARAM_STR);
                        $query->execute();
                        $result = $query->fetch();
                        echo "<img src='assets/img/celebs/" . $result['file'] . "' alt='" . $result['file'] . "'>";
            }


                        ?>
                        <img src="assets/img/banners/add_0<?php $random = mt_rand(1,2); echo $random; ?>.jpg" alt="">
                    </section>
                </article>
                <div class="split"></div>
                <div class="left">
                    <h3>Picture Gallery</h3>
                    <div class="picture-gallery">
<?php

        if ($id == null) {
// 3. Perform db query
$query = $handler->query('SELECT  *  FROM pp_gallery
ORDER BY id DESC');
while($result = $query->fetch()){
echo "<img width='140' src='assets/img/gallery/". $result['file'] ."' alt=''>";

            }
        } else {
// 3. Perform db query
$query = $handler->prepare('SELECT * FROM pp_gallery WHERE title  =  :title');
$query->bindValue(':title', $celeb, PDO::PARAM_STR);
$query->execute();
while($result = $query->fetch()){
echo "<img width='140' src='assets/img/gallery/". $result['file'] ."' alt=''>";
            }
        }
        ?>
                    </div>
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

