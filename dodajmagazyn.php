<?php

echo "<html>\n";
echo "\t<head>\n";
echo "\t\t<link href=\"inc/style.css\" rel=\"stylesheet\" type=\"text/css\">\n";
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>\n";


echo "\t</head>\n";
echo "\t<body>\n";

echo "<script type=\"text/javascript\" language=\"JavaScript\" src=\"inc/overlib.js\"></script>\n";
echo "<div class=\"mainmargin\">\n";

echo "<h1>Nowy magazyn</h1>\n";

echo "<form name=\"warehouseadd\"  id=\"warehouseadd\" method=\"POST\" action=\"warehouseadd.php\">\n";
echo "<input type=\"submit\" class=\"hiddenbtn\">\n";

echo "<table cellpadding=\"4\" cellspacing=\"0\" width=\"100%\">\n";
echo "<tr class=\"dark\">\n";
echo "<td class=\"fall\" width=\"100%\">\n";
echo "Nazwa magazynu: <input type=\"text\" name=\"warehousename\" value=\"\" size=\"50\" onmouseover=\"return overlib('Wprowadź nazwę nowego magazynu',HAUTO,VAUTO,OFFSETX,15,OFFSETY,15);\" onmouseout=\"nd();\" class=\"bold\">\n";
echo "</td>\n";
echo "</tr>\n";

echo "<tr class=\"light\">\n";

echo "<td width=\"100%\" class=\"fbottomu\" align=\"right\">\n";
echo "<a href=\"javascript:document.warehouseadd.submit();\" accesskey=\"S\">Zapisz <img src=\"img/save.gif\"></a>\n";
echo "<a href=\"magazyny.php\"> Anuluj <img src=\"img/cancel.gif\"></a>\n";
echo "<td>\n";

echo "</tr>\n";

echo "</table>\n";












echo "</div>\n";



echo "\t</body>\n";
echo "</html>\n";



?>