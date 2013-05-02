<?php

include 'mysql.php';

$is_sure = $_GET["is_sure"];
$rental_id = $_GET["id"];



if ($is_sure == 1) {


    $query = "DELETE FROM `rental_details` WHERE `id` = '$rental_id' LIMIT 1";
    mysql_query($query);
    echo mysql_error();

   header("Location: rentallist.php");

} else {

    header("Location: rentallist.php");

}

?>
