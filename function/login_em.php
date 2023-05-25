<?php
require_once ('../admin/db_connect.php');
if (isset($_POST['login_emp'])) {
    $username=$_POST['username'];
    $password=$_POST['password'];
    $qry = $conn->query("SELECT * FROM employee WHERE employee_no = '$username' and  password = '$password'");
    $login = $qry->fetch_array();
    if ($qry->num_rows > 0) {
        session_start();
        foreach ($login as $k => $v) {
            if (!is_numeric($k) && $k != 'password')
                $_SESSION['loginemp_' . $k] = $v;
        }
        header('location:../emp.php');
    }else{
        header('location:../index.php');
    }    
    
 } else{
        
        header('location:../index.php');
    }

$conn->close();
