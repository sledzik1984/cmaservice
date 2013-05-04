<?php

$place_id = $_GET["place_id"];

//print_r($_GET);


include 'mysql.php';

echo "<html>\n";
echo "\t<head>\n";
echo "\t\t<link href=\"inc/style.css\" rel=\"stylesheet\" type=\"text/css\">\n";
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>\n";
echo "<script language=\"JavaScript\" src=\"inc/common.js\"></script>\n";

echo "\t</head>\n";
echo "\t<body>\n";

echo "<script type=\"text/javascript\" language=\"JavaScript\" src=\"inc/overlib.js\"></script>\n";
echo "<div class=\"mainmargin\">\n";

echo "<table cellpadding=\"4\" width=\"100%\">\n";

echo "<tr class=\"dark\">\n";
echo "<td class=\"fleftu\">Szczegóły miejsca</td>\n";
echo "<td class=\"frightu\"><a href=\"placedetailsprint.php?place_id=". $place_id ."\"><img src=\"img/print.gif\"></a></td>\n";
echo "</tr>\n";

echo "<tr class=\"light\">\n";
echo "<td width=\"25%\" class=\"fleft\">Miejsce:</td>\n";

$query_details = "SELECT * FROM `places` WHERE `id` = '$place_id' LIMIT 1";
$result_details = mysql_query($query_details);
echo mysql_error();
$row_details = mysql_fetch_row($result_details);


$place = $row_details[1];
$room = $row_details[2];
$city = $row_details[3];
$street = $row_details[4];
$floor = $row_details[5];
$power = $row_details[6];
$elevator = $row_details[7];
$wifi = $row_details[8];
$parking = $row_details[9];
$dist = $row_details[10];
$time = $row_details[11];
$tran = $row_details[12];
$file = $row_details[13];


echo "<td class=\"fright\">" . $place  . "</td>\n";
echo "</tr>\n";

echo "<tr class=\"light\">\n";
echo "<td width=\"25%\" class=\"fleft\">Sala:</td>\n";
echo "<td class=\"fright\">" . $room . "</td>\n";
echo "</tr>\n";

echo "<tr class=\"light\">\n";
echo "<td width=\"25%\" class=\"fleft\">Miasto:</td>\n";
echo "<td class=\"fright\">" . $city . "</td>\n";
echo "</tr>\n";


$gmaps = "https://maps.google.pl/maps?saddr=Kraków,+Dauna+70&daddr=".$city.",".$street."&hl=pl&ie=UTF8&sll=50.046766,20.004863&sspn=0.243839,0.676346&geocode=FehI-wIdFMowASkl85wDWkMWRzGXJ5vlHYwfDg%3BFTz7_gIdpkciASnRzKE2I84WRzG7-lkFNSqvuQ&t=h&mra=ls&z=10";


echo "<tr class=\"light\">\n";
echo "<td width=\"25%\" class=\"fleft\">Ulica:</td>\n";
echo "<td class=\"fright\"><a target=\"_blank\" href=\"".$gmaps."\">" . $street . "</a></td>\n";
echo "</tr>\n";


echo "<tr class=\"light\">\n";
echo "<td width=\"25%\" class=\"fleft\">Piętro:</td>\n";
echo "<td class=\"fright\">" . $floor . "</td>\n";
echo "</tr>\n";

echo "<tr class=\"light\">\n";
echo "<td width=\"25%\" class=\"fleft\">Zasilanie:</td>\n";
echo "<td class=\"fright\">" . $power . "</td>\n";
echo "</tr>\n";

echo "<tr class=\"light\">\n";
echo "<td width=\"25%\" class=\"fleft\">Winda:</td>\n";
echo "<td class=\"fright\">" . $elevator . "</td>\n";
echo "</tr>\n";

echo "<tr class=\"light\">\n";
echo "<td width=\"25%\" class=\"fleft\">WiFi:</td>\n";
echo "<td class=\"fright\">" . $wifi . "</td>\n";
echo "</tr>\n";

echo "<tr class=\"light\">\n";
echo "<td width=\"25%\" class=\"fleft\">Odległość:</td>\n";
echo "<td class=\"fright\">" . $dist . "</td>\n";
echo "</tr>\n";

