<?php
/* For licensing terms, see /license.txt */

$language_file = 'agenda';
require_once dirname(__FILE__).'/../inc/global.inc.php';

//session
if(isset($_GET['id_session']))
	$_SESSION['id_session'] = Security::remove_XSS($_GET['id_session']);

// the variables for the days and the months
// Defining the shorts for the days
$DaysShort = api_get_week_days_short();
// Defining the days of the week to allow translation of the days
$DaysLong = api_get_week_days_long();
// Defining the months of the year to allow translation of the months
$MonthsLong = api_get_months_long();

$iso_lang = api_get_language_isocode($language_interface);

header('Content-Type: text/html; charset='. api_get_system_encoding());

?>
<!DOCTYPE html
     PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $iso_lang; ?>" lang="<?php echo $iso_lang; ?>">
<head>
<title>Calendar</title>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo api_get_system_encoding(); ?>">
<style type="text/css">
/*<![CDATA[*/
.data_table th
{
	font-size: 10px;
}
.data_table td
{
	font-size: 10px;
	width: 25px;
	height: 25px;
}
table.calendar td
{

	background-color: #f5f5f5;
	text-align: center;
}
.data_table td.selected
{
	border: 1px solid #ff0000;
	background-color: #FFCECE;
}
.data_table td a
{
	width: 25px;
	height: 25px;
	text-decoration: none;
}
.data_table td a:hover
{
	background-color: #ffff00;
}
</style>
<script type="text/javascript">
/* <![CDATA[ */
    /* added 2004-06-10 by Michael Keck
     *       we need this for Backwards-Compatibility and resolving problems
     *       with non DOM browsers, which may have problems with css 2 (like NC 4)
    */
    var isDOM      = (typeof(document.getElementsByTagName) != 'undefined'
                      && typeof(document.createElement) != 'undefined')
                   ? 1 : 0;
    var isIE4      = (typeof(document.all) != 'undefined'
                      && parseInt(navigator.appVersion) >= 4)
                   ? 1 : 0;
    var isNS4      = (typeof(document.layers) != 'undefined')
                   ? 1 : 0;
    var capable    = (isDOM || isIE4 || isNS4)
                   ? 1 : 0;
    // Uggly fix for Opera and Konqueror 2.2 that are half DOM compliant
    if (capable) {
        if (typeof(window.opera) != 'undefined') {
            var browserName = ' ' + navigator.userAgent.toLowerCase();
            if ((browserName.indexOf('konqueror 7') == 0)) {
                capable = 0;
            }
        } else if (typeof(navigator.userAgent) != 'undefined') {
            var browserName = ' ' + navigator.userAgent.toLowerCase();
            if ((browserName.indexOf('konqueror') > 0) && (browserName.indexOf('konqueror/3') == 0)) {
                capable = 0;
            }
        } // end if... else if...
    } // end if
/* ]]> */
</script>
<script>
/* <![CDATA[ */
var month_names = new Array(
<?php
foreach($MonthsLong as $index => $month)
{
	echo '"'.$month.'",';
}
?>
"");
var day_names = new Array(
<?php
foreach($DaysShort as $index => $day)
{
	echo '"'.$day.'",';
}
?>
"");
/* ]]> */
</script>
</head>
<body dir="<?php echo api_get_text_direction(); ?>" onLoad="javascript: initCalendar();">
<div id="calendar_data"></div>
<div id="clock_data"></div>
</body>
</html>
