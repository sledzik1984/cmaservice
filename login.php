<?php

echo "<html>\n";
echo "\t<head>\n";
echo "\t\t<link href=\"inc/style.css\" rel=\"stylesheet\" type=\"text/css\">\n";

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

echo "\t</head>\n";
echo "\t<body>\n";

echo "<div class=\"mainmargin\">\n";

echo "<h1>Zaloguj się</h1>\n";

echo "<form name=\"searchbar\" action=\"login.form.php\" method=\"POST\">\n";
echo "<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">\n";
echo "<tr>\n";
echo "<td width=\"1%\" nowrap>\n";
echo "Login: <input class=\"blend\" type=\"text\" id=\"customerinput\" name=\"login\" maxlength=\"13\" size=\"13\" onmouseover=\"return overlib('Podaj swój login.',HAUTO,VAUTO,OFFSETX,15,OFFSETY,15);\" onmouseout=\"nd();\"  onkeyup=\"submitT(this,this.form)\"><br><br>\n";
echo "Hasło: <input class=\"blend\" type=\"password\" id=\"customerinput\" name=\"pass\" maxlength=\"13\" size=\"13\" onmouseover=\"return overlib('Podaj swój login.',HAUTO,VAUTO,OFFSETX,15,OFFSETY,15);\" onmouseout=\"nd();\"  onkeyup=\"submitT(this,this.form)\">\n";
echo "<br><br><input class=\"bold\" type=\"SUBMIT\" name=\"loginform[submit]\" value=\"Zaloguj się\">\n";
echo "</td>\n";
echo "</tr>\n";
echo "</table>\n";
echo "</form>\n";
echo "<p>\n";

//Autofokus na polu kodu kreskowego
echo "<script type=\"text/javascript\">\n";
echo "document.searchbar.userbarcode.focus();\n";
echo "</script>\n";




echo "</div>\n";

echo "\t</body>\n";
echo "</html>\n";



?>