<div class="container">


    <?php
    if (!empty($data->data)) {
        foreach ($data->data as $user) {
            ?>
            <form action="<?php echo URL ?>users/update" method="post">

                <p> Firstname: <input type="text" value="<?php
                    echo Output::escape($user->Firstname);
                    ?>"></p>

                <p> Lastname: <input type="text" value="<?php
                    echo Output::escape($user->Lastname);
                    ?>"></p>

                <p> Email:  <input type="text" value="<?php
                    echo Output::escape($user->Email);
                    ?>"></p>
            </form>
            <?php
        }
    }
    ?>
</div>