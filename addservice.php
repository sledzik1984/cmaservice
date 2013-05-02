<?php

include 'mysql.php';

echo "<html>\n";
echo "\t<head>\n";
echo "\t\t<link href=\"inc/style.css\" rel=\"stylesheet\" type=\"text/css\">\n";
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>\n";


echo "\t</head>\n";
echo "\t<body>\n";

echo "<script type=\"text/javascript\" language=\"JavaScript\" src=\"inc/overlib.js\"></script>\n";
echo "<div class=\"mainmargin\">\n";

echo "<h1>Serwis urządzenia</h1>\n";

echo "<form name=\"addservice\"  id=\"addservice\" method=\"POST\" action=\"addservice_f.php\">\n";
echo "<input type=\"submit\" class=\"hiddenbtn\">\n";


echo "<table cellpadding=\"4\" cellspacing=\"0\" width=\"100%\">\n";

echo "<tr class=\"dark\">\n";
echo "<td class=\"fall\" width=\"100%\">\n";
echo "Tu nazwa urządzenia\n";
echo "</td>\n";
echo "</tr>\n";

echo "<tr class=\"light\">\n";

echo "<td width=\"100%\" class=\"fbottomu\" align=\"right\">\n";

echo "<table width=\"100%\" border=\"0\">\n";
echo "<tr>\n";
echo "<td>Opis uszkodzenia:<TEXTAREA rows=\"5\" cols=\"60\" name=\"customeradd[message]\" onmouseover=\"return overlib('Wprowadź wiadomość dla klienta (opcjonalnie)',HAUTO,VAUTO,OFFSETX,15,OFFSETY,15);\" onmouseout=\"nd();\"></TEXTAREA><br></td>\n";
echo "<td>Typ serwisu: <select name=\"service_type\"><option value=\"1\">Serwis wewnętrzny</option><option value=\"2\">Serwis zewnętrzny</option></select></td>\n";
echo "</tr>\n";
echo "</table>\n";

echo "<a href=\"javascript:document.addservice.submit();\" accesskey=\"S\">Zapisz <img src=\"img/save.gif\"></a>\n";
echo "<a href=\"magazyny.php\"> Anuluj <img src=\"img/cancel.gif\"></a>\n";
echo "<td>\n";

echo "</tr>\n";

echo "</table>\n";












echo "</div>\n";



echo "\t</body>\n";
echo "</html>\n";



?>