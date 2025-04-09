<section class="container">
    <h1>Uploads</h1>
    <?php
    if (!empty($data->errors)) {
        foreach ($data->errors as $error) {
            echo $error;
        }
    }
    ?>
    <h5>Upload file</h5>
    <form method="POST" action="<?php echo URL ?>files/upload" enctype="multipart/form-data" data-parsley-validate >
        <p>Album: <select name="Album"> <?php
                if (!empty($data->albums)) {
                    foreach ($data->albums as $album) {
                        ?>
                        <option value="<?php
                        echo $album->ID;
                        ?>"><?php echo $album->Name; ?></option>
                            <?php }
                            ?>
                <?php } ?></select></p>

        <p>Type: <select name="Type"> <?php
                if (!empty($data->types)) {
                    foreach ($data->types as $type) {
                        ?>
                        <option value="<?php
                        echo $type->ID;
                        ?>"><?php echo $type->Name; ?></option>
                            <?php }
                            ?>
                <?php } ?></select></p>

        <p> File: <input type="file" 
                         name="File" 
                         value="<?php
                         if (!empty($data->input->img)) {
                             echo Output::escape($data->input->File);
                         }
                         ?>"/></p>

        <input type="hidden" 
               name="<?php echo TOKEN_NAME ?>" 
               value="<?php echo Token::generate(); ?>"/>
        <p class="submit"><input type="submit" value="Upload"></p>
    </form>
    <h5>Uploaded files</h5>

    <table class="table table-striped" border='1'>

        <tr>
            <th>Nr.</th>
            <th>FILE</th>
            <th>DATE</th>
            <th>ALBUM</th>
            <th>TYPE</th>
            <th>COMPANY</th>
            <th>EDIT</th>
        </tr>
        <?php
        $nr = 1;
        if (!empty($data->uploads)) {
            foreach ($data->uploads as $upload) {
                echo "<tr>";
                echo "<td>" . $nr++ . "</td>";
                echo '<td><a href="' . ASSETS . 'uploads/' . $upload->File . '"><img width="100" src="' . ASSETS . 'uploads/' . $upload->File . '"></a></td>';
                echo "<td>$upload->Date</td>";
                echo "<td>$upload->Album</td>";
                echo "<td>$upload->Type</td>";
                echo "<td>$upload->Company</td>";
                echo '<td><a href="' . URL . 'files/remove/' . $upload->File . '/' . $upload->ID . '">Remove</td>';
                echo "</tr>";
            }
        }
        ?>
    </table>
</section>