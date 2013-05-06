<?php

include 'mysql.php';

// Procedura pobrania ostatniego ID sprzętu w celu wygenerowania kolejnego kodu kreskowego
//


$query_sprzet = "SELECT `id` FROM `warehouse` ORDER BY `id` DESC LIMIT 1";

$result_sprzet = mysql_query($query_sprzet);

while ($row_sprzet = mysql_fetch_assoc($result_sprzet)) {

	$last_id = $row_sprzet["id"];
	$new_barcode = $last_id + 1;

}




echo "<html>\n";
echo "\t<head>\n";
echo "\t\t<link href=\"inc/style.css\" rel=\"stylesheet\" type=\"text/css\">\n";
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>\n";
echo "<script language=\"JavaScript\" src=\"jquery.js\"></script>\n";
echo "<script language=\"JavaScript\" src=\"jquery.tooltip.js\"></script>\n";
echo "<script language=\"JavaScript\" src=\"inc/common.js\"></script>\n";


echo "\t</head>\n";
echo "\t<body>\n";

echo "<script type=\"text/javascript\" language=\"JavaScript\" src=\"inc/overlib.js\"></script>\n";
echo "<div class=\"mainmargin\">\n";

echo "<h1>Dodaj sprzęt do stanu magazynowego</h1>\n";

echo "<form name=\"fixtureadd\"  id=\"fixtureadd\" method=\"POST\" action=\"fixtureadd_f.php\">\n";
echo "<input type=\"submit\" class=\"hiddenbtn\">\n";

echo "<table cellpadding=\"4\" cellspacing=\"0\" width=\"100%\">\n";
echo "<tr class=\"dark\">\n";
echo "<td colspan=\"2\" class=\"fall\" width=\"100%\">\n";
echo "Nowe urządzenie:";
echo "</td>\n";
echo "</tr>\n";

echo "<tr class=\"light\"\>\n";

echo "<td class=\"fleft\">Nazwa urządzenia</td>\n";
echo "<td class=\"fright\"><input size=\"30\" type=\"text\" name=\"fixturename\"></td>\n";

echo "</tr>\n";

echo "<tr class=\"light\"\>\n";

echo "<td class=\"fleft\">Numer seryjny</td>\n";
echo "<td class=\"fright\"><input size=\"30\" type=\"text\" name=\"serialno\"></td>\n";

echo "</tr>\n";


echo "<tr class=\"light\"\>\n";

echo "<td class=\"fleft\">Dział</td>\n";
echo "<td class=\"fright\"><select name=\"dzial\"><option value=\"2\">Światło</option><option value=\"3\">Dźwięk</option><option value=\"4\">Multimedia</option></td>\n";

echo "</tr>\n";

echo "<tr class=\"light\"\>\n";
echo "<td class=\"fleft\">Waga <img src=\"img/help.png\" class=\"help\" title=\"W kilogramach, z kejsem\"></td>\n";
echo "<td class=\"fright\"><input size=\"30\" type=\"text\" name=\"weight\"></td>\n";
echo "</tr>\n";

echo "<tr class=\"light\"\>\n";
echo "<td class=\"fleft\">Wysokość <img src=\"img/help.png\" class=\"help\" title=\"W centymetrach, z kejsem\"></td>\n";
echo "<td class=\"fright\"><input size=\"30\" type=\"text\" name=\"height\"></td>\n";
echo "</tr>\n";

echo "<tr class=\"light\"\>\n";
echo "<td class=\"fleft\">Szerokość <img src=\"img/help.png\" class=\"help\" title=\"W centymetrach, z kejsem\"></td>\n";
echo "<td class=\"fright\"><input size=\"30\" type=\"text\" name=\"width\"></td>\n";
echo "</tr>\n";

echo "<tr class=\"light\"\>\n";
echo "<td class=\"fleft\">Głębokość <img src=\"img/help.png\" class=\"help\" title=\"W centymetrach, z kejsem\"></td>\n";
echo "<td class=\"fright\"><input size=\"30\" type=\"text\" name=\"depth\"></td>\n";
echo "</tr>\n";




echo "</tr>\n";

echo "<tr class=\"light\"\>\n";

echo "<td class=\"fleft\">Komentarz</td>\n";
echo "<td class=\"fright\"><input size=\"30\" type=\"text\" name=\"comment\"></td>\n";

echo "</tr>\n";


 
echo "<tr class=\"light\"\>\n";

echo "<td class=\"fleft\">Kod kreskowy</td>\n";
echo "<td class=\"fright\"><input size=\"30\" type=\"text\" value=\"".$new_barcode."\" name=\"barcode\"></td>\n";

echo "</tr>\n";

echo "<tr class=\"light\">\n";

echo "<td colspan=\"2\" width=\"100%\" class=\"fbottomu\" align=\"right\">\n";
echo "<a href=\"javascript:document.fixtureadd.submit();\" accesskey=\"S\">Zapisz <img src=\"img/save.gif\"></a>\n";
echo "<a href=\"listasprzetu.php\"> Anuluj <img src=\"img/cancel.gif\"></a>\n";
echo "</td>\n";

echo "</tr>\n";

echo "</table>\n";












echo "</div>\n";



echo "\t</body>\n";
echo "</html>\n";



?>
