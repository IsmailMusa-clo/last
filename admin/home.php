<!DOCTYPE html>
<?php
include 'auth.php';

// استعلام لاحتساب عدد الموظفين
$employee_count = $conn->query("SELECT COUNT(*) as count FROM employee")->fetch_assoc()['count'];

// استعلام لاحتساب عدد الطلاب
$student_count = $conn->query("SELECT COUNT(*) as count FROM student")->fetch_assoc()['count'];

// استعلام لاحتساب عدد تسجيلات حضور الطلاب في الصباح
$student_morning_attendance = $conn->query("SELECT COUNT(*) as count FROM std_attend WHERE log_type = 1")->fetch_assoc()['count'];

// استعلام لاحتساب عدد تسجيلات حضور الطلاب في المساء
$student_afternoon_attendance = $conn->query("SELECT COUNT(*) as count FROM std_attend WHERE log_type = 3")->fetch_assoc()['count'];

// استعلام لاحتساب عدد تسجيلات حضور الموظفين في الصباح
$employee_morning_attendance = $conn->query("SELECT COUNT(*) as count FROM attendance WHERE log_type = 1")->fetch_assoc()['count'];

// استعلام لاحتساب عدد تسجيلات حضور الموظفين في المساء
$employee_afternoon_attendance = $conn->query("SELECT COUNT(*) as count FROM attendance WHERE log_type = 3")->fetch_assoc()['count'];
?>
<html lang="eng">

<head>
	<title>نظام تسجيل الحضور والغياب</title>
	<?php include 'header.php'; ?>
</head>

<body>
	<?php include 'nav_bar.php' ?>
	<div class="container-fluid admin">
		<div class="alert alert-primary">لوحة التحكم</div>
		<h5>Welcome <?php echo ucwords($user_name) ?> !</h5>
		<div class="row">
			<div class="col-md-6">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">إحصائيات الطلاب</h5>
						<p class="card-text">عدد الطلاب: <?php echo $student_count; ?></p>
						<p class="card-text">تسجيلات حضور صباحية: <?php echo $student_morning_attendance; ?></p>
						<p class="card-text">تسجيلات حضور مسائية: <?php echo $student_afternoon_attendance; ?></p>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">إحصائيات الموظفين</h5>
						<p class="card-text">عدد الموظفين: <?php echo $employee_count; ?></p>
						<p class="card-text">تسجيلات حضور صباحية: <?php echo $employee_morning_attendance; ?></p>
						<p class="card-text">تسجيلات حضور مسائية: <?php echo $employee_afternoon_attendance; ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>