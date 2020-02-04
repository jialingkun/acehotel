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
		<div class="row" style="margin-top:20%;">
			<div class="col-sm-12">
				<div class="list-group">
					<a href="<?=base_url("/index.php/managementhotel");?>"
						class="list-group-item list-group-item-action flex-column align-items-start mgn-list">
						<div class="d-flex w-100">
							<h5 class="mb-1">MANAJEMEN HOTEL</h5>
						</div>
					</a>
					<a href="<?=base_url("/index.php/managementowner");?>"
						class="list-group-item list-group-item-action flex-column align-items-start mgn-list">
						<div class="d-flex w-100">
							<h5 class="mb-1">MANAJEMEN OWNER</h5>
						</div>
					</a>
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

<script>
	$(document).ready(function () {
		$("#management_footer").addClass('is-active');
		$("#header_title").text('Management');
	});

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
					var tmp = $('#hotel_option')[0].innerHTML;
					tmp = $.parseHTML(tmp);
					$(tmp).text(response[i].nama_hotel);
					$(tmp).data('id', response[i].id_hotel);
					$(tmp).data('nama', response[i].nama_hotel);
					$(tmp).appendTo('#list_hotel');
				}
				$('.dropdown-toggle').dropdown();
			},
			complete: function () {
				$('.lds-ring').hide();
				$('.container').show();
				if (getCookie('id_hotel') != "") {
					getData(getCookie('id_hotel'), getCookie('nama_hotel'));
					$('#nama_hotel').text(getCookie('nama_hotel'));
				} else {
					let idHotel = $('.dropdown-item:first').data('id');
					let namaHotel = $('.dropdown-item:first').data('nama');
					$('#nama_hotel').text(namaHotel);
					getData(idHotel, namaHotel);
				}
			}
		});
	});

</script>
