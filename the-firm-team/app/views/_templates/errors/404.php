
<!DOCTYPE html>
<html>
    <head>
        <title>Error 404 - Page not found</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <pre>
        ERROR 404 - PAGE NOT FOUND!

        <button onclick="goBack()">Go Back</button> or <a href="<?php echo URL; ?>home">Return home</a>
        </pre>

        <script>
            function goBack() {
                window.history.back()
            }
        </script>
    </body>
</html>
