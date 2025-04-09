
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
<form role="form" method="post" enctype="multipart/form-data" action="<?php echo URL; ?>update/auction" data-parsley-validate />
<p>Current End Date and Time for Auction <?php echo $auction->Auctions_id; ?>: <strong><?php echo $auction->end_date; ?></strong></p> 
<p>Title:</p> <input  type="text" name="title" data-parsley-minlength="1" data-parsley-trigger="change" value="<?php echo $auction->title; ?>" required />
<p>Start Price:</p> <input  type="text" name="start_price" data-parsley-minlength="1" data-parsley-trigger="change" value="<?php echo $auction->start_price; ?>" required/>
<p>Buy Price:</p> <input  type="text" name="buy_price" data-parsley-minlength="1" data-parsley-trigger="change" value="<?php echo $auction->buy_price; ?>" required />
<p>Set End Date:</p> <input  type="text" name="end_date" id="datepicker"/>
<p>Set End Time:</p> 
<select name="end_time">
    <option value=""></option>
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
<p>Current Category: <?php echo $auction->name; ?></p> 
<p>Set Category:</p> 
<select name="category">
    <option value=""></option>
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
<p>Description:</p>
<textarea id="editor"
          name="description"
          placeholder="Description"><?php echo Input::decode($auction->description); ?></textarea>
<p>More Images:</p> <input  type="file" name="file">
<input type="hidden" name="current_category" value="<?php echo $auction->Categories_id; ?>"/>
<input type="hidden" name="date" value="<?php echo $auction->end_date; ?>" />
<input type="hidden" name="user" value="<?php echo $user->data()->Users_id; ?>" />
<input type="hidden" name="ID" value="<?php echo $auction->Auctions_id; ?>" />
<input type="submit" name="submit" value="Update" />
</form>
<p>Gallery:</p>
<?php
if (!empty($data->images)) {
    foreach ($data->images as $image) {
        ?>
        <img width="250" src="<?php echo URL_UPLOADS . $image->url ?>"/> 
        <br>
        <form action="<?php echo URL; ?>delete/image" method="post" onsubmit="return confirm(&#39; Are you sure you want to delete <?php echo $auction->title; ?>? &#39;)">
            <input type="hidden" name="id" value="<?php echo $image->Images_id; ?>"/>
            <input type="hidden" name="ID" value="<?php echo $auction->Auctions_id; ?>" />
            <input type="hidden" name="url" value="<?php echo $image->url; ?>" />
            <input type="submit" name="submit" value="Delete" />
        </form>
        <?php
    }
}
?>
