<?php
session_start();
if (!isset($_SESSION['loginstd_id'])) {
    header('location: index.php');
}

require_once 'admin/db_connect.php';
$user_qry = $conn->query("SELECT * FROM student WHERE `id` = '" . $_SESSION['loginstd_id'] . "' ") or die(mysqli_error());
$user = $user_qry->fetch_array();
$user_name = $user['firstname'] . " " . $user['lastname'];
$id = $user['id'];
?>
<!doctype html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>قالب لوحة القيادة · Bootstrap v5.1</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard-rtl/">
    <script src="../assets/js/jquery-3.5.1.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.rtl.min.css" rel="stylesheet">
    <style>
        .form-control:focus {
            box-shadow: none;
            border-color: #BA68C8
        }

        .profile-button {
            background: rgb(99, 39, 120);
            box-shadow: none;
            border: none
        }

        .profile-button:hover {
            background: #682773
        }

        .profile-button:focus {
            background: #682773;
            box-shadow: none
        }

        .profile-button:active {
            background: #682773;
            box-shadow: none
        }

        .back:hover {
            color: #682773;
            cursor: pointer
        }

        .labels {
            font-size: 11px
        }

        .add-experience:hover {
            background: #BA68C8;
            color: #fff;
            cursor: pointer;
            border: solid 1px #BA68C8
        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="assets/js/dashboard.js" rel="stylesheet">
</head>

<body>

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#"><?= $user_name ?></a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="عرض/إخفاء لوحة التنقل">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="logout.php">تسجيل الخروج</a>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="student.php">
                                <span data-feather="home"></span>
                                الرئيسية
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="student_att.php">
                                <span data-feather="file"></span>
                                تسجيلات الحضور
                            </a>
                        </li>

                </div>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">الرئيسية</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">تصدير</button>
                        </div>
                    </div>
                </div>
                <div class="container rounded bg-white mt-5 mb-5">
                    <div class="row">
                        <div class="col-md-8 offset-2 border-right">
                            <form id="student_frm">
                                <input type="hidden" name="id" value="<?= $user['id'] ?>" />
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="text-right">البروفايل</h4>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6"><label class="labels">الاسم الاول</label><input type="text" name="firstname" class="form-control" placeholder="first name" value="<?= $user['firstname'] ?>"></div>
                                    <div class="col-md-6"><label class="labels">الاسم الاوسط</label><input type="text" name="middlename" class="form-control" value="<?= $user['middlename'] ?>" placeholder="second name"></div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12"><label class="labels">الاسم الاخير</label><input type="text" name="lastname" class="form-control" placeholder="last" value="<?= $user['lastname'] ?>"></div>
                                    <div class="col-md-6"><label class="labels">رقم الطالب </label><input type="text" name="student_no" class="form-control" disabled placeholder="student number" value="<?= $user['student_no'] ?>"></div>
                                    <div class="col-md-6"><label class="labels">كلمة المرور </label><input type="text" name="password" class="form-control" placeholder="student password" value="<?= $user['password'] ?>"></div>
                                    <div class="col-md-12"><label class="labels"> القسم </label><input type="text" name="department" class="form-control" placeholder="department" value="<?= $user['department'] ?>"></div>
                                    <div class="col-md-12"><label class="labels">السنة الدراسية</label><input type="text" name="year_acadmic" class="form-control" placeholder="year acadmic" value="<?= $user['year_acadmic'] ?>"></div>
                                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" name="save" type="submit">حفظ</button></div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
        </div>
    </div>
    </main>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            $('#student_frm').submit(function(e) {
                e.preventDefault()
                $.ajax({
                    url: 'save_student.php',
                    method: "POST",
                    data: $(this).serialize(),
                    error: err => console.log(),
                    success: function(resp) {
                        if (typeof resp != undefined) {
                            resp = JSON.parse(resp)
                            if (resp.status == 1) {
                                alert(resp.msg);
                                location.reload();
                            }
                        }
                    }
                })
            })


        });
    </script>
</body>

</html>