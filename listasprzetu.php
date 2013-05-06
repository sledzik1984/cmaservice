<?php

if (isset($_POST["filter"])) {

$filter = $_POST["filter"];

} elseif (isset($_GET["filter"])) {

$filter = $_GET["filter"];

}

if (isset($_POST["dzial"])) {

$dzial = $_POST["dzial"];

} elseif (isset($_GET["dzial"])) {

$dzial = $_GET["dzial"];

}



include 'mysql.php';


echo "<html>\n";
echo "<head>\n";
echo "<link href=\"inc/style.css\" rel=\"stylesheet\" type=\"text/css\">\n";
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>\n";
echo "<script language='JavaScript' type='text/JavaScript' src='inc/common.js'> </script>\n";
echo "<script type='text/JavaScript' src='inc/jquery.js'></script>\n";

echo "<script src=\"inc/jq/development-bundle/ui/jquery.ui.core.js\"></script>\n";
echo "<script src=\"inc/jq/development-bundle/ui/jquery.ui.widget.js\"></script>\n";
echo "<script src=\"inc/jq/development-bundle/ui/jquery.ui.progressbar.js\"></script>\n";



echo "<script language='JavaScript' type='text/JavaScript'>\n";
echo "var x=13;//nr characters\n";
echo "function submitT(t,f){\n";
echo "if(t.value.length==x){\n";
echo "f.submit()\n";
echo "}\n";
echo "}\n";
echo "</script>\n";


echo "</head>\n";

echo "<body>\n";

echo "<script type=\"text/javascript\" language=\"JavaScript\" src=\"inc/overlib.js\"></script>\n";

echo "<div class=\"mainmargin\">\n";

echo "<form name=\"searchbar\" action=\"szukaj_sprzetu.php\" method=\"POST\">\n";
echo "<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">\n";
echo "<tr>\n";
echo "<td width=\"1%\" nowrap>\n";
echo "Szukaj: <input class=\"blend\" type=\"text\" id=\"customerinput\" name=\"barcode\" maxlength=\"13\" size=\"13\" onmouseover=\"return overlib('Odczytaj kod kreskowy urządzenia - system automatycznie odszuka odpowiednie urządzenie.',HAUTO,VAUTO,OFFSETX,15,OFFSETY,15);\" onmouseout=\"nd();\"  onkeyup=\"submitT(this,this.form)\">\n";
echo "</form></td>\n";
echo "<td>\n";

if ($filter == 1) {


echo "&nbsp;&nbsp;Filtr: <form name=\"filter\" action=\"listasprzetu.php\" method=\"POST\">\n";
echo "<select name=\"filter\" onChange=\"this.form.submit();\">\n";
echo "\t<option value=\"1\" selected=\"selected\">Wszystkie</option>\n";
echo "\t<option value=\"2\">Tylko urządzenia w magazynie</option>\n";
echo "\t<option value=\"3\">Tylko urządzenia poza magazynem</option>\n";
echo "</select>\n";
echo "<input type=\"hidden\" name=\"dzial\" value=\"".$dzial."\">\n";
echo "</form>\n";

} elseif ($filter == 2) {


echo "&nbsp;&nbsp;Filtr: <form name=\"filter\" action=\"listasprzetu.php\" method=\"POST\">\n";
echo "<select name=\"filter\" onChange=\"this.form.submit();\">\n";
echo "\t<option value=\"1\">Wszystkie</option>\n";
echo "\t<option value=\"2\" selected=\"selected\">Tylko urządzenia w magazynie</option>\n";
echo "\t<option value=\"3\">Tylko urządzenia poza magazynem</option>\n";
echo "</select>\n";
echo "<input type=\"hidden\" name=\"dzial\" value=\"".$dzial."\">\n";
echo "</form>\n";

} elseif ($filter == 3) {


echo "&nbsp;&nbsp;Filtr: <form name=\"filter\" action=\"listasprzetu.php\" method=\"POST\">\n";
echo "<select name=\"filter\" onChange=\"this.form.submit();\">\n";
echo "\t<option value=\"1\">Wszystkie</option>\n";
echo "\t<option value=\"2\">Tylko urządzenia w magazynie</option>\n";
echo "\t<option value=\"3\" selected=\"selected\">Tylko urządzenia poza magazynem</option>\n";
echo "</select>\n";
echo "<input type=\"hidden\" name=\"dzial\" value=\"".$dzial."\">\n";
echo "</form>\n";



} else {

echo "&nbsp;&nbsp;Filtr: <form name=\"filter\" action=\"listasprzetu.php\" method=\"POST\">\n";
echo "<select name=\"filter\" onChange=\"this.form.submit();\">\n";
echo "\t<option value=\"1\" selected=\"selected\">Wszystkie</option>\n";
echo "\t<option value=\"2\">Tylko urządzenia w magazynie</option>\n";
echo "\t<option value=\"3\">Tylko urządzenia poza magazynem</option>\n";
echo "</select>\n";
echo "<input type=\"hidden\" name=\"dzial\" value=\"".$dzial."\">\n";
echo "</form>\n";


}


