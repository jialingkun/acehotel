<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />

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
	<?php $this->load->view("admin/header");?>
	<div class="lds-ring">
		<div></div>
		<div></div>
		<div></div>
		<div></div>
	</div>
	<div class="container">
		<div class="row" style="margin-top:10%;">
			<div class="col-sm-12" style="padding:2%;">
				<div class="tab-content">
					<div id="all_owner" class="tab-pane active"><br>
						<div class="list-group">

						</div>
					</div>
				</div>
			</div>
		</div>
		<a class="float" data-toggle="modal" data-target="#inputTransaksi">
			<i class="fa fa-plus my-float text-white" aria-hidden="true"></i>
		</a>
		<div class="modal fade" id="inputTransaksi" tabindex="-1" role="dialog" aria-labelledby="inputTransaksiLabel"
			aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="inputTransaksiLabel">Tambah Owner</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="col-12 no-padding">
							<form id="insert_owner" onsubmit="insertmember(event)">
								<div class="form-group">
									<label for="usr">Username Owner</label>
									<input type="text" name="username" class="form-control" pattern="^[A-Za-z0-9-_]+$"
										required>
								</div>
								<div class="form-group">
									<label for="alamat">Password</label>
									<input type="password" name="password" class="form-control">
								</div>
								<div class="form-group">
									<label for="alamat">Nama Owner</label>
									<input type="text" name="nama" class="form-control" pattern="^[A-Za-z ,.'-]+$"
										required>
								</div>
								<div class="form-group">
									<label for="alamat">Telepon Owner</label>
									<input type="text" name="telepon" class="form-control"
										placeholder="format: 081333777999" pattern="^[0-9]+$" required>
								</div>
								<div class="form-group">
									<button type="submit" id="submitButton" class="btn btn-primary btn-md float-right">
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
		<div class="modal fade" id="editTransaksi" tabindex="-1" role="dialog" aria-labelledby="editTransaksiLabel"
			aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="editTransaksiLabel">Edit Owner</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="col-12 no-padding">
							<form id="edit_owner" onsubmit="editUser(event)">
								<div class="form-group">
									<label for="usr">Username Owner</label>
									<h5 id="eUsername"> </h5>
								</div>
								<div class="form-group">
									<label for="alamat">Password</label>
									<input type="password" name="password" class="form-control">
								</div>
								<div class="form-group">
									<label for="alamat">Nama Owner</label>
									<input type="text" id="eNama" name="nama" class="form-control"
										pattern="^[A-Za-z ,.'-]+$" required>
								</div>
								<div class="form-group">
									<label for="alamat">Telepon Owner</label>
									<input type="text" id="eTelepon" name="telepon" class="form-control"
										placeholder="format: 081333777999" pattern="^[0-9]+$" required>
								</div>
								<div class="form-group">
									<button id="eDelete" class="btn btn-danger btn-md float-left">
										<span onclick="deleteOwner(getCookie('edit_owner'))">Delete Owner</span></button>
									<button type="submit" id="eButton" class="btn btn-primary btn-md float-right">
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
	<?php $this->load->view("admin/footer");?>
</body>
<script src="<?=base_url("dist/js/jquery.min.js");?>"></script>
<script src="<?=base_url("dist/js/popper.min.js");?>"></script>
<script src="<?=base_url("dist/js/bootstrap.min.js");?>"></script>
<script src="<?=base_url("dist/js/function.js");?>"></script>

<script id="list_owner" type="text/HTML">
	<a href="#" class="list-group-item list-group-item-action mgn-list owner-data">
	<div class="row"  data-toggle="modal" data-target="#editTransaksi" id="listOwner">
		<div class="col-9" >
        	<h5 class="mb-1" id="usernameOwner"></h5>
			<span class="d-block" id="namaOwner"></span>
			<span class="sm-font" id="tlpOwner"></span>
		</div>
		<div class="col-3" style="margin:auto; color:#1C7CD5" >
			<span>Edit</span>
		</div>
	</div>
    </a>
</script>

<script>
	$(document).ready(function () {
		$("#management_footer").addClass('is-active');
		$("#header_title").text('Management Owner');
	});

	$('.lds-ring').show();
	$('.container').hide();

	$.when(getAllOwner()).done(function (getOwner) {
		$('.lds-ring').hide();
		$('.container').show();

		for (var i = 0; i < getOwner.length; i++) {
			var tmp = $('#list_owner')[0].innerHTML;
			tmp = $.parseHTML(tmp);

			$(tmp).find('#usernameOwner').text(getOwner[i].username_owner);
			$(tmp).find('#namaOwner').text(getOwner[i].nama_owner);
			$(tmp).find('#tlpOwner').text(getOwner[i].telepon_owner);
			$(tmp).data('id', getOwner[i].username_owner);
			$(tmp).appendTo('#all_owner');
		}
	});

	$(document).on('click', '.owner-data', function () {
		var usernameOwner = $(this).data('id');
	});

	function getAllOwner() {
		return $.ajax(
			"<?php echo base_url() ?>index.php/get_all_owner", {
				dataType: 'json'
			}
		);
	}

	function insertmember(e) {
		if (confirm("Apakah anda yakin ?")) {
			e.preventDefault();
			urls = "insert_owner";
			var dataString = $("#insert_owner").serialize();

			$("#submit").html("tunggu..");
			$("#submitButton").prop("disabled", true);

			$.ajax({
				url: "<?php echo base_url() ?>index.php/" + urls,
				type: 'POST',
				data: dataString,
				success: function (response) {
					if (response.startsWith("success", 0)) {
						location.reload();
					} else {
						alert(response);
						$("#submit").html("Submit");
						$("#submitButton").prop("disabled", false);
					}
				},
				error: function () {
					alert(response);
					$("#submitButton").prop("disabled", false);
				}
			});
		} else {}
	}

	function editUser(e) {
		if (confirm("Apakah anda yakin ?")) {
			e.preventDefault();
			urls = "update_owner/";
			var dataString = $("#edit_owner").serialize();
			var id = getCookie('edit_owner');

			$("#submit").html("tunggu..");
			$("#eButton").prop("disabled", true);

			$.ajax({
				url: "<?php echo base_url() ?>index.php/" + urls + id,
				type: 'POST',
				data: dataString,
				success: function (response) {
					if (response.startsWith("success", 0)) {
						location.reload();
					} else {
						alert(response);
						$("#submit").html("Submit");
						$("#eButton").prop("disabled", false);
					}
				},
				error: function () {
					alert(response);
					$("#eButton").prop("disabled", false);
				}
			});
		} else {}
	}

	function deleteOwner(id) {
		$.ajax({
				url: "<?php echo base_url() ?>index.php/delete_owner/" + id,
				success: function (response) {
					if (response==="success") {
						location.reload();
					}
				}
			});
	}

	$(document).on('click', '#listOwner', function () {
		let username = $(this).find('#usernameOwner').text();
		let nama = $(this).find('#namaOwner').text();
		let telepon = $(this).find('#tlpOwner').text();

		$('#eUsername').text(username);
		$('#eNama').val(nama);
		$('#eTelepon').val(telepon);

		setCookie('edit_owner', username);

	});

</script>
