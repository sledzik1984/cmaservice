<?php
$login = $_COOKIE["user_login_cma"];
include 'mysql.php';

//print_r($_COOKIE);

$barcode = $_POST["barcode"];
$fixturename = $_POST["fixturename"];
$dzial = $_POST["dzial"];
$comment = $_POST["comment"];
$serialno = $_POST["serialno"];
$now = mktime();




//Dodajemy do bazuni... 


//Stan magazynowy
$query = "INSERT INTO `warehouse` (`name`, `comment`, `present`, `localisation`, `barcode`, `ontour`, `lost`, `last_audit`, `inservice`, `serialno`) VALUES ( '$fixturename', '$comment', '1', '$dzial', '$barcode', '0', '0', '$now', '0', '$serialno')";

mysql_query($query);
echo mysql_error();


//Logujemy

$query_log = "INSERT INTO `log_fixtures` (`fixture_id`, `type`, `timestamp`, `user`) VALUES ('$barcode', '0', '$now', '$login')";

//echo $query_log;

mysql_query($query_log);
echo mysql_error();

header ("Location: dodajsprzet.php");

?>