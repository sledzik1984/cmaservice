<?php
$login = $_COOKIE["user_login_cma"];
include 'mysql.php';
include 'debug.php';


$nazwa = $_POST["placename"];
$room = $_POST["room"];
$city = $_POST["city"];
$ulica = $_POST["ulica"];
$post_file = $_FILES['files']['name'];


if (empty($post_file)) { 
	$file = "";
} else {

        $file = rand(0,200000) . "_" . $post_file;

}

$floor = $_POST["floor"];
$power = $_POST["power"];
$elevator = $_POST["elevator"];
$wifi = $_POST["wifi"];
$parking = $_POST["parking"];
$distance = $_POST["distance"];
$symultana = $_POST["symultana"];





//Przenosimy pliczek
move_uploaded_file($_FILES['file']['tmp_name'], "places/".$file);


//Dodajemy do bazy

$query = "INSERT INTO `places` (`name`, `room`, `city`, `street`, `file`, `floor`, `power`, `elevator`, `wifi`, `parking`, `dist`, `translations`) VALUES ('$nazwa', '$room', '$city', '$ulica', '$file', '$floor', '$power', '$elevator', '$wifi', '$parking', '$distance', '$symultana')";



mysql_query($query);

if ($debug == 1) { echo "DEBUG: mysql_error(): " . mysql_error(); }

if ($debug != 1) { header("Location: http://smietnik.prnet.pl/cma_service/places.php"); }






?>
