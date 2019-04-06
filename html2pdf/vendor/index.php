<?php

require __DIR__.'\autoload.php';

ob_start();
require_once 'print_view.php';
$html = ob_get_clean();

use Spipu\Html2Pdf\Html2Pdf;



$html2pdf = new Html2Pdf('L','A4','es','true','UTF-8');
$html2pdf->writeHTML($html);
$html2pdf->output('reporte_de_clases.pdf');
?>


