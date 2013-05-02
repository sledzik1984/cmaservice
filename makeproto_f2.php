<?php

$login = $_COOKIE[cmalogin];

include 'mysql.php';

foreach( $_POST as $key => $value ) {
	if( eregi( 'check', $key )) {
	
	//echo $key;
	
	$fixture = $_POST[$key];
	
	//echo $fixture . "|";
	
	$query = "INSERT INTO `protocol_details` (`protocol_id`, `barcode`, `timestart`, `timestop`) VALUES ('$protocol_id', '$fixture', '$timestart', '$timestop')";
	mysql_query($query);
	echo mysql_error();
	
	$now = mktime();
	
	$log_query = "INSERT INTO `log_fixtures` (`fixture_id`, `type`, `timestamp`, `user`) VALUES ('$fixture', '9', '$now', '$login')";
	mysql_query($log_query);
	echo mysql_error();
	
	}
}


header ("Location: protocols.php");
?>