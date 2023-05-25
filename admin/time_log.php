<?php
include 'db_connect.php';

extract($_POST);
$data = array();

$qry = $conn->query("SELECT * FROM employee WHERE employee_no = '$eno'");

if ($qry->num_rows > 0) {
  $emp = $qry->fetch_array();
  $save_log = $conn->query("INSERT INTO attendance (log_type, employee_id) VALUES ('$type', '".$emp['id']."')");
  $employee = ucwords($emp['firstname'].' '.$emp['firstname']);
  if ($type == 1) {
    $log = ' time in this morning';
  } elseif ($type == 3) {
    $log = ' time in this afternoon';
  }
  
  if ($save_log) {
    $data['status'] = 1;
    $data['msg'] = $employee . ', your ' . $log . ' has been recorded. <br/>';
    $data['data'] = array(
      'employee_name' => $employee,
      'employee_id' => $emp['id'],
      'employee_no' => $emp['employee_no'],
      'firstname' => $emp['firstname'],
      'middlename' => $emp['middlename'],
      'lastname' => $emp['lastname'],
      'avatar' => $emp['avatar'],
      'department' => $emp['department'],
      'position' => $emp['position']
      // يمكنك إضافة المزيد من المعلومات المطلوبة هنا
    );
  }
} else {
  $data['status'] = 2;
  $data['msg'] = 'Unknown Employee Number';
}

echo json_encode($data);
$conn->close();
