<?php

$now = mktime();

include 'mysql.php';
include 'debug.php';

//Kalkulacja czasu dojazdu i odległości do miejsca sztuki

//Z powodu ograniczeń w użyciu API Google Distance Matrix nie można tego robić przy każdym wyświetleniu!!



echo "Rozpoczynam przeliczanie odległości i czasów dojazdu miejsc sztuk!\n";


$places_search_query = "SELECT * FROM `places` ORDER BY `id`";
$places_search_result = mysql_query($places_search_query);

if ($debug == 1) { echo "DEBUG: mysql_error(): " . mysql_error(); }

while ($places_search_row = mysql_fetch_assoc($places_search_result)) {

	$place_id = $places_search_row["id"];
	$place_last_audit = $places_search_row["last_audit"];
	$place_name = $places_search_row["name"];
	$place_room = $places_search_row["room"];
	$place_city = $places_search_row["city"];
	$place_street = $places_search_row["street"];

	$place_delay = $now - $place_last_audit;
	$city_clean = str_replace (" ", "+",$place_city);
	$ulica_clean = str_replace (" ", "+",$place_street);


	echo "Sprawdzam miejsce: " . $place_name . " - ".$place_room.", ul." . $place_street . ", " . $place_city . "\n";


	if ($place_delay >= 604800) {
	
        	$matrix_addr =  "http://maps.googleapis.com/maps/api/distancematrix/json?origins=Kraków+Dauna+70+Polska&destinations=".$city_clean."+".$ulica_clean."+Polska&mode=driving&language=pl-PL&sensor=false";


       		$data = file_get_contents($matrix_addr);
        	$json_result = json_decode($data,true);

        	$json_dist = $json_result['rows'][0]['elements'][0]['distance']['text'];
        	$json_time = $json_result['rows'][0]['elements'][0]['duration']['text'];

		
		//Nie przeliczano od tygodnia - przelicz!
		
		if (empty($json_dist) || empty($json_time)) {
		
			echo "Nie udało się pobrać danych z Google Distance Matrix! Nie ruszam!!\n";
		
		} else {
			$set_place_q = "UPDATE `places` SET `last_audit` = '$now', `dist` = '$json_dist', `duration` = '$json_time' WHERE `id` = '$place_id'";
			mysql_query($set_place_q);
			if ($debug == 1) { echo "DEBUG: mysql_error(): " . mysql_error() . "\n ";}
			echo "Sprawdzano ponad tydzień temu! Aktualizuję w Google Distance Matrix!\n";
		}
			
	} else {

		echo "Sprawdzano w ciągu ostatniego tygodnia! Nie ruszam!\n";


	}

}



// *****************************************************************************
//Oznaczanie sprzętu jako zagubiony                                            *
// *****************************************************************************

echo "Rozpoczynam poszukiwanie zagubionego sprzętu (poza magazynem ponad 7 dni)\n";

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
	//$set_found_q = "UPDATE `warehouse` SET `lost` = '0' WHERE `id` '$lost_id'";
	//mysql_query($set_found_q);
	//echo mysql_error();


    
    }


}

// ********************************************************************************
//  Brak inwentaryzacji == sprzęt zagubiony!!                                     *
// ********************************************************************************






?>
