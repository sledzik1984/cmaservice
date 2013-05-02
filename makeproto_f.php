<?php

include 'mysql.php';

echo "<html>\n";
echo "<head>\n";
echo "<link href=\"inc/style.css\" rel=\"stylesheet\" type=\"text/css\">\n";
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>\n";
echo "<script language='JavaScript' type='text/JavaScript' src='inc/common.js'> </script>\n";

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
echo "</td>\n";
echo "</tr>\n";
echo "</table>\n";
echo "</form>\n";
echo "<hr>\n";
echo "<p>\n";

//Autofokus na polu kodu kreskowego
echo "<script type=\"text/javascript\">\n";
echo "document.searchbar.barcode.focus();\n";
echo "</script>\n";












echo "<h1>Lista sprzętu</h1>\n";

echo "<table cellpadding=\"3\" widthh=\"100%\">\n";
echo "<tr class=\"dark\" onmouseover=\"return overlib('Kliknij na nazwy kolumn w celu zmiany porządku sortowania',HAUTO,VAUTO,OFFSETX,15,OFFSETY,15);\" onmouseout=\"nd();\">\n";
echo "<td width=\"90%\" class=\"fleftu\">\n";
echo "Nazwa urządzenia\n";
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

echo "<td width=\"1%\" align=\"right\" class=\"fbt\">\n";
echo "Kod\n";
echo "</td>\n";


echo "<td width=\"1%\" align=\"right\" class=\"frightu\">\n";
echo "</td>\n";

echo "</tr>\n";


$query_sprzet = "SELECT * FROM `warehouse` ORDER BY `id` ASC";
$result_sprzet = mysql_query($query_sprzet);


echo "<form name=\"fixtures\" id=\"fixtures\" method=\"POST\" action=\"makeproto_f2.php\">\n";
echo "<input type=\"submit\" class=\"hiddenbtn\">\n";

while ($row_sprzet = mysql_fetch_assoc($result_sprzet)) {

    $id = $row_sprzet["id"];
    $name = $row_sprzet["name"];
    $present = $row_sprzet["present"];
    $localisation = $row_sprzet["localisation"];
    $barcode = $row_sprzet["barcode"];
    $ontour = $row_sprzet["ontour"];
    $lost = $row_sprzet["lost"];


    if ($ontour == 1 && $lost == 0) { 
    
        echo "<tr class=\"blend\" onmouseover=\"addClass(this, 'highlight')\" onmouseout=\"removeClass(this, 'highlight')\">\n";

    } elseif ($lost == 1 && $ontour == 0) {
    
	echo "<tr class=\"red\" onmouseover=\"addClass(this, 'highlight')\" onmouseout=\"removeClass(this, 'highlight')\">\n";

    } else {
    
	echo "<tr class=\"lucid\" onmouseover=\"addClass(this, 'highlight')\" onmouseout=\"removeClass(this, 'highlight')\">\n";
    
    }


    echo "<td onClick=\"top.location.href='/cma_service/?m=historiaurzadzen&b=" . $barcode . "';\" class=\"fleft\" valign=\"top\">\n";
    echo $name;
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
    echo "Światło\n";
    echo "</td>\n";
    
    echo "<td align=\"right\" nowrap>\n";
    echo "<nobr>\n";
    echo $barcode;
    echo "</td>\n";
    

    echo "<td align=\"right\" valign=\"top\" class=\"fright\">\n";
    echo "<input type=\"checkbox\" name=\"check". $id ."\" value=\"" . $barcode . "\">\n";
    echo "</td>\n";
    
    echo "</tr>\n";



}

echo "<tr class=\"dark\">\n";
echo "<td colspan=\"6\" class=\"fall\">\n";
echo "<a href=\"javascript:document.fixtures.submit();\" accesskey=\"S\">Zapisz <img src=\"img/save.gif\"></a>\n";
echo "<a href=\"protocols.php\"> Anuluj <img src=\"img/cancel.gif\"></a>\n";
echo "</td>\n";
echo "</form>\n";

echo "</div>\n";

echo "</html>\n";

//$vars = get_defined_vars();
//print_r($vars);


?>