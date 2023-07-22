<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />

	<link rel="stylesheet" href="<?=base_url("dist/css/bootstrap.min.css");?>">
	<link rel="stylesheet" href="<?=base_url("dist/css/bootstrap-grid.min.css");?>">
	<link rel="stylesheet" href="<?=base_url("dist/css/style.css");?>">
	<link rel="stylesheet" href="<?=base_url("dist/css/style_header.css");?>">
	<link rel="stylesheet" href="<?=base_url("dist/css/font-awesome.min.css");?>">




	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
	<title>Katalog Kamar</title>
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

	#nama_hotel,
	#nama_date {
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
		<div class="row" style="margin-top:15%;">
		
			<div class="col-sm-12" style="padding-left: 0px; padding-right: 0px;">
				<div class="card" style="background-color: #eaeae1; width:100%; border-radius: 5px;">
					<div class="card-body">
						<label style="color:black;" id="label_data_booking"></label>
                        <button type="button" class="btn btn-block btn-outline-primary btn-lg" style="height:50px; width:100px; float:right;"><a  href="<?=base_url("/index.php/dashboarduser");?>">Ubah </a></button>
                        
					</div>
				</div>
			</div>

			
			<div class="col-sm-12" style="padding-left: 0px; padding-right: 0px; margin-top:3%;">
				<div class="card" style=" width:100%; border-radius: 5px;">
					<div class="card-body">
						<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
							<ol class="carousel-indicators">
								<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
								<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
								<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
							</ol>
							<div class="carousel-inner" id="src_foto_hotel">
							</div>
							<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
								<span class="sr-only">Previous</span>
							</a>
							<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
								<span class="carousel-control-next-icon" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
							</a>
						</div>
						
					</div>
    				<div class="card-footer">
						<label style="color:black;" id="nama_hotel_kamar"></label><br>
						<div id="list_fasilitas">
						</div>
						<label style="color:black; margin-top:10px;" id="alamat_hotel"></label><br>
					</div>
				</div>
			</div>
		</div>

		
		<div class="row " style="margin-bottom:20%;" id="all_kamar">
		</div>
		
		<div class="modal fade" id="revenueModal" tabindex="-1" role="dialog" aria-labelledby="revenueModalLabel"
			aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<form id="checkin_booking">
						<div class="modal-header">
							<h5 class="modal-title" id="revenueModalLabel">Detail Revenue</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<p id="waitDetail">Please Wait</p>
							<div class="col-12 no-padding" id="modalContent">

								<a id="downloadReport"><button type="button" class="btn btn-success w-100">Download
										Report</button></a>
								<div id="listRevenue" class="tab-pane active"><br>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
							</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<?php $this->load->view("user/footer");?>
</body>
<script src="<?=base_url("dist/js/jquery.min.js");?>"></script>
<script src="<?=base_url("dist/js/popper.min.js");?>"></script>
<script src="<?=base_url("dist/js/bootstrap.min.js");?>"></script>
<script src="<?=base_url("dist/js/function.js");?>"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>



<script id="list_kamar" type="text/HTML">
	<a href="#" class=" data-kamar p-0">
		<div class="col-sm-12">
			<div class="card" style="border-radius: 5px;margin-top:20px;">

				<div class="card-body" id="divFotoKamar">
				</div>
				
				<div class="card-footer">
					<input type="hidden" id="idKamarList">
					<label style="color:black;" id="namaKamar"></label><br>
					<ul style="list-style-type:disc; margin-left: 10%; color:black;" id="listFasilitasKamar">
						<!-- <li>Coffee</li>
						<li>Tea</li>
						<li>Milk</li> -->
					</ul> 
					<label id="hargaKamar" style="font-size: 25px;"></label><br>
					<label> 1 room, 1 night</label>
					<div id="oke" style="float:right">
					<!-- <button type="button" class="btn btn-block btn-primary btn-lg" id="btn_pilih_kamar" onclick="pilihkamar('upcoming')" style=" width:100px; font-size: 20px;float:right;">Pilih</button> -->
					</div>

				</div>
			</div>
		</div>
    </a>
</script>

<script>
	$(document).ready(function () {
		$("#explore_footer").addClass('is-active');
		$("#header_title").text('Katalog Kamar');
		// getData(idHotelC, namaHotelC, dateFilter, today);
	});

