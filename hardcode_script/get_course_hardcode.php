<?php
/// SETUP - NEED TO BE CHANGED
$token =  '713e18893d8c2c82f3f45898277cd278';
$domainname = 'localhost/moodle';
$functionname = 'core_course_get_courses_by_field';

// REST RETURNED VALUES FORMAT
$restformat = 'json';

/// PARAMETERS - NEED TO BE CHANGED IF YOU CALL A DIFFERENT FUNCTION
$user1 = 'shortname';
$user2 = 'asdf';

$params = array('field' => $user1);
$params = array('value' => $user2);


/// REST CALL
header('Content-Type: text/plain');
$serverurl = $domainname . '/webservice/rest/server.php'. '?wstoken=' . $token . '&wsfunction='.$functionname;
require_once('./curl.php');

$curl = new curl;
//if rest format == 'xml', then we do not add the param for backward compatibility with Moodle < 2.2
$restformat = ($restformat == 'json')?'&moodlewsrestformat=' . $restformat:'';
$resp = $curl->post($serverurl . $restformat, $params);
$courses3 = json_decode($resp)->courses;
$courseid = '';
foreach($courses3 as $corseses)
{
    //echo $corseses->shortname;
    if($corseses->shortname == $user2)
    {
        $courseid = $corseses->id;
    }
}
print_r($courseid);
?>