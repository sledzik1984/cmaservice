<?php

$barcode = $_POST["barcode"];

//echo $barcode;

header("Location: historiaurzadzen.php?b=" . $barcode);


?>