echo "</td>\n";
echo "<td>\n";
if ($dzial == 1) {


echo "&nbsp;&nbsp;Dział: <form name=\"dzial\" action=\"listasprzetu.php\" method=\"POST\">\n";
echo "<select name=\"dzial\" onChange=\"this.form.submit();\">\n";
echo "\t<option value=\"1\" selected=\"selected\">Wszystkie</option>\n";
echo "\t<option value=\"2\">Światło</option>\n";
echo "\t<option value=\"3\">Dźwięk</option>\n";
echo "\t<option value=\"4\">Multimedia</option>\n";
echo "</select>\n";
echo "<input type=\"hidden\" name=\"filter\" value=\"".$filter."\">\n";
echo "</form>\n";



} elseif ($dzial == 2) {


echo "&nbsp;&nbsp;Dział: <form name=\"dzial\" action=\"listasprzetu.php\" method=\"POST\">\n";
echo "<select name=\"dzial\" onChange=\"this.form.submit();\">\n";
echo "\t<option value=\"1\">Wszystkie</option>\n";
echo "\t<option value=\"2\" selected=\"selected\">Światło</option>\n";
echo "\t<option value=\"3\">Dźwięk</option>\n";
echo "\t<option value=\"4\">Multimedia</option>\n";
echo "</select>\n";
echo "<input type=\"hidden\" name=\"filter\" value=\"".$filter."\">\n";
echo "</form>\n";


} elseif ($dzial == 3) {


echo "&nbsp;&nbsp;Dział: <form name=\"dzial\" action=\"listasprzetu.php\" method=\"POST\">\n";
echo "<select name=\"dzial\" onChange=\"this.form.submit();\">\n";
echo "\t<option value=\"1\">Wszystkie</option>\n";
echo "\t<option value=\"2\">Światło</option>\n";
echo "\t<option value=\"3\" selected=\"selected\">Dźwięk</option>\n";
echo "\t<option value=\"4\">Multimedia</option>\n";
echo "</select>\n";
echo "<input type=\"hidden\" name=\"filter\" value=\"".$filter."\">\n";
echo "</form>\n";


} elseif ($dzial == 4) {


echo "&nbsp;&nbsp;Dział: <form name=\"dzial\" action=\"listasprzetu.php\" method=\"POST\">\n";
echo "<select name=\"dzial\" onChange=\"this.form.submit();\">\n";
echo "\t<option value=\"1\">Wszystkie</option>\n";
echo "\t<option value=\"2\">Światło</option>\n";
echo "\t<option value=\"3\">Dźwięk</option>\n";
echo "\t<option value=\"4\" selected=\"selected\">Multimedia</option>\n";
echo "</select>\n";
echo "<input type=\"hidden\" name=\"filter\" value=\"".$filter."\">\n";
echo "</form>\n";


} else {

echo "&nbsp;&nbsp;Dział: <form name=\"dzial\" action=\"listasprzetu.php\" method=\"POST\">\n";
echo "<select name=\"dzial\" onChange=\"this.form.submit();\">\n";
echo "\t<option value=\"1\" selected=\"selected\">Wszystkie</option>\n";
echo "\t<option value=\"2\">Światło</option>\n";
echo "\t<option value=\"3\">Dźwięk</option>\n";
echo "\t<option value=\"4\">Multimedia</option>\n";
echo "</select>\n";
echo "<input type=\"hidden\" name=\"filter\" value=\"".$filter."\">\n";
echo "</form>\n";

}

