<?php

//Todo:
//
// Zamiana daty z kalendarza na timestamp 


include 'mysql.php';
$login = $_COOKIE["user_login_cma"];



//print_r($_COOKIE);

$client = $_POST["client"];
$where = $_POST["where"];
$response = $_POST["response"];
$start = $_POST["start"];
$stop = $_POST["stop"];
$manager = $_POST["manager"];

$now = mktime();

$cli_query = "SELECT * FROM `rental_clients` WHERE `company` = '$client' LIMIT 1";
$cli_result = mysql_query($cli_query);

echo mysql_error();

while ($cli_row = mysql_fetch_assoc($cli_result)) {

    $cli_id = $cli_row["id"];


}

if (empty($cli_id)) {

header ("Location: addevent.php?cli=none");


} else {



//Dodajemy do bazuni... 


//Dodajemy sztukę:
$query = "INSERT INTO `events` (`timestamp`, `timestart`, `timestop`, `who`, `back`, `where`, `response`, `warehousemanager`) VALUES 
( '$now', '$start', '$stop', '$cli_id', '0', '$where', '$response', '$manager')";

mysql_query($query);
echo mysql_error();


$check_last_query = "SELECT `id` FROM `events` ORDER BY `id` ASC";
$check_last_res = mysql_query($check_last_query);

echo mysql_error();

while ($row_check_last = mysql_fetch_assoc($check_last_res)) {

    $last_id = $row_check_last["id"];

}

//Logujemy

$query_log = "INSERT INTO `log_fixtures` (`type`, `timestamp`, `user`, `event_id`) VALUES ('13', '$now', '$login', '$last_id')";

//echo $query_log;

mysql_query($query_log);
echo mysql_error();

header ("Location: events.php");


}


?>
