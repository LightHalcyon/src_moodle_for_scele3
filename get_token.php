<?php
    session_start();
    $username = urlencode($_GET["username"]);
    $password = urlencode($_GET["password"]);
    $service = urlencode($_GET["service"]);
    $domainname = $_GET['domain'];
    //print_r($domainname);

    /// REST CALL
    header('Content-Type: text/plain');
    $serverurl = $domainname . '/login/token.php'. '?username=' . $username . '&password='.$password.'&service='.$service;
    //print_r($serverurl);
    require_once('./curl.php');

    $curl = new curl;
    $resp = $curl->post($serverurl);
    //print_r($resp);
    $out = json_decode($resp,true);
    //print_r($out);
    $_SESSION['token']=$out['token'];
    $_SESSION['domainname']=$domainname;
    
    //print_r($_SESSION['token']);
    header("location:menu.php");
?>