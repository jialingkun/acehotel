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
					<div id="all_hotel" class="tab-pane active"><br>
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
						<h5 class="modal-title" id="inputTransaksiLabel">Tambah Hotel</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="col-12 no-padding">
							<div class="form-group">
								<label for="usr">Nama Hotel</label>
								<input type="text" class="form-control">
							</div>
							<div class="form-group">
								<label for="alamat">Alamat</label>
								<input type="text" class="form-control">
							</div>
							<div class="form-group">
								<label for="alamat">Telepon</label>
								<input type="text" class="form-control">
							</div>
							<div class="input-group">
								<p for="jk">Owner</p>
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
<script src="<?=base_url("dist/js/function.js");?>"></script>

<script id="list_hotel" type="text/HTML">
	<a href="#" class="list-group-item list-group-item-action mgn-list hotel-data">
	<div class="row">
		<div class="col-8">
        	<h5 class="mb-1" id="namaHotel"></h5>
			<span class="d-block" id="alamatHotel"></span>
			<span class="sm-font" id="tlpHotel"></span>
		</div>
		<div class="col-4" style="margin:auto; color:#1C7CD5">
			<span>Details</span>
		</div>
	</div>
    </a>
</script>

<script>
	$(document).ready(function () {
		$("#management_footer").addClass('is-active');
		$("#header_title").text('Management Hotel');
	});

	$('.lds-ring').show();
	$('.container').hide();

	$.when(getAllHotel()).done(function (getHotel) {
		$('.lds-ring').hide();
		$('.container').show();

		for (var i = 0; i < getHotel.length; i++) {
			var tmp = $('#list_hotel')[0].innerHTML;
			tmp = $.parseHTML(tmp);

			console.log(getHotel[i]);
			$(tmp).find('#namaHotel').text(getHotel[i].nama_hotel);
			$(tmp).find('#alamatHotel').text(getHotel[i].alamat_hotel);
			$(tmp).find('#tlpHotel').text(getHotel[i].telepon_hotel);
			$(tmp).data('id', getHotel[i].id_hotel);
			$(tmp).appendTo('#all_hotel');
		}
	});

	$(document).on('click', '.hotel-data', function () {
		var idHotel = $(this).data('id');
		setCookie('manajemen_id_hotel', idHotel);
		window.location = "<?php echo base_url('index.php/managementhoteldetail') ?>"
	});

	function getAllHotel() {
		return $.ajax(
			"<?php echo base_url() ?>index.php/get_all_hotel", {
				dataType: 'json'
			}
		);
	}

</script>
