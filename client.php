<?php
/// SETUP - NEED TO BE CHANGED
$token =  '713e18893d8c2c82f3f45898277cd278';
$domainname = 'localhost/moodle';
$functionname = 'core_user_create_users';

// REST RETURNED VALUES FORMAT
$restformat = 'json';

/// PARAMETERS - NEED TO BE CHANGED IF YOU CALL A DIFFERENT FUNCTION
$user1 = new stdClass();
$user1->username = 'tes.baru.bla.bla';
$user1->password = '1337lEEt`';
$user1->firstname = 'Hawari';
$user1->lastname = 'Adit';
$user1->email = 'harawi.adit.bla@localhost.com';
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
print_r($resp);
?>