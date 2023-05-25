<!DOCTYPE html>
<?php
session_start();
if (isset($_SESSION['loginstd_id'])) {
    echo "<script>window.location.replace('student.php')</script>";
}
?>
<html lang="eng" dir="rtl">

<head>
    <title>نظام تسجيل الحضور والغياب</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css" integrity="sha384-JvExCACAZcHNJEc7156QaHXTnQL3hQBixvj5RV5buE7vgnNEzzskDtx9NQ4p6BJe" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css" />

    <script src="../assets/js/jquery-3.5.1.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
</head>

<body>
    <div id="main" class="bg-info">
        <div class="container">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-6 offset-md-3 ">
                        <div class="card login-field">
                            <div class="card-header">
                                <h4>تسجيل دخول الطلاب </h4>
                            </div>
                            <div class="card-body">
                                <form action="function/login.php" method="post">
                                    <div id="" class="form-group">
                                        <label class="control-label">اسم المستخدم:</label>
                                        <input type="text" name="username" class="form-control" required />
                                    </div>
                                    <div id="" class="form-group">
                                        <label class="control-label">كلمة المرور:</label>
                                        <input type="password" maxlength="20" name="password" class="form-control" required />
                                    </div>
                                    <br />
                                    <button type="submit" name="login_std" class="btn btn-primary btn-block">تسجيل <i class="fa fa-arrow-right"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.js"></script>
<!-- 
<script>
    $(document).ready(function() {
        $('#login-frm').submit(function(e) {
            e.preventDefault();
             $.ajax({
                url: 'function/login.php',
                method: 'POST',
                data: $(this).serialize(),
                error: err => {
                    console.log(err)
                },
                success: function(resp) {
                    location.replace('student.php');
                }
            })
        })
    })
</script> -->

</html>