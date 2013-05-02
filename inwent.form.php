<?php

include 'mysql.php';

$now = mktime();
$barcode = $_POST["barcode"];
$barcode_bez_zer = $barcode += 0;



$login = $_COOKIE["user_login_cma"];

$query = "UPDATE `warehouse` SET `last_audit` = '$now' , `present` = '1', `ontour` = '0', `inservice` = '0', `lost` = '0' WHERE `barcode` = '$barcode_bez_zer'";

//echo $query;

mysql_query($query);
echo mysql_error();



//Część odpowiedzialna za zalogowanie inwentaryzacji:

$query_log = "INSERT INTO `log_fixtures` (`fixture_id`, `type`, `timestamp`, `user`) VALUES ('$barcode_bez_zer', '8', '$now', '$login')";

mysql_query($query_log);
echo mysql_error();




header ("Location: inwentaryzacja.php");


?>