<?php

$now = mktime();
include 'mysql.php';

$fixt = $_POST["bar"];
$comment = $_POST["delete_comment"];

include 'inc/logging.php';


$user = $_COOKIE["user_login_cma"];

//Sprawdzamy uprawnienia użytkownika

//
// Uprawnienia 0 - Full Access
// Uprawnienia 1 - Zwykły user

$user_q = "SELECT * FROM `users` WHERE `login` = '$user' LIMIT 1";

$user_r = mysql_query($user_q);


while ($row_user = mysql_fetch_assoc($user_r)) {

    $login = $row_user["login"];
    $perm = $row_user["permissions"];
    
    
    
    if ($perm == 0) {
    
    
	$delete_q = "UPDATE `warehouse` SET `deleted` = '1', `deleted_comment` = '$comment' WHERE `id` = '$fixt'";
	
	mysql_query($delete_q);
	
	echo mysql_error();
	
	$log = "INSERT INTO `log_fixtures` (`fixture_id`, `type`, `timestamp`, `user`) VALUES ('$fixt', '12', '$now', '$user')";
	mysql_query($log);
	
	echo mysql_error();

//	header("Location: http://smietnik.prnet.pl/cma_service/?m=listasprzetu");
    
    
    } else {
    
    
    
    }



}




?>