<?php
    session_start();
    /// SETUP - NEED TO BE CHANGED
    $token =  $_SESSION['token'];
    //print_r($token);
    $domainname = $_SESSION['domainname'];
    $functionname = 'core_course_create_courses';

    // REST RETURNED VALUES FORMAT
    $restformat = 'json';

    /// PARAMETERS - NEED TO BE CHANGED IF YOU CALL A DIFFERENT FUNCTION
    $user1 = new stdClass();
    $user1->fullname = $_GET['fullname'];
    $user1->shortname = $_GET['shortname']; 
    $user1->categoryid = $_GET['catid']; 
    if($_GET['sum']!=''){
        $user1->summary = $_GET['sum'];
    }else{
        $user1->summary = '<p></p>';
    }
    $user1->summaryformat = 1;
    $user1->format = 'topics';
    $user1->showgrades = 1;
    $user1->newsitems = 5;
    $user1->maxbytes = 0;
    $user1->showreports = 1;
    $user1->groupmode = 0;
    $user1->groupmodeforce = 0;
    $user1->defaultgroupingid = 0;
    // // ...more properties omitted 
    // $preferencename1 = 'preference1';
    // $preferencename2 = 'preference2';
    // $user1->preferences = array(
    //     array('type' => $preferencename1, 'value' => 'preferencevalue1'),
    //     array('type' => $preferencename2, 'value' => 'preferencevalue2'));
    
    $users = array($user1);
    $params = array('courses' => $users);

    /// REST CALL
    header('Content-Type: text/plain');
    $serverurl = $domainname . '/webservice/rest/server.php'. '?wstoken=' . $token . '&wsfunction='.$functionname;
    require_once('./curl.php');

    $curl = new curl;
    //if rest format == 'xml', then we do not add the param for backward compatibility with Moodle < 2.2
    $restformat = ($restformat == 'json')?'&moodlewsrestformat=' . $restformat:'';
    $resp = $curl->post($serverurl . $restformat, $params);
    //print_r($resp);
    header('location:menu.php');
?>