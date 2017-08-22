<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Create Category</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8">
        <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <form action="create_category_script.php" id="create_user" method="get">
            Name: <input type="text" name="nama"><br>
            Parent ID (Default: 0): <input type="number" name="parent"><br>
            ID (Optional): <input type="text" name="idnumber"><br>
            Description (Optional): <input type="text" name="desc"><br>
            <input type="submit" value="Submit">
        </form> 
    </body>
</html>