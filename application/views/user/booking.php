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
	<title>Booking Details</title>
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
	<?php $this->load->view("admin/header");?>
	<div class="lds-ring">
		<div></div>
		<div></div>
		<div></div>
		<div></div>
	</div>
	<div class="container">
		<div class="row" style="margin-top:20%;">
			<div class="col-sm-12">
				<div class="card" style="border-radius: 5px;margin-top:20px;">

					<div class="card-body">
                        <h3><span class="badge badge-white">Booking Hotel</span></h3>

                        <div class="w-100 ">
                            <span id="nama_hotel">Oakwood Hotel & Residence Surabaya</span>
                            <!-- <h5 id="totalSource"></h5> -->
                            <ul style="list-style-type:disc; margin-left: 10%; color:black;" id="list_data_booking">
                                <!-- <li>Coffee</li>
                                <li>Tea</li>
                                <li>Milk</li> -->
                            </ul> 
                        </div>
					</div>
					
				</div>
			</div>

            <div class="col-sm-12">
				<div class="card" style="border-radius: 5px;margin-top:20px;">
					<div class="card-body">
                        <h4><span class="badge badge-white" id="nama_kamar">Superior Twin</span></h4>

                        <div class="w-100 ">
                            <ul style="list-style-type:disc; margin-left: 10%; color:black;" id="listFasilitasKamar">
                                <!-- <li>Coffee</li>
                                <li>Tea</li>
                                <li>Milk</li> -->
                            </ul> 
                        </div>

                        
                        <h3><span class="badge badge-white">Isi Data Pemesan</span></h3>
                        <form id="insert_booking" onsubmit="insertOrder(event)">
                            <div class="form-group">
                                <label>Nama Pemesan</label>
                                <input type="text" id="nama_pemesan" name="nama_pemesan" class="form-control"
                                    pattern="^[A-Za-z ,.'-]+$" required>
                            </div>
                            <div class="form-group">
                                <label>Telepon</label>
                                <input type="tel" id="telepon_pemesan" name="telepon_pemesan" class="form-control"
                                    required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" id="email_pemesan" name="email_pemesan" class="form-control"
                                    required>
                            </div>
                        </form>
					</div>
				</div>
			</div>
            
			<div class="col-sm-12">
				<div class="card" style="border-radius: 5px;margin-top:20px;">
					<div class="card-body">
                        <h3><span class="badge badge-white" id="total_bayar">Total : </span></h3>
					</div>
				</div>
			</div>
            
			<div class="col-sm-12">
				<div class="card" style="border-radius: 5px;margin-top:20px;margin-bottom:40px;">
					<div class="card-body">
                        <button type="submit" id="submitButton" class="btn btn-primary btn-md float-right" style="width:100%;">
                            <span id="submit">Lanjutkan Pembayaran</span>
                        </button>
					</div>
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

<script id="hotel_option" type="text/HTML">
	<a class="dropdown-item" id="hotel-item" href="#"></a>
</script>


<script>
	$(document).ready(function () {
		$("#explore_footer").addClass('is-active');
		$("#header_title").text('Booking');
		// getData(idHotelC, namaHotelC, dateFilter, today);
	});

</script>
<script>
	$('.lds-ring').hide();
	var idKamarCheckIn = getCookie('id_kamar_check_in');
	var total_harga = 0;
	var idHotel = getCookie('open_kamar');
	
	var data_booking = getCookie('data_booking');
    var arr_data_booking = [];

	
    // var hari = new Date();
    // var dd = (hari.getDate() < 10 ? '0' : '') + hari.getDate();
    // var mm = ((hari.getMonth() + 1) < 10 ? '0' : '') + (hari.getMonth() + 1);
    // var tgl_mulai = hari.getFullYear() +'-'+ mm +'-'+ dd;
    // var tgl_akhir = hari.getFullYear() +'-'+ mm +'-'+ dd;

	console.log('data_booking')
	console.log(data_booking)
	// console.log(tgl_mulai)

	
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

	
	// $('#label_data_booking').append('<b>'+ arr_data_booking[1] +'</b>  '+ arr_data_booking[4] +' Tamu<br> '+ arr_data_booking[2] +', '+ arr_data_booking[3] +' Hari')
	
	console.log('arr_status')

	console.log(arr_data_booking)
	console.log(arr_data_booking[0])
	console.log(arr_data_booking[1])

	var text_booking = '';

	
	var hari = new Date(arr_data_booking[2]);
    hari.setDate(hari.getDate() + 5);
    console.log(hari);
	// console.log(date.format('YYYY-MM-DD'))

	
    var dd = (hari.getDate() < 10 ? '0' : '') + hari.getDate();
    var mm = ((hari.getMonth() + 1) < 10 ? '0' : '') + (hari.getMonth() + 1);
    var check_out = hari.getFullYear() +'-'+ mm +'-'+ dd;
    console.log(check_out);



	text_booking = text_booking + '<li>'+arr_data_booking[4]+' Tamu</li>'
	text_booking = text_booking + '<li> Check In : '+arr_data_booking[2]+'</li>'
	text_booking = text_booking + '<li> Check Out : '+check_out+'</li>'

	$('#nama_hotel').text(arr_data_booking[1])
	$('#list_data_booking').append(text_booking)


	console.log('tambahan')
	// console.log(tgl_mulai.addDays(5));

	
	$('#nama_pemesan').val('data')
	$('#telepon_pemesan').val('123')
	$('#email_pemesan').val('data')
	$('#total_bayar').text('Total : Rp. ' + total_harga)
	

	$.when(getHotel()).done(function (getKamar) {


		for (var i = 0; i < getKamar.length; i++) {
			// var tmp = $('#list_hotel')[0].innerHTML;
			// tmp = $.parseHTML(tmp);
			
			console.log('------------')
			console.log(getKamar[i])

			type = getKamar[i].type_bed;
			fas = '';
			fas = fas + '<li>' + getKamar[i].max_guest + ' Tamu </li>' 
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


			total_harga = getKamar[i].harga_awal * parseInt(arr_data_booking[3])

			$('#total_bayar').text('Total : ' + pembulatan(total_harga))
			
			$('#listFasilitasKamar').append(fas);

		}


	});

	
	function getHotel() {
		return $.ajax(
			"<?php echo base_url() ?>index.php/get_kamar_by_id/" + idKamarCheckIn, {
				dataType: 'json'
			}
		);
	}

	
    function pembulatan(harga){      
		var	reverse = harga.toString().split('').reverse().join(''),
			ribuan 	= reverse.match(/\d{1,3}/g);
			ribuan	= ribuan.join('.').split('').reverse().join('');

			
		var harga = 'Rp. ' + ribuan;
		return harga;
    }

</script>


</html>
