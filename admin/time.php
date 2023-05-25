<!DOCTYPE html>
<?php
require_once 'auth.php';
?>
<html lang="eng">

<head>
	<title>قائمة الفترة</title>
	<?php include('header.php') ?>
</head>

<body>
	<?php include('nav_bar.php') ?>

	<div class="container-fluid admin">
		<div class="alert alert-primary">الفترة</div>
		<div class="modal fade" id="edit_time" tabindex="-1" role="dialog" aria-labelledby="myModallabel">
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
						<th>الفترة</th>
						<th>تبدأ من</th>
						<th>تنتهي عند</th>
						<th>------</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$time_qry = $conn->query("SELECT * FROM `time`");
					while ($row = $time_qry->fetch_array()) {
					?>
						<tr>
							<td><?php echo $row['name'] ?></td>
							<td><?php echo $row['start_time'] ?></td>
							<td><?php echo $row['end_time'] ?></td>
							<td>
								<center>
									<button class="btn btn-sm btn-outline-primary edit_time" data-id="<?php echo $row['id'] ?>" type="button"><i class="fa fa-edit"></i></button>
									<button class="btn btn-sm btn-outline-danger remove_time" data-id="<?php echo $row['id'] ?>" type="button"><i class="fa fa-trash"></i></button>
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

	<div class="modal fade" id="new_time" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">

					<h4 class="modal-title" id="myModallabel">إضافة توقيت جديد</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<form id='time_frm'>
					<div class="modal-body">
						<div class="form-group">
							<label>بداية الفترة</label>
							<input type="hidden" name="id" />
							<input type="time" name="start_time" required="required" class="form-control" />
						</div>
						<div class="form-group">
							<label>نهاية الفترة </label>
							<input type="time" name="end_time" placeholder="(optional)" class="form-control" />
						</div>
						<div class="form-group">
							<label>مسمى الفترة :</label>
							<input type="text" name="name" required="required" class="form-control" />
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

		$('#time_frm').submit(function(e) {
			e.preventDefault()
			$('#time_frm [name="submit"]').attr('disabled', true)
			$('#time_frm [name="submit"]').html('Saving')
			$.ajax({
				url: 'save_time.php',
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

		$('.remove_time').click(function() {
			var id = $(this).attr('data-id');
			var _conf = confirm("Are you sure to delete this data ?");
			if (_conf == true) {
				$.ajax({
					url: 'delete_time.php?id=' + id,
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
		$('.edit_time').click(function() {
			var $id = $(this).attr('data-id');
			$.ajax({
				url: 'get_time.php',
				method: "POST",
				data: {
					id: $id
				},
				error: err => console.log(),
				success: function(resp) {
					if (typeof resp != undefined) {
						resp = JSON.parse(resp)
						$('[name="id"]').val(resp.id)
						$('[name="name"]').val(resp.name)
						$('[name="start_time"]').val(resp.start_time)
						$('[name="end_time"]').val(resp.end_time)
						$('#new_time .modal-title').html('Edit time')
						$('#new_time').modal('show')
					}
				}
			})

		});
		$('#new_emp_btn').click(function() {
			$('[name="id"]').val('')
			$('[name="name"]').val('')
			$('[name="start_time"]').val('')
			$('[name="end_time"]').val('')
			$('#new_time .modal-title').html('Add New time')
			$('#new_time').modal('show')
		})
	});
</script>

</html>