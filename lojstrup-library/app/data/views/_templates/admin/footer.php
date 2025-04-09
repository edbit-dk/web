
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo URL; ?>public/assets/default/js/jquery.js"></script>
<script src="<?php echo URL; ?>public/assets/default/js/bootstrap.js"></script>
<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
<script src="<?php echo URL; ?>public/assets/default/js/holder.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="<?php echo URL; ?>public/assets/default/js/ie10-viewport-bug-workaround.js"></script>
<script src="<?php echo URL; ?>public/assets/default/js/ie-emulation-modes-warning.js"></script>
<script src="//cdn.ckeditor.com/4.4.7/standard/ckeditor.js"></script>


<script>
    $(function () {
       //alert(window.location.href);
        var pageUrl = window.location.href.substr(window.location.href.lastIndexOf("-/") + 1);
//               alert(pageUrl);
        $(".col-sm-3.col-md-2.sidebar > ul > li a").each(function () {
            if ($(this).attr("href") == pageUrl || $(this).attr("href") == '')
                $(this).parent('li').addClass("active");
        }) // end each
    }); // end function  

</script>
<script>
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor');
</script>
</body>
</html>