<script>
$(document).ready(function () {

    tinymce.init({
        selector: "#editor", theme: "modern", width: 680, height: 300,
        plugins: [
            "advlist autolink link image lists charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
            "table contextmenu directionality emoticons paste textcolor responsivefilemanager"
        ],
        toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
        toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
        image_advtab: true,
        external_filemanager_path: "../vendor/responsivefilemanager/filemanager/",
        filemanager_title: "Media",
        filemanager_access_key: "234fsdg34k",
        filemanager_sort_by: "name,size,extension,date",
        external_plugins: {"filemanager": "<?php Get::root(); ?>../vendor/responsivefilemanager/filemanager/plugin.min.js"}
    });

});
</script>