echo "</td>\n";
echo "</tr>\n";
echo "</table>\n";
//echo "Dzial: " . $dzial . ", filtr: " . $filter . "\n";
echo "<hr>\n";
echo "<p>\n";

//Autofokus na polu kodu kreskowego
echo "<script type=\"text/javascript\">\n";
echo "document.searchbar.barcode.focus();\n";
echo "</script>\n";

echo "<h1>Lista sprzętu</h1>";



echo "<table cellpadding=\"3\" widthh=\"100%\">\n";
echo "<tr class=\"dark\" onmouseover=\"return overlib('Kliknij na nazwy kolumn w celu zmiany porządku sortowania',HAUTO,VAUTO,OFFSETX,15,OFFSETY,15);\" onmouseout=\"nd();\">\n";
echo "<td width=\"90%\" class=\"fleftu\">\n";
echo "Nazwa urządzenia\n";
echo "</td>\n";

echo "<td align=\"right\" width=\"1%\" class=\"fbt\" valign=\"top\" nowrap>\n";
echo "Nr seryjny\n";
echo "</td>\n";

echo "<td align=\"right\" width=\"1%\" class=\"fbt\" valign=\"top\" nowrap>\n";
echo "Waga (z kejsem)\n";
echo "</td>\n";


echo "<td align=\"right\" width=\"1%\" class=\"fbt\" valign=\"top\" nowrap>\n";
echo "Objętość (m<sup>3</sup>)\n";
echo "</td>\n";


echo "<td align=\"right\" width=\"10%\" class=\"fbt\" valign=\"top\" nowrap>\n";
echo "Komentarz\n";
echo "</td>\n";


echo "<td align=\"right\" width=\"1%\" class=\"fbt\" valign=\"top\" nowrap>\n";
echo "Magazyn\n";
echo "</td>\n";

echo "<td align=\"right\" width=\"1%\" class=\"fbt\" valign=\"top\" nowrap>\n";
echo "Status\n";
echo "</td>\n";



echo "<td align=\"right\" width=\"1%\" class=\"fbt\" valign=\"top\" nowrap>\n";
echo "Typ\n";
echo "</td>\n";


echo "<td width=\"1%\" align=\"right\" class=\"frightu\">\n";
echo "Kod\n";
echo "</td>\n";

echo "</tr>\n";

//PAGING

$perPage = 25;
if (is_numeric($_REQUEST['page'])) {
$page = (int) $_REQUEST['page'];
if ($page < 1) {
$page = 1;
}
} else {
$page = 1;
}
$start = ($page - 1) * $perPage;

//Filtrujemy sobie wyniki na podstawie filtru:


//Od tego miejsca Filtr Wszystkie

