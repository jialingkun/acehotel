<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="<?=base_url("dist/css/bootstrap.min.css");?>">
	<link rel="stylesheet" href="<?=base_url("dist/css/bootstrap-grid.min.css");?>">
	<link rel="stylesheet" href="<?=base_url("dist/css/style.css");?>">

	<title>LOGIN</title>
</head>
<style>
	.square-box {
		float: left;
		position: relative;
		width: 50%;
		overflow: hidden;
		border: solid 1px grey;
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
		padding: 25% 0;

	}

	.square-content div {
		display: table;
		width: 100%;
		height: 100%;

	}

</style>

<body>
	<?php $this->load->view("admin/header");?>

	<!-- <div class="row global-row">
		<div class="col-sm-12 no-padding">
			<div class="login-box">
				<h2 class="text-center"><small>ACE HOTEL</small></h2>
				<p class="text-center grey-text"><small>As Receptionist</small></p>
				<div class="form-group margin-top">
					<label for="usr">Username:</label>
					<input type="text" class="form-control">
				</div>
				<div class="form-group">
					<label for="usr">Password:</label>
					<input type="text" class="form-control">
				</div>
				<button type="button" class="btn btn-primary center-item">Sign In</button>
			</div>
		</div>
	</div> -->

	<div class="container">
		<div class="row" style="margin-top:20%; margin-left:1%; margin-right:1%;">
			<div class="col-6 ">
				<p>Today Report</p>
			</div>
			<div class="col-6 ">
				<div class="btn-group">
					<button type="button" class="btn btn-sm btn-primary">Hotel Pertama</button>
					<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"
						data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<span class="sr-only"></span>
					</button>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="#">Action</a>
					</div>
				</div>
			</div>

			<div class="col-12" style="margin-top:5%;">
				<div class="square-box">
					<div class="square-content">
						<div class="text-center">
							<h5>To Check In</h5>
							<span>01</span>
							<span>/04</span>
							<p>Bookings</p>
						</div>
					</div>
				</div>
				<div class="square-box">
					<div class="square-content">
						<div class="text-center">
							<h5>To Check In</h5>
							<span>01</span>
							<span>/04</span>
							<p>Bookings</p>
						</div>
					</div>
				</div>
				<div class="square-box">
					<div class="square-content">
						<div class="text-center">
							<h5>To Check In</h5>
							<span>01</span>
							<span>/04</span>
							<p>Bookings</p>
						</div>
					</div>
				</div>
				<div class="square-box">
					<div class="square-content">
						<div class="text-center">
							<h5>To Check In</h5>
							<span>01</span>
							<span>/04</span>
							<p>Bookings</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php $this->load->view("admin/footer");?>
</body>
<script src="<?=base_url("dist/js/popper.min.js");?>"></script>
<script src="<?=base_url("dist/js/jquery.min.js");?>"></script>
<script src="<?=base_url("dist/js/bootstrap.min.js");?>"></script>


</html>
