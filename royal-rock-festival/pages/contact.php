<?php

if (isset($_POST['submit'])) {

// INSERT PAGE FROM FORM
$query = $handler->prepare("INSERT INTO `rrf_messages`( 

    `message_title`,
    `message_content`,
	`message_email`,
    `message_phone`)

	VALUES (
	:title,
	:content,
    :email,
    :phone
	)");
$query->bindValue(':title', $_POST['subject'], PDO::PARAM_STR);
$query->bindValue(':content', $_POST['message'], PDO::PARAM_STR);
    $query->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
    $query->bindValue(':phone', $_POST['phone'], PDO::PARAM_STR);
    $query->execute();

    $succes = "Besked sendt!";
}
?>
<!-- Content Headers -->
<div class="line ">
    <div class="unit size1of5">

    </div>

    <div class="unit latest-news size3of5">
        <div class="unit size1of5">
            <img  src="img/banner-small.png">
        </div>
        <div class="unit size2of4">
            <h2> Kontakt</h2>
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

        <div class="line ">
            <div class="unit  size1of1">
                <div class="normal-bubble ">
                    <div class="inner-content">
                        <div class="line">
                            <div class="unit size1of1 lastUnit">
                                <div class="module-content-normal">
                                    <form method="post" action="" data-parsley-validate>
                                        <p style="color: green;"><?php echo $succes; ?></p>
                                        <p>* Emne:</p> <input  type="text" name="subject" placeholder="Dit emne" data-parsley-trigger="change" data-parsley-minlength="6" data-parsley-maxlength="20" data-parsley-validation-threshold="10" data-parsley-minlength-message = "Mindst 6 karaktere" required><br>
                                        <p>* Besked:</p><textarea rows="4" cols="50" name="message" data-parsley-trigger="change" placeholder="Din besked" data-parsley-minlength="20" data-parsley-maxlength="250"  data-parsley-minlength-message = " Du skal indtaste mindst 20 karaktere i din besked" required></textarea><br>
                                        <p>* Email:</p> <input  type="email" name="email" placeholder="mail@mail.com" data-parsley-trigger="change" required><br>
                                        <p>* Mobil:</p> <input  type="tel" placeholder="xx xx xx xx" data-parsley-type="digits" data-parsley-trigger="change" data-parsley-minlength="8"  name="phone" required><br>    
                                        <input type="radio" name="read" value="yes"  style="display: none"> 
                                        <input type="radio" name="read" value="no"  style="display: none" checked>
                                        <input type="text" name="hidden" style="display: none"><br>


                                        </div>
                                        </div>

                                        <div class="unit size1of1">
                                            <div class="module-footer">
                                                <input class="btn-ns" type="submit" name="submit" value="Send">

                                                </form>
                                            </div>
                                        </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="unit size1of5">

                </div>
            </div>
        </div>