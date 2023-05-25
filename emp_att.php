<?php
session_start();
if (!isset($_SESSION['loginemp_id'])) {
    header('location: index.php');
}

require_once 'admin/db_connect.php';
$user_qry = $conn->query("SELECT * FROM employee WHERE `id` = '" . $_SESSION['loginemp_id'] . "' ") or die(mysqli_error());
$user = $user_qry->fetch_array();
$id = $user['id'];
$user_name = $user['firstname'] . " " . $user['lastname'];
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
                            <a class="nav-link active" aria-current="page" href="emp.php">
                                <span data-feather="home"></span>
                                الرئيسية
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="emp_att.php>
                                <span data-feather=" file"></span>
                                تسجيلات الحضور
                            </a>
                        </li>
                       
                    </ul>
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
                    <table id="table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>رقم الموظف</th>
                                <th>الاسم</th>
                                <th>التاريخ</th>
                                <thنوع التسجيل</th>
                                    <th>الوقت</th>
                             </tr>
                        </thead>
                        <tbody>
                            <?php
                            $attendance_qry = $conn->query("SELECT a.*, CONCAT(e.firstname,' ',e.middlename,' ',e.lastname) AS name, e.employee_no FROM attendance a INNER JOIN employee e ON a.employee_id = e.id WHERE a.employee_id = $id ");
                            while ($row = $attendance_qry->fetch_array()) {

                            ?>
                                <tr>
                                    <td><?php echo $row['employee_no'] ?></td>
                                    <td><?php echo htmlentities($row['name']) ?></td>
                                    <td><?php echo date("F d, Y", strtotime($row['datetime_log'])) ?></td>
                                    <?php
                                    if ($row['log_type'] == 1) {
                                        $log = "TIME IN AM";
                                    } elseif ($row['log_type'] == 2) {
                                        $log = "TIME OUT AM";
                                    } elseif ($row['log_type'] == 3) {
                                        $log = "TIME IN PM";
                                    } elseif ($row['log_type'] == 4) {
                                        $log = "TIME OUT PM";
                                    }
                                    ?>
                                    <td><?php echo $log ?></td>
                                    <td><?php echo date("h:i a", strtotime($row['datetime_log'])) ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
    </main>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>
</body>

</html>