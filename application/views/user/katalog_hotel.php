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
	<title>Katalog Hotel</title>
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
		</div>

		<div class="row " style="margin-bottom:20%;" id="all_hotel">
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

<script id="hotel_option" type="text/HTML">
	<a class="dropdown-item" id="hotel-item" href="#"></a>
</script>

<script id="list_hotel" type="text/HTML">
	<a href="#" class=" data-kamar p-0">
		<div class="col-sm-12">
			<div class="card" style="border-radius: 5px;margin-top:20px;" id="listHotel">

				<div class="card-body">
				<img src="http://localhost/acehotel/upload/photo_room_hotel/test.png"  width="100%" height="auto" >

					<!-- <img src="img_girl.jpg" alt="Girl in a jacket" width="500" height="600"> -->
				</div>
				
				<div class="card-footer">
					<input type="hidden" id="idHotelList">
					<label style="color:black;" id="namaHotel"></label><br>
					<label style="float:right;" id="hargaHotel">Rp. 300.000 / room / night</label>
				</div>
			</div>
		</div>
    </a>
</script>


<script>
	$(document).ready(function () {
		$("#explore_footer").addClass('is-active');
		$("#header_title").text('Explore Hotel');
		// getData(idHotelC, namaHotelC, dateFilter, today);
	});

</script>
<script>
	// $('.lds-ring').show();
	// $('.container').hide();
	// var idHotelC = getCookie('id_hotel');
	// var today = getToday();
	// var dateFilter = lastWeek();
	var data_booking = getCookie('data_booking');
    var arr_data_booking = [];

	
		
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
	// $(function () {
	// 	$('input[name="daterange"]').daterangepicker({
	// 		opens: 'left'
	// 	}, function (start, end, label) {
	// 		$('#nama_date').text(start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
	// 		filter = start.format('YYYY-MM-DD');
	// 		today = end.format('YYYY-MM-DD');
	// 		getData(idHotelC, namaHotelC, filter, today);
	// 	});
	// });

	$.when(getAllHotel()).done(function (getHotel) {


		for (var i = 0; i < getHotel.length; i++) {
			var tmp = $('#list_hotel')[0].innerHTML;
			tmp = $.parseHTML(tmp);
			
			console.log('------------')
			console.log(getHotel[i])
			console.log(arr_data_booking[0])

			if(getHotel[i].id_master_kota == arr_data_booking[0]){
				$(tmp).find('#idHotelList').text(getHotel[i].id_hotel)
				$(tmp).find('#namaHotel').append('<b>'+getHotel[i].nama_hotel+'</b><br> ' + arr_data_booking[1])
				// $(tmp).find('#hargaHotel').text(getHotel[i].ket_fasilitas)
				$(tmp).appendTo('#all_hotel');


			}

		}


	});
	
	function getAllHotel() {
		return $.ajax(
			"<?php echo base_url() ?>index.php/get_all_hotel/", {
				dataType: 'json'
			}
		);
	}


	
	
	$(document).on('click', '#listHotel', function () {
		let id_hotel = $(this).find('#idHotelList').text();

		console.log('ini nih klik')
		console.log(id_hotel)

		setCookie('open_kamar', id_hotel);
		window.location = "<?=base_url("/index.php/katalogkamar");?>";
	});


</script>


</html>