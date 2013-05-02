<?php

echo "<html>\n";
echo "\t<head>\n";
echo "\t\t<link href=\"inc/style.css\" rel=\"stylesheet\" type=\"text/css\">\n";
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>\n";


echo "\t</head>\n";
echo "\t<body>\n";

echo "<script type=\"text/javascript\" language=\"JavaScript\" src=\"inc/overlib.js\"></script>\n";
echo "<div class=\"mainmargin\">\n";

echo "<h1>Dodaj serwis</h1>\n";

echo "<form name=\"fixtureadd\"  id=\"fixtureadd\" method=\"POST\" action=\"service_add.php\">\n";
echo "<input type=\"submit\" class=\"hiddenbtn\">\n";

echo "<table cellpadding=\"4\" cellspacing=\"0\" width=\"100%\">\n";
echo "<tr class=\"dark\">\n";
echo "<td colspan=\"2\" class=\"fall\" width=\"100%\">\n";
echo "Serwis urządzenia:";
echo "</td>\n";
echo "</tr>\n";


echo "<tr class=\"light\"\>\n";

echo "<td class=\"fleft\">Czyszczenie</td>\n";
echo "<td class=\"fright\"><input type=\"checkbox\" name=\"cleaning\" value=\"1\"></td>\n";

echo "</tr>\n";


echo "<tr class=\"light\"\>\n";

echo "<td class=\"fleft\">Wymiana żarówki</td>\n";
echo "<td class=\"fright\"><input type=\"checkbox\" name=\"lamp\" value=\"1\"></td>\n";

echo "</tr>\n";


echo "<tr class=\"light\"\>\n";

echo "<td class=\"fleft\">Serwis zewnętrzny</td>\n";
echo "<td class=\"fright\"><input type=\"checkbox\" name=\"out_service\" value=\"1\"></td>\n";

echo "</tr>\n"; 


echo "<tr class=\"light\"\>\n";

echo "<td class=\"fleft\">Opis</td>\n";
echo "<td class=\"fright\"><textarea name=\"description\" cols=\"70\" rows=\"4\"></textarea></td>\n";

echo "</tr>\n";

echo "<tr class=\"light\"\>\n";

echo "<td class=\"fleft\">Kod kreskowy</td>\n";
echo "<td class=\"fright\"><input size=\"30\" type=\"text\" name=\"barcode\"></td>\n";

echo "</tr>\n";






echo "<tr class=\"light\">\n";

echo "<td colspan=\"2\" width=\"100%\" class=\"fbottomu\" align=\"right\">\n";
echo "<a href=\"javascript:document.fixtureadd.submit();\" accesskey=\"S\">Zapisz <img src=\"img/save.gif\"></a>\n";
echo "<a href=\"?m=listasprzetu\"> Anuluj <img src=\"img/cancel.gif\"></a>\n";
echo "</td>\n";

echo "</tr>\n";

echo "</table>\n";












echo "</div>\n";



echo "\t</body>\n";
echo "</html>\n";



?>