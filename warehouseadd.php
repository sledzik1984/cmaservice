<?php

include 'mysql.php';

$name = $_POST["warehousename"];

mysql_query("INSERT INTO `warehouses` (`name`) VALUES ('$name')");
echo mysql_error();

header('Location: /cma/?m=magazyny');



?>