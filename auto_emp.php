<?php
 include "admin/db_connect.php";
require 'vendor/autoload.php';
$txt = $_GET['g'];
$fileName = 'qr/' . $txt . '12' . 'png';
// This will output the barcode as HTML output to display in the browser
$redColor = [255, 0, 0];
$generator = new Picqer\Barcode\BarcodeGeneratorPNG();
file_put_contents($fileName, $generator->getBarcode($txt, $generator::TYPE_CODE_128, 3, 50, $redColor));
 ?>
