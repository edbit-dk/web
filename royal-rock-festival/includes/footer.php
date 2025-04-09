            <!-- Footer -->
            <footer class="footer">
                <div class="line inner-footer">
                    <div class="unit size2of4">
                        <ul class="menu2">
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
                        </ul><br>
                        <ul class="menu2 menu3">
    <li <?php if ($page == 4) {
    echo "class=\"active\"";
} ?>><a href="index.php?page=4">ROYAL ROCK</a></li>
    <li <?php if ($page == 5) {
    echo "class=\"active\"";
} ?>><a href="index.php?page=5">KONTAKT</a></li>
                        </ul>
                    </div>

                    <div class="unit size1of2 quote">
                        <h3>"Dette er en skole opgave designet til brug udelukkende af studerende på Webintegrator uddannelsen på Syddansk Erhvervsskole"</h3>

                    </div>

                    <div class="unit size1of5 contact lastUnit">
                        <p><span>Royal Rock Festival</span><br>Rockens Boulevard 168<br>5000, Odense<br>fakemail@royalrockfestival.dk</p>
                    </div>
                </div>
            </footer>