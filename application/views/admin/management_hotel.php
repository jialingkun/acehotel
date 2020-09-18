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

	.loading-back{
		position:fixed;
		background-color:rgba(255, 255, 255, 0.5); 
		height:100vh; 
		width:100%; 
		z-index:10;
	}

</style>

<body>
	<?php $this->load->view("admin/header");?>
	<div class="loading-back">
		<div class="lds-ring">
			<div></div>
			<div></div>
			<div></div>
			<div></div>
		</div>
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
		<a class="float bg-success" onclick="syncHotels()">
			<i class="fa fa-refresh my-float text-white bg-success" aria-hidden="true"></i>
		</a>
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

	$('.loading-back').show();
	$('.container').hide();

	$.when(getAllHotel()).done(function (getHotel) {
		$('.loading-back').hide();
		$('.container').show();
		var listHotel = getHotel;

		for (var i = 0; i < listHotel.length; i++) {
			var tmp = $('#list_hotel')[0].innerHTML;
			tmp = $.parseHTML(tmp);

			$(tmp).find('#namaHotel').text(listHotel[i].nama_hotel);
			$(tmp).find('#alamatHotel').text(listHotel[i].alamat_hotel);
			$(tmp).find('#tlpHotel').text(listHotel[i].telepon_hotel);
			$(tmp).data('id', listHotel[i].id_hotel);
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

	function syncHotels(){
		$('.loading-back').show();
		
		$.ajax({
			url: "<?php echo base_url() ?>index.php/syncProperties/",
			type: 'GET',
			success: function (response) {
				if (response.startsWith("success", 0)) {
					alert("Berhasil!");
					location.reload();
				} else {
					if (response.startsWith("failed", 0)) {
						alert("Tidak ada data yang berubah");
					}else{
						alert(response);
					}
					$('.loading-back').hide();
				}
			},
			error: function () {
				alert(response);
				$('.loading-back').hide();
			}
		});
	}
</script>
