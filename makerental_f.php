<?php

include 'mysql.php';


//Zmienne POST

$rental_cli_id = $_POST["rentalclient"];
$timestart = $_POST["timestart"];
$timestop = $_POST["timestop"];
$invoice = $_POST["invoice"];

//echo $invoice;

//Część odpowiedzialna za zamianę dat na timestamp!

$start1 = explode(" ", $timestart);

//Data:
$data_start = $start1[0];

$start2 = explode("-", $data_start);

$dzien_start = $start2[0];
$miesiac_start = $start2[1];
$rok_start = $start2[2];

//Godzina:
$godziny_start = $start1[1];

$start3 = explode(":", $godziny_start);

$godzina_start = $start3[0];
$minuta_start = $start3[1];
$sekunda_start = "00";

$start_timestamp = mktime($godzina_start, $minuta_start, $sekunda_start, $miesiac_start, $dzien_start, $rok_start);

//echo $start_timestamp;

$stop1 = explode(" ", $timestop);

//Data:
$data_stop = $stop1[0];

$stop2 = explode("-", $data_stop);

$dzien_stop = $stop2[0];
$miesiac_stop = $stop2[1];
$rok_stop = $stop2[2];

//Godzina:
$godziny_stop = $stop1[1];

$stop3 = explode(":", $godziny_stop);

$godzina_stop = $stop3[0];
$minuta_stop = $stop3[1];
$sekunda_stop = "00";

$stop_timestamp = mktime($godzina_stop, $minuta_stop, $sekunda_stop, $miesiac_stop, $dzien_stop, $rok_stop);

//echo $stop_timestamp;

$query = "INSERT INTO `rental_details` (`rental_client`, `timestart`, `timestop`, `invoice`) VALUES ('$rental_cli_id', '$start_timestamp', '$stop_timestamp', '$invoice')";
mysql_query($query);
echo mysql_error();

header("Location: rentallist.php");

?>