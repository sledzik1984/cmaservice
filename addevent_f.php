<?php


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


//Dodajemy do bazuni... 


//Dodajemy sztukę:
$query = "INSERT INTO `events` (`timestamp`, `timestart`, `timestop`, `who`, `back`, `where`, `response`, `warehousemanager`) VALUES 
( '$now', '$start', '$stop', '$cli_id', '0', '$where', '$response', '$manager')";

mysql_query($query);
echo mysql_error();


//Logujemy

$query_log = "INSERT INTO `log_fixtures` (`type`, `timestamp`, `user`) VALUES ('0', '$now', '$login')";

//echo $query_log;

mysql_query($query_log);
echo mysql_error();

//header ("Location: events.php");

?>
