<?php foreach ($data->product as $product) { ?>
    <form action="<?php echo URL; ?>update/product" enctype="multipart/form-data" method="post">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Info - <a href="<?php echo URL; ?>../info/<?php echo $product->ID; ?>"><?php echo $product->Name; ?></a></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <label for="name">Produkt navn</label><br>
                        <input type="text" name="name" id="name" value="<?php echo $product->Name; ?>" required />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="cat">Produkt kategori</label><br>
                        <select  name="cat" id="cat">
                            <?php
                            foreach ($data->cats as $cat) {
                                if ($cat->ID === $product->Category_ID) {
                                    ?>
                                    <option value="<?php echo $cat->ID; ?>" selected><?php echo $cat->Title; ?></option>
                                <?php } else { ?>
                                    <option value="<?php echo $cat->ID; ?>"><?php echo $cat->Title; ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select><br><br>
                        <label for="name" id="new-cat">Ny kategori:</label><br>
                        <input type="text" id="new-cat" name="new-cat" placeholder="Navn" />
                    </td>
                </tr>

                <tr>
                    <td> 
                        <label for="desc">Beskrivelse</label><br>
                        <textarea cols="50" rows="5" id="desc" name="description" required >
                            <?php echo $product->Description; ?>
                        </textarea>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="price">Pris</label><br>
                        <input type="text" name="price"  id="price" value="<?php echo $product->Price; ?>" required /> kr.
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="type">Jordtype</label><br>
                        <input type="text" name="type"  id="type" value="<?php echo $product->Type; ?>" required />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="time">Dyrknings tid</label><br>
                        <input type="text" name="time"  id="time" value="<?php echo $product->Time; ?>" required />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="nr">Varenummer</label><br>
                        <input type="number" name="nr"  id="stock" value="<?php echo $product->Nr; ?>" required />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="stock">Lagerbeholdning</label><br>
                        <input type="number" name="stock"  id="stock" value="<?php echo $product->Stock; ?>" required />
                    </td>
                </tr>

                <tr>
                    <td> 
                        <label for="max">Max lagerbeholdning</label><br>
                        <input type="number" name="max" id="max" value="<?php echo $product->Max; ?>" required />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="min">Min lagerbeholdning</label><br>
                        <input type="number" name="min"  id="min" value="<?php echo $product->Min; ?>" required />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="img">Billede</label><br>
                        <input  type="file" id="img" name="file" /> 
                    </td>
                </tr>


                <tr> 
            <input type="hidden" name="ID"  value="<?php echo $product->ID; ?>" />
            <td><input class="btn btn-success" type="submit" value="Opdater" /></td>
            </tr>
            <tbody>
        </table>
    </form>
<?php } ?>
<?php
if (!empty($data->images)) {
    foreach ($data->images as $image) {
        ?>
        <img width="300" height="200" src="<?php echo URL; ?>../public/uploads/<?php echo $image->URL; ?>" />
        <form action="<?php echo URL; ?>delete/image" method="post">
            <input type="hidden" name="product"  value="<?php echo $product->ID; ?>"/>
            <input type="hidden" name="image" value="<?php echo $image->ID; ?>"/>
            <input type="submit" class="btn btn-danger" value="Slet billede">
        </form>
        <?php
    }
}
?>
<br><br>
<form action="<?php echo URL; ?>delete/product" method="post" onsubmit="return confirm(&#39; Er du sikker? &#39;)" >
    <input type="hidden" name="ID" value="<?php echo $product->ID; ?>" />
    <input class="btn btn-danger" type="submit" value="Slet produkt">
</form>