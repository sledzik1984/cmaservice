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

echo "<h1>Lista sztuk</h1>\n";


echo "<table cellpadding=\"4\" width=\"100%\">\n";

echo "<tr class=\"dark\">\n";
echo "<td class=\"fleftu\">Klient</td>\n";
echo "<td class=\"fbt\">Miejsce</td>\n";
echo "<td class=\"fbt\">Odpowiedzialny</td>\n";
echo "<td class=\"fbt\">Magazynier</td>\n";
echo "<td class=\"fbt\">Wydanie</td>\n";
echo "<td class=\"fbt\">Powrót</td>\n";

echo "<td class=\"frightu\"></td>\n";
echo "</tr>\n";



$q = "SELECT * FROM `events` ORDER BY `id`";
$r = mysql_query($q);


while ($row = mysql_fetch_assoc($r)) {

    $id = $row["id"];
    $start = $row["timestart"];
    $stop = $row["timestop"];
    $who = $row["who"];
    $back = $row["back"];
    $where = $row["where"];
    $response = $row["response"];
    $manager = $row["warehousemanager"];

	//Pobieramy z bazy dane klienta:

	$client_query = "SELECT `company` FROM `rental_clients` WHERE `id` = '$who' LIMIT 1";
	$client_result = mysql_query($client_query);

	if ($debug == 1) { echo "DEBUG: mysql_error():".mysql_error(); } 

	while ($client_row = mysql_fetch_assoc($client_result)) {

		$client_name = $client_row["company"];


	}


    if ($id%2 == 0) {
    //Pętla if odpowiedzialna za rozróżnianie id parzystych i nie parzystych

	echo "<tr onmouseover=\"addClass(this, 'highlight')\" onmouseout=\"removeClass(this, 'highlight')\" class=\"light\">\n";
	echo "\t<td class=\"fleft\">" . $client_name . "</td>\n";
	echo "\t<td>" .$where  . "</td>\n";
	echo "\t<td>" . $response . "</td>\n";
	echo "\t<td>" . $manager . "</td>\n";
	echo "\t<td>" . $start . "</td>\n";
	echo "\t<td>" . $stop . "</td>\n";
	echo "\t<td class=\"fright\"><a href=\"evendelete.php?&id=".$id. "\" OnClick=\"return confirmLink(this, 'Czy jesteś pewien, że chcesz usunąć klienta " . $firstname . " " . $lastname . " " . $company . " z bazy?');\"><img src=\"img/delete.gif\"></a>&nbsp;<img src=\"img/edit.gif\"></td>\n";
	echo "</tr>\n\n";

    
    
} else {

	echo "<tr onmouseover=\"addClass(this, 'highlight')\" onmouseout=\"removeClass(this, 'highlight')\" class=\"lucid\">\n";
	echo "\t<td class=\"fleft\">" . $client_name . "</td>\n";
	echo "\t<td>" . $where . "</td>\n";
	echo "\t<td>" . $response . "</td>\n";
	echo "\t<td>" . $manager . "</td>\n";
	echo "\t<td>" . $start . "</td>\n";
	echo "\t<td>" . $stop . "</td>\n";
	echo "\t<td class=\"fright\"><a href=\"eventdelete.php?&id=".$id. "\" OnClick=\"return confirmLink(this, 'Czy jesteś pewien, że chcesz usunąć klienta " . $firstname . " " . $lastname . " " . $company . " z bazy?');\"><img src=\"img/delete.gif\"></a>&nbsp;<a href=\"editrentalclient.php?id=".$id."\"><img src=\"img/edit.gif\"></a></td>\n";
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
