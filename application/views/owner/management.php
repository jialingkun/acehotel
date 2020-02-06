<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="<?=base_url("dist/css/bootstrap.min.css");?>">
	<link rel="stylesheet" href="<?=base_url("dist/css/bootstrap-grid.min.css");?>">
	<link rel="stylesheet" href="<?=base_url("dist/css/style.css");?>">
	<link rel="stylesheet" href="<?=base_url("dist/css/font-awesome.min.css");?>">

	<title>DASHBOARD ADMIN</title>
</head>
<style>
	.is-active {
		background-color: #1C7CD5;
		color: white !important;

	}

	.square-box {
		float: left;
		position: relative;
		width: 50%;
		overflow: hidden;
		border: solid 1px #ddd;
	}

	.square-box:before {
		content: "";
		display: block;
		padding-top: 100%;
	}

	.square-content {
		position: absolute;
		top: 0;
		left: 0;
		bottom: 0;
		right: 0;
		padding: 15% 0;

	}

	.square-content div {
		display: table;
		width: 100%;
		height: 100%;

	}

	.sm-font {
		font-size: 0.9rem;
		color: grey;
	}

	.mgn-list {
		margin-top: 3%;
	}

	.dashboard-big-font {
		font-size: 2rem;
	}

	.float {
		position: fixed;
		width: 60px;
		height: 60px;
		bottom: 10%;
		right: 10%;
		background-color: #1C7CD5;
		color: #FFF;
		border-radius: 50px;
		text-align: center;
		box-shadow: 2px 2px 3px #999;
		z-index: 100;
	}

	.my-float {
		margin-top: 22px;
	}

</style>

<body>
	<?php $this->load->view("owner/header");?>
	<div class="lds-ring">
		<div></div>
		<div></div>
		<div></div>
		<div></div>
	</div>
	<div class="container">
		<div class="row" style="margin-top:10%;">
			<div class="col-sm-12" style="margin-bottom:20%;">
				<div class="tab-content">
					<div id="hotel" class="tab-pane active"><br>
						<div class="list-group">
						</div>
					</div>
				</div>
			</div>

			<div class="modal fade" id="editReceptionist" tabindex="-1" role="dialog"
				aria-labelledby="editReceptionistLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="editReceptionistLabel">Edit Receptionist</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="col-12 no-padding">
								<form id="edit_receptionist" onsubmit="editUser(event)">
									<div class="form-group">
										<label for="usr">Username </label>
										<input type="text" id="rUsername" name="username_receptionist"
											class="form-control" pattern="^[a-zA-Z0-9_]+$" required>
									</div>
									<div class="form-group">
										<label for="usr">Password </label>
										<input type="text" id="rPassword" name="password"
											class="form-control" pattern="^[a-zA-Z0-9_]+$" placeholder="KOSONGKAN JIKA PASSWORD TETAP">
									</div>
									<div class="form-group">
										<label for="alamat">Nama </label>
										<input type="text" id="rNama" name="nama" class="form-control"
											pattern="^[A-Za-z ,.'-]+$" required>
									</div>
									<div class="form-group">
										<label for="alamat">Telepon </label>
										<input type="text" id="rTelepon" name="telepon"
											class="form-control" placeholder="format: 081333777999" pattern="^[0-9]+$"
											required>
									</div>
									<div class="form-group">
										<button type="submit" id="submitButton"
											class="btn btn-primary btn-md float-right">
											<span id="submit">Submit</span></button>
									</div>
							</div>
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php $this->load->view("owner/footer");?>
	<?php $this->load->view("function");?>
</body>
<script src="<?=base_url("dist/js/jquery.min.js");?>"></script>
<script src="<?=base_url("dist/js/popper.min.js");?>"></script>
<script src="<?=base_url("dist/js/bootstrap.min.js");?>"></script>

<script id="list_hotel" type="text/HTML">
	<a class="list-group-item list-group-item-action flex-column align-items-start mgn-list" id="detailHotel" data-toggle="modal" data-target="#editReceptionist">
		<div class="w-100">
			<h6 class="mb-1" id="namaHotel"></h6>
		</div>
	</a>
</script>

<script>
	$(document).ready(function () {
		$("#management_footer").addClass('is-active');
		$("#header_title").text('Management');
	});
	var id_rec = "";
	$.when(getLoginCookieServer('ownerCookie')).done(function (response) {
		$.ajax({
			url: "<?php echo base_url() ?>index.php/get_hotel_by_owner/" + response,
			type: 'get',
			dataType: "json",
			beforeSend: function () {
				$('.lds-ring').show();
				$('.container').hide();
			},
			success: function (response) {
				for (i = 0; i < response.length; i++) {
					// console.log(response[i]);
					var tmp = $('#list_hotel')[0].innerHTML;
					tmp = $.parseHTML(tmp);
					$(tmp).data('id', response[i].id_hotel);
					$(tmp).find('#namaHotel').text(response[i].nama_hotel);
					$(tmp).appendTo('#hotel');
				}
				$('.lds-ring').hide();
				$('.container').show();
			}
		});
	});

	$(document).on('click', '#detailHotel', function () {
		var id_hotel = $(this).data('id');
		$.ajax({
			url: "<?php echo base_url() ?>index.php/get_receptionist_by_hotel/" + id_hotel,
			type: 'get',
			dataType: "json",
			success: function (response) {
				if (response != '') {
					console.log(response);
					id_rec = response[0].username_receptionist;
					$('#rUsername').val(response[0].username_receptionist);
					$('#rPassword').val(response[0].password_receptionist);
					$('#rNama').val(response[0].nama_receptionist);
					$('#rTelepon').val(response[0].telepon_receptionist);
				} else {
					$('#rUsername').val('');
					$('#rPassword').val('');
					$('#rNama').val('');
					$('#rTelepon').val('');
				}
			}
		});
	});

	function editUser(e) {
		if (confirm("Apakah anda yakin ?")) {
			e.preventDefault();
			urls = "update_receptionist/";
			var dataString = $("#edit_receptionist").serialize();

			$("#submit").html("tunggu..");
			$("#submit").prop("disabled", true);

			$.ajax({
				url: "<?php echo base_url() ?>index.php/" + urls + id_rec,
				type: 'POST',
				data: dataString,
				success: function (response) {
					if (response.startsWith("success", 0)) {
						location.reload();
					} else {
						alert(response);
						$("#submit").html("Submit");
						$("#submit").prop("disabled", false);
					}
				},
				error: function () {
					alert(response);
					$("#submit").prop("disabled", false);
				}
			});
		} else {}
	}

</script>
