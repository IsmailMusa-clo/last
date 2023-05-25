<?php
include "phpqrcode/qrlib.php";
include "admin/db_connect.php";
$student_qry = $conn->query("SELECT   student_no  FROM `student`");
 while ($row = $student_qry->fetch_array()) {
    $txt =$row['student_no'];
    $fileName='qr/'.$txt.'12'.'png';
    QRcode::png($txt,$fileName);
}
?>