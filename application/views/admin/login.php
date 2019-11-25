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
	.is-active {
		background-color: #1C7CD5;
		color: white !important;

	}

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
		z-index:100;
	}

	.my-float {
		margin-top: 22px;
	}

</style>

<body>
	<?php $this->load->view("admin/header");?>
	<!-- 
	LOGIN PAGE
 -->
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

	<!-- 
	DASHBOARD
 -->
	<!-- <div class="container">
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
							<h5 class="text-success">To Check In</h5>
							<span class="dashboard-big-font">01</span>
							<span class="text-secondary">/</span>
							<span class="text-secondary">04</span>
							<p>Bookings</p>
						</div>
					</div>
				</div>
				<div class="square-box">
					<div class="square-content">
						<div class="text-center">
							<h5 class="text-danger">To Check In</h5>
							<span class="dashboard-big-font">01</span>
							<span class="text-secondary">/</span>
							<span class="text-secondary">04</span>
							<p>Bookings</p>
						</div>
					</div>
				</div>
				<div class="square-box">
					<div class="square-content">
						<div class="text-center">
							<h5 class="text-warning">In House</h5>
							<span class="dashboard-big-font">01</span>
							<span class="text-secondary">/</span>
							<span class="text-secondary">04</span>
							<p>Bookings</p>
						</div>
					</div>
				</div>
				<div class="square-box">
					<div class="square-content">
						<div class="text-center">
							<h5  class="text-primary">EOD Occ.</h5>
							<span class="dashboard-big-font">4</span>
							<span class="text-secondary">%</span>
							<p>Bookings</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> -->
	<!-- 
	BOOKING LIST
 -->
	<!-- <div class="container">
		<div class="row" style="margin-top:20%; margin-left:1%; margin-right:1%;">
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
			<span>Today :</span> <span class="sm-font">7 bookings</span> <span class="sm-font">.</span> <span
				class="sm-font">7 rooms</span>
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
								<span class="mb-1">1 Room</span> . <span class="mb-1">1 Night</span> . <span
									class="mb-1">#HFGDJLS</span>
							</div>
							<div class="mgn-list">
								<button type="button" class="btn btn-danger btn-sm">12:00 PM-03:00 PM</button> <span
									class="sm-font">Rp 110.000</span>
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
								<span class="mb-1">1 Room</span> . <span class="mb-1">1 Night</span> . <span
									class="mb-1">#HFGDJLS</span>
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
								<span class="mb-1">1 Room</span> . <span class="mb-1">1 Night</span> . <span
									class="mb-1">#HFGDJLS</span>
							</div>
							<div class="mgn-list">
								<button type="button" class="btn btn-danger btn-sm">12:00 PM-03:00 PM</button> <span
									class="sm-font">Rp 110.000</span>
							</div>
						</a>
						<a href="#"
							class="list-group-item list-group-item-action flex-column align-items-start mgn-list">
							<div class="d-flex w-100 ">
								<h5 class="mb-1">Benny Hartono</h5>
							</div>
							<div class="mgn-list">
								<span class="mb-1">1 Room</span> . <span class="mb-1">1 Night</span> . <span
									class="mb-1">#HFGDJLS</span>
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
								<span class="mb-1">1 Room</span> . <span class="mb-1">1 Night</span> . <span
									class="mb-1">#HFGDJLS</span>
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
								<span class="mb-1">1 Room</span> . <span class="mb-1">1 Night</span> . <span
									class="mb-1">#HFGDJLS</span>
							</div>
							<div class="mgn-list">
								<span class="sm-font">Rp 110.000</span>
								<span class="sm-font"> earned</span>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
		<a class="float" data-toggle="modal" data-target="#inputTransaksi">
			<i class="fa fa-plus my-float text-white"></i>
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
	</div> -->

	<!-- 
		MANAJEMEN
	 -->
	<!-- <div class="row" style="margin-top:20%; margin-left:1%; margin-right:1%;">
		<a href="#" class="list-group-item list-group-item-action flex-column align-items-start mgn-list">
			<div class="d-flex w-100 ">
				<h5 class="mb-1">Manajemen Hotel</h5>
			</div>
		</a>
		<a href="#" class="list-group-item list-group-item-action flex-column align-items-start mgn-list">
			<div class="d-flex w-100 ">
				<h5 class="mb-1">Manajemen Owner</h5>
			</div>
		</a>
	</div> -->

	<!-- 
	MANAGE HOTEL 
