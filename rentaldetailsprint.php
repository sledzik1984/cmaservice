<?php
setlocale(LC_TIME, "pl_PL.UTF-8");



$rid = $_GET["rid"];

$style = array(
    'position' => '',
    'align' => 'C',
    'stretch' => false,
    'fitwidth' => true,
    'cellfitalign' => '',
    'border' => true,
    'hpadding' => 'auto',
    'vpadding' => 'auto',
    'fgcolor' => array(0,0,0),
    'bgcolor' => false, //array(255,255,255),
    'text' => true,
    'font' => 'courier',
    'fontsize' => 8,
    'stretchtext' => 4

);

function generuj_bcode($bcd) {

    $bcd_len = strlen($bcd);
    
    
    //echo $bcd_len;
    switch ($bcd_len) {
    
	case 1:
	$forbcd = "000000000000" . $bcd;
	break;

	case 2:
	$forbcd = "00000000000" . $bcd;
	break;
	
	case 3:
	$forbcd = "0000000000" . $bcd;
	break;
	
	case 4:
	$forbcd = "000000000" . $bcd;
	break;
	
	case 5:
	$forbcd = "00000000" . $bcd;
	break;
	
	case 6:
	$forbcd = "0000000" . $bcd;
	break;
	
	case 7:
	$forbcd = "000000" . $bcd;
	break;
	
	case 8:
	$forbcd = "00000" . $bcd;
	break;
	
	case 9:
	$forbcd = "0000" . $bcd;
	break;
	
	case 10:
	$forbcd = "000" . $bcd;
	
	case 11:
	$forbcd = "00" . $bcd;
	break;
	
	case 12:
	$forbcd = "0" . $bcd;
	break;
	
	case 13:
	$forbcd = $bcd;
        break;


    }
        
   return $forbcd;
}



//echo "Wynik funkcji: " . generuj_bcode(4);



include ('mysql.php');

require_once('inc/tcpdf/config/lang/pol.php');
require_once('inc/tcpdf/tcpdf.php');


// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Magazyn Concept Music Art');
$pdf->SetTitle('Protokol wypożyczenia');



//Standardowe dane nagłówka

$tytul = "Protokół wypożyczenia sprzętu";

$pdf->SetHeaderData('cma_transparent.png',25,$tytul,$rid."/CMA/WYP/2010");

//$pdf->SetHeaderData('img/cma_transparent.png',30,Protokół wypożyczenia,Dupa);

// set header and footer fonts

$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
$pdf->setLanguageArray($l);

//Od tego miejsca tworzymy już aktualnego PDF'a

// add a page
$pdf->AddPage();


$pdf->SetFont("dejavuserif","",9);

//$pdf->Ln();
//$pdf->Ln();

//Rozpoczynamy pobieranie z bazy:

$query_rent_details = "SELECT * FROM `rental_details` WHERE `id` = '$rid' LIMIT 1";


$result_rent_details = mysql_query($query_rent_details);




while ($row_rent_details = mysql_fetch_assoc($result_rent_details)) {


    $timestart = $row_rent_details["timestart"];
    $timestop = $row_rent_details["timestop"];
    $rent_client = $row_rent_details["rental_client"];

    

    $query_client = "SELECT * FROM `rental_clients` WHERE `id` = '$rent_client' LIMIT 1";
    $result_client = mysql_query($query_client);
    
    echo mysql_error();
    
    while ($row_client = mysql_fetch_assoc($result_client)) {
    
	$first_name = $row_client["first_name"];
	$last_name = $row_client["last_name"];
	$company = $row_client["company"];
	$document_no = $row_client["document_no"];
	$street = $row_client["street"];
	$zip = $row_client["zip"];
	$city = $row_client["city"];
	$phone = $row_client["phone"];
	$email = $row_client["email"];
	$nip = $row_client["nip"];


	$pdf->SetY(35);
        $pdf->Write(12,"Dane klienta:",false,false,C);
	
	$pdf->Ln();
	
	$pdf->Cell(0, 0, 'Kod zwrotu', 0, 1);
	$pdf->write1DBarcode($rid, 'EAN13', '', '', '', 18, 0.4, $style, 'N');
	
	$pdf->SetXY(105,40);
	
	$pdf->Write(12,$first_name . " ");
	$pdf->Write(12,$last_name);
	$pdf->SetXY(105,44);
	$pdf->Write(12,$company);
	$pdf->SetXY(105,48);
	$pdf->Write(12,$street);
	$pdf->SetXY(105,52);
	$pdf->Write(12,$zip . " ");
	$pdf->Write(12,$city);
	$pdf->SetXY(105,56);
	$pdf->Write(12,"Nr dokumentu: " .$document_no);
	$pdf->SetXY(105,60);
	$pdf->Write(12,$phone);
	$pdf->SetXY(105,64);
	$pdf->Write(12,$email);
	$pdf->SetXY(105,68);
	$pdf->Write(12,"NIP: " .$nip);

    }


}

//Pobieramy szczegoly wpozyczenia:

$pdf->SetY(80);


$pdf->Write(4,"Wypożyczający bierze pełną odpowiedzialność za wypożyczony sprzęt. W przypadku zagubienia, zniszczenia wypożyczający ponosi wszelkie koszty. Można też tu napisać wiele innych bzdur...");
$pdf->Ln();

$zwrot = strftime("%c",$timestop);

$pdf->Write(4,"Umówiony termin zwrotu wypożyczanego sprzętu to: " . $zwrot);
$pdf->Ln();
$pdf->Ln();




$pdf->SetFillColor(235);

$pdf->Cell(130,4,"Nazwa urządzenia", 'LRTB',0,'C',$fill);
$pdf->Cell(50,4,"Wartość", 'LRTB',0,'C',$fill);
$pdf->Ln();

$query_rental = "SELECT * FROM `rentals` WHERE `rental_id` = '$rid' ORDER BY `id` ASC";
$result_rental = mysql_query($query_rental);
echo mysql_error();

$parity = 0;


while ($row_rental = mysql_fetch_assoc($result_rental)) {

	$ren_bcode = $row_rental["barcode"];
	
	$query_fixture = "SELECT * FROM `warehouse` WHERE `barcode` = '$ren_bcode' LIMIT 1";
	
	$result_fixture = mysql_query($query_fixture);
	
	echo mysql_error();

//echo $query_fixture . "\n";
	
	
	while ($row_fixture = mysql_fetch_assoc($result_fixture)) {
	
		$par = $parity % 2;
		
	
		if ($parity%2 == 0) {
		
		$fill = 1;
		
		} else {
		
		$fill = 0;
		
		}
		
		
		$fix_name = $row_fixture["name"];
		$fix_cashvalue = $row_fixture["cash_value"];
		
		
		$pdf->Cell(130,4,$fix_name, 'LRTB',0,'L',$fill);
		$pdf->Cell(50,4,$fix_cashvalue . " zł", 'LRTB', 0, 'R',$fill);
		$pdf->Ln();

		$parity++;
	
	
	
	}




}


$pdf->Ln();
$pdf->Ln();

$pdf->SetX(30);

$pdf->Cell(40,15," ","LTRB");
$pdf->SetX(130);

$pdf->Cell(40,15," ","LTRB");

$pdf->Ln();

$pdf->SetX(35);
$pdf->Write(4,"Podpis magazyn");

$pdf->SetX(132);
$pdf->Write(4,"Podpis wypożyczający");





$pdf->Output('protokol.pdf', 'I');

?>
