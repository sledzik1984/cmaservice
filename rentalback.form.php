<?php
$login = $_COOKIE["user_login_cma"];

include 'mysql.php';

$barcode = $_POST["barcode"];
$rid = $_POST["rid"];

$query = "UPDATE `rentals` SET `back` = '1' WHERE `rental_id` = '$rid' AND `barcode` = '$barcode' LIMIT 1";
mysql_query($query);

echo mysql_error();

$now = mktime();


//Zapytanie dodające do loga:
$query_log = "INSERT INTO `log_fixtures` ( `fixture_id`, `type`, `timestamp`, `user`, `rental_id`) VALUES ( '$barcode', '7', '$now', '$login', '$rid')";
mysql_query($query_log);
echo mysql_error();


//Zapytanie aktualizujące urządzenie jako dostępne na magazynie

$warehouse_update = "UPDATE `warehouse` SET `present` = '1', `ontour` = '0', `lost` = '0', `last_audit` = '$now' WHERE `barcode` = '$barcode' LIMIT 1";
mysql_query($warehouse_update);
echo mysql_error();

//Oznaczenie całego wypożyczenia jako zwróconego:

$query_ilosc = "SELECT COUNT(back) FROM `rentals`  WHERE `rental_id` = '$rid'";
$result_ilosc = mysql_query($query_ilosc);

while ($row_ilosc = mysql_fetch_array($result_ilosc)) {


    $query_suma = "SELECT SUM(back) FROM `rentals` WHERE `rental_id` = '$rid'";
    $result_suma = mysql_query($query_suma);
    
    while ($row_suma = mysql_fetch_array($result_suma)) {
    

	if ($row_ilosc['COUNT(back)'] == $row_suma['SUM(back)']) {
    
	    $query_update = "UPDATE `rental_details` SET `back` = '1' WHERE `id` = '$rid' LIMIT 1";
	    mysql_query($query_update);
	    
	    echo mysql_error();
    
	}
    
    }


}

header ("Location: rentalback.php?rid=$rid");

?>
