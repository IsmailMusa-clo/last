<?php
require_once('../admin/db_connect.php');
if (isset($_POST['login_std'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $qry = $conn->query("SELECT * FROM student WHERE student_no = '$username' and  password = '$password'");
    $login = $qry->fetch_array();
    if ($qry->num_rows > 0) {
        session_start();
        foreach ($login as $k => $v) {
            if (!is_numeric($k) && $k != 'password')
                $_SESSION['loginstd_' . $k] = $v;
        }
        header('location:../student.php');
    } else {
        header('location:../index.php');
    }
} else {

    header('location:../index.php');
}

$conn->close();
