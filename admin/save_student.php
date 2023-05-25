<?php
include 'db_connect.php';
extract($_POST);

$response = array('status' => 0, 'msg' => 'Error in processing request.');

if (!empty($_FILES['avatar']['name'])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["avatar"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
        $response['msg'] = "The file ". htmlspecialchars( basename( $_FILES["avatar"]["name"])). " has been uploaded.";
        $avatar = $target_file;
    } else {
        $response['msg'] = "Sorry, there was an error uploading your file.";
        echo json_encode($response);
        exit;
    }
} else {
    $avatar = "";
}

if(empty($id)){
    $i= 1;
    while($i == 1){
        $e_num=date('Y') .'-'. mt_rand(1,9999);
        $chk  = $conn->query("SELECT * FROM student where student_no = '$e_num' ")->num_rows;
        if($chk <= 0){
            $i = 0;
        }
    }

    $save=$conn->query("INSERT INTO `student` VALUES('', '$e_num', '$e_num', '$firstname', '$middlename', '$lastname',  '$avatar','$department', '$year_acadmic')");
    if($save){
        $response['status'] = 1;
        $response['msg'] = "Data successfully Saved";
    }       
}else{
    $save=$conn->query("UPDATE `student` set firstname='$firstname',middlename='$middlename',lastname='$lastname',year_acadmic='$year_acadmic',department='$department', avatar='$avatar' where id = $id ");
    if($save){
        $response['status'] = 1;
        $response['msg'] = "Data successfully Updated";
    }
}

$conn->close();

echo json_encode($response);
