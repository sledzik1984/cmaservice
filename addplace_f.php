<?php
$login = $_COOKIE["user_login_cma"];
include 'mysql.php';

$nazwa = $_POST["placename"];
$room = $_POST["room"];
$city = $_POST["city"];
$ulica = $_POST["ulica"];
$file = rand(0,200000) . "_" . $_FILES['file']['name'];


//Przenosimy pliczek
move_uploaded_file($_FILES['file']['tmp_name'], "places/".$file);


//Dodajemy do bazy

$query = "INSERT INTO `places` (`name`, `room`, `city`, `street`, `file`) VALUES ('$nazwa', '$room', '$city', '$ulica', '$file')";



mysql_query($query);

echo mysql_error();

header("Location: https://smietnik.prnet.pl/cma_service/places.php");






?>