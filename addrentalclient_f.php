<?php

include 'mysql.php';


$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$company = $_POST["company"];
$document_no = $_POST["document_no"];
$addr = $_POST["addr"];
$zip = $_POST["zip"];
$city = $_POST["city"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$nip = $_POST["nip"];


$query = "INSERT INTO `rental_clients` (`email`, `first_name`, `last_name`, `company`, `document_no`, `street`, `zip`, `city`, `phone`, `nip`) VALUES ('$email','$firstname','$lastname','$company','$document_no','$addr','$zip','$city','$phone','$nip')";
mysql_query($query);
echo mysql_error();

header("Location: rentalclientslist.php");

?>