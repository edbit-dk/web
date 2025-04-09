<form action="<?php echo URL; ?>create/product"  enctype="multipart/form-data" method="post">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nyt Produkt</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <label for="name">Produkt navn</label><br>
                    <input type="text" name="name" id="name" required/>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="cat">Produkt kategori</label><br>
                    <select  name="cat" id="cat">
                        <?php foreach ($data->cats as $cat) { ?>
                        <option value="<?php echo $cat->id; ?>"><?php echo $cat->navn; ?></option>
                        <?php } ?>
                    </select>
                </td>

            </tr>

            <tr>
                <td> 
                    <label for="desc">Beskrivelse</label><br>
                    <textarea cols="50" rows="5" id="desc" name="description" required></textarea>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="price">Pris</label><br>
                    <input type="text" name="price"  id="price"  required/> kr.
                </td>
            </tr>

            <tr>
                <td>
                    <label for="nr">Vare nummer</label><br>
                    <input type="number" name="nr"  id="stock"  required/>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="stock">Lagerbeholdning</label><br>
                    <input type="number" name="stock"  id="stock"  required/>
                </td>
            </tr>

            <tr>
                <td> 
                    <label for="max">Max lagerbeholdning</label><br>
                    <input type="number" name="max" id="max" required/>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="min">Min lagerbeholdning</label><br>
                    <input type="number" name="min"  id="min" required/>
                </td>
            </tr>
            
            <tr>
                <td>
                    <label for="img">Billede</label><br>
                    <input  type="file" id="img" name="file" /> 
                </td>
            </tr>
            
         <tr> 
        <input type="hidden" name="ID"  />
        <td><input  class="btn btn-success" type="submit" value="Opret" /></td>
        </tr>
        <tbody>
    </table>
</form>
