
        <?php
        if (!empty($data->feedback)) {
            foreach ($data->feedback as $feedback) {
                echo $feedback;
            }
        }

        if (!empty($data->auctions)) {
            foreach ($data->auctions as $auction) {
                
            }
        }
        ?>
        <form role="form" method="post" action="<?php echo URL; ?>update/auction" data-parsley-validate />
            <p>Title:</p> <input  type="text" name="title" data-parsley-minlength="1" data-parsley-trigger="change" required />
            <p>Description:</p> <input  type="text" data-parsley-maxlength="4" data-parsley-minlength="4" data-parsley-trigger="change" name="year" required />
            <p>Start Price:</p> <input  type="text" name="start" data-parsley-minlength="1" data-parsley-trigger="change" required/>
            <p>Buy Price:</p> <input  type="text" name="buy" data-parsley-minlength="1" data-parsley-trigger="change" required />
            <p>Description:</p>
            <textarea id="editor"
                      name="description"
                      placeholder="Description"
                      data-parsley-trigger="change"
                      data-parsley-minlength="20"
                      data-parsley-maxlength="255"
                      data-parsley-minlength-message = " Min 20 characters" required></textarea>
            <p>Image:</p> <input  type="file" name="file" required>
            <input type="text" name="user" value="<?php echo $user->data()->id; ?>"style="display: none">
            <input type="submit" name="submit" value="Submit">
        </form>

