<?php
require_once "assets/inc/db.php";
?>
<!DOCTYPE html>
<html>
    <?php include "assets/inc/_head.php"; ?>
    <body>
        <div class="wrapper">     
            <?php include "assets/inc/header.php"; ?>
            <?php
     // 3. Perform db query
                        $query = $handler->prepare('SELECT * FROM pp_celebs WHERE name  =  :name');
                        $query->bindValue(':name', $id, PDO::PARAM_STR);
                        $query->execute();
                        $result = $query->fetch();
?>
            <main>
                <article>

                    <h2>CELEBRITY PROFILE  - <?php echo $result['name'] ?></h2>
                    <section>
                        <?php
echo "<img src='assets/img/celebs/". $result['file'] ."' alt=''>";
?>
                         <img src="assets/img/banners/add_0<?php $random = mt_rand(1,2); echo $random; ?>.jpg" alt="">
                    </section>
                </article>
                <div class="split"></div>
                <div class="left">
                    <h3>Movies </h3>
                    <div class="youtube-movie">
                        <?php
                            // 3. Perform db query
                   $query = $handler->prepare('SELECT * FROM pp_movies WHERE title  =  :title');
					$query->bindValue(':title', $celeb, PDO::PARAM_STR);
					$query->execute();
					while($result = $query->fetch()){
                       echo "<iframe width='500' height='300' src='" . $result['link'] . "' frameborder='0' allowfullscreen></iframe><br><br>";
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
