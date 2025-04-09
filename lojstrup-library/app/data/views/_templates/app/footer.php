<div style="clear:both;"></div>

<footer>
<p><a href="<?php echo URL; ?>admin">Log ind</a></p>
    <p>Løjstrup Bibliotek</p>
    <p>Hovedgaden 37</p>
    <p>4728 Løjstrup</p>
    <p>6791 2801</p>
    <p>info@lojstrup-bib.dk</p>

</footer>
</div>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script>

    $(function () {
        //alert(window.location.href);
        var pageUrl = window.location.href.substr(window.location.href.lastIndexOf("-/") + 1);
//               alert(pageUrl);
        $(".menu-wrapper > nav > ul > li a").each(function () {
            if ($(this).attr("href") == pageUrl || $(this).attr("href") == '')
                $(this).addClass("active");
        }) // end each
    }); // end function  

</script>
<script>
    var stars = document.getElementById("stars").value;

    $(".star-rating input").each(function () {
        if ($(this).attr("value") == stars)
            this.setAttribute("checked", "checked");
    }) // end each

</script>
</body>