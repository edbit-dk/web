<?php
if (isset($_POST['submit'])) {
    $query = $handler->prepare('DELETE FROM pp_users WHERE id =  :id');
    $query->bindParam(':id', $id, PDO::PARAM_STR);
    $query->execute();

    echo "<strong>" . $id . " is deleted!</strong>";
} else {
    echo "<p>Du you want to delete '" . $id . "'?</p>";

    echo "<form action='' method='post'>
            <input type='submit' name='submit'  value='Delete'>
        	</form>";
}