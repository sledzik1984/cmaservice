<?php

include 'mysql.php';
include 'inc/logging.php';


echo "<html>\n";
echo "<head>\n";
echo "\t<script language='JavaScript' type='text/JavaScript' src='inc/ClickShowHideMenu.js'></script>\n";
echo "<meta http-equiv=\"Content-Type\" content=\"text/html;charset=utf-8\" >\n";

echo "\t<link href=\"inc/style.css\" rel=\"stylesheet\" type=\"text/css\">\n";

echo "</head>\n\n";

echo "<script type=\"text/javascript\" language=\"JavaScript\" src=\"inc/overlib.js\"></script>\n";


echo "<table cellpadding='0' cellspacing='0' width='100%' height='100%'><tr><td width='1%' class='fall dark' style='vertical-align: top;'>\n";

echo "<table width='100%'>\n";
echo "<tr>\n";
echo "<td align='center' style='border-bottom-style: dashed; border-bottom-width: 1px;' valign='top'>\n";
echo "<br>\n";
echo "<img src='img/cma.gif' ALT='Concept Music Art Sp. z o.o.'><br>\n";
echo "<B>Concept Music Art</B><br>\n";
echo "&nbsp;<br>\n";
echo "<br>\n";

echo "Wylogowanie za:<br><br>\n";
$expir = date("n/j/Y g:i A", $_COOKIE["session_expiration"]);

//echo $expir . "\n";
echo "<script language=\"JavaScript\">\n";


echo "TargetDate = \"".$expir."\";\n";
echo "BackColor = \"#CEBD9B\";\n";
//ForeColor = "navy";
echo "CountActive = true;\n";
echo "CountStepper = -1;\n";
echo "LeadingZero = true;\n";
echo "DisplayFormat = \"%%H%% : %%M%% : %%S%%\";\n";
echo "FinishMessage = \"Wylogowano!\";\n";
echo "</script>\n";

echo "<script language=\"JavaScript\" src=\"inc/countdown.js\"></script>\n";



echo "</td>\n";
echo "\n";
echo "</tr>\n";
echo "</table>\n";
echo "\n";



echo "<table id=\"click-menu1\" class=\"click-menu\" cellpadding=\"0\" cellspacing=\"0\">\n";


// Menu kontrahenci

echo "\t<tr>\n";
echo "\t\t<td class=\"click-menu\">\n";
echo "\t\t\t<div class=\"box1\"><font style=\"margin-left: 21px\">Klienci</font></div>\n";

echo "\t\t\t<div class=\"section\">\n";

echo "\t\t\t<div class=\"tip\" onmouseover=\"return overlib('<b>Dodanie nowego klienta</b>',HAUTO,VAUTO,OFFSETX,15,OFFSETY,15);\" onmouseout=\"nd();\">\n";
echo "\t\t\t\t<div class=\"box2\"><a href=\"/cma_service/?m=addrentalclient\" target=\"_top\">&raquo;&nbsp;Dodanie nowego klienta</a></div>\n";
echo "\t\t\t</div>\n";

echo "\t\t\t<div class=\"tip\" onmouseover=\"return overlib('<b>Lista klientów</b>',HAUTO,VAUTO,OFFSETX,15,OFFSETY,15);\" onmouseout=\"nd();\">\n";
echo "\t\t\t\t<div class=\"box2\"><a href=\"/cma_service/?m=rentalclientslist\" target=\"_top\">&raquo;&nbsp;Lista klientów</a></div>\n";
echo "\t\t\t</div>\n";

echo "</div>\n";

echo "\t\t</td>\n";
echo "\t</tr>\n";


// Menu magazyn

echo "\t<tr>\n";
echo "\t\t<td class=\"click-menu\">\n";
echo "\t\t\t<div class=\"box1\"><font style=\"margin-left: 21px\">Magazyn</font></div>\n";

echo "\t\t\t<div class=\"section\">\n";

echo "\t\t\t<div class=\"tip\" onmouseover=\"return overlib('<b>Lista sprzętu we wszystkich magazynach firmy</b>',HAUTO,VAUTO,OFFSETX,15,OFFSETY,15);\" onmouseout=\"nd();\">\n";
echo "\t\t\t\t<div class=\"box2\"><a href=\"/cma_service/?m=listasprzetu\" target=\"_top\">&raquo;&nbsp;Lista sprzętu</a></div>\n";
echo "\t\t\t</div>\n";


echo "\t\t\t<div class=\"tip\" onmouseover=\"return overlib('<b>Moduł inwentaryzacji sprzętu</b>',HAUTO,VAUTO,OFFSETX,15,OFFSETY,15);\" onmouseout=\"nd();\">\n";
echo "\t\t\t\t<div class=\"box2\"><a href=\"/cma_service/?m=inwentaryzacja\" target=\"_top\">&raquo;&nbsp;Inwentaryzacja</a></div>\n";
echo "\t\t\t</div>\n";

