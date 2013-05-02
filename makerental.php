<?php

include 'mysql.php';

echo "<html>\n";
echo "\t<head>\n";
echo "\t\t<link href=\"inc/style.css\" rel=\"stylesheet\" type=\"text/css\">\n";
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>\n";
echo "<script language=\"JavaScript\" src=\"calendar1.js\"></script><!-- Date only with year scrolling -->\n";


echo "\t</head>\n";
echo "\t<body>\n";

echo "<h1>Utwórz wypożyczenie</h1>\n";

echo "<script type=\"text/javascript\" language=\"JavaScript\" src=\"inc/overlib.js\"></script>\n";
echo "<div class=\"mainmargin\">\n";

echo "<form name=\"makerental\"  id=\"makerental\" method=\"POST\" action=\"makerental_f.php\">\n";
echo "<input type=\"submit\" class=\"hiddenbtn\">\n";


echo "<table cellpadding=\"4\" cellspacing=\"0\" width=\"100%\">\n";

echo "<tr class=\"dark\">\n";
echo "<td class=\"fall\" width=\"100%\">Klient: \n";
echo "<select name=\"rentalclient\">\n";

$rental_client_query = "SELECT * FROM `rental_clients` ORDER BY `id` ASC";
$rental_client_result = mysql_query($rental_client_query);

while ($rental_client_row = mysql_fetch_assoc($rental_client_result)) {

    $id = $rental_client_row["id"];
    $firstname = $rental_client_row["first_name"];
    $lastname = $rental_client_row["last_name"];
    $company = $rental_client_row["company"];
    
    echo "<option value=\"" .$id . "\">" . $firstname . " " .$lastname . " " . $company . "</option>\n";



}




echo "</select>\n";



echo "</td>\n";
echo "</tr>\n";

echo "<tr class=\"light\">\n";

echo "<td width=\"100%\" class=\"fbottomu\" align=\"right\">\n";

echo "<table width=\"100%\" border=\"0\">\n";
echo "<tr>\n";
echo "<td>Data wydania sprzętu: </td>\n";
echo "<td><input type=\"text\" name=\"timestart\">&nbsp;<a href=\"javascript:cal1.popup();\"><img src=\"img/cal.gif\" width=\"16\" height=\"16\" border=\"0\" alt=\"Kliknij aby wybrać datę\"></a></td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td>Data zwrotu sprzętu: </td>\n";
echo "<td><input type=\"text\" name=\"timestop\">&nbsp;<a href=\"javascript:cal2.popup();\"><img src=\"img/cal.gif\" width=\"16\" height=\"16\" border=\"0\" alt=\"Kliknij aby wybrać datę\"></a></td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td>Faktura: </td>\n";
echo "<td><input type=\"checkbox\" name=\"invoice\" value=\"1\"></td>\n";
echo "</tr>\n";

echo "</table>\n";

echo "<a href=\"javascript:document.makerental.submit();\" accesskey=\"S\">Zapisz <img src=\"img/save.gif\"></a>\n";
echo "<a href=\"rentalclientslist.php\"> Anuluj <img src=\"img/cancel.gif\"></a>\n";
echo "<td>\n";

echo "</tr>\n";

echo "</table>\n";

echo "</form>\n";

echo "<script language=\"JavaScript\">\n";
echo "       var cal1 = new calendar1(document.forms['makerental'].elements['timestart']);\n";
echo "       cal1.year_scroll = true;\n";
echo "       cal1.time_comp = true;\n";

echo "       var cal2 = new calendar1(document.forms['makerental'].elements['timestop']);\n";
echo "       cal2.year_scroll = true;\n";
echo "       cal2.time_comp = true;\n";

echo "</script>\n";











echo "</div>\n";



echo "\t</body>\n";
echo "</html>\n";



?>