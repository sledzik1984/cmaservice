<?php

$fixture = $_GET["b"];
$client_id = $_GET["client_id"];
$search_type = $_GET["search_type"];


include 'debug.php';
include 'mysql.php';


echo "<html>\n";
echo "\t<head>\n";
echo "\t\t<link href=\"inc/style.css\" rel=\"stylesheet\" type=\"text/css\">\n";
echo "<meta http-equiv=\"Content-Type\" content=\"text/html;charset=utf-8\" >\n";
echo "<script language=\"JavaScript\" src=\"jquery.js\"></script>\n";
echo "<script language=\"JavaScript\" src=\"jquery.tooltip.js\"></script>\n";
echo "<script language=\"JavaScript\" src=\"inc/common.js\"></script>\n";


echo "<script type=\"text/javascript\">\n";

echo "$('.help').tooltip({ \n"; 
echo "    track: true \n"; 
echo "}); \n";

echo "</script>\n";

echo "</head>\n";
echo "<body>\n";

if ($debug == 1) { echo "DEBUG: search_type = " .$search_type; }

echo "<div class=\"mainmargin\">\n";





if (empty($fixture)) {

} else {

//Sekcja odpowiedzialna za różne, ogólne czynności związane z danym urządzeniem

    $fixture_name_query = "SELECT * FROM `warehouse` WHERE `id` = '$fixture'";
    $fixture_name_result = mysql_query($fixture_name_query);
    
    	while ($fixture_name_row = mysql_fetch_assoc($fixture_name_result)) {
    
		$fixture_name = $fixture_name_row["name"];
		echo "<h1>" . $fixture_name . "</h1>\n";
    
		echo "<a href=\"/cma_service/?m=deletefixture&b=" .$fixture."\" target=\"_top\">&raquo;&nbsp;Usuń urządzenie ze stanu magazynowego</a><br>\n";
		echo "<a href=\"/cma_service/?m=addservice&b=" .$fixture. "\" target=\"_top\">&raquo;&nbsp;Zgłaszam uszkodzenie urządzenia</a><br><br>\n";

		echo "&raquo;&nbsp;Zarezerwuj urządzenie:\n";
		echo "<br><br>\n";
		echo "<form method=\"post\" action=\"registerfixture.php\">\n";    
		echo "Rozpoczęcie rezerwacji: <input type=\"text\" name=\"block_start\">\n";

	}
    

}




echo "<h1>Historia urządzeń</h1>\n";

echo "<table cellpadding=\"3\" width=\"100%\">\n";

echo "<tr class=\"dark\">\n";
echo "<td width=\"30%\" class=\"fleftu\">";
echo "Urządzenie\n";
echo "</td>\n";

echo "<td align=\"right\" width=\"15%\" class=\"fbt\"  valign=\"top\">\n";
echo "Czynność\n";
echo "</td>\n";

echo "<td width=\"15%\" align=\"right\" class=\"fbt\" valign=\"top\">\n";
echo "Czas\n";
echo "</td>\n";

echo "<td width=\"15%\" align=\"right\" class=\"frightu\">\n";
echo "Osoba\n";
echo "</td>\n";


echo "</tr>\n";

//Typy wyszukiwań:
//
// search_type = 0; Poka wszystko
// search_type = 1; Wyszukaj po ID urządzenia
// search_type = 2; Wyszukaj po ID firmy

if (empty($search_type)) {
	if ($debug == 1) {echo "DEBUG: Empty search_type, set search_type=0\n";}
	$search_type = 0;
	//echo "DEBUG: search_type = " . $search_type;
} 

switch ($search_type) {
	case 0:
		$history_query = "SELECT * FROM `log_fixtures` ORDER BY `timestamp` DESC";
		if ($debug == 1) {
			echo "DEBUG: " . $history_query;
			echo "DEBUG: search_type = " .$search_type;
		}
		break;
	case 1:
		if (empty($fixture)) {
			$history_query = "SELECT * FROM `log_fixtures` ORDER BY `timestamp` DESC";
		} else {
			$history_query = "SELECT * FROM `log_fixtures` WHERE `fixture_id` = '$fixture' ORDER BY `timestamp` DESC";
		}

		if ($debug == 1) {
			echo "DEBUG: " . $history_query;
			echo "DEBUG: search_type = " .$search_type;
		}
		break;
	case 2:
		$history_query = "SELECT * FROM `log_fixtures` WHERE `client_id` = '$client_id' ORDER BY `timestamp` DESC";
		if ($debug == 1) { 
			echo "DEBUG: " . $history_query;
			echo "DEBUG: search_type = " .$search_type;
		}
		break;

}

$history_result = mysql_query($history_query);