echo "\t\t\t<div class=\"tip\" onmouseover=\"return overlib('<b>Serwis</b>',HAUTO,VAUTO,OFFSETX,15,OFFSETY,15);\" onmouseout=\"nd();\">\n";
echo "\t\t\t\t<div class=\"box2\"><a href=\"/cma_service/?m=serwis\" target=\"_top\">&raquo;&nbsp;Serwis</a></div>\n";
echo "\t\t\t</div>\n";


echo "\t\t\t<div class=\"tip\" onmouseover=\"return overlib('<b>Moduł dodawania sprzętu</b>',HAUTO,VAUTO,OFFSETX,15,OFFSETY,15);\" onmouseout=\"nd();\">\n";
echo "\t\t\t\t<div class=\"box2\"><a href=\"/cma_service/?m=dodajsprzet\" target=\"_top\">&raquo;&nbsp;Dodaj sprzęt</a></div>\n";
echo "\t\t\t</div>\n";

//echo "\t\t\t<div class=\"tip\" onmouseover=\"return overlib('<b>Moduł dodawania magazynów</b>',HAUTO,VAUTO,OFFSETX,15,OFFSETY,15);\" onmouseout=\"nd();\">\n";
//echo "\t\t\t\t<div class=\"box2\"><a target=\"_top\" href=\"/cma_service/?m=dodajmagazyn\">&raquo;&nbsp;Dodaj magazyn</a></div>\n";
//echo "\t\t\t</div>\n";


echo "</div>\n";

echo "\t\t</td>\n";
echo "\t</tr>\n";


// Menu dla funkcji odpowiedzialnych za serwis:

echo "\t<tr>\n";
echo "\t\t<td class=\"click-menu\">\n";
echo "\t\t\t<div class=\"box1\"><font style=\"margin-left: 21px\">Wypożyczenia</font></div>\n";

echo "<div class=\"section\">\n";

echo "\t\t\t<div class=\"tip\" onmouseover=\"return overlib('<b>Utworzenie szczegółów wypożyczenia sprzętu</b>',HAUTO,VAUTO,OFFSETX,15,OFFSETY,15);\" onmouseout=\"nd();\">\n";
echo "\t\t\t\t<div class=\"box2\"><a href=\"/cma_service/?m=makerental\" target=\"_top\">&raquo;&nbsp;Utwórz wypożyczenie</a></div>\n";
echo "\t\t\t</div>\n";

//echo "\t\t\t<div class=\"tip\" onmouseover=\"return overlib('<b>Wydanie wypożyczenia sprzętu</b>',HAUTO,VAUTO,OFFSETX,15,OFFSETY,15);\" onmouseout=\"nd();\">\n";
//echo "\t\t\t\t<div class=\"box2\"><a href=\"/cma_service/?m=rentalgo\" target=\"_top\">&raquo;&nbsp;Wydanie wypożyczenia</a></div>\n";
//echo "\t\t\t</div>\n";

echo "\t\t\t<div class=\"tip\" onmouseover=\"return overlib('<b>Lista wypożyczeń</b>',HAUTO,VAUTO,OFFSETX,15,OFFSETY,15);\" onmouseout=\"nd();\">\n";
echo "\t\t\t\t<div class=\"box2\"><a href=\"/cma_service/?m=rentallist\" target=\"_top\">&raquo;&nbsp;Lista wypożyczeń</a></div>\n";
echo "\t\t\t</div>\n";





echo "</div>\n";

echo "\t\t</td>\n";
echo "\t</tr>\n";

// Koniec menu dla funkcji odpowiedzialnych za serwis

//Menu dla funkcji odpowiedzialnych za przygotowanie protokołów

//echo "\t<tr>\n";
//echo "\t\t<td class=\"click-menu\">\n";
//echo "\t\t\t<div class=\"box1\"><font style=\"margin-left: 21px\">Protokoły</font></div>\n";

//echo "<div class=\"section\">\n";


//echo "\t\t\t<div class=\"tip\" onmouseover=\"return overlib('<b>Utwórz nowy protokół</b>',HAUTO,VAUTO,OFFSETX,15,OFFSETY,15);\" onmouseout=\"nd();\">\n";
//echo "\t\t\t\t<div class=\"box2\"><a href=\"/cma_service/?m=makeproto\" target=\"_top\">&raquo;&nbsp;Utwórz protokół</a></div>\n";
//echo "\t\t\t</div>\n";

