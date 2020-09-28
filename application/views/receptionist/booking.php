<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="<?=base_url("dist/css/bootstrap.min.css");?>">
	<link rel="stylesheet" href="<?=base_url("dist/css/bootstrap-grid.min.css");?>">
	<link rel="stylesheet" href="<?=base_url("dist/css/style.css");?>">
	<link rel="stylesheet" href="<?=base_url("dist/css/font-awesome.min.css");?>">
	<title>DASHBOARD RECEPTIONIST</title>
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
		margin-top: 5px;
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

	.floatx {
		position: fixed;
		width: 60px;
		bottom: 10%;
		right: 10%;
		z-index: 2;
		display: flex;
		flex-direction: column-reverse;
	}

	.floatx i {
		margin-top: 10px;
		padding-top: 22px;
		height: 60px;
		border-radius: 50px;
		text-align: center;
		box-shadow: 2px 2px 3px #999;
		vertical-align: middle;
	}

	#namaUser {
		text-transform: uppercase;
	}

	.loading-back {
		position: fixed;
		background-color: rgba(255, 255, 255, 0.5);
		height: 100vh;
		width: 100%;
		z-index: 10;
	}

</style>

<body>
	<?php $this->load->view("receptionist/header");?>
	<div class="loading-back">
		<div class="lds-ring">
			<div></div>
			<div></div>
			<div></div>
			<div></div>
		</div>
	</div>
	<div class="container">
		<div class="row" style="margin-top:20%; margin-left:1%; margin-right:1%;">
			<div class="col-sm-12 text-center">
				<h3><span class="badge badge-white" id="nama_hotel"></span></h3>
			</div>
			<div style="margin:auto; width:100%; font-size:0.9em;">
				<ul class="nav nav-tabs text-center">
					<li class="nav-item" style="width:33.4%;">
						<a class="nav-link active" id="up" data-toggle="tab" href="#upcoming" style="padding:8px 0;"
							onclick="detail('upcoming')">UPCOMING</a>
					</li>
					<li class="nav-item" style="width:33.3%;">
						<a class="nav-link" id="in" data-toggle="tab" href="#inhouse" style="padding:8px 0;"
							onclick="detail('inhouse')">INHOUSE</a>
					</li>
					<li class="nav-item" style="width:33.3%;">
						<a class="nav-link" id="comp" data-toggle="tab" href="#completed" style="padding:8px 0;"
							onclick="detail('complete')">COMPLETE</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="col-sm-12">
			<span>Today :</span>
			<span class="sm-font"><span id="jmlBooking"></span> Booking</span>
			<!-- <span class="sm-font">.</span>
			<span class="sm-font"><span id="jmlRoom"></span> Room</span> -->
		</div>
		<div class="col-sm-12" style="padding:0 2%; margin-bottom:20%;">

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

		<a class="floatx">
			<i class="fa fa-plus text-white bg-primary" id="tambah_order" data-toggle="modal"
				data-target="#inputTransaksi" aria-hidden="true" onclick="$('#total_biaya').html('0')"></i>
			<i class="fa fa-refresh text-white bg-success" aria-hidden="true" onclick="syncBooking()"></i>
		</a>

		<div class="modal fade" id="inputTransaksi" tabindex="-1" role="dialog" aria-labelledby="inputTransaksiLabel"
			aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<form id="insert_booking" onsubmit="insertOrder(event)">
						<div class="modal-header">
							<h5 class="modal-title" id="inputTransaksiLabel">Tambah Order</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="col-12 no-padding" style="display:none;" id="wait">
								Please Wait
							</div>
							<div class="col-12 no-padding" id="input_data">
								<h5 class="text-center">Informasi Pemesan</h5>
								<hr>
								<div class="form-group">
									<label>Nama Depan</label>
									<input type="text" id="guestFirstName" name="guestFirstName" class="form-control"
										pattern="^[A-Za-z ,.'-]+$" required>
								</div>
								<div class="form-group">
									<label>Nama Belakang</label>
									<input type="text" id="guestName" name="guestName" class="form-control"
										pattern="^[A-Za-z ,.'-]+$" required>
								</div>
								<div class="form-group">
									<label>Telepon 1</label>
									<input type="tel" id="guestPhone" name="guestPhone" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Telepon 2</label>
									<input type="tel" id="guestMobile" name="guestMobile" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Email</label>
									<input type="email" id="guestEmail" name="guestEmail" class="form-control" required>
								</div>
								<!-- <div class="form-group">
									<label>No KTP</label>
									<input type="text" id="no_ktp_pemesan" name="no_ktp_pemesan" class="form-control"
										pattern="^[0-9]+$">
								</div> -->
								<h5 class="text-center">Informasi Order</h5>
								<hr>
								<div class="form-group">
									<h5 class="text-center" id="namaHotel"></h5>
									<input type="hidden" id="propid" name="propid">
								</div>
								<div class="form-group">
									<label>Nama Kamar</label>
									<select class="form-control" id="roomId" name="roomId" required>
									</select>
								</div>
								<!-- <div class="form-group">
									<label>Jumlah Kamar</label>
									<input type="number" id="jumlah_room" name="jumlah_room" class="form-control"
										required>
								</div> -->
								<div class="form-group">
									<label>Jumlah Tamu</label>
									<input type="number" id="numAdult" name="numAdult" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Tanggal Check In</label>
									<input type="date" id="firstNight" name="firstNight" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Tanggal Check Out</label>
									<input type="date" id="lastNight" name="lastNight" class="form-control">
								</div>
								<div class="form-group">
									<label>Waktu Kedatangan</label>
									<input type="text" id="guestArrivalTime" name="guestArrivalTime"
										class="form-control">
								</div>
								<div class="form-group">
									<label>Request Tamu</label>
									<input type="text" id="guestComments" name="guestComments" class="form-control">
								</div>
								<div class="form-group">
									<label>Sumber Order</label>
									<input type="text" id="refererEditable" name="refererEditable" class="form-control">
									<!-- <select class="form-control" id="refererEditable" name="refererEditable" required>
										<option value="traveloka">Traveloka</option>
										<option value="oyo">OYO</option>
										<option value="bookingcom">Booking</option>
										<option value="tiketcom">Tiket</option>
										<option value="manual">Manual</option>
									</select> -->
								</div>

								<h5 class="text-center">Biaya Order</h5>
								<hr>
								<br>
								<div class="form-group">
									<label>Informasi Booking Kamar</label>
									<input type="text" id="invoicedesc0" name="invoicedesc0" class="form-control">
								</div>
								<div class="form-group">
									<label>Harga Booking Kamar</label>
									<input type="number" id="invoiceprice0" name="invoiceprice0" class="form-control"
										onchange="hitungBiaya()" required>
								</div>
								<hr>
								<br>
								<div class="form-group">
									<label>Info Biaya Tambahan 1</label>
									<input type="text" id="invoicedesc1" name="invoicedesc1" class="form-control">
								</div>
								<div class="form-group">
									<label>Harga</label>
									<input type="number" id="invoiceprice1" name="invoiceprice1" class="form-control"
										onchange="hitungBiaya()">
								</div>
								<hr>
								<br>
								<div class="form-group">
									<label>Info Biaya Tambahan 2</label>
									<input type="text" id="invoicedesc2" name="invoicedesc2" class="form-control">
								</div>
								<div class="form-group">
									<label>Harga</label>
									<input type="number" id="invoiceprice2" name="invoiceprice2" class="form-control"
										onchange="hitungBiaya()">
								</div>
								<hr>
								<br>
								<div class="form-group">
									<label>Info Biaya Tambahan 3</label>
									<input type="text" id="invoicedesc3" name="invoicedesc3" class="form-control">
								</div>
								<div class="form-group">
									<label>Harga </label>
									<input type="number" id="invoiceprice3" name="invoiceprice3" class="form-control"
										onchange="hitungBiaya()">
								</div>
								<hr>
								<h5>Total Biaya Order: </h5>
								<h3><span id="total_biaya">0</span></h3>
								<hr>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
							<button type="submit" id="submitButton" class="btn btn-primary btn-md float-right"><span
									id="submit">Tambah Booking</span></button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<div class="modal fade" id="completedModal" tabindex="-1" role="dialog" aria-labelledby="completedModalLabel"
			aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="completedModalLabel">Detail Order</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="col-12 no-padding" id="completedWait">
							Please Wait
						</div>
						<div class="row mb-4" id="notaCompleted">
							<div class="col-12">
								<h5 class="text-center">Informasi Pemesan</h5>
								<hr>
								<span>Nama Pemesan : </span><b><span id="cNamaPemesan"></span></b><br>
								<span>Telepon : </span><b><span id="cTelepon"></span></b><br>
								<span>Email : </span><b><span id="cEmail"></span></b><br><br>
								<h5 class="text-center">Informasi Order</h5>
								<hr>
								<span>Tanggal Order: </span><b><span id="cTanggalOrder"></span></b><br>
								<span>Nama Kamar : </span><b><span id="cNamaKamar"></span></b><br>
								<span>Jumlah Guest : </span><b><span id="cJumlahGuest"></span></b><br>
								<span>Check In : </span><b><span id="cTanggalCheckIn"></span></b><br>
								<span>Check Out : </span><b><span id="cTanggalCheckOut"></span></b><br>
								<span>Check In Real: </span><b><span id="cTanggalCheckInReal"></span></b><br>
								<span>Check Out Real: </span><b><span id="cTanggalCheckOutReal"></span></b><br>
								<span>Request Jam Tiba: </span><b><span id="cRequesteJamTiba"></span></b><br>
								<span>Sumber Order : </span><b><span id="cSumberOrder"></span></b><br>
								<span>Request Tamu : </span><b><span id="cComment"></span></b><br><br>
								<h5 class="text-center">Biaya Order</h5>
								<hr>
								<span>Informasi Booking Kamar : </span><br><b><span id="cTambahan0"></span></b><br>
								<span>Harga Booking Kamar : </span><b><span id="cTotal0"></span></b><br><br>
								<span>Info Biaya Tambahan 1 : </span><br><b><span id="cTambahan1"></span></b><br>
								<span>Harga : </span><b><span id="cTotal1"></span></b><br><br>
								<span>Info Biaya Tambahan 2 : </span><br><b><span id="cTambahan2"></span></b><br>
								<span>Harga : </span><b><span id="cTotal2"></span></b><br><br>
								<span>Info Biaya Tambahan 3 : </span><br><b><span id="cTambahan3"></span></b><br>
								<span>Harga : </span><b><span id="cTotal3"></span></b><br><br>
								<hr>
								<h6>Total Biaya Order</h6>
								<h4 id="cTotalHarga"></h4>
								<hr>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="checkIn" tabindex="-1" role="dialog" aria-labelledby="checkInLabel"
			aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<form id="checkin_booking">
						<div class="modal-header">
							<h5 class="modal-title" id="inputTransaksiLabel">Tambah Order</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="col-12 text-center">
								<h4>Hotel Araya</h4>
								<span class="sm-font">Jumlah kamar yang dipesan :</span> <span class="sm-font"
									id="jml_kmr_dipesan"></span>
							</div>
							<div class="col-12 no-padding" id="wait_kamar">
								Please Wait
							</div>
							<div class="row mb-4" id="kamar">
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
								<button type="button" id="checkinButton"
									class="btn btn-primary btn-md float-right"><span id="submit">Tambah
										Booking</span></button>
							</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php $this->load->view("receptionist/footer");?>
	<?php $this->load->view("function");?>