if ($debug == 1) {echo mysql_error();}

while ($history_row = mysql_fetch_assoc($history_result)) {

    $fixture_id = $history_row["fixture_id"];
    $type = $history_row["type"];
    $timestamp = $history_row["timestamp"];
    $rid = $history_row["rental_id"];
    $login_ip = $history_row["ip"];
    $sid = $history_row["service_id"];
    $user = $history_row["user"];
    $rental_id = $history_row["rental_id"];
    $event_id = $history_row["event_id"];
    
    echo "<tr class=\"lucid\" onmouseover=\"addClass(this, 'highlight')\" onmouseout=\"removeClass(this, 'highlight')\">\n";
    echo "<td onClick=\"top.location.href='/cma_service/?m=historiaurzadzen&search_type=1&b=".$fixture_id."';\"    class=\"fleft\" valign=\"top\">\n";
    
    $fix_query = "SELECT * FROM `warehouse` WHERE `barcode` = '$fixture_id'";
    $fix_result = mysql_query($fix_query);
    
    
    while ($fix_row = mysql_fetch_assoc($fix_result)) {
	
	$fix_name = $fix_row["name"];
	$deleted_comment = $fix_row["deleted_comment"];
	
	echo $fix_name;
    
    }
    
    
    echo "</td>\n";
    
    echo "<td valign=\"top\" align=\"right\">\n";
    
    switch($type) {
    
    case 0:
	echo "Dodanie do stanu magazynowego";
	break;
	
    case 1:
	echo "Wyjazd na sztukę";
	break;
	
    case 2:
	echo "Powrót ze sztuki";
	break;
	
    case 3:
	echo "Wymiana żarówki";
	break;
	
    case 4:
	echo "<a href=\"serwis_details.php?sid=" . $sid . "\">Serwis</a>";
	break;
	
    case 5:
	echo "Koniec serwisu";
	break;
	
    case 6:
	echo "<a href=\"rentaldetails.php?rid=" . $rid . "\">Wypożyczenie zewnętrzne</a>";
	break;
	
    case 7:
	echo "<a href=\"rentaldetails.php?rid=" . $rid . "\">Powrót z wypożyczenia</a>";
	
	
	
	break;
	
	
    case 8:
	echo "Inwentaryzacja";
	break;
	
    case 9: 
	echo "Dodano do protokołu";
	break;
    
    
    case 10:
	echo "Urządzenie sprawdzone po serwisie - sprawne";
	break;
    
    case 11:
	echo "Logowanie z adresu <a href=\"http://ripe.net/fcgi-bin/whois?form_type=simple&full_query_string=&searchtext=".$login_ip."&submit.x=12&submit.y=3&submit=Search\">".$login_ip."</a>\n";
//	echo "Logowanie z adresu " . $login_ip;
	break;
	
    case 12:
    
    
    //echo "<img class=\"help\" src=\"img/help.png\" title=\"chuj\"/>\n";

    
	echo "Usunięcie ze stanu magazynowego <img class=\"help\" src=\"img/help.png\" title=\"".$deleted_comment."\">";
	break;
    
    
    case 13: 

	$query_event = "SELECT * FROM `events` WHERE `id` = '$event_id' LIMIT 1";
	$result_event = mysql_query($query_event);
	
	while ($row_event = mysql_fetch_assoc($result_event)) {
	
	$event_who = $row_event["who"];
	
	$who_q = "SELECT * FROM `rental_clients` WHERE `id` = '$event_who' LIMIT 1";
	$who_r = mysql_query($who_q);
	
	while ($row_who = mysql_fetch_assoc($who_r)) {
	
	$event_who_who = $row_who["company"];
	
	
	}
	
	
	}


	echo "Utworzono sztukę dla <a href=\"eventdetails.php?id=".$event_id."\">" .$event_who_who."</a>\n";;
	break;
    
    }
    
    echo "</td>\n";
    
    
    echo "<td align=\"right\">\n";
    
    echo date("r", $timestamp);
    
    echo "</td>\n";
    
    echo "<td align=\"right\" class=\"fright\">\n";
    
    $query_user = "SELECT * FROM `users` WHERE `login` = '$user' LIMIT 1";
    $result_user = mysql_query($query_user);
    
    $row_user = mysql_fetch_row($result_user);
    
    echo $row_user[3];
    
    
    echo "</td>\n";
    



}



echo "</tr>\n";

echo "<tr class=\"dark\">\n";
echo "<td colspan=\"5\" class=\"fall\">\n";
echo "<b>Strona:        &laquo;&laquo;&laquo;</b>\n";
echo "</td>\n";



echo "</table>\n";


echo "</div>\n";


echo "\t</body>\n";
echo "</html>\n";



?>
