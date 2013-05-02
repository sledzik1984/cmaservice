<?php
$login = $_COOKIE["user_login_cma"];

//Funkcja generująca qrkod 
// Trzeba sprawdzić czy qrcod nie został wcześniej wygenerowany - stąd użycie Mysql
//
// Użycie
//
// qrcode_gen(n) gdzie n to długość generowanego ciągu
function qrcode_gen($dlugosc){
    $pattern='1234567890qwertyuioplkjhgfdsazxcvbnm';
	for($i=0; $i<$dlugosc; $i++){
	    $key.=$pattern{rand(0,35)};
	}
	return $key;
}

include 'mysql.php';

//print_r($_COOKIE);

$client = $_POST["client"];
$where = $_POST["where"];
$response = $_POST["response"];
$start = $_POST["start"];
$stop = $_POST["stop"];
$manager = $_POST["manager"];
$qrcode = qrcode_gen(40);

$now = mktime();

echo $qrcode;



//Dodajemy do bazuni... 


//Dodajemy sztukę:
$query = "INSERT INTO `events` (`timestamp`, `timestart`, `timestop`, `who`, `back`, `where`, `response`, `warehousemanager`, `qrcode`) VALUES 
( '$now', '$start', '$stop', '$client', '0', '$where', '$response', '$manager', '$qrcode')";

mysql_query($query);
echo mysql_error();


//Logujemy

$query_log = "INSERT INTO `log_fixtures` (`type`, `timestamp`, `user`) VALUES ('0', '$now', '$login')";

//echo $query_log;

mysql_query($query_log);
echo mysql_error();

//header ("Location: events.php");

?>
