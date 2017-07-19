<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Create Course</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8">
        <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <form action="create_course_script.php" id="create_user" method="get">
            Fullname: <input type="text" name="fullname"><br>
            Shortname: <input type="text" name="shortname"><br>
            Category ID: <input type="number" name="catid"><br>
            Summary (Optional): <input type="text" name="sum"><br>
            <input type="submit" value="Submit">
        </form> 
    </body>
</html>