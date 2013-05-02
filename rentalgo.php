<?php

$post_rental_id = $_GET["rid"];

//echo $post_rental_id;

include 'mysql.php';

echo "<html>\n";
echo "\t<head>\n";
echo "<link href=\"inc/style.css\" rel=\"stylesheet\" type=\"text/css\">\n";
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>\n";
echo "<script language='JavaScript' type='text/JavaScript' src='inc/common.js'> </script>\n";

echo "<script language='JavaScript' type='text/JavaScript'>\n";
echo "var x=13;//nr characters\n";
echo "function submitT(t,f){\n";
echo "if(t.value.length==x){\n";
echo "f.submit()\n";
echo "}\n";
echo "}\n";
echo "</script>\n";
echo "</head>\n";


echo "\t</head>\n";
echo "\t<body>\n";

echo "<div class=\"mainmargin\">\n";

echo "<h1>Wydanie wypożyczenia</h1>\n";


echo "<form name=\"rentalgo\" id=\"rentalgo\" action=\"rentalgo_f.php\" method=\"POST\">\n";
echo "<input type=\"submit\" class=\"hiddenbtn\">\n";
echo "<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">\n";
echo "<tr>\n";
echo "<td width=\"1%\" nowrap>\n";

$rental_q = "SELECT * FROM `rental_details` WHERE `id` = '$post_rental_id' ORDER BY `timestart` DESC";
$rental_res = mysql_query($rental_q);

while ($rental_row = mysql_fetch_assoc($rental_res)) {
    
    $rental_details_client = $rental_row["rental_client"];
    $rental_details_id = $rental_row["id"];
    $rental_details_timestart = $rental_row["timestart"];
    
    
    $query_cli = "SELECT * FROM `rental_clients` WHERE `id` = '$rental_details_client' LIMIT 1";
    $res_cli = mysql_query($query_cli);
    
    while ($row_cli = mysql_fetch_assoc($res_cli)) {
    
	$firstname = $row_cli["first_name"];
	$lastname = $row_cli["last_name"];
	$company = $row_cli["company"];

	if ($rental_details_id == $post_rental_id) {
	    
	    
	    echo "<h2>Wypożyczenie dla ". $firstname . " " .$lastname. " " .$company." - wydanie: ". date("d-m-Y H:i:s", $rental_details_timestart)."</h2>\n";
	    //
	    //echo "\t<option selected value=\"".$rental_details_id."\">". $firstname . " " .$lastname ." ".$company." - wydanie: " . date("d-m-Y H:i:s", $rental_details_timestart). "\n";
	
	    echo "<input type=\"hidden\" name=\"rental_details\" id=\"rental_details\" value=\"".$post_rental_id."\">\n";
	
	} else {
	
	    echo "<h2>Wypożyczenie dla ". $firstname . " " .$lastname. " " .$company." - wydanie: ". date("d-m-Y H:i:s", $rental_details_timestart)."</h2>\n";
	    echo "<input type=\"hidden\" name=\"rental_details\" id=\"rental_details\" value=\"".$post_rental_id."\">\n";
	
	    //echo "\t<option value=\"".$rental_details_id."\">". $firstname . " " .$lastname ." ".$company." - wydanie: " . date("d-m-Y H:i:s", $rental_details_timestart). "\n";
	}
    }
    
    
}
//echo "</select><br><br>\n";


echo "Kod kreskowy: <input class=\"blend\" type=\"text\" id=\"barcode\" name=\"barcode\" maxlength=\"13\" size=\"13\" onmouseover=\"return overlib('Odczytaj kod kreskowy urządzenia - system automatycznie odszuka odpowiednie urządzenie.',HAUTO,VAUTO,OFFSETX,15,OFFSETY,15);\" onmouseout=\"nd();\"  onkeyup=\"submitT(this,this.form)\">\n";
//Autofokus na polu kodu kreskowego
echo "<script type=\"text/javascript\">\n";
echo "document.rentalgo.barcode.focus();\n";
echo "</script>\n";

echo "<br><br>\n";
//echo "Ostatnie urządzenie: <input type=\"checkbox\" name=\"last\" value=\"1\">\n";
echo "<br><br>\n";

echo "</form>\n";


echo "<form name=\"rgl\" id=\"rgl\" action=\"rentalgo_last.php\" method=\"POST\">\n";
echo "<input type=\"submit\" class=\"hiddenbtn\">\n";
echo "<input type=\"hidden\" id=\"close_last\" name=\"close_last\" value=\"1\">\n";
echo "<input type=\"hidden\" id=\"rid\" name=\"rid\" value=\"".$rental_details_id."\">\n";

echo "</form>\n";

echo "<a href=\"javascript:document.rentalgo.submit();\" accesskey=\"S\">Zapisz <img src=\"img/save.gif\"></a>\n";
echo "<a href=\"javascript:document.rgl.submit();\" accesskey=\"Z\">Zakończ wydawanie <img src=\"img/save.gif\"></a>\n";
echo "<a href=\"magazyny.php\"> Anuluj <img src=\"img/cancel.gif\"></a>\n";
 

echo "</td>\n";
echo "</tr>\n";
echo "</table>\n";
echo "</form>\n";











echo "</div>\n";


echo "\t</body>\n";
echo "</html>\n";




?>