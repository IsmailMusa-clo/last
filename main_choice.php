<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;400;600&display=swap" rel="stylesheet">
    <title>Collage</title>
    <style>
        body{
            font-family: 'Cairo', sans-serif;
        }
        @media only screen and (max-width: 768px) {
            #navbar-logo {
                display: none !important;
            }

            #navbar-logo-mob {
                display: block !important;
            }
        }

        @media only screen and (min-width: 769px) {
            #navbar-logo-mob {
                display: none !important;
            }
        }

        .btn:hover{
            background-color: blueviolet;
            color:#fff;
            border: 1px solid blueviolet;
        }
            .content{
                margin-top: 200px;
            }
            ul li a{
                color:#fff;
                font-size: 17px ;
                /* font-weight:300; */

            }
            ul li:hover a{
                color:#e1e1e1;
            }
    </style>

</head>

<body >
    <!-- Intro Header -->
    <header class="masthead">
        <div class="intro-body bg-primary py-3">
            <div class="container">
                <div class="row ">
                    <div class="">
                        <div class="brand-heading">
                            <div class="d-flex justify-content-between align-items-center">
                                <img style="height: auto;width: 5%;" src="assets/images/O4Y28G0.jpg" class="rounded-circle">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="index.php">الرئيسية</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="admin/index.php">صفحة الأدمن</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="index_std.php">تسجيل حضور الطالب</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="index_emp.php">تسجيل حضور الموظف</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="main_choice.php">تسجيل الدخول</a>
                                    </li>
                                </ul>    
                            </div>
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Contact Section -->
    <section id="start" class="content-section text-center mt-5">
        <div class="container">
            <div class="row content">
                <div class="col-lg-8 mx-auto">
                    <h2 class="text-light badge-primary py-2" style="border-radius: 12px;"> اختر طالب أو موظف</h2>
                    <div class="row">
                        <div class="col-sm-6">
                            <a href="emp_login.php" class="btn  border-primary btn-lg" style="padding: 1em 3em; margin-top:1em;">
                                <span class="network-name">موظف</span>
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <a href="student_login.php" class="btn  border-primary btn-lg" style="padding: 1em 3em; margin-top:1em;">
                                <span class="network-name">طالب</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

   

    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <!--  <p>QrAtt 2019</p> -->
        </div>
    </footer>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic|Cabin:700" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/grayscale.min.css" rel="stylesheet">

    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/grayscale.min.js"></script>

    <script>
        $(window).scroll(function() {
            var scroll = $(window).scrollTop();
            if (scroll > 300) {
                $("#navbar-logo").fadeIn("slow");
                $("#mySelector").animate({
                    height: 0,
                    opacity: 0
                }, 'slow');
            } else {
                $("#navbar-logo").fadeOut("slow");
            }
        });
    </script>

</body>

</html>