<!DOCTYPE html>
<?php
require_once 'auth.php';
?>
<html lang="eng">

<head>
	<title>قائمة الموظفين</title>
	<?php include('header.php') ?>
</head>

<body>
	<?php include('nav_bar.php') ?>

	<div class="container-fluid admin">
		<div class="alert alert-primary">الموظفين</div>
		<div class="modal fade" id="edit_employee" tabindex="-1" role="dialog" aria-labelledby="myModallabel">
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
			<button class="btn btn-success" type="button" id="new_emp_btn"><span class="fa fa-plus"></span> إضافة جديد </button>
			<br />
			<br />
			<table id="table" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>رقم الموظف</th>
						<th>الاسم الاول</th>
						<th>الاسم الثاني</th>
						<th>الاسم الثالث</th>
						<th>القسم</th>
						<th>المسمى الوظيفي</th>
						<th>الصورة الشخصية</th>
						<th>------</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$employee_qry = $conn->query("SELECT * FROM `employee`");
					while ($row = $employee_qry->fetch_array()) {
					?>
						<tr>
							<td><?php echo $row['employee_no'] ?></td>
							<td><?php echo $row['firstname'] ?></td>
							<td><?php echo $row['middlename'] ?></td>
							<td><?php echo $row['lastname'] ?></td>
							<td><?php echo $row['department'] ?></td>
							<td><?php echo $row['position'] ?></td>
							<td><img src="<?php echo $row['avatar'] ?>" width="80" class="rounded-circle"></td>
							<td>
								<center>
									<button class="btn btn-sm btn-outline-primary edit_employee" data-id="<?php echo $row['id'] ?>" type="button"><i class="fa fa-edit"></i></button>
									<button class="btn btn-sm btn-outline-danger remove_employee" data-id="<?php echo $row['id'] ?>" type="button"><i class="fa fa-trash"></i></button>
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

	<div class="modal fade" id="new_employee" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">

					<h4 class="modal-title" id="myModallabel">إضافة موظف جديد</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<form id='employee_frm' enctype="multipart/form-data">
					<div class="modal-body">
						<div class="form-group">
							<label> رقم الموظف</label>
							<input type="hidden" name="id" />
							<input type="text" name="emp_no" required="required" class="form-control" />
						</div>
						<div class="form-group">
							<label>الاسم الاول</label>
							<input type="hidden" name="id" />
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
							<label>المسمى الوظيفي</label>
							<input type="text" name="position" required="required" class="form-control" />
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-primary" name="save"><span class="glyphicon glyphicon-save"></span> Save</button>
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

		$('#employee_frm').submit(function(e) {
			e.preventDefault();
			$('#employee_frm [name="submit"]').attr('disabled', true);
			$('#employee_frm [name="submit"]').html('Saving');

			var formData = new FormData(this);

			$.ajax({
				url: 'save_employee.php',
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
						console.log("The server response was not JSON: ", resp);
					}
				}

			});
		});

		$('.remove_employee').click(function() {
			var id = $(this).attr('data-id');
			var _conf = confirm("Are you sure to delete this data ?");
			if (_conf == true) {
				$.ajax({
					url: 'delete_employee.php?id=' + id,
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
		$('.edit_employee').click(function() {
			var $id = $(this).attr('data-id');
			$.ajax({
				url: 'get_employee.php',
				method: "POST",
				data: {
					id: $id
				},
				error: err => console.log(),
				success: function(resp) {
					if (typeof resp != undefined) {
						resp = JSON.parse(resp)
						$('[name="id"]').val(resp.id)
						$('[name="firstname"]').val(resp.firstname)
						$('[name="emp_no"]').val(resp.emp_no)
						$('[name="lastname"]').val(resp.lastname)
						$('[name="middlename"]').val(resp.middlename)
						$('[name="department"]').val(resp.department)
						$('[name="position"]').val(resp.position)
						$('#new_employee .modal-title').html('Edit Employee')
						$('#new_employee').modal('show')
					}
				}
			})

		});
		$('#new_emp_btn').click(function() {
			$('[name="id"]').val('')
			$('[name="firstname"]').val('')
			$('[name="emp_no"]').val('')
			$('[name="lastname"]').val('')
			$('[name="middlename"]').val('')
			$('[name="department"]').val('')
			$('[name="position"]').val('')
			$('#new_employee .modal-title').html('Add New Employee')
			$('#new_employee').modal('show')
		})
	});
</script>

</html>