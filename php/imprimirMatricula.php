<?php
require '../vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

ob_start();
require_once 'matricula.php';
$html = ob_get_clean();

$nombreMatricula = "nombreParaLaMatricula.pdf";//es el nombre que se verá cuando el usuario le da a descargar documento
$pdf = new Html2Pdf('p','A4','es','true','UTF-8');
$pdf->writeHTML($html);
$pdf->output($nombreMatricula);
?>