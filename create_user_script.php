<?php
    session_start();
    /// SETUP - NEED TO BE CHANGED
    $token =  $_SESSION['token'];
    $domainname = 'localhost/moodle';
    $functionname = 'core_user_create_users';

    // REST RETURNED VALUES FORMAT
    $restformat = 'json';

    /// PARAMETERS - NEED TO BE CHANGED IF YOU CALL A DIFFERENT FUNCTION
    $user1 = new stdClass();
    $user1->username = $_GET['username'];
    $user1->password = $_GET['password'];
    $user1->firstname = $_GET['firstname'];
    $user1->lastname = $_GET['lastname'];
    $user1->email = $_GET['email'];
    // // ...more properties omitted
    // $preferencename1 = 'preference1';
    // $preferencename2 = 'preference2';
    // $user1->preferences = array(
    //     array('type' => $preferencename1, 'value' => 'preferencevalue1'),
    //     array('type' => $preferencename2, 'value' => 'preferencevalue2'));

    $users = array($user1);
    $params = array('users' => $users);

    /// REST CALL
    header('Content-Type: text/plain');
    $serverurl = $domainname . '/webservice/rest/server.php'. '?wstoken=' . $token . '&wsfunction='.$functionname;
    require_once('./curl.php');

    $curl = new curl;
    //if rest format == 'xml', then we do not add the param for backward compatibility with Moodle < 2.2
    $restformat = ($restformat == 'json')?'&moodlewsrestformat=' . $restformat:'';
    $resp = $curl->post($serverurl . $restformat, $params);
    header("location:menu.php");
?>