if ($filter == 1 && $dzial == 1) {

$query_sprzet = "SELECT * FROM `warehouse` WHERE `deleted` != '1' ORDER BY `id` ASC LIMIT $start, $perPage";

} elseif ($filter == 1 && $dzial == 2) {

$query_sprzet = "SELECT * FROM `warehouse` WHERE `deleted` != '1' AND `localisation` = '2' ORDER BY `id` ASC LIMIT $start, $perPage";

} elseif ($filter == 1 && $dzial == 3) {

$query_sprzet = "SELECT * FROM `warehouse` WHERE `deleted` != '1' AND `localisation` = '3' ORDER BY `id` ASC LIMIT $start, $perPage";

} elseif ($filter == 1 && $dzial == 4) {

$query_sprzet = "SELECT * FROM `warehouse` WHERE `deleted` != '1' AND `localisation` = '4' ORDER BY `id` ASC LIMIT $start, $perPage";

//Koniec wszystkie

//Od tego miejsca filtr "W magazynie"

} elseif ($filter == 2 && $dzial == 1 ) {

$query_sprzet = "SELECT * FROM `warehouse` WHERE `present` = '1' AND `deleted` ='0'  ORDER BY `id` ASC LIMIT $start, $perPage";

} elseif ($filter == 2 && $dzial == 2 ) {

$query_sprzet = "SELECT * FROM `warehouse` WHERE `present` = '1' AND `deleted` ='0' AND `localisation` = '2' ORDER BY `id` ASC LIMIT $start, $perPage";

} elseif ($filter == 2 && $dzial == 3 ) {

$query_sprzet = "SELECT * FROM `warehouse` WHERE `present` = '1' AND `deleted` ='0' AND `localisation` = '3' ORDER BY `id` ASC LIMIT $start, $perPage";

} elseif ($filter == 2 && $dzial == 4 ) {

$query_sprzet = "SELECT * FROM `warehouse` WHERE `present` = '1' AND `deleted` ='0' AND `localisation` = '4' ORDER BY `id` ASC LIMIT $start, $perPage";

//Koniec W magazynie

//Filtr poza magazynem

} elseif ($filter == 3 && $dzial == 1) {

$query_sprzet = "SELECT * FROM `warehouse` WHERE `present` = '0' AND `deleted` ='0' ORDER BY `id` ASC LIMIT $start, $perPage";

} elseif ($filter == 3 && $dzial == 2) {

$query_sprzet = "SELECT * FROM `warehouse` WHERE `present` = '0' AND `deleted` ='0' AND `localisation` = '2' ORDER BY `id` ASC LIMIT $start, $perPage";

} elseif ($filter == 3 && $dzial == 3) {

$query_sprzet = "SELECT * FROM `warehouse` WHERE `present` = '0' AND `deleted` ='0' AND `localisation` = '3' ORDER BY `id` ASC LIMIT $start, $perPage";

} elseif ($filter == 3 && $dzial == 4) {

$query_sprzet = "SELECT * FROM `warehouse` WHERE `present` = '0' AND `deleted` ='0' AND `localisation` = '4' ORDER BY `id` ASC LIMIT $start, $perPage";

} elseif ($filter == 1 && empty($dzial)) {

$query_sprzet = "SELECT * FROM `warehouse` WHERE `deleted` != '1' ORDER BY `id` ASC LIMIT $start, $perPage";

} elseif ($filter == 2 && empty($dzial)) {

$query_sprzet = "SELECT * FROM `warehouse` WHERE `present` = '1' AND `deleted` ='0'  ORDER BY `id` ASC LIMIT $start, $perPage";

} elseif ($filter == 3 && empty($dzial)) {

$query_sprzet = "SELECT * FROM `warehouse` WHERE `present` = '0' AND `deleted` ='0' ORDER BY `id` ASC LIMIT $start, $perPage";

} elseif ($dzial == 1 && empty($filter)) {

$query_sprzet = "SELECT * FROM `warehouse` WHERE `deleted` != '1' ORDER BY `id` ASC LIMIT $start, $perPage";

} elseif ($dzial == 2 && empty($filter)) {

$query_sprzet = "SELECT * FROM `warehouse` WHERE `deleted` != '1' AND `localisation` = '2' ORDER BY `id` ASC LIMIT $start, $perPage";


} elseif ($dzial == 3 && empty($filter)) {

$query_sprzet = "SELECT * FROM `warehouse` WHERE `deleted` != '1' AND `localisation` = '3' ORDER BY `id` ASC LIMIT $start, $perPage";


} elseif ($dzial == 4 && empty($filter)) {

$query_sprzet = "SELECT * FROM `warehouse` WHERE `deleted` != '1' AND `localisation` = '4' ORDER BY `id` ASC LIMIT $start, $perPage";

} else {


$query_sprzet = "SELECT * FROM `warehouse` WHERE `deleted` = '0' ORDER BY `id` ASC LIMIT $start, $perPage";

}


//echo $query_sprzet;

$result_sprzet = mysql_query($query_sprzet);

