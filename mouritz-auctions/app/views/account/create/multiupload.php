<?php
if (!empty($data->feedback)) {
    foreach ($data->feedback as $feedback) {
        echo $feedback;
    }
}

if (!empty($data->inputs)) {
    foreach ($data->inputs as $input) {
        
    }
}
?>
<h3 class="heading">Multiupload Auction</h3>
<form role="form" method="post" enctype="multipart/form-data" action="<?php echo URL; ?>test/upload" data-parsley-validate>
    <p>Title:</p> <input  type="text" name="title" value="<?php echo $input['title']; ?>" data-parsley-maxlength="254" data-parsley-minlength="5" data-parsley-trigger="change" required/>
    <p>Start Price:</p> <input  type="text" name="start_price" value="<?php echo $input['start_price']; ?>" data-parsley-maxlength="32" data-parsley-minlength="1" data-parsley-trigger="change" required/>
    <p>Buy Price:</p> <input  type="text" name="buy_price" value="<?php echo $input['buy_price']; ?>" data-parsley-maxlength="32" data-parsley-minlength="1" data-parsley-trigger="change" required />
    <p>End Date:</p> <input  type="text" name="end_date" id="datepicker" value="<?php echo $input['end_date']; ?>"  required />
    <p>End Time:</p> 
    <select name="end_time"  required>

        <option selected="selected">
            <?php
            echo $input['end_time'];
            ?>
        </option>

        <option value="00:00">00:00</option>
        <option value="00:30">00:30</option>
        <option value="01:00">01:00</option>
        <option value="01:30">01:30</option>
        <option value="02:00">02:00</option>
        <option value="02:30">02:30</option>
        <option value="03:00">03:00</option>
        <option value="03:30">03:30</option>
        <option value="04:00">04:00</option>
        <option value="04:30">04:30</option>
        <option value="05:00">05:00</option>
        <option value="05:30">05:30</option>
        <option value="06:00">06:00</option>
        <option value="06:30">06:30</option>
        <option value="07:00">07:00</option>
        <option value="07:30">07:30</option>
        <option value="08:00">08:00</option>
        <option value="08:30">08:30</option>
        <option value="09:00">09:00</option>
        <option value="09:30">09:30</option>
        <option value="10:00">10:00</option>
        <option value="10:30">10:30</option>
        <option value="11:00">11:00</option>
        <option value="11:30">11:30</option>
        <option value="12:00">12:00</option>
        <option value="12:30">12:30</option>
        <option value="13:00">13:00</option>
        <option value="13:30">13:30</option>
        <option value="14:00">14:00</option>
        <option value="14:30">14:30</option>
        <option value="15:00">15:00</option>
        <option value="15:30">15:30</option>
        <option value="16:00">16:00</option>
        <option value="16:30">16:30</option>
        <option value="17:00">17:00</option>
        <option value="17:30">17:30</option>
        <option value="18:00">18:00</option>
        <option value="18:30">18:30</option>
        <option value="19:00">19:00</option>
        <option value="19:30">19:30</option>
        <option value="20:00">20:00</option>
        <option value="20:30">20:30</option>
        <option value="21:00">21:00</option>
        <option value="21:30">21:30</option>
        <option value="22:00">22:00</option>
        <option value="22:30">22:30</option>
        <option value="23:00">23:00</option>
        <option value="23:30">23:30</option>
    </select>
    <p>Category:</p> 
    <select name="category" required>

        <option value="" selected="selected">
            <?php
            echo $input['category_name'];
            ?>
        </option>
        <?php
        if (!empty($data->categories)) {
            foreach ($data->categories as $category) {
                ?>
                <option value="<?php echo $category->Categories_id; ?>"><?php echo $category->name; ?></option>
                <?php
            }
        }
        ?>

    </select>
    <p>Description (min 20, max 500 words):</p>
    <textarea id="editor" name="description">     
        <?php
        echo $input['description'];
        ?>
    </textarea>
    <p>Image:</p> <input  type="file" name="file[]" required>
    <input type="hidden" name="user" value="<?php echo $user->data()->Users_id; ?>" />
    <input type="hidden" name="category_name" value="<?php echo $category->name; ?>" />
    <input type="submit" name="submit" value="Submit"> 
</form>

