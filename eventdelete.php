<?php

include 'mysql.php';
include 'debug.php';

$is_sure = $_GET["is_sure"];
$event_id = $_GET["id"];

//Debug
if ($debug == 1) {

	echo "\nDEBUG: is_sure: " . $is_sure;
	echo "\nDEBUG: event_id: " . $event_id;

}

if ($is_sure == 1) {


    $query = "UPDATE `events` SET `deleted` = '1' WHERE `id` = '$event_id'";
    mysql_query($query);
    if ($debug == 1) { echo "DEBUG: Mysql_error: " .mysql_error(); }

    if ($debug != 1) { header("Location: listasztuk.php"); }

} else {


    if ($debug != 1) { header("Location: listasztuk.php"); }

}

?>
