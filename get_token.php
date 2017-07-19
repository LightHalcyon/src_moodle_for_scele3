<?php
    session_start();
    $username = $_GET["username"];
    $password = $_GET["password"];
    $service = "test";
    $domainname = 'localhost/moodle';

    /// REST CALL
    header('Content-Type: text/plain');
    $serverurl = $domainname . '/login/token.php'. '?username=' . $username . '&password='.$password.'&service='.$service;
    require_once('./curl.php');

    $curl = new curl;
    $resp = $curl->post($serverurl);
    
    $_SESSION['token']=$resp;
    print_r("asdf");
    header("location:menu.php");
?>