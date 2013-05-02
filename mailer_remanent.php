<?php

include 'mysql.php';

$sender = "System magazynowy CMA";
$email = "magazyn@cma.pl";
$receiver  = "piotr@prnet.pl";
$date = date("d.m.Y");
$subject = "Braki na magazynie na dzień " . $date;
$header = "From: ". $sender ." <". $email .">\r\n";

$mail_body = "Uwaga! Wiadomość wygenerowana automatycznie. Proszę na nią nie odpowiadać!\n\nNastępujący sprzęt został oznaczony jako zagubiony!\n\n";
//$mail_body .= "cipa";

$query = "SELECT * FROM `warehouse` WHERE `lost` = '1' ORDER BY `barcode` ASC";
$result = mysql_query($query);

while ($row = mysql_fetch_assoc($result)) {

    $barcode = $row["barcode"];
    $name = $row["name"];


    $mail_body .= "Urządzenie: " .$name. ", kod kreskowy: ". $barcode ."\n";


}


mail($receiver, $subject, $mail_body, $header);



?>