//echo "\t\t\t<div class=\"tip\" onmouseover=\"return overlib('<b>Zobacz protokoły</b>',HAUTO,VAUTO,OFFSETX,15,OFFSETY,15);\" onmouseout=\"nd();\">\n";
//echo "\t\t\t\t<div class=\"box2\"><a href=\"/cma_service/?m=protocols\" target=\"_top\">&raquo;&nbsp;Protokoły</a></div>\n";
//echo "\t\t\t</div>\n";


//echo "</div>\n";


//echo "\t\t</td>\n";
//echo "\t</tr>\n";

// Koniec menu dla funkcji odpowiedzialnychj za przygotowanie protokołów


//Menu dla funkcji odpowiedzialnych za przygotowanie logi

echo "\t<tr>\n";
echo "\t\t<td class=\"click-menu\">\n";
echo "\t\t\t<div class=\"box1\"><font style=\"margin-left: 21px\">Historia</font></div>\n";

echo "<div class=\"section\">\n";


echo "\t\t\t<div class=\"tip\" onmouseover=\"return overlib('<b>Wyświetl historię magazynu</b>',HAUTO,VAUTO,OFFSETX,15,OFFSETY,15);\" onmouseout=\"nd();\">\n";
echo "\t\t\t\t<div class=\"box2\"><a href=\"/cma_service/?m=historiaurzadzen\" target=\"_top\">&raquo;&nbsp;Historia</a></div>\n";
echo "\t\t\t</div>\n";

echo "</div>\n";


echo "\t\t</td>\n";
echo "\t</tr>\n";

// Koniec menu dla funkcji odpowiedzialnychj za logi

//Menu dla funkcji odpowiedzialnych za wyjazdy / powroty ze sztuk

echo "\t<tr>\n";
echo "\t\t<td class=\"click-menu\">\n";
echo "\t\t\t<div class=\"box1\"><font style=\"margin-left: 21px\">Sztuki</font></div>\n";

echo "<div class=\"section\">\n";


echo "\t\t\t<div class=\"tip\" onmouseover=\"return overlib('<b>Lista sztuk</b>',HAUTO,VAUTO,OFFSETX,15,OFFSETY,15);\" onmouseout=\"nd();\">\n";
echo "\t\t\t\t<div class=\"box2\"><a href=\"/cma_service/?m=listasztuk\" target=\"_top\">&raquo;&nbsp;Lista sztuk</a></div>\n";
echo "\t\t\t</div>\n";


echo "\t\t\t<div class=\"tip\" onmouseover=\"return overlib('<b>Dodaj sztukę</b>',HAUTO,VAUTO,OFFSETX,15,OFFSETY,15);\" onmouseout=\"nd();\">\n";
echo "\t\t\t\t<div class=\"box2\"><a href=\"/cma_service/?m=addevent\" target=\"_top\">&raquo;&nbsp;Dodaj sztukę</a></div>\n";
echo "\t\t\t</div>\n";


echo "\t\t\t<div class=\"tip\" onmouseover=\"return overlib('<b>Wyjazd na sztukę</b>',HAUTO,VAUTO,OFFSETX,15,OFFSETY,15);\" onmouseout=\"nd();\">\n";
echo "\t\t\t\t<div class=\"box2\"><a href=\"/cma_service/?m=loadin\" target=\"_top\">&raquo;&nbsp;Załadunek</a></div>\n";
echo "\t\t\t</div>\n";




echo "\t\t\t<div class=\"tip\" onmouseover=\"return overlib('<b>Powrót ze sztuki</b>',HAUTO,VAUTO,OFFSETX,15,OFFSETY,15);\" onmouseout=\"nd();\">\n";
echo "\t\t\t\t<div class=\"box2\"><a href=\"/cma_service/?m=loadout\" target=\"_top\">&raquo;&nbsp;Rozładunek</a></div>\n";
echo "\t\t\t</div>\n";



echo "</div>\n";


echo "\t\t</td>\n";
echo "\t</tr>\n";

// Koniec menu dla funkcji odpowiedzialnychj wyjazdy / powroty ze sztuk

//Menu dla funkcji odpowiedzialnych za rozliczenie godzin

echo "\t<tr>\n";
echo "\t\t<td class=\"click-menu\">\n";
echo "\t\t\t<div class=\"box1\"><font style=\"margin-left: 21px\">Baza miejsc</font></div>\n";

echo "<div class=\"section\">\n";


echo "\t\t\t<div class=\"tip\" onmouseover=\"return overlib('<b>Informacje o miejscach sztuk</b>',HAUTO,VAUTO,OFFSETX,15,OFFSETY,15);\" onmouseout=\"nd();\">\n";
echo "\t\t\t\t<div class=\"box2\"><a href=\"/cma_service/?m=places\" target=\"_top\">&raquo;&nbsp;Baza miejsc</a></div>\n";
echo "\t\t\t</div>\n";

