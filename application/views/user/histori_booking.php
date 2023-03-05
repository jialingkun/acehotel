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
	<title>Order</title>
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
		<div class="row " style="margin-top:25%; margin-bottom:5%;">
            <div class="col-5 text-center">
					<label>Filter History : </label>     
			</div>
            <div class="col-7 text-center" style="">
				       
				<select id="filter_history" class="custom-select">
					<option selected value="active_ticket" id="option_history">Active </option>
					<option value="old_ticket" id="option_history">Old Ticket</option>
					<option value="all_ticket" id="option_history">All History</option>
				</select>
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
	<!-- <a href="#" class=" data-kamar" style="width:100%;"> -->
		<div class="col-sm-12" style="width:100%;">
			<div class="card" style="border-radius: 5px;margin-top:20px;" id="listHotel">

				<div class="card-body">
					<input type="hidden" id="idHotelList">
					<label style="color:black;" id="namaHotel"></label><br>
					<label style="color:black;" id="tgl_check_in_out"></label><br>
					<!-- <label style="float:right;" id="hargaHotel">Rp. 300.000 / room / night</label> -->
					<div id="btn_details" style="display: flex;"></div>
                    <!-- <button type="button" class="btn btn-sm btn-outline-primary" id="nama_date">View Detail</button> -->
				</div>
				
				<!-- <div class="card-footer">
				</div> -->
			</div>
		</div>
    <!-- </a> -->
</script>


<script>
	$(document).ready(function () {
		$("#order_footer").addClass('is-active');
		$("#header_title").text('Order');
		// getData(idHotelC, namaHotelC, dateFilter, today);
	});

