<?php

include 'mysql.php';

echo "<html>\n";
echo "\t<head>\n";
echo "\t\t<link href=\"inc/style.css\" rel=\"stylesheet\" type=\"text/css\">\n";
echo "<script language='JavaScript' type='text/JavaScript' src='inc/common.js'> </script>\n";
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>\n";

echo "\t</head>\n";
echo "\t<body>\n";

echo "<div class=\"mainmargin\">\n";

echo "<h1>Lista klientów</h1>\n";


echo "<table cellpadding=\"4\" width=\"100%\">\n";

echo "<tr class=\"dark\">\n";
echo "<td class=\"fleftu\">Firma</td>\n";
echo "<td class=\"fbt\">Numer dokumentu</td>\n";
echo "<td class=\"fbt\">Ulica</td>\n";
echo "<td class=\"fbt\">Kod pocztowy</td>\n";
echo "<td class=\"fbt\">Miasto</td>\n";
echo "<td class=\"fbt\">Telefon</td>\n";
echo "<td class=\"fbt\">NIP</td>\n";
echo "<td class=\"fbt\">Email</td>\n";
echo "<td class=\"frightu\"></td>\n";
echo "</tr>\n";



$q = "SELECT * FROM `rental_clients` ORDER BY `id`";
$r = mysql_query($q);


while ($row = mysql_fetch_assoc($r)) {

    $id = $row["id"];
    $company = $row["company"];
    $document_no = $row["document_no"];
    $street = $row["street"];
    $zip = $row["zip"];
    $city = $row["city"];
    $phone = $row["phone"];
    $email = $row["email"];
    $nip = $row["nip"];


    if ($id%2 == 0) {
    //Pętla if odpowiedzialna za rozróżnianie id parzystych i nie parzystych

	echo "<tr class=\"light\" onmouseover=\"addClass(this, 'highlight')\" onmouseout=\"removeClass(this, 'highlight')\">\n";
	echo "\t<td onClick=\"top.location.href='/cma_service/?m=historiaurzadzen&search_type=2&client_id=".$id."';\" class=\"fleft\">" . $company . "</td>\n";
	echo "\t<td>" . $document_no . "</td>\n";
	echo "\t<td>" . $street . "</td>\n";
	echo "\t<td>" . $zip . "</td>\n";
	echo "\t<td>" . $city . "</td>\n";
	echo "\t<td>" . $phone . "</td>\n";
	echo "\t<td>" . $nip . "</td>\n";
	echo "\t<td>" . $email . "</td>\n";
	echo "\t<td class=\"fright\"><a href=\"rentalclientdel.php?&id=".$id. "\" OnClick=\"return confirmLink(this, 'Czy jesteś pewien, że chcesz usunąć klienta " . $firstname . " " . $lastname . " " . $company . " z bazy?');\"><img src=\"img/delete.gif\"></a>&nbsp;<img src=\"img/edit.gif\"></td>\n";
	echo "</tr>\n\n";

    
    
} else {

	echo "<tr class=\"lucid\" onmouseover=\"addClass(this, 'highlight')\" onmouseout=\"removeClass(this, 'highlight')\">\n";
	echo "\t<td onClick=\"top.location.href='/cma_service/?m=historiaurzadzen&search_type=2&client_id=".$id."';\" class=\"fleft\">" . $company . "</td>\n";
	echo "\t<td>" . $document_no . "</td>\n";
	echo "\t<td>" . $street . "</td>\n";
	echo "\t<td>" . $zip . "</td>\n";
	echo "\t<td>" . $city . "</td>\n";
	echo "\t<td>" . $phone . "</td>\n";
	echo "\t<td>" . $nip . "</td>\n";
	echo "\t<td>" . $email . "</td>\n";
	echo "\t<td class=\"fright\"><a href=\"rentalclientdel.php?&id=".$id. "\" OnClick=\"return confirmLink(this, 'Czy jesteś pewien, że chcesz usunąć klienta " . $firstname . " " . $lastname . " " . $company . " z bazy?');\"><img src=\"img/delete.gif\"></a>&nbsp;<a href=\"editrentalclient.php?id=".$id."\"><img src=\"img/edit.gif\"></a></td>\n";
	echo "</tr>\n\n";

    }

}


echo "<tr class=\"dark\">\n";
echo "\t<td class=\"fall\" colspan=\"11\">Strona</td>\n";
echo "</tr>\n";

echo "</table>\n";





echo "</div>\n";
echo "\t</body>\n";
echo "</html>\n";

//$vars = get_defined_vars();
//print_r($vars);

?>
