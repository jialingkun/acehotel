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
		/* white-space: nowrap;
		width: 7em; */
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
		<div class="row" style="margin-top:20%;">
			<div class="col-sm-12">
				<div class="card" style="border-radius: 5px;margin-top:20px;">

					<div class="card-body">
                        <h3><span class="badge badge-white">Booking Hotel</span></h3>

                        <div class="w-100 ">
                            <span id="nama_hotel" style="margin-bottom: 10px;"></span>
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
                            <div class="form-group" style="margin-bottom: 0;">
                                <label>Nama Pemesan</label><br>
                                <label id="nama_pemesan"></label><br>
                                <label>Telepon</label><br>
                                <label id="telepon_pemesan"></label><br>
                                <label>Email</label><br>
                                <label id="email_pemesan"></label>
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
				<div class="card" style="border-radius: 5px;margin-top:20px;margin-bottom:50px;">
					<div class="card-body">
                        <a id="invoicebtn" class="btn btn-primary btn-md float-right" style="width:100%; dispaly:none;">
                            <span>Download Invoice</span>
						</a>
						
                        <a id="paymentbtn" class="btn btn-primary btn-md float-right" style="width:100%; dispaly:none;">
							<span>Payment</span>
						</a>
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
		$("#order_footer").addClass('is-active');
		$("#header_title").text('Booking Details');
		// getData(idHotelC, namaHotelC, dateFilter, today);
	});

