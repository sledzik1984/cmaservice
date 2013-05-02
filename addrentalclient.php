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

echo "<form name=\"addclient\"  id=\"addservice\" method=\"POST\" action=\"addrentalclient_f.php\">\n";
echo "<input type=\"submit\" class=\"hiddenbtn\">\n";


echo "<table cellpadding=\"4\" cellspacing=\"0\" width=\"100%\">\n";

echo "<tr class=\"dark\">\n";
echo "<td class=\"fall\" width=\"100%\">\n";
echo "Nowy klient\n";
echo "</td>\n";
echo "</tr>\n";

echo "<tr class=\"light\">\n";

echo "<td width=\"100%\" class=\"fbottomu\" align=\"right\">\n";

echo "<table width=\"100%\" border=\"0\">\n";

echo "<tr>\n";
echo "<td>Firma </td>\n";
echo "<td><input type=\"text\" name=\"company\"></td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td>Email </td>\n";
echo "<td><input type=\"text\" name=\"email\"></td>\n";
echo "</tr>\n";



echo "<tr>\n";
echo "<td>Numer dokumentu: </td>\n";
echo "<td><input type=\"text\" name=\"document_no\"></td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td>Adres: </td>\n";
echo "<td><input type=\"text\" name=\"addr\"></td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td>Kod pocztowy: </td>\n";
echo "<td><input type=\"text\" name=\"zip\"></td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td>Miasto: </td>\n";
echo "<td><input type=\"text\" name=\"city\"></td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td>Telefon: </td>\n";
echo "<td><input type=\"text\" name=\"phone\"></td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td>Nip: </td>\n";
echo "<td><input type=\"text\" name=\"nip\"></td>\n";
echo "</tr>\n";



echo "</table>\n";

echo "<a href=\"javascript:document.addclient.submit();\" accesskey=\"S\">Zapisz <img src=\"img/save.gif\"></a>\n";
echo "<a href=\"rentalclientslist.php\"> Anuluj <img src=\"img/cancel.gif\"></a>\n";
echo "<td>\n";

echo "</tr>\n";

echo "</table>\n";












echo "</div>\n";



echo "\t</body>\n";
echo "</html>\n";



?>