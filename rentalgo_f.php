<?php

$login = $_COOKIE["user_login_cma"];

include 'mysql.php';


$barcode = $_POST["barcode"];
$barcode_bez_zera = $barcode += 0;
$rental_details = $_POST["rental_details"];
$last = $_POST["last"];

if (empty($barcode)) {

header("Location: emptybarcode.php");


} else {


    $now = mktime();


    $query_add_last = "INSERT INTO `rentals` (`rental_id`, `barcode`) VALUES ('$rental_details', '$barcode_bez_zera')";
    mysql_query($query_add_last);
    echo mysql_error();

    $query_timeback = "SELECT `timestop` FROM `rental_details` WHERE `id` = '$rental_details' LIMIT 1";
    $result_timeback = mysql_query($query_timeback);
    $row_timeback = mysql_fetch_row($result_timeback);
    
    $timeback = $row_timeback[0];
    
    $query_update_warehouse = "UPDATE `warehouse` SET `timeback` = '$timeback', `ontour` = '1', `present` = '0', `lost` = '0', `inservice` = '0' WHERE `id` = '$barcode_bez_zera' LIMIT 1";
    mysql_query($query_update_warehouse);
    echo mysql_error();


    $query_log = "INSERT INTO `log_fixtures` (`fixture_id`, `type`, `timestamp`, `user`, `rental_id`) VALUES ('$barcode_bez_zera', '6', '$now', '$login', '$rental_details')";
    mysql_query($query_log);
    echo mysql_error();

    $location = "Location: rentalgo.php?rid=" . $rental_details;
    header($location);


//}

}


?>