<?php

include 'mysql.php';

$cleaning = $_POST["cleaning"];
$lamp = $_POST["lamp"];
$out_service = $_POST["out_service"];
$descr = $_POST["description"];
$barcode = $_POST["barcode"];
$timestamp = time();

//$query = "INSERT INTO `rental_clients` (`email`, `first_name`, `last_name`, `company`, `document_no`, `street`, `zip`, `city`, `phone`, `nip`) VALUES ('$email','$firstname','$lastname','$company','$document_no','$addr','$zip','$city','$phone','$nip')";
//mysql_query($query);
//echo mysql_error();



$query_1 = "INSERT INTO `service` (`barcode`, `timestamp`, `lamp_exchange`, `cleaning`, `out_service`, `other_comment`) VALUES ('$barcode', '$timestamp', '$lamp', '$cleaning', '$out_service', '$descr')";
mysql_query($query_1);
echo mysql_error();

$query_history_get = "SELECT * FROM `service` ORDER BY `id` DESC  LIMIT 1";
$result_history_get = mysql_query($query_history_get);

while ($row_history_get = mysql_fetch_assoc($result_history_get)) {

    $hist_id = $row_history_get["id"];


$query_2 = "INSERT INTO `log_fixtures` (`fixture_id`, `timestamp`, `service_id`, `type`) VALUES ('$barcode', '$timestamp', '$hist_id', '4')";
mysql_query($query_2);
echo mysql_error();




}


header("Location: listasprzetu.php");

?>