<!-- Footer -->
<footer class="footer">

</footer>  
</div>
<div class="span-1 social">
    <a href=""><img src="<?php echo URL; ?>public/img/twitter.png"></a>
    <a href=""><img src="<?php echo URL; ?>public/img/facebook.png"></a>
    <a href=""><img src="<?php echo URL; ?>public/img/feed.png"></a>
</div>
</div>





<!-- jQuery, loaded in the recommended protocol-less way -->
<!-- more http://www.paulirish.com/2010/the-protocol-relative-url/ -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js" ></script>
<!--<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>-->

<!-- define the project's URL (to make AJAX calls possible, even when using this in sub-folders etc) -->
<script>
    var url = "<?php echo URL; ?>";
</script>

<!-- our JavaScript -->
<script src="<?php echo URL; ?>public/js/plugins/flexslider/jquery.flexslider-min.js" ></script>
<script  type="text/javascript" charset="utf-8">
    $(window).load(function () {
        $('.news-slider').flexslider({
            useCSS: true,
            animation: "slide",
            slideshowSpeed: 7000,
            reverse: true,
            controlNav: false,
            slideshow: true
        });

        $('.slide-banner').flexslider({
            useCSS: true,
            animation: "animate",
            controlNav: false,
            slideshow: true,
            easing: "swing",
            animationSpeed: 10000
        });

    });
</script>
</body>
</html>


