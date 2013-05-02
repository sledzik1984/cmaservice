<?php

include 'mysql.php';

$is_sure = $_GET["is_sure"];
$customer_id = $_GET["id"];

if ($is_sure == 1) {


    $query = "DELETE FROM `rental_clients` WHERE `id` = '$customer_id' LIMIT 1";
    mysql_query($query);
    echo mysql_error();

    header("Location: rentalclientslist.php");

} else {

    header("Location: rentalclientslist.php");

}

?>