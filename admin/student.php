<!DOCTYPE html>
<?php
require_once 'auth.php';
?>
<html lang="eng">

<head>
	<title>قائمة الطلاب</title>
	<?php include('header.php') ?>
</head>

<body>
	<?php include('nav_bar.php') ?>

	<div class="container-fluid admin">
		<div class="alert alert-primary">الطلاب</div>
		<div class="modal fade" id="edit_student" tabindex="-1" role="dialog" aria-labelledby="myModallabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content panel-warning">
					<div class="modal-header panel-heading">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModallabel">تعديل البيانات</h4>
					</div>
					<div id="edit_query"></div>
				</div>
			</div>
		</div>
		<div class="well col-lg-12">
			<button class="btn btn-success" type="button" id="new_student_btn"><span class="fa fa-plus"></span> إضافة جديد </button>
			<br />
			<br />
			<table id="table" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>رقم الطالب</th>
						<th>الاسم الاول</th>
						<th>الاسم الثاني</th>
						<th>الاسم الثالث</th>
						<th>القسم</th>
						<th>السنة الدراسية</th>
						<th>الصورة الشخصية</th>
						<th>------</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$student_qry = $conn->query("SELECT * FROM `student`");
					while ($row = $student_qry->fetch_array()) {
					?>
						<tr>
							<td><?php echo $row['student_no'] ?></td>
							<td><?php echo $row['firstname'] ?></td>
							<td><?php echo $row['middlename'] ?></td>
							<td><?php echo $row['lastname'] ?></td>
							<td><?php echo $row['department'] ?></td>
							<td><?php echo $row['year_acadmic'] ?></td>
							<td><img src="<?php echo $row['avatar'] ?>" width="80" height="80" class="rounded-circle"></td>
							<td>
								<center>
									<button class="btn btn-sm btn-outline-primary edit_student" data-id="<?php echo $row['id'] ?>" type="button"><i class="fa fa-edit"></i></button>
									<button class="btn btn-sm btn-outline-danger remove_student" data-id="<?php echo $row['id'] ?>" type="button"><i class="fa fa-trash"></i></button>
								</center>
							</td>
						</tr>
					<?php
					}
					?>
				</tbody>
			</table>
		</div>
		<br />
		<br />
		<br />
	</div>

	<div class="modal fade" id="new_student" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">

					<h4 class="modal-title" id="myModallabel">إضافة طالب جديد</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<form id='student_frm' enctype="multipart/form-data">
					<div class="modal-body">
						<div class="form-group">
							<label> رقم الطالب</label>
							<input type="hidden" name="id" />
							<input type="text" name="student_no" required="required" class="form-control" />
						</div>
						<div class="form-group">
							<label>الاسم الاول</label>
							<input type="text" name="firstname" required="required" class="form-control" />
						</div>
						<div class="form-group">
							<label>الاسم الثاني</label>
							<input type="text" name="middlename" placeholder="(optional)" class="form-control" />
						</div>
						<div class="form-group">
							<label>الاسم الاخير:</label>
							<input type="text" name="lastname" required="required" class="form-control" />
						</div>
						<div class="form-group">
							<label>القسم</label>
							<input type="text" name="department" required="required" class="form-control" />
						</div>
						<div class="form-group">
							<label>الصورة الشخصية</label>
							<input type="file" name="avatar" class="form-control" />
						</div>
						<div class="form-group">
							<label>السنة الدارسية</label>
							<input type="number" min="1" max="5" name="year_acadmic" required="required" class="form-control" />
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-primary" name="submit"><span class="glyphicon glyphicon-save"></span> حفظ</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript">
	$(document).ready(function() {
		$('#table').DataTable();
	});
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#student_frm').submit(function(e) {
			e.preventDefault();
			$('#student_frm [name="submit"]').attr('disabled', true);
			$('#student_frm [name="submit"]').html('جاري الحفظ');

			var formData = new FormData(this);

			$.ajax({
				url: 'save_student.php',
				method: "POST",
				data: formData,
				processData: false,
				contentType: false,
				error: err => console.log(err),
				success: function(resp) {
					if (resp.startsWith("{") && resp.endsWith("}")) {
						resp = JSON.parse(resp);
						if (resp.status == 1) {
							alert(resp.msg);
							location.reload();
						}
					} else {
						console.log("استجابة الخادم لم تكن بصيغة JSON: ", resp);
					}
				}

			});
		});
		$('.remove_student').click(function() {
			var id = $(this).attr('data-id');
			var _conf = confirm("هل أنت متأكد من حذف هذه البيانات؟");
			if (_conf == true) {
				$.ajax({
					url: 'delete_student.php?id=' + id,
					error: err => console.log(err),
					success: function(resp) {
						if (typeof resp != undefined) {
							resp = JSON.parse(resp)
							if (resp.status == 1) {
								alert(resp.msg);
								location.reload()
							}
						}
					}
				})
			}
		});
		$('.edit_student').click(function() {
			var $id = $(this).attr('data-id');
			$.ajax({
				url: 'get_student.php',
				method: "POST",
				data: {
					id: $id
				},
				error: err => console.log(),
				success: function(resp) {
					if (typeof resp != undefined) {
						resp = JSON.parse(resp)
						$('[name="id"]').val(resp.id)
						$('[name="student_no"]').val(resp.student_no)
						$('[name="firstname"]').val(resp.firstname)
						$('[name="lastname"]').val(resp.lastname)
						$('[name="middlename"]').val(resp.middlename)
						$('[name="department"]').val(resp.department)
						$('[name="year_acadmic"]').val(resp.year_acadmic)
						$('#new_student .modal-title').html('تعديل الطالب')
						$('#new_student').modal('show')
					}
				}
			})

		});
		$('#new_student_btn').click(function() {
			$('[name="id"]').val('')
			$('[name="student_no"]').val('')
			$('[name="firstname"]').val('')
			$('[name="lastname"]').val('')
			$('[name="middlename"]').val('')
			$('[name="department"]').val('')
			$('[name="year_acadmic"]').val('')
			$('#new_student .modal-title').html('إضافة طالب جديد')
			$('#new_student').modal('show')
		})
	});
</script>

</html>