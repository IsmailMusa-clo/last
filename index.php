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
        body {
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

        .btn:hover {
            background-color: blueviolet;
            color: #fff;
            border: 1px solid blueviolet;
        }

        .content {
            margin-top: 200px;
        }



        body {
            background: #FFF;
            font: 400 1.5em/1.5 "Droid Serif", serif;
            color: #111;
            text-align: center;
            height: 100%;
        }

        h1 {
            font: 700 2.8em/1.2 "Droid Sans", sans-serif;
        }

        h2 {
            font: 700 1.5em/1.5 "Droid Sans", sans-serif;
            margin: 1em 0;
        }

        #banner {
            background: url(assets/images/WhatsApp\ Image\ 2023-05-10\ at\ 8.17.06\ PM.jpeg) no-repeat fixed 100% 100%;
            background-size: cover;
            color: #fff;
            height: 500px;
            width: 100%;
        }

        #bannertext {
            width: 24em;
            position: fixed;
            top: 20%;
            left: 50%;
            border: .5em solid #fff;
            margin-left: -12em;
            padding: 2em 0;
        }

        #content {
            max-width: 70%;
            text-align: justify;
            margin: 0 auto;
            padding: 2em;
        }

        #content p {
            margin: 0 0 2em;
        }
    </style>

</head>

<body>

    <div class="container">
        <header class=" d-flex flex-wrap  justify-content-between align-items-center py-3 mb-4 border-bottom" style="direction: rtl;">
            <a href="index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <img src="assets/images/WhatsApp Image 2023-05-10 at 8.17.06 PM.jpeg" width="70" class="rounded-circle">
            </a>
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="admin/index.php">صفحة الأدمن</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="index_std.php">تسجيل حضور
                        الطالب</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="index_emp.php">تسجيل حضور
                        الموظف</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="main_choice.php">تسجيل
                        الدخول</a>
                </li>
            </ul>
        </header>
    </div>
    <main>
        <div id="banner">
            <div id="bannertext" class="text-center">
                <h1>كلية جازان التقنية</h1>
                <p>تأسست عام 1430 هجري</p>
            </div>
        </div>

        <div class="container">
            <div class="row py-5">
                <div class="col-md-8 text-right">
                    <h1>من نحن</h1>
                    <p>

                        كلية جازان التقنية هي إحدى الكليات التقنية السعودية وتقع في محافظة جازان جنوب المملكة العربية السعودية.
                        تأسست الكلية في
                        عام 1430هـ (2009م) وتم تدشينها من قبل صاحب السمو الملكي الأمير مشعل بن عبدالله بن عبدالعزيز.


                        تعمل كلية جازان التقنية على تقديم برامج تعليمية متخصصة في مجالات الهندسة والتقنية، وذلك بهدف تطوير
                        وتحسين المهارات
                        العملية لدى الطلاب وتزويدهم بالمعرفة اللازمة لمواكبة تطورات السوق العمل.


                        تضم الكلية عدداً من الأقسام والبرامج الأكاديمية، مثل قسم الهندسة الكهربائية والإلكترونية وقسم الهندسة
                        الميكانيكية
                        والصناعية، بالإضافة إلى برنامج الحاسب الآلي وبرنامج تقنية المعلومات والإدارة والأعمال.


                        تمتلك كلية جازان التقنية مرافق تعليمية حديثة ومتطورة، بما في ذلك معامل الحاسب الآلي وورش العمل
                        والمختبرات المجهزة بأحدث
                        التقنيات، بالإضافة إلى مركز للتدريب الصناعي والتقني ومركز لتقنية المعلومات.


                        يتميز خريجو كلية جازان التقنية بالقدرة على تطبيق المعارف والمهارات اللازمة للعمل في الصناعة والشركات،
                        ولديهم فرص عمل
                        واسعة في السوق العمل، سواء داخل المملكة العربية السعودية أو خارجها.

                    </p>
                </div>
                <!-- تحديد المساحة الخاصة بالصورة -->
                <div class="col-md-4">
                    <img src="assets/images/WhatsApp Image 2023-05-10 at 8.17.06 PM.jpeg" alt="صورتك" class="img-fluid">
                </div>
                <!-- تحديد المساحة الخاصة بالنص -->

            </div>

    </main>



    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <p class="col-md-4 mb-0 text-muted">&copy; 2021 Company, Inc</p>

            <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32">
                    <use xlink:href="#bootstrap" />
                </svg>
            </a>

        </footer>
    </div>

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

        function EasyPeasyParallax() {
            scrollPos = $(this).scrollTop();
            $('#banner').css({
                'background-position': '50% ' + (-scrollPos / 4) + "px"
            });
            $('#bannertext').css({
                'margin-top': (scrollPos / 4) + "px",
                'opacity': 1 - (scrollPos / 250)
            });
        }
        $(document).ready(function() {
            $(window).scroll(function() {
                EasyPeasyParallax();
            });
        });
    </script>

</body>

</html>