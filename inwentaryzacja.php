<?php

$post_rental_id = $_GET["rid"];


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

echo "<h1>Inwentaryzacja</h1>\n";


echo "<form name=\"inwent\" id=\"inwent\" action=\"inwent.form.php\" method=\"POST\">\n";
echo "<input type=\"submit\" class=\"hiddenbtn\">\n";
echo "<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">\n";
echo "<tr>\n";
echo "<td width=\"1%\" nowrap>\n";

echo "Kod kreskowy: <input class=\"blend\" type=\"text\" id=\"barcode\" name=\"barcode\" maxlength=\"13\" size=\"13\" onmouseover=\"return overlib('Odczytaj kod kreskowy urządzenia - system automatycznie odszuka odpowiednie urządzenie.',HAUTO,VAUTO,OFFSETX,15,OFFSETY,15);\" onmouseout=\"nd();\"  onkeyup=\"submitT(this,this.form)\">\n";
//Autofokus na polu kodu kreskowego
echo "<script type=\"text/javascript\">\n";
echo "document.inwent.barcode.focus();\n";
echo "</script>\n";

echo "<a href=\"javascript:document.inwent.submit();\" accesskey=\"S\">Zapisz <img src=\"img/save.gif\"></a>\n";
echo "<a href=\"magazyny.php\"> Anuluj <img src=\"img/cancel.gif\"></a>\n";
 

echo "</td>\n";
echo "</tr>\n";
echo "</table>\n";
echo "</form>\n";











echo "</div>\n";


echo "\t</body>\n";
echo "</html>\n";




?>