<div class="inner-content content-wrapper">
    <div class="line">

        <div class="unit size3of5 lastUnit">
            <div class="line">
                <div class="unit big-heading">
                    <?php
                    if (!empty($errors)) {
                        foreach ($errors as $error) {
                            echo $error;
                        }
                    }
                    ?>
                    <h2>Kontakt</h2>
                </div>
            </div>
            <form method="post" action="<?php echo URL; ?>create/message" data-parsley-validate>
                <p>* Emne:</p> <input class="detail" type="text" name="subject" placeholder="Dit emne" data-parsley-trigger="change" data-parsley-minlength="6" data-parsley-maxlength="20" data-parsley-validation-threshold="10" data-parsley-minlength-message = "Mindst 6 karaktere" required><br>
                <p>* Email:</p> <input class="detail" type="email" name="email" placeholder="mail@mail.com" data-parsley-trigger="change" required><br> 
                <p>* Besked:</p><textarea class="detail" rows="4" cols="50" name="message" data-parsley-trigger="change" placeholder="Din besked" data-parsley-minlength="20" data-parsley-maxlength="250"  data-parsley-minlength-message = " Du skal indtaste mindst 20 karaktere i din besked" required></textarea><br>
                <br>
                <input class="detail" type="submit" name="submit" value="Send din besked">
            </form>

        </div>

    </div>
</div>

</div>