</script>
<script>
	$('.lds-ring').hide();
    var idBooking = getCookie('id_booking_kamar');
	var idKamarCheckIn = getCookie('id_kamar_check_in');
	var total_harga = 0;
	var idHotel = getCookie('open_kamar');
	
	var data_booking = getCookie('data_booking');
    var arr_data_booking = [];
    var arr_data_kamar = [];

	
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
    hari.setDate(hari.getDate() + parseInt(arr_data_booking[3]));
    console.log(hari);
	// console.log(date.format('YYYY-MM-DD'))

	
    var dd = (hari.getDate() < 10 ? '0' : '') + hari.getDate();
    var mm = ((hari.getMonth() + 1) < 10 ? '0' : '') + (hari.getMonth() + 1);
    var check_out = hari.getFullYear() +'-'+ mm +'-'+ dd;
    console.log(check_out);



	// text_booking = text_booking + '<li>'+arr_data_booking[4]+' Tamu</li>'
	// text_booking = text_booking + '<li> Check In : '+arr_data_booking[2]+'</li>'
	// text_booking = text_booking + '<li> Check Out : '+check_out+'</li>'

	// $('#list_data_booking').append(text_booking)


	console.log('tambahan')
	// console.log(tgl_mulai.addDays(5));

	
	// $('#nama_pemesan').text('data')
    // $('#telepon_pemesan').text('123')
	// $('#email_pemesan').text('data')
	// $('#total_bayar').text('Total : Rp. ' + total_harga)
	

	$.when(getKamar()).done(function (getKamar) {

        console.log('getKamar[0][i].total_harga');
        console.log(getKamar[0].total_harga);
		var no = 1;
        
		$('#nama_hotel').text(getKamar[0].nama_hotel)
	    $('#total_bayar').text('Total : ' + pembulatan(parseInt(getKamar[0].total_harga)))

        text_booking = text_booking + '<li>'+ getKamar[0].jumlah_guest +' Tamu</li>'
        text_booking = text_booking + '<li> Check In : '+ getKamar[0].tanggal_check_in +'</li>'
        text_booking = text_booking + '<li> Check Out : '+ getKamar[0].tanggal_check_out +'</li>'

        $('#list_data_booking').append(text_booking)
        
        $('#nama_pemesan').append('<ul style="list-style-type:disc; margin-left: 40px; color:gray; width: 100%;"><li>'+ getKamar[0].nama_pemesan +'</li></ul>')
        $('#telepon_pemesan').append('<ul style="list-style-type:disc; margin-left: 40px; color:gray; width: 100%;"><li>'+ getKamar[0].telepon_pemesan +'</li></ul>')
        $('#email_pemesan').append('<ul style="list-style-type:disc; margin-left: 40px; color:gray; width: 100%;"><li>'+ getKamar[0].email_pemesan +'</li></ul>')

		if(getKamar[0].status_order == 'waiting_payment'){
			document.getElementById("paymentbtn").style.display = "block";
			document.getElementById("invoicebtn").style.display = "none";
			// document.getElementById("paymentbtn").href = "<?=base_url("/index.php/profileuser");?>"
			

		} else {
			document.getElementById("invoicebtn").style.display = "block";
			document.getElementById("paymentbtn").style.display = "none";
			document.getElementById("invoicebtn").href = '<?php echo base_url() ?>' + 'index.php/invoice_pdf?id=' + no ;

		}
		
		type = getKamar[0].type_bed;
		fas = '';
		fas = fas + '<li>' + getKamar[0].max_guest + ' Tamu </li>' 
		pos_awal = 0;
		
		if(type != null){
			for(var j=0; j<type.length;j++) {
				if (type[j] == ",") {
					var_lokasi = type.slice(pos_awal, (j));
					fas = fas + '<li>' + var_lokasi + '</li>' 
					pos_awal = j+1;
				}
			}
		}

		$('#listFasilitasKamar').append(fas);


	});

	
    // $(document).on('submit', '#submitButton', function (event) {
	$(document).on('click', '#submitButton', function () {
	
		let formData = new FormData();
		// var inputid = document.getElementById("id_akun").value;
		// var inputnama = document.getElementById("id_akun").value;
		// var inputtel = document.getElementById("id_akun").value;
		// var inputemail = document.getElementById("id_akun").value;
		// var inputktp = document.getElementById("id_akun").value;
		// var inputcheckin = document.getElementById("id_akun").value;
		// var inputcheckout = document.getElementById("id_akun").value;
		// var inputjmlguest = document.getElementById("id_akun").value;
		// var inputjmlroom = document.getElementById("id_akun").value;
		// var inputreqcheckin = document.getElementById("id_akun").value;
		// var inputreqcheckout = document.getElementById("id_akun").value;
		// var inputreqmkn = document.getElementById("id_akun").value;
		// var inputreqcar = document.getElementById("id_akun").value;
		// var inputharga = document.getElementById("id_akun").value;
		// var inputsumber = document.getElementById("id_akun").value;
		ksng = '';

		formData.append('id_kamar', arr_data_kamar.id_kamar);
		formData.append('id_hotel', arr_data_kamar.id_hotel);
		formData.append('nama_pemesan', 'test');
		formData.append('telepon_pemesan', 'inputid');
		formData.append('email_pemesan', 'inputid');
		formData.append('no_ktp_pemesan', 'inputid');
		formData.append('tanggal_check_in', arr_data_booking[2]);
		formData.append('tanggal_check_out',check_out);
		formData.append('jumlah_guest', arr_data_booking[4]);
		formData.append('jumlah_room', 1);
		formData.append('request_jam_check_in_awal', ksng);
		formData.append('request_jam_check_in_akhir', ksng);
		formData.append('request_breakfast', ksng);
		formData.append('request_rent_car', ksng);
		formData.append('total_harga', total_harga);
		formData.append('sumber_order', 'on_process');

		console.log(arr_data_kamar)
		console.log(arr_data_kamar.id_kamar)

		$.ajax({
            url: "<?php echo base_url()?>index.php/insert_order/",
            type: 'POST',
            timeout: 1800000,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){			
              	// $("#submit_add").prop("disabled", true);				
            },
            success: function (json) {
				alert(json);
				console.log(json);
				// send_email();

				// alert('Data Berhasil Ditambahkan!');
				// window.location = "<?php echo base_url() ?>index.php/saldo";

            },
            error: function () {
              	$("#submit_add").prop("disabled", false);
				console.log('gagal')	
            }
        });

	
	});
	
	
	function getKamar() {
		return $.ajax(
			"<?php echo base_url() ?>index.php/get_order_by_id/" + idBooking, {
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