</script>
<script>
	// $('.lds-ring').show();
	// $('.container').hide();
	var idHotel = getCookie('open_kamar');
	// var idHotelC = getCookie('id_hotel');
	// var today = getToday();
	// var dateFilter = lastWeek();
	
	var data_booking = getCookie('data_booking');
    var arr_data_booking = [];
	// var path = 'acehotel-indonesia.com/manajemen';
	var path = 'localhost/acehotel';

	
		
	console.log('data_booking')
	console.log(data_booking)

	
	var_lokasi = '';
	word_aktif = '';
	pos_awal = 0;
	
	if(data_booking != null){
		for(var i=0; i<data_booking.length;i++) {
			if (data_booking[i] === ",") {
				// var_lokasi = var_lokasi +data_booking.slice(pos_awal, (i)) + '<br>';
				var_lokasi = data_booking.slice(pos_awal, (i));
				arr_data_booking.push(var_lokasi);   
				pos_awal = i+1;
			}
		}
	}

	
	$('#label_data_booking').append('<b>'+ arr_data_booking[1] +'</b>  '+ arr_data_booking[4] +' Tamu<br> '+ arr_data_booking[2] +', '+ arr_data_booking[3] +' Hari')
	
	console.log('arr_status')

	console.log(arr_data_booking)
	console.log(arr_data_booking[0])
	console.log(arr_data_booking[1])

	console.log('--codenya')
	console.log(idHotel)

	$(function () {
		$('input[name="daterange"]').daterangepicker({
			opens: 'left'
		}, function (start, end, label) {
			$('#nama_date').text(start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
			filter = start.format('YYYY-MM-DD');
			today = end.format('YYYY-MM-DD');
			getData(idHotelC, namaHotelC, filter, today);
		});
	});

	

	
	$.when(getKamar(idHotel), getHotel(idHotel)).done(function (getKamar, getHotel) {

		console.log('---data')
		console.log(getKamar)


		for (var i = 0; i < getKamar[0].length; i++) {

			if (parseInt(getKamar[0][i].jml_kamar_kosong) > 0){
				var tmp = $('#list_kamar')[0].innerHTML;
				tmp = $.parseHTML(tmp);
				
				console.log('------------id_kamar')
				console.log(getKamar[0][i])
				console.log(getKamar[0][i].id_kamar)
				console.log(getKamar[0][i].type_bed)

				type = getKamar[0][i].type_bed;
				fas = '';
				fas = fas + '<li>' + getKamar[0][i].max_guest + ' Tamu </li>' 
				pos_awal = 0;
				
				if(type != null){
					for(var j=0; j<type.length;j++) {
						if (type[j] == ",") {
							// var_lokasi = var_lokasi +getKamar[0][i].type_bed.slice(pos_awal, (i)) + '<br>';
							var_lokasi = type.slice(pos_awal, (j));
							// arr_data_booking.push(var_lokasi);   
							fas = fas + '<li>' + var_lokasi + '</li>' 
							pos_awal = j+1;
							console.log('ini')
						}
					}
				}

				console.log('fas')
				console.log(fas)
				

				// $(tmp).find('#idKamarList').text(getKamar[0][i].id_kamar);

				if(getKamar[0][i].src_foto_kamar == null){
					console.log('ksng')
					src_foto = 'http://'+ path +'/upload/image_not_found.jpg';
				} else {
					src_foto = 'http://'+ path +'/upload/photo_room_hotel/' + getKamar[0][i].src_foto_kamar;
				}


				
				$(tmp).find('#divFotoKamar').append('<img src="'+ src_foto +'"  width="100%" height="auto" >');
				$(tmp).find('#namaKamar').append('<b>'+ getKamar[0][i].nama_kamar +'</b>');
				$(tmp).find('#listFasilitasKamar').append(fas);
				$(tmp).find('#hargaKamar').append('<b><i>' + pembulatan(parseInt(getKamar[0][i].harga_kamar)) + ' </i></b>');
				$(tmp).find('#idKamarList').data('id', getKamar[0][i].id_kamar);
				$(tmp).find('#oke').append('<button type="button" class="btn btn-block btn-primary btn-lg" id="btn_pilih_kamar" onclick="pilihkamar('+getKamar[0][i].id_kamar+')" style=" width:100px; font-size: 20px;float:right;">Pilih</button>');
				
				$(tmp).appendTo('#all_kamar');
			}

		}
		
		console.log(getHotel)
		if(getHotel.length > 0){
			$('#nama_hotel_kamar').append('<b>'+ getHotel[0][0].nama_hotel+'</b>');
			$('#alamat_hotel').append('<i class="fa fa-map-marker" aria-hidden="true"></i> ' + getHotel[0][0].alamat_hotel);
		}

		$('.lds-ring').hide();
	});

	
	$.when(getAllFasilitas(idHotel), getAllFoto(idHotel)).done(function (getFasilitas, getFoto) {

		var fas_hotel = '';
		var fas_foto = '';
		var src_default_foto = 'http://'+ path +'/upload/hotel_description_photo/default_hotel.jpg';

		for (var i = 0; i < getFasilitas[0].length; i++) {
			fas_hotel = fas_hotel + '<button type="button" class="btn btn-outline-primary btn-lg" style="height:40px; width:auto; font-size: 20px;display:inline-block; margin-right: 5px; margin-bottom: 10px;"">'+ getFasilitas[0][i].nama_fasilitas +'</button>';

		}
		
		for (var i = 0; i < getFoto[0].length; i++) {
			src_foto = 'http://'+ path +'/upload/hotel_description_photo/' + getFoto[0][i].src_foto;

			if (i == 0){
				fas_foto = fas_foto + '<div class="carousel-item active">'+
										'<img class="d-block w-100" src="'+ src_foto +'" alt="First slide">' +
									'</div>';
			
			} else {
				fas_foto = fas_foto + '<div class="carousel-item">'+
										'<img class="d-block w-100" src="'+ src_foto +'" alt="First slide">' +
									'</div>';
			}
			
		}
		
		if(fas_foto == ''){
			fas_foto =  '<div class="carousel-item active">'+
							'<img class="d-block w-100" src="'+ src_default_foto +'" alt="First slide">' +
						'</div>';

		}

		$('#list_fasilitas').append(fas_hotel);
		$('#src_foto_hotel').append(fas_foto);


	});


	// $(document).on('click', '.data-kamar', function () {
	// 	var idKamar = $(this).data('id');
	// 	console.log('idKamar');
	// 	console.log($(this));
	// 	console.log($(this).data());
	// 	console.log(idKamar);
	// 	setCookie('id_kamar', idKamar);
	// });

	
	function getKamar(idHotel) {
		return $.ajax(
			"<?php echo base_url() ?>index.php/get_harga_kamar_by_hotel/" + idHotel + "/" + arr_data_booking[2] , {
				dataType: 'json'
			}
		);
	}

	function getHotel(idHotel) {
		return $.ajax(
			"<?php echo base_url() ?>index.php/get_hotel_by_id/" + idHotel, {
				dataType: 'json'
			}
		);
	}
	
	function getAllFasilitas(idHotel) {
		return $.ajax(
			"<?php echo base_url() ?>index.php/get_fasilitas_by_hotel/" + idHotel, {
				dataType: 'json'
			}
		);
	}
	
	function getAllFoto(idHotel) {
		return $.ajax(
			"<?php echo base_url() ?>index.php/get_foto_by_hotel/" + idHotel, {
				dataType: 'json'
			}
		);
	}

	

	
	function pilihkamar(active) {
		// setCookie('booking_section', active);
		console.log('ini')
		console.log(active)
		setCookie('id_kamar_check_in', active);
		window.location = "<?=base_url("/index.php/bookinguser");?>";
	}
	
	// $(document).on('click', '#listHotel', function () {
	// 	let id_hotel = $(this).find('#idHotelList').text();

	// 	console.log('ini nih klik')
	// 	console.log(id_hotel)

	// 	setCookie('open_kamar', id_hotel);
	// 	window.location = "<?=base_url("/index.php/katalogkamar");?>";
	// });

	
    function pembulatan(harga){      
		var	reverse = harga.toString().split('').reverse().join(''),
			ribuan 	= reverse.match(/\d{1,3}/g);
			ribuan	= ribuan.join('.').split('').reverse().join('');

			
		var harga = 'Rp. ' + ribuan;
		return harga;
    }

</script>


</html>