echo "\t\t\t<div class=\"tip\" onmouseover=\"return overlib('<b>Dodaj nową lokalizację sztuki</b>',HAUTO,VAUTO,OFFSETX,15,OFFSETY,15);\" onmouseout=\"nd();\">\n";
echo "\t\t\t\t<div class=\"box2\"><a href=\"/cma_service/?m=addplace\" target=\"_top\">&raquo;&nbsp;Dodaj nowe miejsce</a></div>\n";
echo "\t\t\t</div>\n";

echo "</div>\n";


echo "\t\t</td>\n";
echo "\t</tr>\n";

// Koniec menu dla funkcji odpowiedzialnych za rozliczenie godzin

//Menu dla funkcji obsługi floty samochodowej

echo "\t<tr>\n";
echo "\t\t<td class=\"click-menu\">\n";
echo "\t\t\t<div class=\"box1\"><font style=\"margin-left: 21px\">Flota</font></div>\n";

echo "<div class=\"section\">\n";


echo "\t\t\t<div class=\"tip\" onmouseover=\"return overlib('<b>Wyświetla listę samochodów firmowych</b>',HAUTO,VAUTO,OFFSETX,15,OFFSETY,15);\" onmouseout=\"nd();\">\n";
echo "\t\t\t\t<div class=\"box2\"><a href=\"/cma_service/?m=logout\" target=\"_top\">&raquo;&nbsp;Samochody</a></div>\n";
echo "\t\t\t</div>\n";

echo "\t\t\t<div class=\"tip\" onmouseover=\"return overlib('<b>Obsługa przebiegów km samochodów firmowych</b>',HAUTO,VAUTO,OFFSETX,15,OFFSETY,15);\" onmouseout=\"nd();\">\n";
echo "\t\t\t\t<div class=\"box2\"><a href=\"/cma_service/?m=logout\" target=\"_top\">&raquo;&nbsp;Przebiegi</a></div>\n";
echo "\t\t\t</div>\n";



echo "\t\t\t<div class=\"tip\" onmouseover=\"return overlib('<b>Dodaj przypomnienie dotyczące samochodu</b>',HAUTO,VAUTO,OFFSETX,15,OFFSETY,15);\" onmouseout=\"nd();\">\n";
echo "\t\t\t\t<div class=\"box2\"><a href=\"/cma_service/?m=logout\" target=\"_top\">&raquo;&nbsp;Przypomnienia</a></div>\n";
echo "\t\t\t</div>\n";



echo "</div>\n";


echo "\t\t</td>\n";
echo "\t</tr>\n";

// Koniec menu dla funkcji obsługi floty samochodowej

//Menu informacyjne


echo "\t<tr>\n";
echo "\t\t<td class=\"click-menu\">\n";
echo "\t\t\t<div class=\"box1\"><font style=\"margin-left: 21px\">Info</font></div>\n";

echo "<div class=\"section\">\n";


echo "\t\t\t<div class=\"tip\" onmouseover=\"return overlib('<b>Lista zmian w oprogramowaniu</b>',HAUTO,VAUTO,OFFSETX,15,OFFSETY,15);\" onmouseout=\"nd();\">\n";
echo "\t\t\t\t<div class=\"box2\"><a href=\"/cma_service/?m=changelog\" target=\"_top\">&raquo;&nbsp;Changelog</a></div>\n";
echo "\t\t\t</div>\n";



echo "</div>\n";


echo "\t\t</td>\n";
echo "\t</tr>\n";



//Koniec menu informacyjnego



//Menu dla funkcji odpowiedzialnych za logowanie 

echo "\t<tr>\n";
echo "\t\t<td class=\"click-menu\">\n";
echo "\t\t\t<div class=\"box1\"><font style=\"margin-left: 21px\">Użytkownik</font></div>\n";

echo "<div class=\"section\">\n";


echo "\t\t\t<div class=\"tip\" onmouseover=\"return overlib('<b>Wyloguj się z systemu</b>',HAUTO,VAUTO,OFFSETX,15,OFFSETY,15);\" onmouseout=\"nd();\">\n";
echo "\t\t\t\t<div class=\"box2\"><a href=\"/cma_service/?m=logout\" target=\"_top\">&raquo;&nbsp;Wyloguj</a></div>\n";
echo "\t\t\t</div>\n";

echo "</div>\n";


echo "\t\t</td>\n";
echo "\t</tr>\n";

// Koniec menu dla funkcji odpowiedzialnych za rozliczenie godzin



echo "</table>\n";


echo "<script type='text/javascript'>\n";
echo "var clickMenu1 = new ClickShowHideMenu('click-menu1');\n";
echo "clickMenu1.init();\n";
echo "</script>\n";

echo "</table>\n";
echo "</html>\n";

?>
