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

	#namaUser{
		text-transform: uppercase;
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
		<div class="row" style="margin-top:20%; margin-left:1%; margin-right:1%;">
			<div class="col-sm-12 text-center">
				<h3><span class="badge badge-white" id="nama_hotel"></span></h3>
			</div>
			<div style="margin:auto; width:100%; font-size:0.9em;" >
				<ul class="nav nav-tabs text-center" >
					<li class="nav-item" style="width:33.4%;">
						<a class="nav-link active" data-toggle="tab" href="#upcoming" style="padding:8px 0;">UPCOMING</a>
					</li>
					<li class="nav-item" style="width:33.3%;">
						<a class="nav-link" data-toggle="tab" href="#inhouse" style="padding:8px 0;">INHOUSE</a>
					</li>
					<li class="nav-item" style="width:33.3%;">
						<a class="nav-link" data-toggle="tab" href="#completed" style="padding:8px 0;">COMPLETE</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="col-sm-12">
			<span>Today :</span>
			<span class="sm-font" ><span id="jmlBooking"></span> Booking</span> 
			<span class="sm-font">.</span>
			<span class="sm-font" ><span id="jmlRoom"></span> Room</span>
		</div>
		<div class="col-sm-12" style="padding:2%;">

			<div class="tab-content">
				<div id="upcoming" class="tab-pane active"><br>
					<div class="list-group">
					</div>
				</div>
				<div id="inhouse" class="tab-pane fade"><br>
					<div class="list-group">
					</div>
				</div>
				<div id="completed" class="tab-pane fade"><br>
					<div class="list-group">
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
<script src="<?=base_url("dist/js/function.js");?>"></script>

<script id="list_booking" type="text/HTML">
	<a href="#" class="list-group-item list-group-item-action flex-column align-items-start mgn-list">
		<div class="w-100 ">
			<h5 class="mb-1" id="namaUser"></h5>
			<h6 class="mb-1" id="namaKamar"></h6>
		</div>
		<div class="mgn-list">
			<span id="jmlRoom"></span> Room
			.
			<span id="jmlMalam"></span> Night
			.
			<span id="jmlGuest"></span> Guest
		</div>
		<div class="mgn-list">
			<span class="badge badge-pill badge-danger"><span id="reqInAwal"></span> - <span id="reqInAkhir"></span></span>
			<span class="sm-font" id="totHarga"></span>
		</div>
	</a>
</script>

