<?php
include 'admin/db_connect.php';
extract($_POST);
if (empty($id)) {
} else {
	$save = $conn->query("UPDATE `employee` set firstname='$firstname',middlename='$middlename',lastname='$lastname',position='$position',department='$department' where id = $id ");
	if ($save) {
		echo json_encode(array('status' => 1, 'msg' => "Data successfully Updated"));
	}
}

$conn->close();
