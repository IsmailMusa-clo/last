<?php
include 'db_connect.php';
extract($_POST);

$response = array('status' => 0, 'msg' => 'خطأ في معالجة الطلب.');

if (!empty($_FILES['avatar']['name'])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["avatar"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
        $response['msg'] = "تم رفع الملف " . htmlspecialchars(basename($_FILES["avatar"]["name"])) . " بنجاح.";
        $avatar = $target_file;
    } else {
        $response['msg'] = "عذرًا، حدث خطأ أثناء رفع الملف.";
        echo json_encode($response);
        exit;
    }
} else {
    $avatar = "";
}

if (empty($id)) {
    $save = $conn->query("INSERT INTO `student` VALUES('', '$student_no', '$student_no', '$firstname', '$middlename', '$lastname',  '$avatar','$department', '$year_acadmic')");
    if ($save) {
        $response['status'] = 1;
        $response['msg'] = "تم حفظ البيانات بنجاح";
    }
} else {
    $save = $conn->query("UPDATE `student` set student_no='$student_no', firstname='$firstname',middlename='$middlename',lastname='$lastname',year_acadmic='$year_acadmic',department='$department', avatar='$avatar' where id = $id ");
    if ($save) {
        $response['status'] = 1;
        $response['msg'] = "تم تحديث البيانات بنجاح";
    }
}

$conn->close();

echo json_encode($response);
