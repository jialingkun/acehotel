<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="<?=base_url("dist/css/bootstrap.min.css");?>">
	<link rel="stylesheet" href="<?=base_url("dist/css/bootstrap-grid.min.css");?>">
	<link rel="stylesheet" href="<?=base_url("dist/css/style.css");?>">
	<link rel="stylesheet" href="<?=base_url("dist/css/style_header.css");?>">
	<link rel="stylesheet" href="<?=base_url("dist/css/font-awesome.min.css");?>">

	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
	<title>DASHBOARD User</title>
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

	#nama_hotel {
		display: block;
		white-space: nowrap;
		width: 7em;
		overflow: hidden;
		text-overflow: ellipsis;
	}

</style>

<body>
	<?php $this->load->view("user/header");?>
	<div class="lds-ring">
		<div></div>
		<div></div>
		<div></div>
		<div></div>
	</div>
	<div class="container">
		<div class="row" style="margin-top:20%; margin-left:1%; margin-right:1%; margin-bottom:20%;">
			<div style="margin-left:5%; margin-right:5%;">
				<label>Ace Hotel</label>
				<label>Temukan Hotel yang sesuai kebutuhan Anda.</label>

				<div style="margin-top:10%;">
					<form id="insert_booking" onsubmit="insertSearchHotel(event)">
						<div class="form-group">
							<label>Kota tujuan</label>
							<select class="form-control" id="kota_tujuan" name="kota_tujuan" required>
                  				<option selected value="default" id="def_kota">Silahkan Pilih Kota</option>

							</select>
							<!-- <input type="text" id="nama_pemesan" name="nama_pemesan" class="form-control" required> -->
						</div>
						<div class="form-group">
							<label>Tanggal Check In</label>
							<input type="text" id="tanggal_check_in" name="tanggal_check_in" class="form-control"
								placeholder="Contoh : 14-09-2022" required>
						</div>
						<div class="form-group">
							<label>Lama menginap</label>
							<input type="number" id="lama_menginap" name="lama_menginap" class="form-control"
								min="1" placeholder="Contoh : 2 Hari" required>
						</div>
						<div class="form-group">
							<label>Jumlah Tamu</label>
							<input type="number" id="jml_tamu" name="jml_tamu" class="form-control"
							min="1" placeholder="Contoh : 2 Orang" required>
						</div>

						<div class="form-group" style="align-items:">
							<button type="submit" id="submitButton" class="btn btn-primary btn-md"><span id="submit">Temukan Hotel</span></button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php $this->load->view("user/footer");?>
	<?php $this->load->view("function");?>

</body>
<script src="<?=base_url("dist/js/jquery.min.js");?>"></script>
<script src="<?=base_url("dist/js/popper.min.js");?>"></script>
<script src="<?=base_url("dist/js/bootstrap.min.js");?>"></script>
<script src="<?=base_url("dist/js/function.js");?>"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<script id="hotel_option" type="text/HTML">
	<a class="dropdown-item" href="#"></a>
    </script>