</script>
<script>
	$('.lds-ring').hide();
	// $('.container').hide();
	// var idHotelC = getCookie('id_hotel');
	// var today = getToday();
	// var dateFilter = lastWeek();
	var data_booking = getCookie('data_booking');
    var arr_data_history = [];

	
	var loginuseroauth = "<?php echo $_SESSION['login_oauth'] ?>";
	var loginuserName = "<?php echo $_SESSION['login_nama'] ?>";
	var loginuseremail = "<?php echo $_SESSION['login_email'] ?>";

	
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

		console.log('-------getHotel.length-')
		console.log(getHotel.length)

		arr_data_history = getHotel;

		for (var i = 0; i < getHotel.length; i++) {
			if(getHotel[i].status_order != 'completed'){
				var tmp = $('#list_hotel')[0].innerHTML;
				tmp = $.parseHTML(tmp);
				
				tgl_check_in = new Date(getHotel[i].tanggal_check_in);
				tgl_check_out = new Date(getHotel[i].tanggal_check_out);
				btn_completed = '';

				var Difference_In_Time = tgl_check_out.getTime() - tgl_check_in.getTime();

				var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);

				console.log('------------')
				console.log(getHotel[i])
				// console.log(arr_data_booking[0])
				console.log(Difference_In_Days)

				
				if(getHotel[i].status_order == 'waiting_payment'){
					btn_completed = '<button type="button" class="btn btn-sm btn-danger" id="nama_date" style="margin-left:10px;" >Belum Lunas</button>';
				} else {
					btn_completed = '<button type="button" class="btn btn-sm btn-primary" id="nama_date" style="margin-left:10px;" >Lunas</button>';
				}


				// if(getHotel[i].id_master_kota == arr_data_booking[0]){
				$(tmp).find('#idHotelList').text(getHotel[i].id_order)
				$(tmp).find('#namaHotel').append('<b>'+getHotel[i].nama_hotel+'</b> ' )
				$(tmp).find('#tgl_check_in_out').append( getHotel[i].tanggal_check_in +' &#x2022; ' + Difference_In_Days+' nights &#x2022; ' + getHotel[i].nama_kota)
				
				$(tmp).find('#btn_details').append('<button type="button" class="btn btn-sm btn-outline-primary" id="nama_date" onclick="viewdetails('+getHotel[i].id_order+')" >View Detail</button>' + btn_completed)
				// $(tmp).find('#hargaHotel').text(getHotel[i].ket_fasilitas)
				$(tmp).appendTo('#all_hotel');


			}

		}

		// if(getHotel.length == 0){
			
		// }


	});
	
	function getAllHotel() {
		return $.ajax(
			"<?php echo base_url() ?>index.php/get_order_by_user/" + loginuseroauth, {
				dataType: 'json'
			}
		);
	}

	function reload_history(filter) {
		
		// arr_data_history

		var status_order_now = '';


		$("#all_hotel").text('')

		for (var i = 0; i < arr_data_history.length; i++) {
			console.log(arr_data_history[i].status_order);

			var status_pass = '0';
			var btn_completed = '';
			
			
			if(filter == 'active_ticket'){
				console.log('act');
				if(arr_data_history[i].status_order != 'completed'){
					status_pass = '1';
					if(arr_data_history[i].status_order == 'waiting_payment'){
						btn_completed = '<button type="button" class="btn btn-sm btn-danger" id="nama_date" style="margin-left:10px;" >Belum Lunas</button>';

					} else {
						btn_completed = '<button type="button" class="btn btn-sm btn-primary" id="nama_date" style="margin-left:10px;" >Lunas</button>';

					}
				}
			} else if(filter == 'old_ticket'){
				console.log('old');
				if(arr_data_history[i].status_order == 'completed'){
					status_pass = '1';
					btn_completed = '<button type="button" class="btn btn-sm btn-success" id="nama_date" style="margin-left:10px;" >Complete</button>';
				}

			} else if(filter == 'all_ticket'){
				console.log('all');
				status_pass = '1';
				if(arr_data_history[i].status_order == 'completed'){
					btn_completed = '<button type="button" class="btn btn-sm btn-success" id="nama_date" style="margin-left:10px;" >Complete</button>';
				} else if(arr_data_history[i].status_order == 'waiting_payment'){
					btn_completed = '<button type="button" class="btn btn-sm btn-danger" id="nama_date" style="margin-left:10px;" >Belum Lunas</button>';
				} else {
					btn_completed = '<button type="button" class="btn btn-sm btn-primary" id="nama_date" style="margin-left:10px;" >Lunas</button>';
				}

			}


			if(status_pass == '1'){
				var tmp = $('#list_hotel')[0].innerHTML;
				tmp = $.parseHTML(tmp);
				
				tgl_check_in = new Date(arr_data_history[i].tanggal_check_in);
				tgl_check_out = new Date(arr_data_history[i].tanggal_check_out);

				var Difference_In_Time = tgl_check_out.getTime() - tgl_check_in.getTime();

				var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);

				console.log('------------')
				console.log(arr_data_history[i])
				console.log(Difference_In_Days)


				$(tmp).find('#idHotelList').text(arr_data_history[i].id_order)
				$(tmp).find('#namaHotel').append('<b>'+arr_data_history[i].nama_hotel+'</b> ' )
				$(tmp).find('#tgl_check_in_out').append( arr_data_history[i].tanggal_check_in +' &#x2022; ' + Difference_In_Days+' nights &#x2022; ' + arr_data_history[i].nama_kota)
				
				$(tmp).find('#btn_details').append('<button type="button" class="btn btn-sm btn-outline-primary" id="nama_date" onclick="viewdetails('+arr_data_history[i].id_order+')" >View Detail</button>' + btn_completed)
				$(tmp).appendTo('#all_hotel');
			}

		}

		$('.lds-ring').hide();


	}


	function viewdetails(active) {
		// setCookie('booking_section', active);
		console.log('ini')
		console.log(active)
		setCookie('id_booking_kamar', active);
		window.location = "<?=base_url("/index.php/bookingdetails");?>";
	}
	
	
	// $(document).on('click', '#listHotel', function () {
	// 	let id_hotel = $(this).find('#idHotelList').text();

	// 	console.log('ini nih klik')
	// 	console.log(id_hotel)

	// 	setCookie('open_kamar', id_hotel);
	// 	window.location = "<?=base_url("/index.php/bookingdetails");?>";
	// });

	$("#filter_history").change(function (e) { 
		console.log('--change')
		console.log($("#filter_history").val())
		$('.lds-ring').show();
		
		reload_history($("#filter_history").val())
    });


</script>


</html>
