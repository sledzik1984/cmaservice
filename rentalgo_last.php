<?php

include 'mysql.php';

$login = $_COOKIE[cmalogin];
$rid = $_POST["rid"];
$close = $_POST["close_last"];






    
    $query_update_warehouse = "UPDATE `rental_details` SET `go` = '1' WHERE `id` = '$rid' LIMIT 1";
    mysql_query($query_update_warehouse);
    echo mysql_error();

    $location = "Location: rentallist.php";
    header($location);





?>