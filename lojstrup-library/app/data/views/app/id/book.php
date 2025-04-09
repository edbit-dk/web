<div class="content">
    <?php
    foreach ($multidata->book as $book)
    {
        ?>
        <div class="box clearfix no-border">

            <div class="image lonely-sad-image-qq">
                <img src="<?php echo URL; ?>public/uploads/<?php echo $book->Img; ?>" alt="<?php echo $book->Title; ?>">
            </div>

            <div class="text">
                <h2 class = "title"><?php echo $book->Title; ?></h2>
                <p>
                    <?php echo $book->Text; ?>
                </p>
            </div>
        </div>
        <div class="box clearfix no-border">
            <p><?php echo $book->Text; ?></p>
        </div>
        <div class="box clearfix no-border">
            <input type="hidden" id="stars" value="<?php echo $multidata->rating; ?>">
            <p style="margin-left:10px;">Giv din bedømmelse:</p>
            <span class="star-rating">
                <form action="<?php echo URL; ?>rating/create" method="post">
                    <input type="radio" name="Rating" id="test" value="1" onclick="this.form.submit()"><i></i>
                    <input type="radio" name="Rating" value="2" onclick="this.form.submit()"><i></i>
                    <input type="radio" name="Rating" value="3" onclick="this.form.submit()"><i></i>
                    <input type="radio" name="Rating" value="4" onclick="this.form.submit()"><i></i>
                    <input type="radio" name="Rating" value="5" onclick="this.form.submit()"><i></i>
                    <input type="hidden" name="ID" value="<?php echo $book->ID; ?>" >
                    <input type="hidden" name="IP" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>" >
                </form>
            </span>
        </div>
        <div class="box clearfix no-border"></div>
        <div class="box clearfix no-border comments">
            <div class="text">
                Skriv din kommentar:
                <form action="<?php echo URL; ?>comment/create" method="post">
                    <input type="text" name="Navn" placeholder="Navn">

                    <textarea name="Tekst" placeholder="Kommentar"></textarea>
                    <input type="hidden" name="Bog_ID" value="<?php echo $book->ID; ?>">
                    <input type="submit" value="Send">
                </form>

            </div>
            <?php
            foreach ($multidata->comments as $com)
            {
                ?>                        

                <b><p style="color: orange"><?php echo $com->Name; ?> &nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo date("d/m/y h:i", $com->Date) ?></p></b>
                <p><?php echo $com->Text; ?></p>
                <?php
            }
            ?>
        </div>
    </div>
    <?php
}
