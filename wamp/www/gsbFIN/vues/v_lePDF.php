
<?php

require_once('/fpdf/fpdf.php');
$buffer=ob_get_clean();

define('DIMENSION_PETITE', 50);
define('DIMENSION_GRANDE', 60);

$pdf = new FPDF();
$pdf->AddPage();
//$pdf->SetFillColor(230, 230, 0);
$pdf->SetFont('Times');
$pdf->Image('images/logoGSB.png', 80, 10, 50 ,35);

$pdf->Cell(185,80,'REMBOURSEMENT DE FRAIS',60,60,'C');
$pdf->SetFont('Arial', 'B', 16);
//Tableau des frais Forfait
$pdf->Cell(DIMENSION_PETITE, 10, 'Visiteur', 0, 0 , 'C');
$pdf->Cell(DIMENSION_PETITE, 10, $idVisiteur, 0, 0 , 'C');
$pdf->Cell(DIMENSION_PETITE, 10, utf8_decode($prenom), 0, 0 , 'C');
$pdf->Cell(DIMENSION_PETITE, 10, utf8_decode($nom), 0, 1 , 'C');
$pdf->Cell(DIMENSION_PETITE, 10, 'Mois', 0, 0 , 'C');
$pdf->Cell(DIMENSION_PETITE, 10, $numMois.'/'.$numAnnee, 0, 0 , 'C');

$pdf->Ln(15);
$pdf->Cell(DIMENSION_PETITE, 10, 'Frais Forfaitaires', 1, 0, 'C');
$pdf->Cell(DIMENSION_PETITE, 10, utf8_decode('Quantité'), 1, 0, 'C');
$pdf->Cell(DIMENSION_PETITE, 10, 'Montant Unitaire', 1, 0, 'C');
$pdf->Cell(DIMENSION_PETITE, 10, 'Total', 1, 0, 'C');

//générer les données
foreach ($lesFraisForfait as $lesFrais){
    $pdf->Ln(10);
    $pdf->Cell(DIMENSION_PETITE, 10, utf8_decode($lesFrais[1]), 1, 0, 'C');
    $pdf->Cell(DIMENSION_PETITE, 10, utf8_decode($lesFrais[2]), 1, 0, 'C');
    $pdf->Cell(DIMENSION_PETITE, 10, utf8_decode($lesFrais[3]), 1, 0, 'C');
    $pdf->Cell(DIMENSION_PETITE, 10, utf8_decode($lesFrais[3])*utf8_decode($lesFrais[2]), 1, 0, 'C');
}

$pdf->Ln(20);
$pdf->Cell(160, 10, 'Hors Forfait', 1, 1, 'C');
$pdf->Cell(50, 10, 'Date', 1, 0, 'C');
$pdf->Cell(60, 10, utf8_decode('libellé'), 1, 0, 'C');
$pdf->Cell(50, 10, 'Montant', 1, 0, 'C');
//var_dump($lesFraisHorsForfait);
$total=0;
foreach ($lesFraisHorsForfait as $lesFrais){
    $pdf->Ln(10);
    $pdf->Cell(DIMENSION_PETITE, 10, utf8_decode($lesFrais[4]), 1, 0, 'C');
    $pdf->Cell(DIMENSION_GRANDE, 10, utf8_decode($lesFrais[3]), 1, 0, 'C');
    $pdf->Cell(DIMENSION_PETITE, 10, utf8_decode($lesFrais[5]), 1, 0, 'C');
    $total+=$lesFrais[5];
}    
$pdf->Ln(20);
$pdf->Cell(DIMENSION_PETITE, 10, '', 0, 0);
$pdf->Cell(DIMENSION_PETITE, 10,'Total '. $numMois.'/'.$numAnnee, 0, 0 , 'C');
$pdf->Cell(DIMENSION_PETITE, 10, $total, 1, 0, 'C');

$pdf->Ln(20);

$pdf->Cell(0, 10, utf8_decode('Fait à Cachan '),0, 1, 'R');
$pdf->Cell(0, 10, 'Vu par le Comptable',0, 0, 'R');

$pdf->Cell(0, 10, '');
$pdf->Output();
?>

