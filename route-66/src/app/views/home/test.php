<div data-sr="enter bottom and scale up 20% over 2s" class="form-signin" >
    <h2 class="form-signin-heading">Win a trip to spain on a 4 star hotel with service!</h2>
</div>
<form data-sr="wait 2.5s and then ease-in-out 100px" class="form-signin"  method="post" action="<?php echo URL; ?>create/participant">
    
    <?php
    if (!empty($data->feedback)) {
        foreach ($data->feedback as $feedback) {
            echo $feedback;
        }
    }
    ?> 
    <?php
    if (!empty($data->questions)) {
        foreach ($data->questions as $question) {
            ?>
            <label  for="title" class="sr-only ">Title</label>
            <input readonly="" id="title" type="text" class="form-control" value="Title: <?php echo $question->Name; ?>"/>

            <label  for="question" class="sr-only ">Question</label>
            <textarea readonly="" id="question" class="form-control">Question: <?php echo $question->Question; ?>
            </textarea>
            <?php
        }
    }
    ?>

    <label for="inputAnswer" class="sr-only">Answers</label>
    <select id="inputAnswer" class="form-control" name="answer">
        <option value="">Pick an answer</option>
        <?php
        if (!empty($data->answers)) {
            foreach ($data->answers as $answer) {
                ?>

                <option value="<?php echo $answer->ID ?>"><?php echo $answer->Answer ?></option>

                <?php
            }
        }
        ?>
    </select>

    <label id="register" for="inputName" class="sr-only">Name</label>
    <input type="text" id="inputName" name="name" class="form-control" placeholder="Full name" required autofocus>

    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>

    <input type="hidden" name="question_id" value="<?php echo $question->ID; ?>"/>
    <button class="btn btn-lg btn-success btn-block" type="submit">Submit your answer and win!</button>
</form>
