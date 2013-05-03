<?php

$rid = $_GET["rid"];

//echo $rid;


//$vars = get_defined_vars();
//print_r($vars);



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
echo "<td class=\"fleftu\">Szczegóły wypożyczenia</td>\n";
echo "<td class=\"frightu\"><a href=\"rentaldetailsprint.php?rid=". $rid ."\"><img src=\"img/print.gif\"></a></td>\n";
echo "</tr>\n";

echo "<tr class=\"light\">\n";
echo "<td width=\"25%\" class=\"fleft\">Imię:</td>\n";

$query_details = "SELECT * FROM `rental_details` WHERE `id` = '$rid' LIMIT 1";
$result_details = mysql_query($query_details);
$row_details = mysql_fetch_row($result_details);


$rental_client = $row_details[1];
$timestart = date("d-m-Y H:i:s", $row_details[2]);
$timestop = date("d-m-Y H:i:s", $row_details[3]);
$invoice = $row_details[4];
$out = $row_details[5];


$query_client = "SELECT * FROM `rental_clients` WHERE `id` = '$rental_client' LIMIT 1";

$result_client = mysql_query($query_client);
$row_client = mysql_fetch_row($result_client);

$first_name = $row_client[1];
$last_name = $row_client[2];
$company = $row_client[3];
$document_no = $row_client[4];
$street = $row_client[5];
$zip = $row_client[6];
$city = $row_client[7];
$phone = $row_client[8];
$email = $row_client[9];
$nip = $row_client[10];


echo "<td class=\"fright\">" . $first_name  . "</td>\n";
echo "</tr>\n";

echo "<tr class=\"light\">\n";
echo "<td width=\"25%\" class=\"fleft\">Nazwisko:</td>\n";
echo "<td class=\"fright\">" . $last_name . "</td>\n";
echo "</tr>\n";

echo "<tr class=\"light\">\n";
echo "<td width=\"25%\" class=\"fleft\">Firma:</td>\n";
echo "<td class=\"fright\">" . $company . "</td>\n";
echo "</tr>\n";

echo "<tr class=\"light\">\n";
echo "<td width=\"25%\" class=\"fleft\">Adres email:</td>\n";
echo "<td class=\"fright\"><a href=\"mailto:" .$email. "\">" . $email . "</a></td>\n";
echo "</tr>\n";


echo "<tr class=\"light\">\n";
echo "<td width=\"25%\" class=\"fleft\">Numer dokumentu:</td>\n";
echo "<td class=\"fright\">" . $document_no . "</td>\n";
echo "</tr>\n";

echo "<tr class=\"light\">\n";
echo "<td width=\"25%\" class=\"fleft\">Ulica:</td>\n";
echo "<td class=\"fright\">" . $street . "</td>\n";
echo "</tr>\n";

echo "<tr class=\"light\">\n";
echo "<td width=\"25%\" class=\"fleft\">Kod pocztowy:</td>\n";
echo "<td class=\"fright\">" . $zip . "</td>\n";
echo "</tr>\n";

echo "<tr class=\"light\">\n";
echo "<td width=\"25%\" class=\"fleft\">Miasto:</td>\n";
echo "<td class=\"fright\">" . $city . "</td>\n";
echo "</tr>\n";

echo "<tr class=\"light\">\n";
echo "<td width=\"25%\" class=\"fleft\">Telefon:</td>\n";
echo "<td class=\"fright\">" . $phone . "</td>\n";
echo "</tr>\n";

echo "<tr class=\"light\">\n";
echo "<td width=\"25%\" class=\"fleft\">NIP:</td>\n";
echo "<td class=\"fright\">" . $nip . "</td>\n";
echo "</tr>\n";





echo "<tr class=\"light\">\n";
echo "<td width=\"25%\" class=\"fleft\">Data wydania: </td>\n";
echo "<td class=\"fright\">" . $timestart . "</td>\n";
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
