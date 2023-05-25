<?php
require 'vendor/autoload.php';

use Zxing\QrReader;
$txt = $_GET['g'];
$fileName = 'qr/' . $txt . '12' . 'png';

$qr = new QrReader($fileName);
$storeNumber = $qr->text();
?>
