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

echo "<h1>Lista wypożyczeń</h1>\n";


echo "<table cellpadding=\"4\" width=\"100%\">\n";

echo "<tr class=\"dark\">\n";
echo "<td class=\"fleftu\">Imię</td>\n";
echo "<td class=\"fbt\">Nazwisko</td>\n";
echo "<td class=\"fbt\">Firma</td>\n";
echo "<td class=\"fbt\">Data wydania</td>\n";
echo "<td class=\"fbt\">Data zwrotu</td>\n";
echo "<td class=\"fbt\">Wydane</td>\n";
echo "<td class=\"fbt\">Zwrócone</td>\n";
echo "<td class=\"frightu\"></td>\n";
echo "</tr>\n";


$query = "SELECT * FROM `rental_details` ORDER BY `id` ASC";
$result = mysql_query($query);

while ($row = mysql_fetch_assoc($result)) {

    $id = $row["id"];
    $rental_client = $row["rental_client"];
    $timestart = strftime("%c",$row["timestart"]);
    $timestop = strftime("%c",$row["timestop"]);
    $go = $row["go"];
    $back = $row["back"];

    
    if ($id%2 == 0) {
    //Pętla if odpowiedzialna za rozróżnianie id parzystych i nie parzystych

//    echo "<td onClick=\"top.location.href='/cma_service/?m=historiaurzadzen&b=" . $barcode . "';\" class=\"fleft\" valign=\"top\">\n";
//        echo $name;
//            echo "</td>\n";
            

    //Pobranie danych klienta:

    
    $query_client = "SELECT * FROM `rental_clients` WHERE `id` = '$rental_client' LIMIT 1";
    $result_client = mysql_query($query_client);
    
    $row_client = mysql_fetch_row($result_client);
    
    $firstname = $row_client[1];
    $lastname = $row_client[2];
    $company = $row_client[3];
    
    
	echo "<tr class=\"light\">\n";
        echo "\t<td onClick=\"top.location.href='/cma_service/?m=rentaldetails&rid=". $id . "';\"  class=\"fleft\">" . $firstname . "</td>\n";
        echo "\t<td onClick=\"top.location.href='/cma_service/?m=rentaldetails&rid=". $id . "';\">" . $lastname . "</td>\n";
        echo "\t<td onClick=\"top.location.href='/cma_service/?m=rentaldetails&rid=". $id . "';\">" . $company . "</td>\n";
        echo "\t<td onClick=\"top.location.href='/cma_service/?m=rentaldetails&rid=". $id . "';\">" . $timestart . "</td>\n";
        echo "\t<td onClick=\"top.location.href='/cma_service/?m=rentaldetails&rid=". $id . "';\">" . $timestop . "</td>\n";
        

    
    
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



        echo "\t<td class=\"fright\"><a href=\"rental_del.php?id=".$id. "\" OnClick=\"return confirmLink(this, 'Czy jesteś pewien, że chcesz usunąć wypożyczenie bazy?');\"><img src=\"img/delete.gif\"></a>&nbsp;<a href=\"rentalgo.php?rid=".$id."\"><img src=\"img/go.gif\"></a>&nbsp;<img src=\"img/edit.gif\"><a href=\"rentalback.php?rid=".$id."\"><img src=\"img/back.gif\"></a></td>\n";
        
         
        
        
        echo "</tr>\n\n";


} else {

    $query_client = "SELECT * FROM `rental_clients` WHERE `id` = '$rental_client' LIMIT 1";
    $result_client = mysql_query($query_client);
    
    $row_client = mysql_fetch_row($result_client);
    

    $firstname = $row_client[1];
    $lastname = $row_client[2];
    $company = $row_client[3];



        echo "<tr class=\"light\">\n";
        echo "\t<td onClick=\"top.location.href='/cma_service/?m=rentaldetails&rid=". $id . "';\"  class=\"fleft\">" . $firstname . "</td>\n";
        echo "\t<td onClick=\"top.location.href='/cma_service/?m=rentaldetails&rid=". $id . "';\">" . $lastname . "</td>\n";
        echo "\t<td onClick=\"top.location.href='/cma_service/?m=rentaldetails&rid=". $id . "';\">" . $company . "</td>\n";
        echo "\t<td onClick=\"top.location.href='/cma_service/?m=rentaldetails&rid=". $id . "';\">" . $timestart . "</td>\n";
        echo "\t<td onClick=\"top.location.href='/cma_service/?m=rentaldetails&rid=". $id . "';\">" . $timestop . "</td>\n";
    
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


        echo "\t<td class=\"fright\"><a href=\"rental_del.php?id=".$id. "\" OnClick=\"return confirmLink(this, 'Czy jesteś pewien, że chcesz usunąć wypożyczenie z bazy?');\"><img src=\"img/delete.gif\"></a>&nbsp;<a href=\"rentalgo.php?rid=".$id."\"><img src=\"img/go.gif\"></a>&nbsp;<img src=\"img/edit.gif\"><a href=\"rentalback.php?rid=".$id."\"><img src=\"img/back.gif\"></a></td>\n";
        
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
