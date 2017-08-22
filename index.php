<?php
    session_start();
    if(isset($_SESSION['token'])) header("location:menu.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8">
        <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <h1>Login</h1>
        <form action="get_token.php" id="login" method="get">
            Username: <input type="text" name="username"><br>
            Password: <input type="password" name="password"><br>
            Role (Service Shortname): <input type="text" name="service"><br>
            Host: <input type="text" name="domain"><br>
            <input type="submit" value="Submit">
        </form> 
    </body>
</html>