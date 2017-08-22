<?php
    /// SETUP - NEED TO BE CHANGED
    $token =  '713e18893d8c2c82f3f45898277cd278';
    $domainname = 'localhost/moodle';
    $functionname = 'enrol_manual_enrol_users';

    // REST RETURNED VALUES FORMAT
    $restformat = 'json';

    // REST RETURNED VALUES FORMAT
    $restformat = 'json';

    /// PARAMETERS - NEED TO BE CHANGED IF YOU CALL A DIFFERENT FUNCTION
    $user1 = new stdClass();
    $user1->roleid = '1';
    $user1->userid = '2';
    $user1->courseid = '4';

    $users = array($user1);
    $params = array('enrolments' => $users);

    /// REST CALL
    header('Content-Type: text/plain');
    $serverurl = $domainname . '/webservice/rest/server.php'. '?wstoken=' . $token . '&wsfunction='.$functionname;
    require_once('./curl.php');

    $curl = new curl;
    //if rest format == 'xml', then we do not add the param for backward compatibility with Moodle < 2.2
    $restformat = ($restformat == 'json')?'&moodlewsrestformat=' . $restformat:'';
    $resp = $curl->post($serverurl . $restformat, $params);
    print_r($resp);
?>