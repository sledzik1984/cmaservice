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