</body>
<script src="<?=base_url("dist/js/jquery.min.js");?>"></script>
<script src="<?=base_url("dist/js/popper.min.js");?>"></script>
<script src="<?=base_url("dist/js/bootstrap.min.js");?>"></script>
<script src="<?=base_url("dist/js/function.js");?>"></script>

<script id="list_booking" type="text/HTML">
	<a href="#" class="list-group-item list-group-item-action flex-column align-items-start mgn-list" >
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

<script id="list_lantai_kamar" type="text/HTML">
	<div class="col-12 text-center mt-4 " >
		<hr>
	</div>
</script>

<script id="list_kamar" type="text/HTML">
	<div class="col-3" id="nomor_kamar">
		<button type="button" class="btn btn-lg btn-light mt-2 mb-2"
			style="box-shadow: -2px 1px 15px 2px rgba(224,224,224,1);">
			<span id="no_kamar"></span>
		</button>
	</div>
</script>

<script>
	var namaHotel = getCookie('nama_hotel');
	var idHotel = getCookie('id_hotel');
	var active = getCookie('booking_section');
	var idOrder = "";
	var tanggalCheckOut = "";
	var jumlahRoom = "";
	var selected_room = new Array();
	var choosen_room = "";

	if (active == "upcoming") {
		// $("#upcoming").tab('dispose');
		$("#up").tab('show');
	} else if (active == "inhouse") {
		$("#in").tab('show');
	} else {
		$("#comp").tab('show');
	}

	$('.loading-back').show();
	$('.container').hide();

	$(document).ready(function () {
		$("#booking_footer").addClass('is-active');
		$("#header_title").text('Bookings');
		$('#nama_hotel').text(namaHotel);
		$('#namaHotel').text(namaHotel);

		const formatUang = new Intl.NumberFormat('id-ID', {
			style: 'currency',
			currency: 'IDR',
			minimumFractionDigits: 2
		});

		$('#total_harga').val(idHotel);
	});

	$.when(getUpcoming(idHotel), getInhouse(idHotel), getComplete(idHotel), getKamar(idHotel)).done(function (upcoming,
		inhouse, complete, listKamar) {
		var dataUpcoming = upcoming[0];
		var dataInhouse = inhouse[0];
		var dataComplete = complete[0];
		var dataKamar = listKamar[0];

		$('.loading-back').hide();
		$('.container').show();
		$('#jmlBooking').text(dataUpcoming.length);

		for (var i = 0; i < dataKamar.length; i++) {
			$('#roomId').append(
				$('<option>', {
					value: dataKamar[i].id_kamar,
					text: dataKamar[i].nama_kamar
				})
			)
		}

		for (var i = 0; i < dataUpcoming.length; i++) {
			var ckInDate = new Date(dataUpcoming[i].tanggal_check_in);
			var ckOtDate = new Date(dataUpcoming[i].tanggal_check_out);
			var selisihDate = Math.ceil((ckOtDate - ckInDate) / (1000 * 60 * 60 * 24));
			var tmp = $('#list_booking')[0].innerHTML;
			tmp = $.parseHTML(tmp);
			// jmlRoom += parseInt(dataUpcoming[i].jumlah_room);

			$(tmp).attr('id', 'toinhouse');
			$(tmp).attr('data-toggle', 'modal');
			$(tmp).attr('data-target', '#inputTransaksi');
			$(tmp).data('id', dataUpcoming[i].id_order);
			$(tmp).find('#namaUser').text(dataUpcoming[i].nama_pemesan);
			$(tmp).find('#namaKamar').text(dataUpcoming[i].nama_kamar);
			$(tmp).find('#jmlRoom').text(dataUpcoming[i].jumlah_room);
			$(tmp).find('#jmlMalam').text(selisihDate);
			$(tmp).find('#jmlGuest').text(dataUpcoming[i].jumlah_guest);
			if (dataUpcoming[i].request_jam_check_in_awal != null) {
				$(tmp).find('#reqInAwal').text(dataUpcoming[i].request_jam_check_in_awal);
				$(tmp).find('#reqInAkhir').text(dataUpcoming[i].request_jam_check_in_akhir);
			} else {
				$(tmp).find('#reqInAkhir').parent('.badge').hide();
			}
			$(tmp).find('#totHarga').text(currency.format(dataUpcoming[i].total_harga));
			$(tmp).appendTo('#upcoming');
		}

		for (var i = 0; i < dataInhouse.length; i++) {
			var ckInDate = new Date(dataInhouse[i].tanggal_check_in);
			var ckOtDate = new Date(dataInhouse[i].tanggal_check_out);
			var selisihDate = Math.ceil((ckOtDate - ckInDate) / (1000 * 60 * 60 * 24));
			var tmp = $('#list_booking')[0].innerHTML;
			tmp = $.parseHTML(tmp);
			// jmlRoom += parseInt(dataInhouse[i].jumlah_room);

			$(tmp).attr('id', 'tocomplete');
			$(tmp).data('id', dataInhouse[i].id_order);
			$(tmp).find('#namaUser').text(dataInhouse[i].nama_pemesan);
			$(tmp).find('#namaKamar').text(dataInhouse[i].nama_kamar);
			$(tmp).find('#jmlRoom').text(dataInhouse[i].jumlah_room);
			$(tmp).find('#jmlMalam').text(selisihDate);
			$(tmp).find('#jmlGuest').text(dataInhouse[i].jumlah_guest);
			if (dataInhouse[i].request_jam_check_in_awal != null) {
				$(tmp).find('#reqInAwal').text(dataInhouse[i].request_jam_check_in_awal);
				$(tmp).find('#reqInAkhir').text(dataInhouse[i].request_jam_check_in_akhir);
			} else {
				$(tmp).find('#reqInAkhir').parent('.badge').hide();
			}
			$(tmp).find('#totHarga').text(currency.format(dataInhouse[i].total_harga));
			$(tmp).appendTo('#inhouse');
		}

		for (var i = 0; i < dataComplete.length; i++) {
			var ckInDate = new Date(dataComplete[i].tanggal_check_in);
			var ckOtDate = new Date(dataComplete[i].tanggal_check_out);
			var selisihDate = Math.ceil((ckOtDate - ckInDate) / (1000 * 60 * 60 * 24));
			var tmp = $('#list_booking')[0].innerHTML;
			tmp = $.parseHTML(tmp);

			$(tmp).attr('id', 'complete');
			$(tmp).attr('data-toggle', 'modal');
			$(tmp).attr('data-target', '#completedModal');
			$(tmp).data('id', dataComplete[i].id_order);
			$(tmp).find('#namaUser').text(dataComplete[i].nama_pemesan);
			$(tmp).find('#namaKamar').text(dataComplete[i].nama_kamar);
			$(tmp).find('#jmlRoom').text(dataComplete[i].jumlah_room);
			$(tmp).find('#jmlMalam').text(selisihDate);
			$(tmp).find('#jmlGuest').text(dataComplete[i].jumlah_guest);
			if (dataComplete[i].request_jam_check_in_awal != null) {
				$(tmp).find('#reqInAwal').text(dataComplete[i].request_jam_check_in_awal);
				$(tmp).find('#reqInAkhir').text(dataComplete[i].request_jam_check_in_akhir);
			} else {
				$(tmp).find('#reqInAkhir').parent('.badge').hide();
			}
			$(tmp).find('#totHarga').text(currency.format(dataComplete[i].total_harga));
			$(tmp).appendTo('#completed');
		}
	});

	function getKamar(idHotel) {
		return $.ajax(
			"<?php echo base_url() ?>index.php/get_kamar_by_hotel/" + idHotel, {
				dataType: 'json'
			}
		);
	}

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

	function detail(active) {
		setCookie('booking_section', active);
	}

	function hitungBiaya() {
		var biaya_order = 0;
		for (let i = 0; i <= 3; i++) {
			var invoiceprice = parseInt($("#invoiceprice" + i + "").val());
			if (isNaN(invoiceprice)) {
				biaya_order += 0;
			} else {
				biaya_order = biaya_order + invoiceprice;
			}
		}
		$('#total_biaya').html(currency.format(biaya_order));
	}

	function insertOrder(e) {
		if (confirm("Apakah anda yakin akan menambah data?")) {
			e.preventDefault();
			urls = "insert_order";
			var dataString = $("#insert_booking").serialize();
			$("#submit").html("tunggu..");
			$("#submitButton").prop("disabled", true);

			$.ajax({
				url: "<?php echo base_url() ?>index.php/" + urls,
				type: 'POST',
				data: dataString,
				success: function (response) {
					if (response.startsWith("success", 0)) {
						alert("Data telah masuk");
						location.reload();
					} else {
						alert(response);
						$("#submit").html("Submit");
						$("#submitButton").prop("disabled", false);
					}
				},
				error: function (e) {
					alert(response);
					$("#submitButton").prop("disabled", false);
				}
			});
		} else {}
	}

	function editOrder(e) {
		if (confirm("Apakah anda yakin ?")) {
			e.preventDefault();
			urls = "update_order/";
			var dataString = $("#insert_booking").serialize();
			var dataJSON = $("#insert_booking").serializeArray();

			$("#submit").html("tunggu..");
			$("#submitButton").prop("disabled", true);

			$.ajax({
				url: "<?php echo base_url() ?>index.php/" + urls + idOrder,
				type: 'POST',
				data: dataString,
				success: function (response) {
					if (response != "access denied") {
						alert("Data telah masuk");
						console.log(dataJSON);
						jumlahRoom = 1;
						listKamar(dataJSON[6].value);
						$("#submit").html("Check In");
						$("#submitButton").prop("disabled", false);
					} else {
						alert(response);
						$("#submit").html("Check In");
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

	function listKamar(id_kamar) {
		urls = "get_ketersediaan_nokamar/";
		$('#kamar').empty();
		$.ajax({
			url: "<?php echo base_url() ?>index.php/" + urls + id_kamar + "/" + tanggalCheckOut,
			type: 'GET',
			dataType: 'json',
			beforeSend: function () {
				$('#wait_kamar').show();

			},
			success: function (response) {
				var lantai_kamar = "0";
				$('#wait_kamar').hide();
				$('#inputTransaksi').modal('hide');
				$('#checkIn').modal('show');
				$('#jml_kmr_dipesan').text(jumlahRoom);

				for (var i = 0; i < response.length; i++) {

					if (lantai_kamar != response[i].lantai) {
						lantai_kamar = response[i].lantai;
						var tmp = $('#list_lantai_kamar')[0].innerHTML;
						tmp = $.parseHTML(tmp);
						$(tmp).appendTo('#kamar');
					}
					if (response[i].ketersediaan == "tidak tersedia") {
						$(tmp).find('#nomor_kamar, button').css({
							'box-shadow': '',
							'background-color': 'red',
							'color': 'white'
						});
						$(tmp).find('#nomor_kamar, button').prop('disabled', true);
					}
					var tmp = $('#list_kamar')[0].innerHTML;
					tmp = $.parseHTML(tmp);
					$(tmp).find('#no_kamar').text(response[i].nama_no_kamar);
					$(tmp).find('#nomor_kamar, button').data('no_kamar', response[i].no_kamar);

					$(tmp).appendTo('#kamar');
				}
			}
		});
	}

	$(document).on('click', '#nomor_kamar button', function () {
		if ($(this).data('checked') == 'dipilih') {
			$(this).css({
				'background-color': '#f8f9fa',
				'color': '#212529'
			});
			removeA(selected_room, $(this).data('no_kamar'));
			$(this).removeData('checked');
		} else if ($(this).data('checked') != 'dipilih' && selected_room.length < jumlahRoom) {
			$(this).data('checked', 'dipilih');
			$(this).css({
				'background-color': '#007BFF',
				'color': 'white'
			});
			selected_room.push($(this).data('no_kamar'));
		} else {
			alert('max');
		}
		choosen_room = selected_room.join();
	});

	$(document).on('click', '#checkinButton', function () {
		if (confirm("Apakah anda yakin ?")) {
			urls = "update_order_check_in/";
			$("#submit").html("tunggu..");
			$("#checkinButton").prop("disabled", true);

			$.ajax({
				url: "<?php echo base_url() ?>index.php/" + urls + idOrder,
				type: 'POST',
				data: {
					unitId: choosen_room,
					propid: idHotel,
				},
				success: function (response) {
					if (response != "access denied") {
						alert("Data telah masuk");
						location.reload();
					} else {
						alert(response);
						$("#submit").html("Check In");
						$("#checkinButton").prop("disabled", false);
					}
				},
				error: function (e) {
					console.log(e.responseText);
					alert(e.responseText);
					$("#checkinButton").prop("disabled", false);
				}
			});
		}
	});

	$(document).on('click', '#tambah_order', function () {
		$('#insert_booking').attr('onsubmit', 'insertOrder(event)');
		$('#submitButton').text('Tambah Order');
		$('#inputTransaksiLabel').text('Tambah Order');
		$(':input').val('');
		$('#request_breakfast').prop('checked', false);
		$('#rent_car').prop('checked', false);
		$('#propid').val(idHotel);
	});

	$(document).on('click', '#toinhouse', function () {
		$('#insert_booking').attr('onsubmit', 'editOrder(event)');
		$('#submitButton').text('Check In');
		$('#inputTransaksiLabel').text('Check In');
		urls = "get_order_by_id/";
		$.ajax({
			url: "<?php echo base_url() ?>index.php/" + urls + $(this).data('id'),
			type: 'GET',
			dataType: 'json',
			beforeSend: function () {
				$('#wait').show();
				$('#input_data').hide();
			},
			success: function (response) {
				var invoice = JSON.parse(response[0].invoice);
				idOrder = response[0].id_order;
				tanggalCheckOut = response[0].tanggal_check_out;
				$('#wait').hide();
				$('#input_data').show();
				$('#guestFirstName').val(response[0].guestFirstName);
				$('#guestName').val(response[0].guestName);
				$('#guestPhone').val(response[0].guestPhone);
				$('#guestMobile').val(response[0].guestMobile);
				$('#guestEmail').val(response[0].email_pemesan);
				$('#propid').val(response[0].id_hotel);
				$('#roomId').val(response[0].id_kamar);
				$('#numAdult').val(response[0].jumlah_guest);
				$('#firstNight').val(response[0].tanggal_check_in);
				$('#lastNight').val(response[0].tanggal_check_out);
				$('#refererEditable').val(response[0].sumber_order);
				$('#guestArrivalTime').val(response[0].request_jam_tiba);
				$('#guestComments').val(response[0].comments);
				for (let i = 0; i < invoice.length; i++) {
					$('#invoicedesc' + i + '').val(invoice[i].description);
					$('#invoiceprice' + i + '').val(invoice[i].price);
				}
				hitungBiaya();
			}
		});
	});

	$(document).on('click', '#tocomplete', function () {
		if (confirm("CHECK OUT order ini?")) {
			$('.loading-back').show();
			urls = "update_order_check_out/";
			$.ajax({
				url: "<?php echo base_url() ?>index.php/" + urls + $(this).data('id'),
				type: 'POST',
				data: {
					propid: idHotel
				},
				success: function (response) {
					if (response.startsWith("success", 0)) {
						alert("Data telah masuk");
						location.reload();
					} else {
						if (response.startsWith("failed", 0)) {
							alert("Tidak ada data yang berubah");
						} else {
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
	});

	$(document).on('click', '#complete', function () {
		var rentCar;
		var rentBf;
		urls = "get_order_by_id/";
		$.ajax({
			url: "<?php echo base_url() ?>index.php/" + urls + $(this).data('id'),
			type: 'GET',
			dataType: 'json',
			beforeSend: function () {
				$('#completedWait').show();
				$('#notaCompleted').hide();
			},
			success: function (response) {
				$('#completedWait').hide();
				$('#notaCompleted').show();
				console.log(response[0]);
				var invoice = JSON.parse(response[0].invoice);
				$('#cNamaPemesan').text(response[0].nama_pemesan);
				$('#cTelepon').text(response[0].telepon_pemesan);
				$('#cEmail').text(response[0].email_pemesan);
				$('#cNamaKamar').text(response[0].nama_kamar);
				$('#cJumlahGuest').text(response[0].jumlah_guest);
				$('#cTanggalCheckIn').text(response[0].tanggal_check_in);
				$('#cTanggalCheckOut').text(response[0].tanggal_check_out);
				$('#cTanggalCheckOut').text(response[0].tanggal_check_out);
				$('#cTanggalCheckInReal').text(response[0].tanggal_check_in_real);
				$('#cTanggalCheckOutReal').text(response[0].tanggal_check_out_real);
				$('#cRequesteJamTiba').text(response[0].request_jam_tiba);
				$('#cSumberOrder').text(response[0].sumber_order);
				$('#cComment').text(response[0].comments);
				$('#cTanggalOrder').text(response[0].tanggal_order);
				$('#cTotalHarga').text(currency.format(response[0].total_harga));
				for (let i = 0; i < invoice.length; i++) {
					$('#cTambahan' + i + '').text(invoice[i].description);
					$('#cTotal' + i + '').text(currency.format(invoice[i].price));
				}
			}
		});
	});

	function removeA(arr) {
		var what, a = arguments,
			L = a.length,
			ax;
		while (L > 1 && arr.length) {
			what = a[--L];
			while ((ax = arr.indexOf(what)) !== -1) {
				arr.splice(ax, 1);
			}
		}
		return arr;
	}

	function syncBooking() {
		$('.loading-back').show();
		$.ajax({
			url: "<?php echo base_url() ?>index.php/syncAllBookings/" + idHotel,
			type: 'GET',
			success: function (response) {
				if (response.startsWith("success", 0)) {
					alert("Berhasil!");
					location.reload();
				} else {
					if (response.startsWith("failed", 0)) {
						alert("Tidak ada data yang berubah");
					} else {
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
