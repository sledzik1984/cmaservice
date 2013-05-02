<?php

include 'mysql.php';

$sid = $_GET["sid"];

$query = "SELECT * FROM `service` WHERE `id` = '$sid' LIMIT 1";
$result = mysql_query($query);


while ($row = mysql_fetch_assoc($result)) {

    $time = $row["timestamp"];
    $lamp = $row["lamp_exchange"];
    $cleaning = $row["cleaning"];
    $out = $row["out_service"];
    $other = $row["other_comment"];
    $barcode = $row["barcode"];
    
    $query_fixture = "SELECT `name` FROM `warehouse` WHERE `barcode` = '$barcode' LIMIT 1";
    $result_fixture = mysql_query($query_fixture);
    
    
    

echo "<html>\n";
echo "\t<head>\n";
echo "\t\t<link href=\"inc/style.css\" rel=\"stylesheet\" type=\"text/css\">\n";
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>\n";


echo "\t</head>\n";
echo "\t<body>\n";

echo "<script type=\"text/javascript\" language=\"JavaScript\" src=\"inc/overlib.js\"></script>\n";
echo "<div class=\"mainmargin\">\n";

echo "<h1>Szczegóły serwisu</h1>\n";

echo "<form name=\"fixtureadd\"  id=\"fixtureadd\" method=\"POST\" action=\"service_add.php\">\n";
echo "<input type=\"submit\" class=\"hiddenbtn\">\n";

echo "<table cellpadding=\"4\" cellspacing=\"0\" width=\"100%\">\n";
echo "<tr class=\"dark\">\n";
echo "<td colspan=\"2\" class=\"fall\" width=\"100%\">\n";

while ($row_fixture = mysql_fetch_assoc($result_fixture)) {
    
    $fixture_name = $row_fixture["name"];
    
    
    echo "Serwis urządzenia: " . $fixture_name;
}

echo "</td>\n";
echo "</tr>\n";


echo "<tr class=\"light\"\>\n";

echo "<td class=\"fleft\">Data</td>\n";

echo "<td class=\"fright\">" . date("d-m-Y H:i:s", $time) . "</td>\n";

echo "</tr>\n";


echo "<tr class=\"light\">\n";


echo "<td class=\"fleft\">Czyszczenie</td>\n";

if ($cleaning == 1) {

    echo "<td class=\"fright\"><input type=\"checkbox\" name=\"cleaning\" disabled=\"disabled\" checked=\"checked\" value=\"1\"></td>\n";

} else {

    echo "<td class=\"fright\"><input type=\"checkbox\" name=\"cleaning\" disabled=\"disabled\" value=\"1\"></td>\n";


}


echo "</tr>\n";


echo "<tr class=\"light\"\>\n";

echo "<td class=\"fleft\">Wymiana żarówki</td>\n";

if ($lamp == 1) {

    echo "<td class=\"fright\"><input type=\"checkbox\" name=\"lamp\" checked=\"checked\" disabled=\"disabled\" value=\"1\"></td>\n";

} else {

    echo "<td class=\"fright\"><input type=\"checkbox\" name=\"lamp\" disabled=\"disabled\" value=\"1\"></td>\n";


}


echo "</tr>\n";


echo "<tr class=\"light\"\>\n";

echo "<td class=\"fleft\">Serwis zewnętrzny</td>\n";

if ($out == 1) {

    echo "<td class=\"fright\"><input type=\"checkbox\" checked=\"checked\" disabled=\"disabled\" name=\"out_service\" value=\"1\"></td>\n";

} else {

    echo "<td class=\"fright\"><input type=\"checkbox\" disabled=\"disabled\" name=\"out_service\" value=\"1\"></td>\n";


}
echo "</tr>\n"; 


echo "<tr class=\"light\"\>\n";

echo "<td class=\"fleft\">Opis</td>\n";
echo "<td class=\"fright\"><textarea name=\"description\" cols=\"70\" rows=\"4\" disabled=\"disabled\">".$other."</textarea></td>\n";

echo "</tr>\n";







echo "<tr class=\"light\">\n";

echo "<td colspan=\"2\" width=\"100%\" class=\"fbottomu\" align=\"right\">\n";
//echo "<a href=\"javascript:document.fixtureadd.submit();\" accesskey=\"S\">Zapisz <img src=\"img/save.gif\"></a>\n";
//echo "<a href=\"?m=listasprzetu\"> Anuluj <img src=\"img/cancel.gif\"></a>\n";
echo "</td>\n";

echo "</tr>\n";

echo "</table>\n";








}



echo "</div>\n";



echo "\t</body>\n";
echo "</html>\n";



?>