-->
	<!-- <div class="row" style="margin-top:20%; margin-left:1%; margin-right:1%;">
		<a href="#" class="list-group-item list-group-item-action flex-column align-items-start mgn-list">
			<div style="float:left;">
				<h5>Hotel Mahadewa</h5>
				<span>Jl. Mawar no.25 Malang</span> <br>
				<span class="sm-font">Tlp :</span>
				<span class="sm-font">081111444222</span>
			</div>
			<div style="float:right; margin-top:8%;">
				<p class="text-primary">Detail</p>
			</div>
		</a>
		<a href="#" class="list-group-item list-group-item-action flex-column align-items-start mgn-list">
			<div style="float:left;">
				<h5>Hotel Padasuka</h5>
				<span>Jl. Kembarsiam no.21 Malang</span> <br>
				<span class="sm-font">Tlp :</span>
				<span class="sm-font">0851129944000</span>
			</div>
			<div style="float:right; margin-top:8%;">
				<p class="text-primary">Detail</p>
			</div>
		</a>
		<a class="float" data-toggle="modal" data-target="#editHotel">
		<i class="fa fa-plus my-float text-white"></i>
	</a>
	<div class="modal fade" id="editHotel" tabindex="-1" role="dialog" aria-labelledby="editHotel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="inputTransaksiLabel">Add/ Edit Hotel</h5>
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
					<button type="button" class="btn btn-success">Submit</button>
				</div>
			</div>
		</div>
	</div>
	</div> -->

	<!-- 
		MANAGE KAMAR
	 -->
	<!-- <a class="float" data-toggle="modal" data-target="#editKamar">
		<i class="fa fa-plus my-float text-white"></i>
	</a>

	<div class="container">
		<div class="row" style="margin-top:20%; margin-left:1%; margin-right:1%;">
			<div class="col-sm-12">
				<h5>Hotel Mahadewa</h5>
				<span>Jl. Mawar no.25 Malang</span><br>
				<span class="sm-font">Tlp :</span>
				<span class="sm-font">081111444222</span><br>
				<button type="button" data-toggle="modal" data-target="#editHotel"
					class="btn btn-sm btn-primary mgn-list" style="width:60px;">Edit</button>
				<hr>
			</div>

			<a href="#" class="mgn-list list-group-item list-group-item-action flex-column align-items-start mgn-list" data-toggle="modal" data-target="#editKamar">
				<div style="float:left;">
					<h5>Deluxe Room</h5>
					<span class="sm-font">Jumlah :</span> <span>Jumlah</span> <br>
					<span class="sm-font">Max Guest :</span> <span>2</span> <br>
					<span class="sm-font">Harga :</span> <span>Rp 110.000</span> <br>

				</div>
				<div style="float:right; margin-top:13%;">
					<p class="text-primary">Edit</p>
				</div>
			</a>
			<a href="#" class="mgn-list list-group-item list-group-item-action flex-column align-items-start mgn-list" data-toggle="modal" data-target="#editKamar">
				<div style="float:left;">
					<h5>Deluxe Room</h5>
					<span class="sm-font">Jumlah :</span> <span>Jumlah</span> <br>
					<span class="sm-font">Max Guest :</span> <span>2</span> <br>
					<span class="sm-font">Harga :</span> <span>Rp 110.000</span> <br>

				</div>
				<div style="float:right; margin-top:13%;">
					<p class="text-primary">Edit</p>
				</div>
			</a>
		</div>
	</div>

	<div class="modal fade" id="editHotel" tabindex="-1" role="dialog" aria-labelledby="editHotel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="inputTransaksiLabel">Add/Edit Hotel</h5>
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
					<button type="button" class="btn btn-success">Submit</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="editKamar" tabindex="-1" role="dialog" aria-labelledby="editKamar" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="inputTransaksiLabel">Add/Edit Kamar</h5>
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
					<button type="button" class="btn btn-success">Submit</button>
				</div>
			</div>
		</div>
	</div> -->

	<!-- <div class="row" style="margin-top:20%; margin-left:1%; margin-right:1%;">
		<a href="#" class="list-group-item list-group-item-action flex-column align-items-start mgn-list" data-toggle="modal" data-target="#editReceptionist">
			<div style="float:left;">
				<h5>Rony Purnama</h5>
				<span class="sm-font">Username :</span><span> rony123</span> <br>
				<span class="sm-font">Tlp :</span><span> 081111444222</span>
			</div>
			<div style="float:right; margin-top:8%;">
				<p class="text-primary">Edit</p>
			</div>
		</a>
		<a class="float" data-toggle="modal" data-target="#editReceptionist">
			<i class="fa fa-plus my-float text-white"></i>
		</a>
		<div class="modal fade" id="editReceptionist" tabindex="-1" role="dialog" aria-labelledby="editHotel"
			aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="inputTransaksiLabel">Add/ Edit Hotel</h5>
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
						<button type="button" class="btn btn-success">Submit</button>
					</div>
				</div>
			</div>
		</div> -->

		<?php $this->load->view("admin/footer");?>
</body>
<script src="<?=base_url("dist/js/popper.min.js");?>"></script>
<script src="<?=base_url("dist/js/jquery.min.js");?>"></script>
<script src="<?=base_url("dist/js/bootstrap.min.js");?>"></script>
<script src="https://use.fontawesome.com/450c9ae375.js"></script>
<script>
	$('#myModal').on('shown.bs.modal', function () {
		$('#myInput').trigger('focus')
	})

</script>


</html>
