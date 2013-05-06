<?php

include 'mysql.php';
include 'debug.php';



echo "<html>\n";
echo "\t<head>\n";
echo "\t\t<link href=\"inc/style.css\" rel=\"stylesheet\" type=\"text/css\">\n";
echo "<script language='JavaScript' type='text/JavaScript' src='inc/common.js'> </script>\n";
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>\n";

echo "\t</head>\n";
echo "\t<body>\n";

echo "<div class=\"mainmargin\">\n";

echo "<h1>Miejsca imprez</h1>\n";


echo "<table cellpadding=\"4\" width=\"100%\">\n";

echo "<tr class=\"dark\">\n";
echo "<td class=\"fleftu\">Miejsce</td>\n";
echo "<td class=\"fbt\">Sala</td>\n";
echo "<td class=\"fbt\">Miasto</td>\n";
echo "<td class=\"fbt\">Ulica</td>\n";
echo "<td class=\"fbt\">Piętro</td>\n";
echo "<td class=\"fbt\">Zasilanie</td>\n";
echo "<td class=\"fbt\">Winda</td>\n";
echo "<td class=\"fbt\">WiFi</td>\n";
echo "<td class=\"fbt\">Parking</td>\n";
echo "<td class=\"fbt\">Odległość [km]</td>\n";
echo "<td class=\"fbt\">Czas dojazdu [h]</td>\n";
echo "<td class=\"fbt\">Symultana</td>\n";
echo "<td class=\"fbt\">Rysunek</td>\n";

echo "<td class=\"frightu\"></td>\n";
echo "</tr>\n";



$q = "SELECT * FROM `places` ORDER BY `name`";
$r = mysql_query($q);


while ($row = mysql_fetch_assoc($r)) {

    	$id = $row["id"];
    	$place = $row["name"];
    	$room = $row["room"];
    	$city = $row["city"];
    	$street = $row["street"];
	$floor = $row["floor"];
	$power = $row["power"];
	$elevator = $row["elevator"];
	$wifi = $row["wifi"];
	$parking = $row["parking"];
	$dist = $row["dist"];
	$time = $row["duration"];
	$translations = $row["translations"];	

	$file = $row["file"];



	echo "<tr onClick=\"top.location.href='/cma_service/index.php?m=placedetails&place_id=".$id."';\" class=\"lucid\" onmouseover=\"addClass(this, 'highlight')\" onmouseout=\"removeClass(this, 'highlight')\">\n";
	echo "\t<td class=\"fleft\">" . $place . "</td>\n";
	echo "\t<td>" . $room . "</td>\n";
	echo "\t<td>" . $city . "</td>\n";
	echo "\t<td>" . $street . "</td>\n";
	echo "\t<td>" . $floor . "</td>\n";
	

	switch($power) {

		case 0:
		echo "\t<td>Brak info</td>\n";
		break;

                case 1:
                echo "\t<td>Gniazdka 230V</td>\n";
                break;

                case 2:
                echo "\t<td>Gniazdo 16A 5 bolców</td>\n";
                break;

                case 3:
                echo "\t<td>Gniazdo 16A 4 bolce</td>\n";
                break;

                case 4:
                echo "\t<td>Gniazdo 32A</td>\n";
                break;

                case 5:
                echo "\t<td>Gniazdo 63A</td>\n";
                break;

                case 6:
                echo "\t<td>Gniazdo 125A</td>\n";
                break;

                case 7:
                echo "\t<td>Wąsy</td>\n";
                break;

                case 8:
                echo "\t<td>Patrz rysunek</td>\n";
                break;

		case 9:
                echo "\t<td>Agregat</td>\n";
                break;


	}



	switch($elevator) {
		case 0:
		echo "\t<td>Brak info</td>\n";
		break;

		case 1:
                echo "\t<td>Tak</td>\n";
                break;

                case 2:
                echo "\t<td>Nie</td>\n";
                break;

	}

        switch($wifi) {
                case 0:
                echo "\t<td>Brak info</td>\n";
                break;

                case 1:
                echo "\t<td>Tak</td>\n";
                break;

                case 2:
                echo "\t<td>Nie</td>\n";
                break;

        }

        switch($parking) {
                case 0:
                echo "\t<td>Nie</td>\n";
                break;

                case 1:
                echo "\t<td>Osobówki</td>\n";
                break;

                case 2:
                echo "\t<td>Tak</td>\n";
                break;

		case 3:
                echo "\t<td>Płatny</td>\n";
                break;


        }




	echo "\t<td>" . $dist . "</td>\n";
        echo "\t<td>" . $time . "</td>\n";


        switch($translations) {
                case 0:
                echo "\t<td>Brak info</td>\n";
                break;

                case 1:
                echo "\t<td>Wnoszenie</td>\n";
                break;

                case 2:
                echo "\t<td>Winda</td>\n";
                break;

                case 3:
                echo "\t<td>Dużo promienników</td>\n";
                break;

		case 4:
		echo "\t<td>Okej</td>\n";
		break;


        }


if (empty($file)) {
        echo "\t<td><img src=\"img/pdf.ico.gif\"></a></td>\n";
} else {
	echo "\t<td><a href=\"places/".$file."\"><img src=\"img/pdf.ico.gif\"></a></td>\n";
}
	echo "\t<td class=\"fright\"><a href=\"rentalclientdel.php?&id=".$id. "\" OnClick=\"return confirmLink(this, 'Czy jesteś pewien, że chcesz usunąć klienta " . $firstname . " " . $lastname . " " . $company . " z bazy?');\"><img src=\"img/delete.gif\"></a>&nbsp;<a href=\"editrentalclient.php?id=".$id."\"><img src=\"img/edit.gif\"></a></td>\n";
	echo "</tr>\n\n";

}


echo "<tr class=\"dark\">\n";
echo "\t<td class=\"fall\" colspan=\"16\">Strona</td>\n";
echo "</tr>\n";

echo "</table>\n";





echo "</div>\n";
echo "\t</body>\n";
echo "</html>\n";

//$vars = get_defined_vars();
//print_r($vars);

?>
