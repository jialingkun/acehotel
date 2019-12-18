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
	<?php $this->load->view("admin/header");?>
	<div class="container">
		<div class="row" style="margin-top:20%; margin-left:1%; margin-right:1%;">
			<div class="col-sm-12 text-center">
				<h3><span class="badge badge-white" id="nama_hotel"></span></h3>
			</div>
			<div>
				<ul class="nav nav-tabs">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#upcoming">COMING</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#inhouse">INHOUSE</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#completed">COMPLETE</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="col-sm-12">
			<span>Today :</span>
			<span class="sm-font">7 bookings</span>
			<span class="sm-font">.</span>
			<span class="sm-font">7 rooms</span>
		</div>
		<div class="col-sm-12" style="padding:2%;">

			<div class="tab-content">
				<div id="upcoming" class="tab-pane active"><br>
					<div class="list-group">
						<a href="#"
							class="list-group-item list-group-item-action flex-column align-items-start mgn-list">
							<div class="d-flex w-100 ">
								<h5 class="mb-1">Benny Hartono</h5>
							</div>
							<div class="mgn-list">
								<span class="mb-1">1 Room</span>
								.
								<span class="mb-1">1 Night</span>
								.
								<span class="mb-1">#HFGDJLS</span>
							</div>
							<div class="mgn-list">
								<button type="button" class="btn btn-danger btn-sm">12:00 PM-03:00 PM</button>
								<span class="sm-font">Rp 110.000</span>
							</div>
						</a>
					</div>
				</div>
				<div id="inhouse" class="tab-pane fade"><br>
					<div class="list-group">
						<a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
							<div class="d-flex w-100 ">
								<h5 class="mb-1">Benny Hartono</h5>
							</div>
							<div class="mgn-list">
								<span class="mb-1">1 Room</span>
								.
								<span class="mb-1">1 Night</span>
								.
								<span class="mb-1">#HFGDJLS</span>
							</div>
							<div class="mgn-list">
								<button type="button" class="btn btn-success btn-sm">Paid</button>
							</div>
						</a>
						<a href="#"
							class="list-group-item list-group-item-action flex-column align-items-start mgn-list">
							<div class="d-flex w-100 ">
								<h5 class="mb-1">Benny Hartono</h5>
							</div>
							<div class="mgn-list">
								<span class="mb-1">1 Room</span>
								.
								<span class="mb-1">1 Night</span>
								.
								<span class="mb-1">#HFGDJLS</span>
							</div>
							<div class="mgn-list">
								<button type="button" class="btn btn-danger btn-sm">12:00 PM-03:00 PM</button>
								<span class="sm-font">Rp 110.000</span>
							</div>
						</a>
						<a href="#"
							class="list-group-item list-group-item-action flex-column align-items-start mgn-list">
							<div class="d-flex w-100 ">
								<h5 class="mb-1">Benny Hartono</h5>
							</div>
							<div class="mgn-list">
								<span class="mb-1">1 Room</span>
								.
								<span class="mb-1">1 Night</span>
								.
								<span class="mb-1">#HFGDJLS</span>
							</div>
							<div class="mgn-list">
								<button type="button" class="btn btn-success btn-sm">Paid</button>
							</div>
						</a>
						<a href="#"
							class="list-group-item list-group-item-action flex-column align-items-start mgn-list">
							<div class="d-flex w-100 ">
								<h5 class="mb-1">Benny Hartono</h5>
							</div>
							<div class="mgn-list">
								<span class="mb-1">1 Room</span>
								.
								<span class="mb-1">1 Night</span>
								.
								<span class="mb-1">#HFGDJLS</span>
							</div>
							<div class="mgn-list">
								<button type="button" class="btn btn-success btn-sm">Paid</button>
							</div>
						</a>
					</div>
				</div>
				<div id="completed" class="tab-pane fade"><br>
					<div class="list-group">
						<a href="#"
							class="list-group-item list-group-item-action flex-column align-items-start mgn-list">
							<div class="d-flex w-100 ">
								<h5 class="mb-1">Benny Hartono</h5>
							</div>
							<div class="mgn-list">
								<span class="mb-1">1 Room</span>
								.
								<span class="mb-1">1 Night</span>
								.
								<span class="mb-1">#HFGDJLS</span>
							</div>
							<div class="mgn-list">
								<span class="sm-font">Rp 110.000</span>
								<span class="sm-font">
									earned</span>
							</div>
						</a>
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
						<h5 class="modal-title" id="inputTransaksiLabel">Add Booking</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="col-12 no-padding">
							<div class="form-group">
								<label for="usr">Nama</label>
								<input type="text" class="form-control">
							</div>
							<div class="form-group">
								<label for="tlp">Telepon</label>
								<input type="text" class="form-control">
							</div>
							<div class="input-group">
								<p for="jk">Jenis Kamar</p>
							</div>
							<div class="input-group">
								<input type="text" class="form-control">
								<div class="input-group-append">
									<button class="btn btn-outline-secondary dropdown-toggle" type="button"
										data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
									<div class="dropdown-menu">
										<a class="dropdown-item" href="#">Action</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-success">Add</button>
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

<!-- <script src="https://use.fontawesome.com/450c9ae375.js"></script> -->

<script>
	$(document).ready(function () {
		$("#booking_footer").addClass('is-active');
		$("#header_title").text('Bookings');

		$('#nama_hotel').text(getCookie('nama_hotel'));
	});

	function getCookie(cname) {
		var name = cname + "=";
		var decodedCookie = decodeURIComponent(document.cookie);
		var ca = decodedCookie.split(';');
		for (var i = 0; i < ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0) == ' ') {
				c = c.substring(1);
			}
			if (c.indexOf(name) == 0) {
				return c.substring(name.length, c.length);
			}
		}
		return "";
	}

</script>
