</div>
</div>
</div>
</div>
<!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->


<!-- jQuery -->
<script src="<?php echo $data[ 'project_url' ] ; ?>vendor/jquery/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo $data[ 'project_url' ] ; ?>vendor/twitter-bootstrap/bootstrap.min.js"></script>
<!-- plugins -->
<script src="<?php echo $data[ 'project_url' ] ; ?>vendor/datetime-picker/jquery.datetimepicker.js"></script>
<script src="<?php echo $data[ 'project_url' ] ; ?>vendor/image-picker/image-picker.min.js"></script>
<script src="<?php echo $data[ 'project_url' ] ; ?>vendor/tinymce/tinymce.min.js"></script>
<!-- Menu Toggle Script -->
<script>
    $(document).ready(function () {
        //Sidemenu
        $("#menu-toggle").click(function (e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });

        //Datetimepickers
        $('#start_date').datetimepicker({
            format: 'Y-m-d H:i',
            minDate: 0
        });
        $('#end_date').datetimepicker({
            format: 'Y-m-d H:i',
            minDate: 0
        });

        //Imagepicker
        $("#upload").imagepicker();

        tinymce.init({
            selector: "editor",
            plugins: [
                "advlist autolink lists link image charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
        });

    });


</script>


</body></html>
