<div id="controlpanel"></div>
<div class="container center padding">
    <a  href="#top" data-sr=" enter bottom and scale up 20% over 2s">Back to top</a>
</div>
<?php
if ($user->isLoggedIn()) {
    ?>
    <footer >

        <h2 data-sr="enter bottom and scale up 20% over 2s">CONTROLPANEL -
            <a class="btn btn-primary" href="<?php echo URL; ?>#participants">Participants</a>
            <a class="btn btn-primary" href="<?php echo URL; ?>#competition">Competition</a>
            <a class="btn btn-primary" href="<?php echo URL; ?>#newsletter">Newsletter</a>
        </h2>

        <div class="controlpanel">
            <h2 class="center" data-sr="enter bottom and scale up 20% over 2s">Overview</h2>
            <?php
            if (!empty($data->admin_feedback)) {
                foreach ($data->admin_feedback as $admin_feedback) {
                    echo $admin_feedback;
                }
            }
            ?>
            <br><br><h2 class="center">Questions</h2>
            <table  class="table table-striped" border='1' data-sr="enter bottom and scale up 20% over 2s">
                <tr>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Question</th>
                </tr>

                <tbody>
                    <?php
                    if (!empty($data->all_questions)) {
                        foreach ($data->all_questions as $all_questions) {
                            ?>
                            <tr>
                                <td><?php echo $all_questions->Start_date; ?></td>
                                <td><?php echo $all_questions->End_date; ?></td>
                                <td><?php echo $all_questions->Question; ?></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>

            <br><br><h2 class="center">Answers</h2>
            <table  class="table table-striped" border='1' data-sr="enter bottom and scale up 20% over 2s">
                <tr>
                    <th>Answers</th>
                    <th>Correct Answer</th>
                    <th>Question </th>
                </tr>

                <tbody>
                    <?php
                    if (!empty($data->answers)) {
                        foreach ($data->answers as $answers) {
                            ?>
                            <tr>
                                <td><?php echo $answers->Answer; ?></td>
                                <td><?php
                                    if ($answers->Correct_answer == 1) {
                                        echo 'yes';
                                    } else {
                                        echo 'no';
                                    }
                                    ?></td>
                                <td><?php echo $answers->Question; ?></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>

            <br><br><h2 class="center">Prices</h2>
            <table  class="table table-striped" border='1' data-sr="enter bottom and scale up 20% over 2s">
                <tr>
                    <th>Name</th>
                </tr>

                <tbody>
                    <?php
                    if (!empty($data->prices)) {
                        foreach ($data->prices as $price) {
                            ?>
                            <tr>
                                <td><?php echo $price->Name; ?></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>

            <br><br><h2 class="center" data-sr="enter bottom and scale up 20% over 2s">Participants</h2>
            <table id="participants"  class="table table-striped" border='1' data-sr="enter bottom and scale up 20% over 2s">


                <tr>
                    <th>Registered</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Answered Correct?</th>
                    <th>Question</th>
                    <th>Action
                <form method="post" action="<?php echo URL; ?>create/randomwinner" onsubmit="return confirm('Are you sure you want to make a random winner?')">
                    <input type="hidden" name="Question_ID" value="<?php echo $participant->Question_ID; ?>">
                    <input type="hidden" name="Price_ID" value="<?php echo $price->ID; ?>">
                    <input type="submit" name="submit" class="btn btn-success" value="Random Winner">
                </form>
                </th>
                <th>Delete</th>
                </tr>

                <tbody>
                    <?php
                    if (!empty($data->participants)) {
                        foreach ($data->participants as $participant) {
                            ?>
                            <tr>
                                <td><?php echo $participant->Registered; ?></td>
                                <td><?php echo $participant->Name; ?></td>
                                <td><?php echo $participant->Email; ?></td>
                                <td><?php
                                    if ($participant->Correct_answer == 1) {
                                        echo 'yes';
                                    } else {
                                        echo 'no';
                                    }
                                    ?></td>
                                <td><?php echo $participant->Question; ?></td>
                                <td>
                                    <?php
                                    if ($participant->Correct_answer == 1) {
                                        ?>
                                        <form method="post" action="<?php echo URL; ?>create/winner" onsubmit="return confirm('Are you sure you want to make this participant winner?')">
                                            <input type="hidden" name="Answer" value="<?php
                                            if ($answers->Correct_answer == 1) {
                                                echo $answers->Answer;
                                            }
                                            ?>">
                                            <input type="hidden" name="Question" value="<?php echo $all_questions->Question; ?>">
                                            <input type="hidden" name="Price" value="<?php echo $price->Name; ?>">
                                            <input type="hidden" name="Name" value="<?php echo $participant->Name; ?>">
                                            <input type="hidden" name="Email" value="<?php echo $participant->Email; ?>">
                                            <input type="hidden" name="Participant_ID" value="<?php echo $participant->ID; ?>">
                                            <input type="hidden" name="Question_ID" value="<?php echo $participant->Question_ID; ?>">
                                            <input type="hidden" name="Price_ID" value="<?php echo $price->ID; ?>">
                                            <input type="submit" name="submit" class="btn btn-success" value="Make Winner">
                                        </form>
                                        <?php
                                    }
                                    ?>
                                </td>
                                <td>
                                    <form method="post" action="<?php echo URL; ?>delete/participant" onsubmit="return confirm('Are you sure you want to delete this participant?')">
                                        <input type="hidden" name="ID" value="<?php echo $participant->ID; ?>">
                                        <input type="submit" name="submit" class="btn btn-danger" value="Delete Participant">
                                    </form>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>

            <br><br><h2 class="center">Winners</h2>
            <table id="competition"  class="table table-striped" border='1' data-sr="enter bottom and scale up 20% over 2s">
                <tr>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Question</th>
                    <th>Price</th>
                </tr>

                <tbody>
                    <?php
                    if (!empty($data->winners)) {
                        foreach ($data->winners as $winner) {
                            ?>
                            <tr>
                                <td><?php echo $winner->Date; ?></td>
                                <td><?php echo $winner->Name; ?></td>
                                <td><?php echo $winner->Email; ?></td>
                                <td><?php echo $winner->Question; ?></td>
                                <td><?php echo $winner->Price; ?></td>
                                <td>
                                    <form method="post" action="<?php echo URL; ?>delete/winner">
                                        <input type="hidden" name="Participant_ID" value="<?php echo $winner->Participant_ID; ?>">
                                        <input type="submit" name="submit" class="btn btn-danger" value="Remove Winner">
                                    </form>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>


        </div>
        <br><br><h2 class="center">Create Competition</h2>
        <form   class="form-signin login-wrap container " method="post" action="<?php echo URL; ?>create/competition" onsubmit="return confirm('Are you sure you want to make this participant winner?')">
            <textarea class="form-control" name="question" placeholder="Question">

            </textarea>
            <input type="text" name="answer1" class="form-control" placeholder="Answer 1" required>
            <input type="text" name="answer2" class="form-control" placeholder="Answer 2"  required>
            <input type="text" name="answer3" class="form-control" placeholder="Answer 3"  required>
            <select name="correct_answer" class="form-control">
                <option>Select correct answer</option>
                <option value="1">Answer 1</option>
                <option value="2">Answer 2</option>
                <option value="3">Answer 3</option>
            </select>
            <input type="submit" name="submit" class="btn btn-success" value="Create Competition">
        </form>

        <h2 id="newsletter" class="center">Create Newsletter</h2>
        <form class="form-signin container" method="post" action="<?php echo URL; ?>create/newsletter">
            <input type="text" name="name" class="form-control" placeholder="Name" required>
            <textarea class="form-control" name="body" placeholder="Body (html allowed)"></textarea>           
            <input type="submit" name="submit" class="btn btn-success" value="Create Newsletter">
        </form>

        <h2 class="center">Newsletters</h2>
        <table  class="table table-striped" border='1' data-sr="enter bottom and scale up 20% over 2s">
            <tr>
                <th>Date</th>
                <th>Name</th>
                <th>Body</th>
                <th>Status</th>
                <th></th>
            </tr>

            <tbody>
                <?php
                if (!empty($data->newsletters)) {
                    foreach ($data->newsletters as $newsletter) {
                        ?>
                        <tr>
                            <td><?php echo date("d/m/y h:i", $newsletter->Date); ?></td>
                            <td><?php echo $newsletter->Name; ?></td>
                            <td><?php echo $newsletter->Body; ?></td>
                            <td><?php if ($newsletter->Status == 1) { ?>
                                    <p class="label label-danger">Newsletter send</p>
                                <?php } else { ?>
                                    <a class="btn btn-success" href="<?php echo URL; ?>send/newsletter/<?php echo $newsletter->ID; ?>">Send</a>
                                <?php } ?></td>
                            <td><form action="<?php echo URL; ?>delete/newsletter" method="post" onsubmit="return confirm('Are you sure?')">
                                    <input type="hidden" name="ID" value="<?php echo $newsletter->ID; ?>">
                                    <input class="btn btn-danger" type="submit" value="Delete">
                                </form></td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>

        <br><br><h2 class="center">Newsletter Subscribers</h2>
        <table  class="table table-striped" border='1' data-sr="enter bottom and scale up 20% over 2s">
            <tr>
                <th>Date</th>
                <th>Name</th>
                <th>Email</th>
            </tr>

            <tbody>
                <?php
                if (!empty($data->subscribers)) {
                    foreach ($data->subscribers as $subscriber) {
                        ?>
                        <tr>
                            <td><?php echo date("d/m/y h:i", $subscriber->Date); ?></td>
                            <td><?php echo $subscriber->Name; ?></td>
                            <td><?php echo $subscriber->Email; ?></td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>

        <div class="container center padding">
            <a  href="#top" data-sr=" enter bottom and scale up 20% over 2s">Back to top</a>
        </div>

    </footer>
    <?php
}
?>

