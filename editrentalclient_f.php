<?php

include 'mysql.php';

$qid = $_POST["qid"];
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



$query = "UPDATE `rental_clients` SET `email` = '$email',`first_name` = '$firstname', `last_name` = '$lastname', `company` = '$company', `document_no` = '$document_no', `street` = '$addr', `zip` = '$zip', `city` = '$city', `phone` = '$phone', `nip` = '$nip' WHERE `id` = '$qid' LIMIT 1";

mysql_query($query);
echo mysql_error();

header("Location: rentalclientslist.php");

?>