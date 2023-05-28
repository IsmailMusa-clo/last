<?php
include 'db_connect.php';
extract($_POST);

$response = array('status' => 0, 'msg' => 'حدث خطأ في معالجة الطلب.');

if (!empty($_FILES['avatar']['name'])) {
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["avatar"]["name"]);
	$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

	if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
		$response['msg'] = "تم تحميل الملف " . htmlspecialchars(basename($_FILES["avatar"]["name"]));
		$avatar = $target_file;
	} else {
		$response['msg'] = "عذرًا، حدث خطأ أثناء تحميل الملف.";
		echo json_encode($response);
		exit;
	}
} else {
	$avatar = "";
}

if (empty($id)) {
	if (!isset($emp_no) || empty($emp_no)) {
		$response['msg'] = "يرجى إدخال رقم الموظف.";
		echo json_encode($response);
		exit;
	}

	$save = $conn->query("INSERT INTO `employee` (`id`, `employee_no`, `password`, `firstname`, `middlename`, `lastname`, `avatar`, `department`, `position`) VALUES ('', '$emp_no', '', '$firstname', '$middlename', '$lastname', '$avatar', '$department', '$position')");
	if ($save) {
		$response['status'] = 1;
		$response['msg'] = "تم حفظ البيانات بنجاح.";
	}
} else {
	$save = $conn->query("UPDATE `employee` SET `employee_no`='$emp_no', `firstname`='$firstname', `middlename`='$middlename', `lastname`='$lastname', `position`='$position', `department`='$department', `avatar`='$avatar' WHERE `id` = $id");
	if ($save) {
		$response['status'] = 1;
		$response['msg'] = "تم تحديث البيانات بنجاح.";
	}
}

$conn->close();

echo json_encode($response);
