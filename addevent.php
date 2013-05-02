<?php

//Todo:

// Odpowiedzialny za sprzęt do wybrania z listy
// Magazynier do wybrania z listy
// 

include 'mysql.php';

echo "<html>\n";
echo "\t<head>\n";
echo "\t\t<link href=\"inc/style.css\" rel=\"stylesheet\" type=\"text/css\">\n";
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>\n";
echo "<script language=\"JavaScript\" src=\"calendar1.js\"></script><!-- Date only with year scrolling -->\n";
echo "<script language=\"JavaScript\" src=\"jquery.js\"></script>\n";
echo "<script language=\"JavaScript\" src=\"jquery.autocomplete.js\"></script>\n";

echo "<script type=\"text/javascript\">\n"; 
echo "$().ready(function() {\n"; 
echo "    $(\"#client\").autocomplete(\"jquery_klient.php\", {\n"; 
echo "        width: 260,\n"; 
echo "        matchContains: true,\n"; 
echo "        selectFirst: false\n"; 
echo "    });\n"; 
echo "});\n"; 
echo "</script>\n";



echo "\t</head>\n";
echo "\t<body>\n";

echo "<script type=\"text/javascript\" language=\"JavaScript\" src=\"inc/overlib.js\"></script>\n";
echo "<div class=\"mainmargin\">\n";


echo "<form name=\"event\" id=\"event\" method=\"POST\" action=\"addevent_f.php\">\n";
//echo "<form autocomplete=\"off\">\n";

echo "<input type=\"submit\" class=\"hiddenbtn\">\n";


echo "<table cellpadding=\"4\" cellspacing=\"0\" width=\"100%\">\n";

echo "<tr class=\"dark\">\n";
echo "<td class=\"fall\" width=\"100%\">\n";
echo "Nowa impreza\n";
echo "</td>\n";
echo "</tr>\n";

echo "<tr class=\"light\">\n";

echo "<td width=\"100%\" class=\"fbottomu\" align=\"right\">\n";

echo "<table width=\"100%\" border=\"0\">\n";
echo "<tr>\n";
echo "<td>Kontrahent: </td>\n";
echo "<td><input type=\"text\" id=\"client\" name=\"client\"></td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td>Miejsce: </td>\n";
echo "<td><input type=\"text\" name=\"where\"></td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td>Odpowiedzialny za sprzęt: </td>\n";
echo "<td><input type=\"text\" name=\"response\"></td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td>Data wyjazdu:</td>\n";
echo "<td><input type=\"text\" name=\"start\">&nbsp;<a href=\"javascript:cal1.popup();\"><img src=\"img/cal.gif\" width=\"16\" height=\"16\" border=\"0\" alt=\"Kliknij aby wybrać datę\"></a></td>\n";

//echo "<td><input type=\"text\" name=\"start\">&nbsp;<a href=\"javascript:cal1.popup();\"><img src=\"img/cal.gif\" width=\"16\" height=\"16\" border=\"0\" alt=\"Kliknij aby wybrać datę\"></a></td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td>Data powrotu: </td>\n";
echo "<td><input type=\"text\" name=\"stop\">&nbsp;<a href=\"javascript:cal2.popup();\"><img src=\"img/cal.gif\" width=\"16\" height=\"16\" border=\"0\" alt=\"Kliknij aby wybrać datę\"></a></td>\n";

//echo "<td><input type=\"text\" name=\"stop\">&nbsp;<a href=\"javascript:cal2.popup();\"><img src=\"img/cal.gif\" width=\"16\" height=\"16\" border=\"0\" alt=\"Kliknij aby wybrać datę\"></a></td>\n";
echo "<tr>\n";


echo "<td>Magazynier: </td>\n";
echo "<td><input type=\"text\" name=\"addr\"></td>\n";
echo "</tr>\n";

echo "</table>\n";

echo "<a href=\"javascript:document.addservice.submit();\" accesskey=\"S\">Zapisz <img src=\"img/save.gif\"></a>\n";
echo "<a href=\"rentalclientslist.php\"> Anuluj <img src=\"img/cancel.gif\"></a>\n";
echo "<td>\n";

echo "</tr>\n";

echo "</table>\n";


echo "<script language=\"JavaScript\">\n";
echo "       var cal1 = new calendar1(document.forms['event'].elements['start']);\n";
echo "       cal1.year_scroll = true;\n";
echo "       cal1.time_comp = true;\n";

echo "       var cal2 = new calendar1(document.forms['event'].elements['stop']);\n";
echo "       cal2.year_scroll = true;\n";
echo "       cal2.time_comp = true;\n";

echo "</script>\n";
echo "</form>\n";










echo "</div>\n";
echo "\t</body>\n";
echo "</html>\n";



?>
