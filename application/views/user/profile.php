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




	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
	<title>Profile</title>
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
		<div class="row " style="margin-top:40%; margin-bottom:20%;">
			<div class="col-sm-12">
				<a class="list-group-item list-group-item-action flex-column align-items-start mgn-list"
					id="totalDetail" data-toggle="modal" data-target="#revenueModal">
					<!-- <div class="w-100 ">
						<span>Total Revenue</span>
						<h5 id="totalRevenue"></h5>
					</div> -->

                    <form id="insert_booking" onsubmit="insertOrder(event)"  style="margin-top:10%; margin-bottom:10%;">
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
                                readonly>
                        </div>
                    </form>
				</a>
                        <div style="margin-top:20px;">

                            <button type="button" id="editbtn" class="btn btn-block btn-primary btn-lg" style="font-size: 17px;">Edit Profile</button>

                            <button type="button" id="exitbtn" class="btn btn-block btn-danger btn-lg" style="font-size: 17px;">Log Out</button>

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
		$("#account_footer").addClass('is-active');
		$("#header_title").text('Profile');
		// getData(idHotelC, namaHotelC, dateFilter, today);
	});

</script>
<script>
	$('.lds-ring').hide();
	// $('.container').hide();
	// var namaHotelC = getCookie('nama_hotel');
	// var idHotelC = getCookie('id_hotel');
	// var today = getToday();
	// var dateFilter = lastWeek();

	
	var loginuserid = '';
	var loginuseroauth = "<?php echo $_SESSION['login_oauth'] ?>";
	var loginuserName = "<?php echo $_SESSION['login_nama'] ?>";
	var loginuseremail = "<?php echo $_SESSION['login_email'] ?>";


	
	// $('#nama_pemesan').val(loginuserName)
	// $('#telepon_pemesan').val('123')
	$('#email_pemesan').val(loginuseremail)

	
	$.when(getProfile()).done(function (getProfile) {

		console.log('----------- getProfile-')
		console.log(getProfile[0]);
		console.log(getProfile[0]['telepon_user']);
		console.log(getProfile[0]['nama_user']);

		loginuserid = getProfile[0]['id_user'];
		
		$('#nama_pemesan').val(getProfile[0]['nama_user'])

		if(getProfile[0]['telepon_user'] == null){
			$('#telepon_pemesan').val('00')

		}else {
			$('#telepon_pemesan').val(getProfile[0]['telepon_user'])
		}

	})


	
	function getProfile() {
		return $.ajax(
			"<?php echo base_url() ?>index.php/get_user_by_email/" + loginuseroauth , {
				dataType: 'json'
			}
		);
	}


	$(document).on('click', '#editbtn', function () {
		if (confirm("Apakah anda yakin ?")) {


			let formData = new FormData();
			// var inputid = document.getElementById("id_akun").value;
			var inputnama = document.getElementById("nama_pemesan").value;
			var inputtelp = document.getElementById("telepon_pemesan").value;
			var inputemail = document.getElementById("email_pemesan").value;

			
			// formData.append('id_kamar', arr_data_kamar.id_kamar);
			// formData.append('id_user', loginuserid);
			// formData.append('id_hotel', arr_data_kamar.id_hotel);
			formData.append('nama_pemesan', inputnama);
			formData.append('telepon_pemesan', inputtelp);
			// formData.append('email_pemesan', inputemail);


			$.ajax({
				url: "<?php echo base_url()?>index.php/update_user/"+ loginuserid,
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
					alert(json)

				},
				error: function () {
					$("#submit_add").prop("disabled", false);
					console.log('gagal')	
				}
			});
		}
	})


	

	$(document).on('click', '#exitbtn', function () {
		if (confirm("Apakah anda yakin ?")) {
			// return $.ajax(
			// 	"<?php echo base_url() ?>index.php/logoutsession" , {
			// 		dataType: 'json'
			// 	}
			// );

			$.ajax({
				url: "<?php echo base_url()?>index.php/logoutsession",
				type: 'POST',
				success: function (json) {
					// alert(json)
					
					window.location = "<?php echo base_url() ?>index.php/loginuser";

				},
				error: function () {
					$("#submit_add").prop("disabled", false);
					console.log('gagal')	
				}
			});

		}
	})
	

</script>


</html>
