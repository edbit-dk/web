<?php

echo "<h3>Brugere</h3>";
//Perform db query
$query = $handler->query('SELECT * FROM `rrf_users` ORDER BY user_ID');

        echo "<table class=\"table table-striped\" border='0'>
<tr>
<th>ID</th>
<th>NAVN</th>
<th>BRUGERNAVN</th>
<th>EMAIL</th>
<th>ADGANGSKODE</th>
<th>REGISTRERET</th>
<th>Redigér</th>
<th>Slet</th>
</tr>";

while($result = $query->fetch()){
            echo "<tr>";
            echo "<td>" . $result['user_ID'] . "</td>";
            echo "<td>" . $result['user_login'] . "</td>";
            echo "<td>" . $result['user_name'] . "</td>";
            echo "<td>" . $result['user_email'] . "</td>";
            echo "<td>" . $result['user_pass'] . "</td>";
            echo "<td>" . $result['user_date'] . "</td>";
            echo "<td>" . "<a href=\"index.php?page=10&id=" . $result['user_ID'] . "\">Redigér</a>" . "</td>";
            echo "<td>" . "<a href=\"index.php?page=8&table=rrf_users&col=user_ID&ID=" . $result['user_ID'] . "\">Slet</a>" . "</td>";
            echo "</tr>";
        }
        echo "</table>";

echo "<br><br>";

echo "<h3>Beskeder</h3>";
//Perform db query
$query = $handler->query('SELECT * FROM `rrf_messages` ORDER BY message_ID');

        echo "<table class=\"table table-striped\" border='0'>
<tr>
<th>ID</th>
<th>TITEL</th>
<th>EMAIL</th>
<th>MOBIL</th>
<th>DATO</th>
<th>Læs</th>
<th>Slet</th>
</tr>";

while($result = $query->fetch()){
            echo "<tr>";
            echo "<td>" . $result['message_ID'] . "</td>";
            echo "<td>" . $result['message_title'] . "</td>";
            echo "<td>" . $result['message_email'] . "</td>";
    		echo "<td>" . $result['message_phone'] . "</td>";
            echo "<td>" . $result['message_date'] . "</td>";
            echo "<td>" . "<a href=\"index.php?page=3&ID=" . $result['message_ID'] . "\">Læs</a>" . "</td>";
            	echo "<td>" . "<a href=\"index.php?page=8&table=rrf_messages&col=message_ID&ID=" . $result['message_ID'] . "\">Slet</a>" . "</td>";
            echo "</tr>";
        }
        echo "</table>";

echo "<br><br>";

echo "<h3>Nyheder</h3>";
// 3. Perform db query
$query = $handler->query('SELECT * FROM `rrf_news` ORDER BY news_ID');


        echo "<table class=\"table table-striped\" border='0'>
<tr>
<th>ID</th>
<th>TITEL</th>
<th>DATO</th>
<th>Redigér</th>
<th>Slet</th>
</tr>";


while($result = $query->fetch()){
            echo "<tr>";
            echo "<td>" . $result['news_ID'] . "</td>";
            echo "<td>" . $result['news_title'] . "</td>";
            echo "<td>" . $result['news_date'] . "</td>";
            echo "<td>" . "<a href=\"index.php?page=7&ID=" . $result['news_ID'] . "\">Redigér</a>" . "</td>";
            echo "<td>" . "<a href=\"index.php?page=8&table=rrf_news&col=news_ID&ID=" . $result['news_ID'] . "\">Slet</a>" . "</td>";
            echo "</tr>";
        }
        echo "</table>";

echo "<br><br>";

echo "<h3>Events</h3>";
$query = $handler->query('SELECT * FROM `rrf_events` ORDER BY event_ID');

echo "<table class=\"table table-striped\" border='0'>
<tr>
<th>ID</th>
<th>TITEL</th>
<th>DAT0</th>
<th>DAG</th>
<th>START</th>
<th>TOP EVENT</th>
<th>TOP TALENTER</th>
<th>TOP BILLEDE</th>
<th>Redigér</th>
<th>Slet</th>
</tr>";
while ($result = $query->fetch()) {
    echo "<tr>";
    echo "<td>" . $result['event_ID'] . "</td>";
    echo "<td>" . $result['event_title'] . "</td>";
    echo "<td>" . $result['event_date'] . "</td>";
    echo "<td>" . $result['event_day'] . "</td>";
    echo "<td>" . $result['event_start'] . "</td>";
    echo "<td>" . $result['event_top'] . "</td>";
    echo "<td>" . $result['event_talents'] . "</td>";
    echo "<td>" . $result['event_top_image'] . "</td>";
    echo "<td>" . "<a href=\"index.php?page=11&ID=" . $result['event_ID'] . "\">Redigér</a>" . "</td>";
    echo "<td>" . "<a href=\"index.php?page=8&table=rrf_events&col=event_ID&ID=" . $result['event_ID'] . "\">Slet</a>" . "</td>";
    echo "</tr>";
}
echo "</table>";
