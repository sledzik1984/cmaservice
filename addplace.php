<?php

echo "<html>\n";
echo "\t<head>\n";
echo "\t\t<link href=\"inc/style.css\" rel=\"stylesheet\" type=\"text/css\">\n";
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>\n";


echo "\t</head>\n";
echo "\t<body>\n";

echo "<script type=\"text/javascript\" language=\"JavaScript\" src=\"inc/overlib.js\"></script>\n";
echo "<div class=\"mainmargin\">\n";

echo "<h1>Dodaj nową lokalizację sztuk</h1>\n";

echo "<form enctype=\"multipart/form-data\" name=\"placeadd\"  id=\"placeadd\" method=\"POST\" action=\"addplace_f.php\">\n";
echo "<input type=\"submit\" class=\"hiddenbtn\">\n";

echo "<table cellpadding=\"4\" cellspacing=\"0\" width=\"100%\">\n";
echo "<tr class=\"dark\">\n";
echo "<td colspan=\"2\" class=\"fall\" width=\"100%\">\n";
echo "Dane miejsca:";
echo "</td>\n";
echo "</tr>\n";

echo "<tr class=\"light\"\>\n";

echo "<td class=\"fleft\">Nazwa</td>\n";
echo "<td class=\"fright\"><input size=\"30\" type=\"text\" name=\"placename\"></td>\n";

echo "</tr>\n";

echo "<tr class=\"light\"\>\n";

echo "<td class=\"fleft\">Sala</td>\n";
echo "<td class=\"fright\"><input size=\"30\" type=\"text\" name=\"room\"></td>\n";

echo "</tr>\n";


echo "<tr class=\"light\"\>\n";

echo "<td class=\"fleft\">Miasto</td>\n";
echo "<td class=\"fright\"><input size=\"30\" type=\"text\" name=\"city\"></td>\n";

echo "</tr>\n";


echo "<tr class=\"light\"\>\n";

echo "<td class=\"fleft\">Ulica</td>\n";
echo "<td class=\"fright\"><input size=\"30\" type=\"text\" name=\"ulica\"></td>\n";

echo "</tr>\n";

echo "<tr class=\"light\"\>\n";

echo "<td class=\"fleft\">Piętro</td>\n";
echo "<td class=\"fright\"><input size=\"30\" type=\"text\" name=\"floor\"></td>\n";

echo "</tr>\n";

echo "<tr class=\"light\"\>\n";

echo "<td class=\"fleft\">Zasilanie</td>\n";
echo "<td class=\"fright\">\n";
echo "\t<select name=\"power\">\n";
echo "\t\t<option value=\"0\">Brak info</optin>\n";
echo "\t\t<option value=\"1\">Gniazdka 230V</option>\n";
echo "\t\t<option value=\"2\">Gniazdo 16A 5 bolców</option>\n";
echo "\t\t<option value=\"3\">Gniazdo 16A 4 bolce</option>\n";
echo "\t\t<option value=\"4\">Gniazdo 32A</option>\n";
echo "\t\t<option value=\"5\">Gniazdo 63A</option>\n";
echo "\t\t<option value=\"6\">Gniazdo 125A</option>\n";
echo "\t\t<option value=\"7\">Wąsy</option>\n";
echo "\t\t<option value=\"8\">Inne - patrz rysunek</option>\n";
echo "\t\t<option value=\"9\">Agregat</option>\n";

echo "\t</select>\n";
echo "</td>\n";

echo "</tr>\n";

echo "<tr class=\"light\"\>\n";

echo "<td class=\"fleft\">Winda</td>\n";
echo "<td class=\"fright\"><select name=\"elevator\"><option value=\"0\">Brak info</option><option value=\"1\">Tak</option><option value=\"2\">Nie</option></select></td>\n";

echo "</tr>\n";

echo "<tr class=\"light\"\>\n";

echo "<td class=\"fleft\">WiFi</td>\n";
echo "<td class=\"fright\"><select name=\"wifi\"><option value=\"0\">Brak info</option><option value=\"1\">Tak</option><option value=\"2\">Nie</option></select></td>\n";

echo "</tr>\n";


echo "<tr class=\"light\"\>\n";

echo "<td class=\"fleft\">Parking</td>\n";
echo "<td class=\"fright\"><select name=\"parking\"><option value=\"0\">Nie</option><option value=\"1\">Osobówki</option><option value=\"2\">Tak</option><option value=\"3\">Tak - płatny</option></select></td>\n";

echo "</tr>\n";



echo "<tr class=\"light\"\>\n";

echo "<td class=\"fleft\">Symultana</td>\n";
echo "<td class=\"fright\"><select name=\"symultana\"><option value=\"0\">Brak info</option><option value=\"1\">Wnoszenie</option><option value=\"2\">Winda</option><option value=\"3\">Dużo promienników</option><option value=\"4\">Okej</option></select></td>\n";

echo "</tr>\n";



echo "<tr class=\"light\"\>\n";

echo "<td class=\"fleft\">Rysunek</td>\n";
echo "<td class=\"fright\"><input size=\"30\" type=\"file\" name=\"file\"></td>\n";

echo "</tr>\n";



echo "<tr class=\"light\">\n";

echo "<td colspan=\"2\" width=\"100%\" class=\"fbottomu\" align=\"right\">\n";
echo "<a href=\"javascript:document.placeadd.submit();\" accesskey=\"S\">Zapisz <img src=\"img/save.gif\"></a>\n";
echo "<a href=\"places.php\"> Anuluj <img src=\"img/cancel.gif\"></a>\n";
echo "</td>\n";

echo "</tr>\n";

echo "</table>\n";












echo "</div>\n";

echo "</form>\n";


echo "\t</body>\n";
echo "</html>\n";



?>
