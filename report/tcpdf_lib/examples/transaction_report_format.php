<?php
//============================================================+
// File name   : example_001.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 001 for TCPDF class
//               Default Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Default Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

require_once('../../../db.php');

session_start();
$_SESSION['uid_first_name']="Baladurage";
$_SESSION['uid_last_name']="Kavinda";


date_default_timezone_set("Asia/Colombo");


// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

/**
 * 
 *//**
  * 
  */

class pdf extends TCPDF
{
	public function Header() {
		//logo
		$image_file = K_PATH_IMAGES.'logo.png';
		$this->Image($image_file, 15, 12, 45, '', 'PNG', '', 'R', false, 300, '', false, false, 0, false, false, false);

		//set font
		$this->Ln(7);
		$this->SetFont('times', 'B', 14);

		//title
		$this->Cell(189, 5, 'Team Zaara.lk (Pvt) Ltd          ', 0, 1, 'R');

		$this->SetFont('times', '', 10);
		$this->Cell(189, 3, 'Thalalla North, Kekanadura             ', 0, 1, 'R');
		$this->Cell(189, 3, '81000 Matara Sri Lanka             ', 0, 1, 'R');
		$this->Cell(189, 3, 'Phone: +94 78 8311883             ', 0, 1, 'R');
		$this->Cell(189, 3, 'Fax: +94 41 2345678             ', 0, 1, 'R');
		$this->Cell(189, 3, 'Email: teamzaara.lk@gmail.com             ', 0, 1, 'R');

		$this->SetFont('helvetica', 'B', 11);
		$this->Ln(2);
		$this->Cell(180, 3, '_____________________________________________________________________________________', 0, 1, 'C');

		date_default_timezone_set("Asia/Colombo");
		$tDate=date('Y-m-d H:i:s');
		$clientName=$_SESSION['uid_first_name']." ".$_SESSION['uid_last_name'];

		$this->Ln(2);
		$this->SetFont('Courier', '', 11);
		$this->Cell(180, 5, 'Printed Date: '.$tDate, 0, 1, 'R');


		$this->Ln(6);
		$this->SetFont('helvetica', 'B', 18);
		$this->Cell(180, 5, 'Monthly Transaction Report', 0, 1, 'C');
        

		$this->Ln(4);
		$this->SetFont('times', 'B', 12);
		$this->SetLineStyle(array('width' => 0.1, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(221, 18, 61)));
		$this->SetFillColor(221, 18, 61);
		$this->SetTextColor(255,255,255);
		$this->Cell(30, 3, '  Month: ', 1, 0, 'L', 1);
		$this->SetFont('Courier', 'B', 12);
		$this->SetFillColor(255,255,255);
		$this->SetTextColor(221, 18, 61);
		$this->Cell(150, 3, '  '.date('F - Y'), 1, 1, 'L', 1);
	}

	public function Footer() {
		
		$this->SetY(-45);

		$this->Image(K_PATH_IMAGES.'signature.png', 152, 256, 28, '', 'PNG', '', 'R', false, 300, '', false, false, 0, false, false, false);
		
		$this->Ln(5);
		$this->SetFont('Courier', '', 12);

		$this->Cell(12, 15, '       '.date('d/m/Y'), 0, 0);
		$this->Cell(115, 1, '', 0, 0);
		$this->Cell(51, 1, '', 0, 1);

		$this->SetFont('times', '', 12);

		$this->Cell(12, 1, '       _____________________', 0, 0);
		$this->Cell(115, 1, '', 0, 0);
		$this->Cell(51, 1, '_____________________', 0, 1);

		$this->Cell(12, 1, '                        Date', 0, 0);
		$this->Cell(115, 1, '', 0, 0);
		$this->Cell(51, 1, '        Issuer Signature', 0, 1);
		
		
		$this->SetFont('Courier', '', 10);
		$this->Ln(3);
		$this->Cell(180, 3, '_____________________________________________________________________________________', 0, 1, 'C');
		$this->Cell(180, 3, ' - Report of monthly transaction from zaara.lk -', 0, 1, 'C');
		$this->Cell(205, 3, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(), 0, 1, 'C');

	}


}

// create new PDF document
$pdf = new PDF('p', 'mm', 'A4');

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('DigiMart');
$pdf->SetTitle('Monthly Transaction Report');
$pdf->SetSubject('');
$pdf->SetKeywords('');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set some language-dependent strings (optional)
/*if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}*/

// ---------------------------------------------------------

$pdf->AddPage();

$pdf->SetFont('times', 'B', 10);