<script>
	
    var hari = new Date();
    var dd = (hari.getDate() < 10 ? '0' : '') + hari.getDate();
    var mm = ((hari.getMonth() + 1) < 10 ? '0' : '') + (hari.getMonth() + 1);
    var tgl_skrng = hari.getFullYear() +'-'+ mm +'-'+ dd;

	
	var status_data_booking = getCookie('status_data_booking');


	if(status_data_booking == 'active'){
		console.log('keisin databnya')
		// $('#kota_tujuan').val('1');
		// document.getElementById("kota_tujuan").value = '2';
		console.log(document.getElementById("kota_tujuan").value)
	}

	// function getData(idHotel, namaHotel) {
	// 	setCookie('id_hotel', idHotel);
	// 	setCookie('nama_hotel', namaHotel);

		// $('.lds-ring').show();
	// 	$('.container').hide();

	// 	$.when(getCkInTd(idHotel), getCkOtTd(idHotel), getInHsTd(idHotel)).done(function (ckIn, ckOt, inHs) {
			$('.lds-ring').hide();
	// 		$('.container').show();

	// 		// Checkin
	// 		$('.square-box:eq(0) span:eq(0)').text(('0' + ckIn[0].finished_checkin).slice(-2));
	// 		$('.square-box:eq(0) span:eq(2)').text(('0' + ckIn[0].required_checkin).slice(-2));

	// 		// CheckOut
	// 		$('.square-box:eq(1) span:eq(0)').text(('0' + ckOt[0].finished_checkout).slice(-2));
	// 		$('.square-box:eq(1) span:eq(2)').text(('0' + ckOt[0].required_checkout).slice(-2));

	// 		// InHouse
	// 		$('.square-box:eq(2) span:eq(0)').text(('0' + inHs[0].finished_inhouse).slice(-2));
	// 		$('.square-box:eq(2) span:eq(2)').text(('0' + inHs[0].required_inhouse).slice(-2));

	// 		// EOD
	// 		var tmp = Math.round(inHs[0].finished_inhouse / inHs[0].required_inhouse * 100);
	// 		$('.square-box:eq(3) span:eq(0)').text((isNaN(tmp) ? 0 : tmp));
	// 	});

	// }

	// function getCkInTd(idHotel) {
	// 	return $.ajax(
	// 		"<?php echo base_url() ?>index.php/get_info_checkin_today/" + idHotel, {
	// 			dataType: 'json'
	// 		}
	// 	);
	// }

	// function getCkOtTd(idHotel) {
	// 	return $.ajax(
	// 		"<?php echo base_url() ?>index.php/get_info_checkout_today/" + idHotel, {
	// 			dataType: 'json'
	// 		}
	// 	);
	// }

	// function getInHsTd(idHotel) {
	// 	return $.ajax(
	// 		"<?php echo base_url() ?>index.php/get_info_inhouse_today/" + idHotel, {
	// 			dataType: 'json'
	// 		}
	// 	);
	// }

	$(document).ready(function () {
		$("#explore_footer").addClass('is-active');
		$("#header_title").text('Cari Hotel');

	});

	// $('#myModal').on('shown.bs.modal', function () {
	// 	$('#myInput').trigger('focus');
	// });
	// $.when(getLoginCookieServer('receptionistCookie')).done(function (response) {
	// 	$.ajax({
	// 		url: "<?php echo base_url() ?>index.php/get_receptionist_by_id/" + response,
	// 		type: 'get',
	// 		dataType: "json",
	// 		beforeSend: function () {
	// 			$('.lds-ring').show();
	// 			$('.container').hide();
	// 		},
	// 		success: function (response) {
	// 			for (i = 0; i < response.length; i++) {
	// 				var tmp = $('#hotel_option')[0].innerHTML;
	// 				tmp = $.parseHTML(tmp);
	// 				$(tmp).text(response[i].nama_hotel);
	// 				$(tmp).data('id', response[i].id_hotel);
	// 				$(tmp).data('nama', response[i].nama_hotel);
	// 				$(tmp).appendTo('#list_hotel');
	// 			}
	// 			$('.dropdown-toggle').dropdown();
	// 		},
	// 		complete: function () {
	// 			$('.lds-ring').hide();
	// 			$('.container').show();
	// 			if (getCookie('id_hotel') != "") {
	// 				getData(getCookie('id_hotel'), getCookie('nama_hotel'));
	// 				$('#nama_hotel').text(getCookie('nama_hotel'));
	// 			} else {
	// 				let idHotel = $('.dropdown-item:first').data('id');
	// 				let namaHotel = $('.dropdown-item:first').data('nama');
	// 				$('#nama_hotel').text(namaHotel);
	// 				getData(idHotel, namaHotel);
	// 			}
	// 		}
	// 	});
	// });
	// $(document).on('click', '.dropdown-item', function () {
	// 	let namaHotel = $(this).data('nama');
	// 	let idHotel = $(this).data('id');

	// 	$('#nama_hotel').text(namaHotel);
	// 	getData(idHotel, namaHotel);
	// });

	// function detail(active) {
	// 	setCookie('booking_section', active);
	// 	window.location = "<?=base_url(" / index.php / bookingreceptionist ");?>";
	// }


	
	$(function () {
		$('input[name="tanggal_check_in"]').daterangepicker({
			opens: 'left',
			startDate: new Date(),
			singleDatePicker: true,
			showDropdowns: true,
     		minDate: new Date(),
			locale: {
				cancelLabel: 'Clear'
			} 
		}, function (start, end, label) {
        	tgl_skrng = start.format('YYYY-MM-DD');
			console.log(tgl_skrng)
			// $('#nama_date').text(start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
			// filter = start.format('YYYY-MM-DD');
			// today = end.format('YYYY-MM-DD');
			// getData(idHotelC, namaHotelC, filter, today);
		});

	});


	
	$.when(getAllKota()).done(function (getKota) {

		$('.lds-ring').hide();


		for (var i = 0; i < getKota.length; i++) {
			// var tmp = $('#list_hotel')[0].innerHTML;
			// tmp = $.parseHTML(tmp);
			
			console.log('------------')
			console.log(getKota[i].id_master_kota)
			
			$('#kota_tujuan').append(new Option(getKota[i].nama_kota,getKota[i].id_master_kota)); 

			// $(tmp).find('#idHotelList').text(getKota[i].id_hotel)
			// $(tmp).find('#namaHotel').append('<b>'+getKota[i].nama_hotel+'</b><br> Surabaya Center')
			// // $(tmp).find('#hargaHotel').text(getKota[i].ket_fasilitas)
			// $(tmp).appendTo('#all_hotel');

		}


	});
	
	function getAllKota() {
		return $.ajax(
			"<?php echo base_url() ?>index.php/get_master_kota/", {
				dataType: 'json'
			}
		);
	}

	$("#lama_menginap").change(function() {
		var min = parseInt($(this).attr('min'));
		if ($(this).val() < min){
			$(this).val(min);
		}       
	}); 


	$("#jml_tamu").change(function() {
		var min = parseInt($(this).attr('min'));
		if ($(this).val() < min){
			$(this).val(min);
		}       
	}); 

	
	$('#submitButton').on('click', function () {
		// let namaHotel = $(this).data('nama');
		// let idHotel = $(this).data('id');

		// $('#nama_hotel').text(namaHotel);
		// getData(idHotel, namaHotel);
		setCookie('data_booking', 'null');
		var status_pass = '';

		if($("#kota_tujuan").val() == 'default'){
		// 	status_pass = status_pass + '1';
		// } else {
			
			console.log('++++++++++++ kota kosong')
			alert('Kota tujuan kosong, silahkan diisi terlebih dahulu.')
			return false;
		}

		if($("#lama_menginap").val() == ''){
		// 	status_pass = status_pass + '1';
		// }else {
			console.log('++++++++++++ lama kosong')
			alert('Lama menginap kosong, silahkan diisi terlebih dahulu.')
			return false;
		} 

		if($("#jml_tamu").val() == ''){
			alert('Jumlah tamu kosong, silahkan diisi terlebih dahulu.')
			return false;
			
		}

		console.log(status_pass)
		console.log('--------------tgl_skrng')
		console.log($("#kota_tujuan").val())
		console.log($("#lama_menginap").val())
		console.log($("#jml_tamu").val())
		var sel = document.getElementById("kota_tujuan");
		var kota= sel.options[sel.selectedIndex].text;

		console.log('text')
		console.log(kota)
		// console.log(document.getElementById("kota_tujuan").value)
		// console.log(document.getElementById("kota_tujuan"))
		console.log(document.getElementById("lama_menginap").value)
		console.log(document.getElementById("jml_tamu").value)
		console.log(tgl_skrng)


		// id_kota, nama_kota, tgl_check_in, lama menginap, jml guest
		data = $("#kota_tujuan").val() + ',' + kota + ',' + tgl_skrng + ',' + document.getElementById("lama_menginap").value + ',' + document.getElementById("jml_tamu").value + ','
		
		console.log(data)
		setCookie('data_booking', data);
		setCookie('status_data_booking', 'active');

		// var_lokasi = '';
		// word_aktif = '';
		// pos_awal = 0;
		
		// if(data != null){
		// 	for(var i=0; i<data.length;i++) {
		// 		if (data[i] === ",") {
		// 			var_lokasi = var_lokasi +data.slice(pos_awal, (i)) + '<br>';
		// 			pos_awal = i+1;
		// 		}
		// 	}
		// } else {
		// 	var_lokasi = 'Kosong';
		// }
		
		// console.log(var_lokasi)
		// console.log($("#jml_tamu").value)
		// return false;
		window.location = "<?=base_url("/index.php/kataloghotel");?>";
		return false;
	});
	
	// function search_hotel(){
	// 	// setCookie('booking_section', active);
	// 	window.location = "<?=base_url("/index.php/kataloghotel");?>";
	// }

</script>

</html>
