<?php
    session_start();
    /// SETUP - NEED TO BE CHANGED
    $token =  $_SESSION['token'];
    $domainname = $_SESSION['domainname'];
    $functionname = 'enrol_manual_enrol_users';
    $functionname2 = 'core_user_get_users';
    $functionname3 = 'core_course_get_courses_by_field';

    // REST RETURNED VALUES FORMAT
    $restformat = 'json';
    $restformat2 = 'json';
    $restformat3 = 'json';

    /// GET COURSE
    /// PARAMETERS - NEED TO BE CHANGED IF YOU CALL A DIFFERENT FUNCTION
    $params = array('field' => 'shortname');
    $params = array('value' => $_GET['classcode']);

    /// REST CALL
    header('Content-Type: text/plain');
    $serverurl = $domainname . '/webservice/rest/server.php'. '?wstoken=' . $token . '&wsfunction='.$functionname3;
    require_once('./curl.php');

    $curl3 = new curl;
    //if rest format == 'xml', then we do not add the param for backward compatibility with Moodle < 2.2
    $restformat3 = ($restformat3 == 'json')?'&moodlewsrestformat=' . $restformat:'';
    $resp3 = $curl3->post($serverurl . $restformat3, $params);
    $courses3 = json_decode($resp3)->courses;
    $courseid = '';
    foreach($courses3 as $corseses)
    {
        if($corseses->idnumber == $_GET['classcode'])
        {
            $courseid = $corseses->id;
        }
    }
    
    /// GET USER
    /// PARAMETERS - NEED TO BE CHANGED IF YOU CALL A DIFFERENT FUNCTION
    $user1 = new stdClass();
    $user1->key = 'idnumber';
    $user1->value = $_GET['npm'];
    // // ...more properties omitted
    // $preferencename1 = 'preference1';
    // $preferencename2 = 'preference2';
    // $user1->preferences = array(
    //     array('type' => $preferencename1, 'value' => 'preferencevalue1'),
    //     array('type' => $preferencename2, 'value' => 'preferencevalue2'));

    $users = array($user1);
    $params = array('criteria' => $users);

    /// REST CALL
    header('Content-Type: text/plain');
    $serverurl = $domainname . '/webservice/rest/server.php'. '?wstoken=' . $token . '&wsfunction='.$functionname2;
    require_once('./curl.php');

    $curl2 = new curl;
    //if rest format == 'xml', then we do not add the param for backward compatibility with Moodle < 2.2
    $restformat2 = ($restformat2 == 'json')?'&moodlewsrestformat=' . $restformat:'';
    $resp2 = $curl2->post($serverurl . $restformat2, $params);
    
    //print_r($resp3);

    /// ENROLL
    /// PARAMETERS - NEED TO BE CHANGED IF YOU CALL A DIFFERENT FUNCTION
    $enrol = new stdClass();
    $enrol->roleid = $_GET['roleid'];
    $enrol->userid = json_decode($resp2)->users[0]->id;
    $enrol->courseid = $courseid;

    $enrolments = array($enrol);
    $params = array('enrolments' => $enrolments);

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