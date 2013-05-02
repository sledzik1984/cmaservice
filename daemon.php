<?php

include 'mysql.php';

//Sprzet nie wrocil z wypozyczenia w terminie

// *****************************************************************************
//Oznaczanie sprzętu jako zagubiony                                            *
// *****************************************************************************

echo "Rozpoczynam poszukiwanie zagubionego sprzętu (poza magazynem ponad 7 dni)\n";
$now = mktime();

$lost_query = "SELECT * FROM `warehouse` WHERE `deleted` = '0' ORDER BY `id` ASC";
$lost_result = mysql_query($lost_query);

while ($lost_row = mysql_fetch_assoc($lost_result)) {

    $lost_id = $lost_row["id"];
    $lost_audit = $lost_row["last_audit"];
    $name = $lost_row["name"];
    
    
    
    $delay = $now - $lost_audit;
    
    if ($delay >= 604800) {

	//Oznacz jako zagubiony!
	//Oznacz gdy spoznienie wynosi 7 dni
	$set_lost_q = "UPDATE `warehouse` SET `lost` = '1' WHERE `id` = '$lost_id'";
	mysql_query($set_lost_q);
	echo mysql_error();

	echo $name . " poza magazynem od " . strftime("%c", $lost_audit) . "\n";



    } else {
    
	//Oznacz jako nie zagubiony!
	$set_found_q = "UPDATE `warehouse` SET `lost` = '0' WHERE `id` '$lost_id'";
	mysql_query($set_found_q);
	echo mysql_error();


    
    }


}

// ********************************************************************************
//                                                                                *
// ********************************************************************************




?>