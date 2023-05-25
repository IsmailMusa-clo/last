<!DOCTYPE html>
<html lang="eng">

<head>
	<title>تسجيل حضور الموظف</title>
	<?php include('header.php') ?>
</head>

<body>
	<div id="main" class="bg-info">
		<div class="container-fluid admin2">
			<div class="attendance_log_field">

				<div id="company-logo-field" class="mb-4">
					<h4><img src="assets/images/O4Y28G0.jpg" width="70" style="border-radius:50%"> </h4>
					<!-- <img src="company_logo.jpg" alt=""> -->
				</div>
				<div class="col-md-4 offset-md-4">
					<div class="card">
						<div class="card-title"></div>
						<div class="card-body">
							<div class="text-center">
								<h4><?php echo date('F d,Y') ?> <span id="now"></span></h4>
							</div>
							<div class="col-md-12">
								<div class="text-center mb-4" id="log_display"></div>
								<form action="" id="att-log-frm">
									<div class="form-group">
										<label for="eno" class="control-label">أدخل رقم الموظف</label>
										<input type="text" id="eno" name="eno" class="form-control col-sm-12">
									</div>
									<center>
										<button type="button" class='btn btn-sm btn-primary log_now col-sm-2' data-id="1">IN AM</button>
										<button type="button" class='btn btn-sm btn-primary log_now col-sm-2' data-id="3">IN PM</button>
									</center>
									<div class="loading" style="display: none">
										<center>Please wait...</center>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="employeeModal" tabindex="-1" role="dialog" aria-labelledby="employeeModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="employeeModalLabel">بيانات الموظف</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="text-center mb-3">
						<img id="employeeAvatar" width="100" height="100" src="" alt="Avatar">
					</div>
					<dl>
						<div class="row text-center">
							<div class="col-md-4">
								<dt>اسم الموظف:</dt>
							</div>
							<div class="col-md-8">
								<dd id="employeeName"></dd>
							</div>

							<div class="col-md-4">
								<dt>رقم الموظف:</dt>
							</div>
							<div class="col-md-8">
								<dd id="employeeNo"></dd>
							</div>
							<div class="col-md-4">

								<dt>القسم:</dt>
							</div>
							<div class="col-md-8">

								<dd id="employeeDepartment"></dd>
							</div>
							<div class="col-md-4">

								<dt>المنصب:</dt>
							</div>
							<div class="col-md-8">

								<dd id="employeePosition"></dd>
							</div>
						</div>
					</dl>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
				</div>
			</div>
		</div>
	</div>

	<script>
		$(document).ready(function() {
			setInterval(function() {
				var time = new Date();
				var now = time.toLocaleString('en-US', {
					hour: 'numeric',
					minute: 'numeric',
					second: 'numeric',
					hour12: true
				});
				$('#now').html(now);
			}, 500);

			$('.log_now').each(function() {
				$(this).click(function() {
					var _this = $(this);
					var eno = $('[name="eno"]').val();
					if (eno == '') {
						alert("Please enter your employee number");
					} else {
						$('.log_now').hide();
						$('.loading').show();
						$.ajax({
							url: './admin/time_log.php',
							method: 'POST',
							data: {
								type: _this.attr('data-id'),
								eno: $('[name="eno"]').val()
							},
							error: err => console.log(err),
							success: function(resp) {
								if (typeof resp != undefined) {
									resp = JSON.parse(resp);

									if (resp.status == 1) {
										$('[name="eno"]').val('');
										$('#log_display').html(resp.msg);
										$('.log_now').show();
										$('.loading').hide();

										// Set employee data in modal
										$('#employeeName').text(resp.data.employee_name);
										$('#employeeNo').text(resp.data.employee_id);
										$('#employeeDepartment').text(resp.data.department);
										$('#employeePosition').text(resp.data.position);
										$('#employeeAvatar').attr('src', 'admin/' + resp.data.avatar);

										// Show employee modal
										$('#employeeModal').modal('show');
									} else {
										alert(resp.msg);
										$('.log_now').show();
										$('.loading').hide();
									}
								}
							}
						});
					}
				});
			});
		});
	</script>

</html>