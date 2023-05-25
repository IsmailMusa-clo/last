<?php
include 'db_connect.php';

extract($_POST);
$data = array();

$qry = $conn->query("SELECT * FROM student WHERE student_no = '$eno'");

if ($qry->num_rows > 0) {
  $student = $qry->fetch_array();
  $save_log = $conn->query("INSERT INTO std_attend (log_type, student_id) VALUES ('$type', '".$student['id']."')");
  $student_name = ucwords($student['firstname'].' '.$student['firstname']);
  if ($type == 1) {
    $log = ' time in this morning';
  } elseif ($type == 3) {
    $log = ' time in this afternoon';
  }
  
  if ($save_log) {
    $data['status'] = 1;
    $data['msg'] = $student_name . ', your ' . $log . ' has been recorded. <br/>';
    $data['data'] = array(
      'student_name' => $student_name,
      'student_id' => $student['id'],
      'student_no' => $student['student_no'],
      'firstname' => $student['firstname'],
      'middlename' => $student['middlename'],
      'lastname' => $student['lastname'],
      'avatar' => $student['avatar'],
      'department' => $student['department'],
      'year_acadmic' => $student['year_acadmic']
      // يمكنك إضافة المزيد من المعلومات المطلوبة هنا
    );
  }
} else {
  $data['status'] = 2;
  $data['msg'] = 'Unknown Student Number';
}

echo json_encode($data);
$conn->close();