while ($row_sprzet = mysql_fetch_assoc($result_sprzet)) {

    $name = $row_sprzet["name"];
    $comment = $row_sprzet["comment"];
    $present = $row_sprzet["present"];
    $localisation = $row_sprzet["localisation"];
    $barcode = $row_sprzet["id"];
    $ontour = $row_sprzet["ontour"];
    $lost = $row_sprzet["lost"];
    $broken = $row_sprzet["broken"];
    $serialno = $row_sprzet["serialno"];
	$weight = $row_sprzet["weight"];
	$vol = $row_sprzet["volume"];

//    switch (true) {
    
    
//    }

    if ($ontour == 1 && $lost == 0) { 
    
        echo "<tr class=\"blend\" onmouseover=\"addClass(this, 'highlight')\" onmouseout=\"removeClass(this, 'highlight')\">\n";

    } elseif ($lost == 1 && $ontour == 0) {
    
	echo "<tr class=\"red\" onmouseover=\"addClass(this, 'highlight')\" onmouseout=\"removeClass(this, 'highlight')\">\n";

    } elseif ($broken == 1) {
    
    	echo "<tr class=\"brown\" onmouseover=\"addClass(this, 'highlight')\" onmouseout=\"removeClass(this, 'highlight')\">\n";
    
    } else {
    
	echo "<tr class=\"lucid\" onmouseover=\"addClass(this, 'highlight')\" onmouseout=\"removeClass(this, 'highlight')\">\n";
    
    }


    echo "<td onClick=\"top.location.href='/cma_service/?m=historiaurzadzen&b=" . $barcode . "&search_type=1';\" class=\"fleft\" valign=\"top\">\n";
    echo $name;
    echo "</td>\n";
    
    echo "<td align=\"right\" valign=\"top\" nowrap>\n";
    echo $serialno;
    echo "</td>\n";
    
    echo "<td align=\"right\" valign=\"top\" nowrap>\n";
    echo $weight;
    echo "</td>\n";
 

    echo "<td align=\"right\" valign=\"top\" nowrap>\n";
    echo $vol;
    echo "</td>\n";
   


 
    echo "<td align=\"right\" valign=\"top\" nowrap>\n";
    echo $comment;
    echo "</td>\n";
    
    echo "<td align=\"right\" valign=\"top\" nowrap>\n";

    $warehouse_query = "SELECT * FROM `warehouses` WHERE `id` = '$localisation'";
    $warehouse_result = mysql_query($warehouse_query);
    
    while ($warehouse_row = mysql_fetch_assoc($warehouse_result)) {
    
	$warehouse_name = $warehouse_row["name"];
	
	echo $warehouse_name;
    
    }


    
    echo "</td>\n";
    
    
    echo "<td align=\"right\" valign=\"top\" nowrap>\n";

    if ($present == 0) {
    
	echo "Brak\n";
    
    } else {
    
	echo "Jest\n";
    }
    

    echo "</td>\n";
    
    
    echo "<td align=\"right\" valign=\"top\" nowrap>\n";

    switch ($localisation) {
	case 2:
	    echo "Światło";
	    break;
	case 3:
	    echo "Dźwięk";
	    break;
	case 4:
	    echo "Multimedia";
	    break;
    
    
    }


    echo "</td>\n";
    
    echo "<td align=\"right\" class=\"fright\">\n";
    echo "<nobr>\n";
    echo $barcode;
    echo "</td>\n";
    
    
    echo "</tr>\n";

}

echo "<tr class=\"dark\">\n";
echo "<td colspan=\"9\" class=\"fall\">\n";

$prev = $page - 1;
$next = $page + 1;

$prevLink = $_SERVER['PHP_SELF'] . '?page=' . $prev .'&filter=' . $filter;
$nextLink = $_SERVER['PHP_SELF'] . '?page=' . $next .'&filter=' . $filter;

echo "<b>Strona:&nbsp;&nbsp;<a href=\"".$prevLink."\">Poprzednia</a>&nbsp;&nbsp;<a href=\"".$nextLink."\">Następna</a></b>\n";
echo "</td>\n";


echo "</div>\n";

echo "</html>\n";

//$vars = get_defined_vars();
//print_r($vars);


?>
