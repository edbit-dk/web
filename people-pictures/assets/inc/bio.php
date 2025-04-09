<?php

// 3. Perform db query
$query = $handler->prepare('SELECT * FROM pp_celebs WHERE name  =  :name');
$query->bindValue(':name', $id, PDO::PARAM_STR);
$query->execute();
while ($result = $query->fetch()) {
    echo "Full name: " . $result['name'] . "<br><br>";
    echo "Birthday: " . $result['birth'] . "<br><br>";
    echo "Birth Place: " . $result['birth_place'] . "<br><br>";
    echo "Height: " . $result['height'] . "<br><br>";
}
