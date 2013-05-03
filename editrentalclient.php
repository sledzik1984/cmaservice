<?php

include 'mysql.php';

echo "<html>\n";
echo "\t<head>\n";
echo "\t\t<link href=\"inc/style.css\" rel=\"stylesheet\" type=\"text/css\">\n";
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>\n";

$id = $_GET["id"];

$query = "SELECT * FROM `rental_clients` WHERE `id` = '$id' LIMIT 1";
$result = mysql_query($query);

while ($row = mysql_fetch_assoc($result)) {

$qid = $row["id"];
$first_name = $row["first_name"];
$last_name = $row["last_name"];
$company = $row["company"];
$document_no = $row["document_no"];
$street = $row["street"];
$zip = $row["zip"];
$city = $row["city"];
$phone = $row["phone"];
$email = $row["email"];
$nip = $row["nip"];





echo "\t</head>\n";
echo "\t<body>\n";

echo "<script type=\"text/javascript\" language=\"JavaScript\" src=\"inc/overlib.js\"></script>\n";
echo "<div class=\"mainmargin\">\n";

echo "<form name=\"addservice\"  id=\"addservice\" method=\"POST\" action=\"editrentalclient_f.php\">\n";
echo "<input type=\"submit\" class=\"hiddenbtn\">\n";
echo "<input type=\"hidden\" name=\"qid\" value=\"".$qid."\">\n";

echo "<table cellpadding=\"4\" cellspacing=\"0\" width=\"100%\">\n";

echo "<tr class=\"dark\">\n";
echo "<td class=\"fall\" width=\"100%\">\n";
echo "Edytuj klienta\n";
echo "</td>\n";
echo "</tr>\n";

echo "<tr class=\"light\">\n";

echo "<td width=\"100%\" class=\"fbottomu\" align=\"right\">\n";

echo "<table width=\"100%\" border=\"0\">\n";

echo "<tr>\n";
echo "<td>Firma </td>\n";
echo "<td><input type=\"text\" name=\"company\" value=\"".$company."\"></td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td>Email </td>\n";
echo "<td><input type=\"text\" name=\"email\" value=\"".$email."\"></td>\n";
echo "</tr>\n";



echo "<tr>\n";
echo "<td>Numer dokumentu: </td>\n";
echo "<td><input type=\"text\" name=\"document_no\" value=\"".$document_no."\"></td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td>Adres: </td>\n";
echo "<td><input type=\"text\" name=\"addr\" value=\"".$street."\"></td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td>Kod pocztowy: </td>\n";
echo "<td><input type=\"text\" name=\"zip\" value=\"".$zip."\"></td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td>Miasto: </td>\n";
echo "<td><input type=\"text\" name=\"city\" value=\"".$city."\"></td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td>Telefon: </td>\n";
echo "<td><input type=\"text\" name=\"phone\" value=\"".$phone."\"></td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td>Nip: </td>\n";
echo "<td><input type=\"text\" name=\"nip\" value=\"".$nip."\"></td>\n";
echo "</tr>\n";



echo "</table>\n";

echo "<a href=\"javascript:document.addservice.submit();\" accesskey=\"S\">Zapisz <img src=\"img/save.gif\"></a>\n";
echo "<a href=\"rentalclientslist.php\"> Anuluj <img src=\"img/cancel.gif\"></a>\n";
echo "<td>\n";

echo "</tr>\n";

echo "</table>\n";


}









echo "</div>\n";



echo "\t</body>\n";
echo "</html>\n";



?>
