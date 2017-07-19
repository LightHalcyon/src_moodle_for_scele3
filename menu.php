<?php
    session_start();
    $token = $_SESSION['token'];
    unset($_SESSION['token']);
?>