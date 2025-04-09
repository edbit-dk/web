<?php foreach ($data->product as $product) { ?>
    <form action="<?php echo URL; ?>update/product" enctype="multipart/form-data" method="post">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Info - <a href="<?php echo URL; ?>../?page=produkt_detalje&kategori=<?php echo $product->fk_kategorier_id; ?>&produkt=<?php echo $product->id; ?>"><?php echo $product->Name; ?></a></th>
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
                                if ($cat->id === $product->fk_kategorier_id) {
                                    ?>
                                    <option value="<?php echo $cat->id; ?>" selected><?php echo $cat->navn; ?></option>
                                <?php } else { ?>
                                    <option value="<?php echo $cat->id; ?>"><?php echo $cat->navn; ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select><br><br>
                    </td>
                </tr>

                <tr>
                    <td> 
                        <label for="desc">Beskrivelse</label><br>
                        <textarea cols="50" rows="5" id="desc" name="description" required >
                            <?php echo $product->beskrivelse; ?>
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
            <input type="hidden" name="ID"  value="<?php echo $product->id; ?>" />
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
        <img width="300" height="200" src="<?php echo URL; ?>../assets/images/<?php echo $image->sti; ?>" />
        <form action="<?php echo URL; ?>delete/image" method="post">
            <input type="hidden" name="product"  value="<?php echo $product->id; ?>"/>
            <input type="hidden" name="image" value="<?php echo $image->id; ?>"/>
            <input type="submit" class="btn btn-danger" value="Slet billede">
        </form>
        <?php
    }
}
?>
<br><br>
<form action="<?php echo URL; ?>delete/product" method="post" onsubmit="return confirm(Er du sikker?)" >
    <input type="hidden" name="ID" value="<?php echo $product->id; ?>" />
    <input class="btn btn-danger" type="submit" value="Slet produkt">
</form>