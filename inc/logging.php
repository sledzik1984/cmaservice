<?php

if (isset($_COOKIE['logged'])) {

    //Pobieramy ciacha
    
    $user = $_COOKIE['user_login_cma'];
    
    $cookie_value = hash('sha512',$user);
    
    $exp = $_COOKIE['session_expiration'];


    setcookie("logged", $cookie_value, time()+600);
    setcookie("user_login_cma", $user, time()+600);
    setcookie("session_expiration", time()+600, time()+600);



} else {

    header("Location: login.php");

}



?>