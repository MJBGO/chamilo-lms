<?php
/* For licensing terms, see /license.txt */
/**
*	This file generates the ActionScript variables code used by the HotSpot .swf
*	@package chamilo.exercise
* 	@author Toon Keppens
* 	@version $Id: admin.php 10680 2007-01-11 21:26:23Z pcool $
*/
/**
 * Code
 */
session_cache_limiter("none");
include('exercise.class.php');
include('question.class.php');
include('answer.class.php');
include('../inc/global.inc.php');

// set vars
$questionId    = intval($_GET['modifyAnswers']);
$objQuestion   = Question::read($questionId);
$answer_type   = $objQuestion->selectType(); //very important
$TBL_ANSWERS   = Database::get_course_table(TABLE_QUIZ_ANSWER);
$documentPath  = api_get_path(SYS_COURSE_PATH).$_course['path'].'/document';
$picturePath   = $documentPath.'/images';
$pictureName   = $objQuestion->selectPicture();
$pictureSize   = getimagesize($picturePath.'/'.$objQuestion->selectPicture());
$pictureWidth  = $pictureSize[0];
$pictureHeight = $pictureSize[1];

$courseLang = $_course['language'];
$coursePath = $_course['path'];


$course_id = api_get_course_int_id();

// Query db for answers
if ($answer_type==HOT_SPOT_DELINEATION) {
    $sql = "SELECT iid, answer, hotspot_coordinates, hotspot_type, ponderation FROM $TBL_ANSWERS
	        WHERE question_id = '".Database::escape_string($questionId)."' AND hotspot_type = 'delineation'
            ORDER BY iid";
} else {
    $sql = "SELECT iid, answer, hotspot_coordinates, hotspot_type, ponderation FROM $TBL_ANSWERS
	        WHERE c_id = $course_id AND question_id = '".Database::escape_string($questionId)."' ORDER BY iid";
}
$result = Database::query($sql);
// Init
$output = "hotspot_lang=$courseLang&hotspot_image=$pictureName&hotspot_image_width=$pictureWidth&hotspot_image_height=$pictureHeight&courseCode=$coursePath";
$i = 1;
$nmbrTries = 0;

while ($hotspot = Database::fetch_assoc($result)) {
    $hotspot_id = $i;
    //$hotspot_id = $hotspot['iid'];
    $output .= "&hotspot_".$hotspot_id."=true";
    $output .= "&hotspot_".$hotspot_id."_answer=".str_replace('&', '{amp}', $hotspot['answer']);
	// Square or rectancle
    if ($hotspot['hotspot_type'] == 'square') {
        $output .= "&hotspot_".$hotspot_id."_type=square";
	}
	// Circle or ovale
    if ($hotspot['hotspot_type'] == 'circle') {
        $output .= "&hotspot_".$hotspot_id."_type=circle";
	}
	// Polygon
    if ($hotspot['hotspot_type'] == 'poly') {
        $output .= "&hotspot_".$hotspot_id."_type=poly";
	}
	// Delineation
    if ($hotspot['hotspot_type'] == 'delineation') {
        $output .= "&hotspot_".$hotspot_id."_type=delineation";
	}
	// No error
    if ($hotspot['hotspot_type'] == 'noerror') {
        $output .= "&hotspot_".$hotspot_id."_type=noerror";
	}

	// This is a good answer, count + 1 for nmbr of clicks
    if ($hotspot['hotspot_type'] > 0) {
		$nmbrTries++;
	}
    $output .= "&hotspot_".$hotspot_id."_coord=".$hotspot['hotspot_coordinates']."";
	$i++;
}

// Generate empty
$i++;
for ($i; $i <= 12; $i++) {
	$output .= "&hotspot_".$i."=false";
}
// Output
echo $output."&nmbrTries=".$nmbrTries."&done=done";