echo "<tr class=\"light\">\n";
echo "<td width=\"25%\" class=\"fleft\">Czas dojazdu:</td>\n";
echo "<td class=\"fright\">" . $time . "</td>\n";
echo "</tr>\n";





echo "<tr class=\"light\">\n";
echo "<td width=\"25%\" class=\"fleft\">Symultana </td>\n";
echo "<td class=\"fright\">" . $tran . "</td>\n";
echo "</tr>\n";

echo "<tr class=\"light\">\n";
echo "<td width=\"25%\" class=\"fleft\">Data zwrotu: </td>\n";
echo "<td class=\"fright\">" . $timestop . "</td>\n";
echo "</tr>\n";


echo "<tr class=\"light\">\n";
echo "<td width=\"25%\" class=\"fleft\">Faktura: </td>\n";

if ($invoice == 0) {
        echo "<td class=\"fright\"><form><input type=\"checkbox\" disabled=\"disabled\"></form></td>\n";
} else {
        echo "<td class=\"fright\"><form><input type=\"checkbox\" disabled=\"disabled\" checked=\"checked\"></form></td>\n";
}

echo "</tr>\n";

echo "<tr class=\"light\">\n";
echo "<td width=\"25%\" class=\"fleft\">Wydane: </td>\n";

if ($out == 0) {
        echo "<td class=\"fright\"><form><input type=\"checkbox\" disabled=\"disabled\"></form></td>\n";
} else {
        echo "<td class=\"fright\"><form><input type=\"checkbox\" disabled=\"disabled\" checked=\"checked\"></form></td>\n";
}

echo "</tr>\n";

echo "<tr class=\"dark\">\n";
echo "<td class=\"fall\" colspan=\"2\"></td>\n";
echo "</tr>\n"; 


echo "</table>\n";

echo "<br><br>\n";


echo "<table cellpadding=\"4\" width=\"100%\">\n";

echo "<tr class=\"dark\">\n";
echo "<td class=\"fleftu\">Urządzenie</td>\n";
echo "<td class=\"fbt\">Kod kreskowy</td>\n";
echo "<td class=\"frightu\">Zwrócone</td>\n";
echo "</tr>\n";

$query_rental_positions = "SELECT * FROM `rentals` WHERE `rental_id` = '$rid' ORDER BY `id` DESC";
$result_rental_positions = mysql_query($query_rental_positions);

while ($row_rental_positions = mysql_fetch_assoc($result_rental_positions)) {

    $rental_barcode = $row_rental_positions["barcode"];
    $rental_back = $row_rental_positions["back"];
    
    $query_fixture = "SELECT * FROM `warehouse` WHERE `barcode` = '$rental_barcode' ORDER BY `barcode` DESC";
    $result_fixture = mysql_query($query_fixture);
    
    while ($row_fixture = mysql_fetch_assoc($result_fixture)) {
    
	$fixture_name = $row_fixture["name"];
	$fixture_barcode = $row_fixture["barcode"];
	

	echo "<tr onmouseover=\"addClass(this, 'highlight')\" onmouseout=\"removeClass(this, 'highlight')\" class=\"light\">\n";
	echo "<td onClick=\"top.location.href='/cma_service/?m=historiaurzadzen&search_type=1&b=".$fixture_barcode."';\" width=\"25%\" class=\"fleft\">".$fixture_name."</td>\n";

	echo "<td class=\"\">" . $fixture_barcode . "</td>\n";


	if ($rental_back == 0) {
	
	    echo "<td class=\"fright\"><form><input type=\"checkbox\" disabled=\"disabled\"></form></td>\n";
	
	} else {
	
	    echo "<td class=\"fright\"><form><input type=\"checkbox\" disabled=\"disabled\" checked=\"checked\"></form></td>\n";
	
	}



	echo "</tr>\n";

    
    }


}

echo "<tr class=\"dark\">\n";
echo "<td class=\"fall\" colspan=\"3\"></td>\n";
echo "</tr>\n"; 



echo "</table>\n";


echo "</div>\n";
echo "\t</body>\n";
echo "</html>\n";



?>