<script>
	var namaHotel = getCookie('nama_hotel');
	var idHotel = getCookie('id_hotel');


	$(document).ready(function () {
		$("#booking_footer").addClass('is-active');
		$("#header_title").text('Bookings');
		$('#nama_hotel').text(namaHotel);
	});

		$('.lds-ring').show();
		$('.container').hide();
	$.when(getUpcoming(idHotel), getInhouse(idHotel), getComplete(idHotel)).done(function (upcoming, inhouse, complete) {
		$('.lds-ring').hide();
		$('.container').show();
		var dataUpcoming = upcoming[0];
		var dataInhouse = inhouse[0];
		var dataComplete = complete[0];
		var jmlRoom = 0;

		$('#jmlBooking').text(dataUpcoming.length);

		for(var i = 0 ; i < dataUpcoming.length ; i++){
			var ckInDate = new Date(dataUpcoming[i].tanggal_check_in);
			var ckOtDate = new Date(dataUpcoming[i].tanggal_check_out);
			var selisihDate = Math.ceil((ckOtDate-ckInDate) / (1000 * 60 * 60 * 24));
			var tmp = $('#list_booking')[0].innerHTML;
			tmp = $.parseHTML(tmp);
			jmlRoom += parseInt(dataUpcoming[i].jumlah_room);
			
			$(tmp).find('#namaUser').text(dataUpcoming[i].nama_pemesan);
			$(tmp).find('#namaKamar').text(dataUpcoming[i].nama_kamar);
			$(tmp).find('#jmlRoom').text(dataUpcoming[i].jumlah_room);
			$(tmp).find('#jmlMalam').text(selisihDate);
			$(tmp).find('#jmlGuest').text(dataUpcoming[i].jumlah_guest);
			if(dataUpcoming[i].request_jam_check_in_awal != null){
				$(tmp).find('#reqInAwal').text(dataUpcoming[i].request_jam_check_in_awal);
				$(tmp).find('#reqInAkhir').text(dataUpcoming[i].request_jam_check_in_akhir);
			}else{
				$(tmp).find('#reqInAkhir').parent('.badge').hide();
			}
			$(tmp).find('#totHarga').text(currency.format(dataUpcoming[i].total_harga));
			$(tmp).appendTo('#upcoming');
		}

		for(var i = 0 ; i < dataInhouse.length ; i++){
			var ckInDate = new Date(dataInhouse[i].tanggal_check_in);
			var ckOtDate = new Date(dataInhouse[i].tanggal_check_out);
			var selisihDate = Math.ceil((ckOtDate-ckInDate) / (1000 * 60 * 60 * 24));
			var tmp = $('#list_booking')[0].innerHTML;
			tmp = $.parseHTML(tmp);
			jmlRoom += parseInt(dataInhouse[i].jumlah_room);
			
			$(tmp).find('#namaUser').text(dataInhouse[i].nama_pemesan);
			$(tmp).find('#namaKamar').text(dataInhouse[i].nama_kamar);
			$(tmp).find('#jmlRoom').text(dataInhouse[i].jumlah_room);
			$(tmp).find('#jmlMalam').text(selisihDate);
			$(tmp).find('#jmlGuest').text(dataInhouse[i].jumlah_guest);
			if(dataInhouse[i].request_jam_check_in_awal != null){
				$(tmp).find('#reqInAwal').text(dataInhouse[i].request_jam_check_in_awal);
				$(tmp).find('#reqInAkhir').text(dataInhouse[i].request_jam_check_in_akhir);
			}else{
				$(tmp).find('#reqInAkhir').parent('.badge').hide();
			}
			$(tmp).find('#totHarga').text(currency.format(dataInhouse[i].total_harga));
			$(tmp).appendTo('#inhouse');
		}

		for(var i = 0 ; i < dataComplete.length ; i++){
			var ckInDate = new Date(dataComplete[i].tanggal_check_in);
			var ckOtDate = new Date(dataComplete[i].tanggal_check_out);
			var selisihDate = Math.ceil((ckOtDate-ckInDate) / (1000 * 60 * 60 * 24));
			var tmp = $('#list_booking')[0].innerHTML;
			tmp = $.parseHTML(tmp);
			jmlRoom += parseInt(dataComplete[i].jumlah_room);
			
			$(tmp).find('#namaUser').text(dataComplete[i].nama_pemesan);
			$(tmp).find('#namaKamar').text(dataComplete[i].nama_kamar);
			$(tmp).find('#jmlRoom').text(dataComplete[i].jumlah_room);
			$(tmp).find('#jmlMalam').text(selisihDate);
			$(tmp).find('#jmlGuest').text(dataComplete[i].jumlah_guest);
			if(dataComplete[i].request_jam_check_in_awal != null){
				$(tmp).find('#reqInAwal').text(dataComplete[i].request_jam_check_in_awal);
				$(tmp).find('#reqInAkhir').text(dataComplete[i].request_jam_check_in_akhir);
			}else{
				$(tmp).find('#reqInAkhir').parent('.badge').hide();
			}
			$(tmp).find('#totHarga').text(currency.format(dataComplete[i].total_harga));
			$(tmp).appendTo('#completed');
		}

		$('#jmlRoom').text(jmlRoom);
	});
	

	function getUpcoming(idHotel) {
		return $.ajax(
			"<?php echo base_url() ?>index.php/get_order_by_hotel_upcoming/" + idHotel, {
				dataType: 'json'
			}
		);
	}

	function getInhouse(idHotel) {
		return $.ajax(
			"<?php echo base_url() ?>index.php/get_order_by_hotel_inhouse/" + idHotel, {
				dataType: 'json'
			}
		);
	}

	function getComplete(idHotel) {
		return $.ajax(
			"<?php echo base_url() ?>index.php/get_order_by_hotel_completed/" + idHotel, {
				dataType: 'json'
			}
		);
	}

</script>