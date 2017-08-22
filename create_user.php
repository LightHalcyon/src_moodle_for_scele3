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
        <form action="create_user_script.php" id="create_user" method="get">
            Username: <input type="text" name="username"><br>
            Password: <input type="password" name="password"><br>
            First Name: <input type="text" name="firstname"><br>
            Last Name: <input type="text" name="lastname"><br>
            Email: <input type="email" name="email"><br>
            NPM: <input type="text" name="npm"><br>
            <input type="submit" value="Submit">
        </form> 
    </body>
</html>