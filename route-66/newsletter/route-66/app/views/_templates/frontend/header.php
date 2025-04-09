<?php
if (!empty($data->questions)) {
    foreach ($data->questions as $question) {
        
    }
}
?>

<header>
    <?php
    $user = $this->loadModel('UserModel');
    if (!$user->isLoggedIn()) {
        ?>
        <nav id="top">
            <ul>
                <li><a href="<?php echo URL; ?>">Route 66</a></li>
                <li><a href="#winners">Winners</a></li>
                <li><a href="#register">Register</a></li>
                <li><a href="#login">Login</a></li>
                <li><a href="#newsletter">Newsletter</a></li>
            </ul>
        </nav>
        <?php
    }

    if ($user->isLoggedIn()) {
        ?>
        <nav id="top">
            <ul>
                <li>.</li>
                <li><a href="#controlpanel">Controlpanel</a></li>
                <li><a href="#winners">Winners</a></li>
                <li><a href="<?php echo URL; ?>logout">Logout</a></li>
                <li>.</li>
            </ul>
        </nav>
        <?php
    }
    ?>
    <div class="container center">
        <a href="<?php echo URL; ?>"><h1 class="padding" data-sr="wait 1s and ease-in-out 100px">Route 66</h1></a>
    </div>
    <div class="campaign " data-sr="enter bottom and scale up 20% over 2s">
        <div class="box">
            <h2 class="center" data-sr="wait 1.5s and then ease-in-out 100px">Amazing Competition!<br> Win Awesome Prizes!</h2>
            <p class="center" data-sr="wait 2.5s and then ease-in-out 100px">Ends: <?php echo $question->End_date; ?></p>
            <p><b><?php echo $question->Question; ?></b></p>
            <?php
            if (!empty($data->feedback)) {
                foreach ($data->feedback as $feedback) {
                    echo $feedback;
                }
            }
            ?>
            <form method="post" action="<?php echo URL; ?>create/participant">
                <select  name="answer" required>
                    <option value="">Pick an answer!</option>
                    <?php
                    if (!empty($data->answer_to_question)) {
                        foreach ($data->answer_to_question as $answer_to_question) {
                            ?>

                            <option value="<?php echo $answer_to_question->ID ?>"><?php echo $answer_to_question->Answer ?></option>

                            <?php
                        }
                    }
                    ?>
                </select>
                <input type="text" name="name" placeholder="Your name..." required />
                <input type="email" name="email" placeholder="Your email..." required />
                <input type="hidden" name="question_id" value="<?php echo $question->ID; ?>"/>
                <input type="submit" name="submit" value="COMPETE!">
            </form>
        </div>
        <div  class="image"><img src="<?php echo URL; ?>public/img/route66-product.png" alt="Route 66 Energy Drink"></div>
    </div>

</header>