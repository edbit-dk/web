<ul class="menu">
    <li <?php $title = "Home";
if ($page == null) {
    echo "class=\"active\"";
}
if ($page == 1) {
    echo "class=\"active\"";
}
?>><a href="index.php?page=1">FORSIDE</a></li>
    <li <?php if ($page == 2) {
    echo "class=\"active\"";
} ?>><a href="index.php?page=2">NYHEDER</a></li>  
    <li <?php if ($page == 3) {
    echo "class=\"active\"";
} ?>><a href="index.php?page=3">EVENTS</a></li>
    <li <?php if ($page == 4) {
    echo "class=\"active\"";
} ?>><a href="index.php?page=4">ROYAL ROCK</a></li>
    <li <?php if ($page == 5) {
    echo "class=\"active\"";
} ?>><a href="index.php?page=5">KONTAKT</a></li>
    <?php if(isset($_SESSION['admin'])){
    echo "<li class=\"btn\"><a href=\"login.php\">Kontrolpanel</a><a href=\"admin/logout.php\">Logout</a></li>";
    } 
 elseif(isset($_SESSION['user'])){
 echo "<li class=\"btn\"><a href=\"admin/logout.php\">Logout</a></li>";
    } else {

  echo "<li class=\"btn\"><a href=\"login.php\">Login</a></li>";
    }
    ?>
</ul>