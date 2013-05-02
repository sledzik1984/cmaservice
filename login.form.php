<?php

include 'mysql.php';

$user = $_POST["login"];
$pass = hash('sha512',$_POST["pass"]);


if (!isset($user) || !isset($pass)) {

header("Location: login.php");


} else {


$query = "SELECT * FROM `users` WHERE `login` = '$user' AND `password` = '$pass' LIMIT 1";

$result = mysql_query($query);

$num_rows = mysql_num_rows($result);

$cookie_value = hash('sha512',$user);



if ($num_rows == 1) {


    $now = mktime();

    //Dodanie do historii danego logowania
    
    $ip = $_SERVER['REMOTE_ADDR'];
    
    
    $log_query = "INSERT INTO `log_fixtures` (`timestamp`,`user`, `ip`, `type`) VALUES ('$now', '$user', '$ip','11')";
    
    mysql_query($log_query);
    echo mysql_error();

    //Ustawiamy ciastka:
    setcookie("logged", $cookie_value, time()+600);
    setcookie("user_login_cma", $user, time()+600);
    setcookie("session_expiration", time()+600, time()+600);
    
    
    
    header("Location: http://smietnik.prnet.pl/cma_service/index.php");

    
    $query_update_last_login = "UPDATE `users` SET `lastlogin` = '$now' WHERE `login` = '$user'";
    
    mysql_query($query_update_last_login);
    
    echo mysql_error();


} else {


}




}

?>