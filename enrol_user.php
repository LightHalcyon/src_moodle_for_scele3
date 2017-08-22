<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Create User</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8">
        <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <form action="enrol_user_script.php" id="create_user" method="get">
            Class Code: <input type="text" name="classcode"><br>
            NPM: <input type="text" name="npm"><br>
            Role (Course creator = 2, Dosen = 3, Asdos = 4, Mahasiswa = 5): <input type="text" name="roleid"><br>
            <input type="submit" value="Submit">
        </form> 
    </body>
</html>