$i = 1;
$max = 10;
$subTotal = 0.0;
$total = 0.0;

$pdf->Ln(57);
$pdf->SetFont('times', 'B', 10);
$pdf->SetFillColor(221, 18, 61);
$pdf->SetTextColor(255,255,255);
$pdf->Cell(5, 7, '#', 0, 0, 'C', 1);
$pdf->Cell(25, 7, 'ID', 0, 0, 'C', 1);
$pdf->Cell(25, 7, 'Customer ID', 0, 0, 'C', 1);
$pdf->Cell(40, 7, 'Date', 0, 0, 'C', 1);
$pdf->Cell(45, 7, 'Amount [LKR]', 0, 0, 'C', 1);
$pdf->Cell(40, 7, 'Status', 0, 1, 'C', 1);

$query2 = "SELECT *, (`unit_price`*`quantity`) AS 'total_price' FROM `order_product` WHERE  (`is_deleted` = 0 OR `is_deleted` = 1) ORDER BY `date_and_time` ASC";

$result = $conn->query($query2);
echo mysqli_error($conn);

while ($row = $result->fetch_assoc()) {
    
    $status = "";
    $date = date_create($row['date_and_time']);
    $date = date_format($date,"Y-m-d");
    
    if($row['is_recieved']==1) {
        $status = "Received";
    } else if($row['is_posted']==1) {
        $status = "Posted";
    } else if($row['is_cancel']==1) {
        $status = "Canceled";
    } else if (date("Y-m-d")!=$date) {
        $status = "Confirmed";
    } else {
        $status = "Not yet confirmed";
    }

    $pdf->SetFont('Courier', '', 10);
    $pdf->SetTextColor(0,0,0);
    $pdf->Ln(2);
    $pdf->Cell(5, 4, $i, 0, 0, 'C');
    $pdf->Cell(25, 4, $row['id'], 0, 0, 'C');
    $pdf->Cell(25, 4, $row['customer_id'], 0, 0, 'C');
    $pdf->Cell(40, 4, $row['date_and_time'], 0, 0, 'C');
    $pdf->Cell(45, 4, number_format($row['total_price'],2), 0, 0, 'R');
    $pdf->Cell(40, 4,  $status, 0, 1, 'R');
    $pdf->Ln(2);
    $pdf->Cell(180, 3, '_____________________________________________________________________________________', 0, 1, 'C');

    if(($i%$max) == 0) {

        $pdf->AddPage();
        $pdf->Ln(57);
        $pdf->SetFont('times', 'B', 10);
        $pdf->SetFillColor(221, 18, 61);
        $pdf->SetTextColor(255,255,255);
        $pdf->Cell(5, 7, '#', 0, 0, 'C', 1);
        $pdf->Cell(25, 7, 'ID', 0, 0, 'C', 1);
        $pdf->Cell(25, 7, 'Customer ID', 0, 0, 'C', 1);
        $pdf->Cell(40, 7, 'Date', 0, 0, 'C', 1);
        $pdf->Cell(45, 7, 'Amount [LKR]', 0, 0, 'C', 1);
        $pdf->Cell(40, 7, 'Status', 0, 1, 'C', 1);

    }

    $i++;
    $subTotal += $row['total_price'];
    
    if($status == "Received"){
        $total += $row['total_price'];
    }
}

$pdf->Ln(6);
$pdf->SetFont('times', 'B', 18);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetLineStyle(array('width' => 0.3, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(221, 18, 61)));
$pdf->Cell(35, 10, '', 0, 0, 'R', 1);
$pdf->SetFillColor(221, 18, 61);
$pdf->SetTextColor(255,255,255);
$pdf->Cell(55, 10, 'Sub Total:', 1, 0, 'C', 1);
$pdf->SetFont('Courier', 'B', 18);
$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(221, 18, 61);
$pdf->Cell(90, 10, 'LKR '.number_format($subTotal,2), 1, 1, 'R', 1);

$pdf->Ln(5);
$pdf->SetFont('times', 'B', 18);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetLineStyle(array('width' => 0.3, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(221, 18, 61)));
$pdf->Cell(35, 10, '', 0, 0, 'R', 1);
$pdf->SetFillColor(221, 18, 61);
$pdf->SetTextColor(255,255,255);
$pdf->Cell(55, 10, 'Total:', 1, 0, 'C', 1);
$pdf->SetFont('Courier', 'B', 18);
$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(221, 18, 61);
$pdf->Cell(90, 10, 'LKR '.number_format($total,2), 1, 1, 'R', 1);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('Monthly Transaction Report.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
