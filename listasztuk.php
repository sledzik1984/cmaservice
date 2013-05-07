<?php

setlocale(LC_TIME, "pl_PL.UTF-8");

//Zmienne post 


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
echo "<td class=\"fbt\">Data wydania</td>\n";
echo "<td class=\"fbt\">Data zwrotu</td>\n";
echo "<td class=\"fbt\">Wydane</td>\n";
echo "<td class=\"fbt\">Zwrócone</td>\n";
echo "<td class=\"frightu\"></td>\n";
echo "</tr>\n";


$query = "SELECT * FROM `events` ORDER BY `id` ASC";
$result = mysql_query($query);

while ($row = mysql_fetch_assoc($result)) {

    $id = $row["id"];

	
	$timestart =  strftime("%c",$row["timestart"]);
	$timestop =  strftime("%c",$row["timestop"]);
	$who = $row["who"];
	$back = $row["back"];
	$where = $row["where"];
	$response = $row["response"];
	$manager = $row["warehousemanager"];
    



    //Pobranie danych klienta:

    
    $query_client = "SELECT * FROM `rental_clients` WHERE `id` = '$who' LIMIT 1";
    $result_client = mysql_query($query_client);
    
    $row_client = mysql_fetch_row($result_client);
    
    $company = $row_client[1];
   

	//Pobranie danych miejsca sztuki
	
	

	$query_place = "SELECT `name` FROM `places` WHERE `id` = '$where' LIMIT 1";
	$result_place = mysql_query($query_place);


	$row_place = mysql_fetch_row($result_place);

	$place = $row_place[0];
 
    
	echo "<tr class=\"light\">\n";
        echo "\t<td onClick=\"top.location.href='/cma_service/?m=eventdetails&event_id=". $id . "';\" class=\"fleft\">" . $company . "</td>\n";
	echo "\t<td>" . $place . "</td>\n";
        echo "\t<td>" . $response . "</td>\n";
        echo "\t<td>" . $manager . "</td>\n";
        echo "\t<td>" . $timestart . "</td>\n";
        echo "\t<td>" . $timestop . "</td>\n";
        

    
    
	if ($go == 0) { 
	
	    echo "\t<td><form><input type=\"checkbox\" disabled=\"disabled\"></form></td>\n";
        
        } else {
        
	    echo "\t<td><form><input type=\"checkbox\" disabled=\"disabled\" checked=\"checked\"></form></td>\n";
        
        }


        if ($back == 0) {
        
    	    echo "<td><form><input type=\"checkbox\" disabled=\"disabled\"></form></td>\n";
        
        } else {
        
    	    echo "<td><form><input type=\"checkbox\" disabled=\"disabled\" checked=\"checked\"></form></td>\n";
        
        }



        echo "\t<td class=\"fright\"><a href=\"rental_del.php?id=".$id. "\" OnClick=\"return confirmLink(this, 'Czy jesteś pewien, że chcesz usunąć wypożyczenie bazy?');\"><img src=\"img/delete.gif\"></a>&nbsp;<a href=\"eventgo.php?rid=".$id."&client_id=".$rental_client."\"><img src=\"img/go.gif\"></a>&nbsp;<img src=\"img/edit.gif\"><a href=\"rentalback.php?rid=".$id."\"><img src=\"img/back.gif\"></a></td>\n";
        
         
        
        
        echo "</tr>\n\n";




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
