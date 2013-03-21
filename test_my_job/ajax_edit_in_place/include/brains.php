<?php

require('config.inc');
require_once('Ajax_Interface.php');

$ai = new Ajax_Interface($db, $dbLoc, $dbUser, $dbPw);

//print_r($_GET);

if ($_GET['edit'] == 'go')  { 
	
	$result = $ai->save(); 
	header('Content-Type: text/xml');
	// generate XML header
	echo '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';
	echo "<response>";
	echo $result;
	echo "</response>";
	
}

if (isset($_GET['pID'])) { 
	
	// we'll generate XML output
	header('Content-Type: text/xml');
	// generate XML header
	echo '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';
	echo "<response>";
	echo $ai->get_item($_GET['pID']);	
	echo "</response>";

}

?>