<?php

$fixt = $_GET["b"];

include 'mysql.php';

$query = "SELECT * FROM `warehouse` WHERE `id` = '$fixt' LIMIT 1";
$result = mysql_query($query);

echo mysql_error();

while ($row = mysql_fetch_assoc($result)) {

    $fixt_name = $row["name"];





}





echo "<html>\n";
echo "\t<head>\n";
echo "\t\t<link href=\"inc/style.css\" rel=\"stylesheet\" type=\"text/css\">\n";
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>\n";


echo "\t</head>\n";
echo "\t<body>\n";

echo "<script type=\"text/javascript\" language=\"JavaScript\" src=\"inc/overlib.js\"></script>\n";
echo "<div class=\"mainmargin\">\n";

echo "<form name=\"delete\"  id=\"delete\" method=\"POST\" action=\"deletefixture_f.php\">\n";
echo "<input type=\"submit\" class=\"hiddenbtn\">\n";


echo "<table cellpadding=\"4\" cellspacing=\"0\" width=\"100%\">\n";

echo "<tr class=\"dark\">\n";
echo "<td class=\"fall\" width=\"100%\">\n";
echo "<b>Usunięcie sprzętu ze stanu magazynowego</b>\n";
echo "</td>\n";
echo "</tr>\n";

echo "<tr class=\"light\">\n";

echo "<td width=\"100%\" class=\"fbottomu\" align=\"right\">\n";

echo "<table width=\"100%\" border=\"0\">\n";

echo "<tr>\n";
echo "<td>Sprzęt: </td>\n";
echo "<td><input type=\"text\" name=\"name\" value=\"".$fixt_name."\" disabled=\"yes\"></td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td>Kod kreskowy: </td>\n";
echo "<td><input type=\"text\" name=\"bar\" value=\"".$fixt."\" readonly=\"true\"></td>\n";
echo "</tr>\n";



echo "<tr>\n";
echo "<td>Komentarz: </td>\n";
echo "<td><input type=\"text\" name=\"delete_comment\"></td>\n";
echo "</tr>\n";

echo "</table>\n";

echo "<a href=\"javascript:document.delete.submit();\" accesskey=\"S\">Usuń sprzęt! <img src=\"img/save.gif\"></a>\n";
echo "<a href=\"listasprzetu.php\"> Anuluj <img src=\"img/cancel.gif\"></a>\n";
echo "<td>\n";

echo "</tr>\n";

echo "</table>\n";












echo "</div>\n";



echo "\t</body>\n";
echo "</html>\n";



?>