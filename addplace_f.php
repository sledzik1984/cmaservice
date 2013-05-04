<?php
$login = $_COOKIE["user_login_cma"];
include 'mysql.php';
include 'debug.php';

$now = mktime();
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
$symultana = $_POST["symultana"];


$city_clean = str_replace (" ", "+",$city);
$ulica_clean = str_replace (" ", "+",$ulica);


$matrix_addr =  "http://maps.googleapis.com/maps/api/distancematrix/json?origins=Kraków+Dauna+70+Polska&destinations=".$city_clean."+".$ulica_clean."+Polska&mode=driving&language=pl-PL&sensor=false";


$data = file_get_contents($matrix_addr);
$json_result = json_decode($data,true);

$json_dist = $json_result['rows'][0]['elements'][0]['distance']['text'];
$json_time = $json_result['rows'][0]['elements'][0]['duration']['text'];




//Przenosimy pliczek
move_uploaded_file($_FILES['file']['tmp_name'], "places/".$file);


//Dodajemy do bazy

$query = "INSERT INTO `places` (`name`, `room`, `city`, `street`, `file`, `floor`, `power`, `elevator`, `wifi`, `parking`, `translations`, `dist`, `duration`, `last_audit`) VALUES ('$nazwa', '$room', '$city', '$ulica', '$file', '$floor', '$power', '$elevator', '$wifi', '$parking', '$symultana', '$json_dist', '$json_time', '$now')";



mysql_query($query);

if ($debug == 1) { echo "DEBUG: mysql_error(): " . mysql_error(); }

if ($debug != 1) { header("Location: http://smietnik.prnet.pl/cma_service/places.php"); }






?>
