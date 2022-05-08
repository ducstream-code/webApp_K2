<?php

include "../includes/db.php";
require('../external/fpdf/fpdf.php');
$id = $_GET['id'];
$stmt = $db->prepare("SELECT * FROM users WHERE id = :id");
$stmt->bindParam(':id',$id);
$stmt->execute();
$res = $stmt->fetch();
include 'login/phpqrcode/qrlib.php';

class PDF extends FPDF {

    // Page header
    function Header() {
        include "../includes/db.php";

        $id = $_GET['id'];
        $stmt = $db->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        $res = $stmt->fetch();
        QRcode::png($res['email'], '../assets/qrCodes/'.$res['email'].'.png');

        // Add logo to page
        //$this->Image("../assets/images/logos/logo.png",10,8,60);


        // Set font family to Arial bold
        $this->SetFont('Arial','B',20);

        // Move to the right
        $this->Cell(150);

        // Header
        $this->Cell(50,10,'Loyalty Card',1,0,'C');

        // Line break
        $this->Ln(20);
    }

    // Page footer
    function Footer() {

        // Position at 1.5 cm from bottom
        $this->SetY(-15);

        // Arial italic 8
        $this->SetFont('Arial','I',8);

        // Page number
        $this->Cell(0,10,'Page ' .
            $this->PageNo() . '/{nb}',0,0,'C');
    }
}

// Instantiation of FPDF class
$pdf = new PDF();

// Define alias for number of pages
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',14);


    $pdf->Cell(0, 10, '', 0, 1);
    $pdf->Cell(0, 10, '', 0, 1);
    $pdf->Cell(0, 10, '', 0, 1);
    $pdf->Image("../assets/qrCodes/".$res['email'].".png",10,8,60);
    $pdf->Cell(0, 10, $res['firstname']." ".$res['name'], 0, 1);
    $pdf->Cell(0, 10, $res['email'], 0, 1);
    $pdf->Cell(0, 10, 'Carte de fidelite LoyaltyCard', 0, 1);
    $pdf->Cell(0, 10, 'En boutique, scannez le QR code afin de privilegier de reduction', 0, 1);

$pdf->Output();

?>
