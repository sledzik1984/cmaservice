<?php

//Biblioteka wyszukująca klienta z bazy dla autouzupełniania jQuery

require_once "mysql.php";
$q = strtolower($_GET["q"]);
if (!$q) return;
 
//$sql = "select DISTINCT company as company from rental_clients where company LIKE '%$q%'";

$sql = "SELECT * FROM `rental_clients` where `company` LIKE '%$Q%'";

$rsd = mysql_query($sql);
while($rs = mysql_fetch_array($rsd)) {
    $cname = $rs['company'];
    $imie = $rs['first_name'];
    $nazw = $rs['last_name'];
    echo "$cname\n ";
}
?>
