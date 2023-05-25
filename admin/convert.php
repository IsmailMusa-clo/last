<?php


require_once('barcode.php');
$generator = new (barcode());
$get = $conn->query("SELECT employee_no FROM `employee` where id=$id");
$barcode = $generator->getBarcode(, $generator::TYPE_CODE_128);
