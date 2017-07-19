<?php
    session_start();
    $username = $_GET["username"];
    $password = $_GET["password"];
    $service = "test";
    $domainname = 'localhost/'.$_GET['domain'];

    /// REST CALL
    header('Content-Type: text/plain');
    $serverurl = $domainname . '/login/token.php'. '?username=' . $username . '&password='.$password.'&service='.$service;
    require_once('./curl.php');

    $curl = new curl;
    $resp = $curl->post($serverurl);
    //print_r($resp);
    $out = json_decode($resp,true);
    $_SESSION['token']=$out['token'];
    $_SESSION['domainname']=$domainname;
    
    //print_r($_SESSION['token']);
    header("location:menu.php");
?>