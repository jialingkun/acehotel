<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />

	<link rel="stylesheet" href="<?=base_url("dist/css/bootstrap.min.css");?>">
	<link rel="stylesheet" href="<?=base_url("dist/css/bootstrap-grid.min.css");?>">
	<link rel="stylesheet" href="<?=base_url("dist/css/style.css");?>">

	<title>LOGIN</title>
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
		border: solid 1px grey;
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
	<div class="row global-row">
		<div class="col-sm-12 no-padding">
			<div class="login-box">
				<h2 class="text-center"><small>WELCOME</small></h2>
				<p class="text-center grey-text" style="width: 80%; padding-left: 20%;"><small>Pesan hotel pilihanmu hanya di aplikasi <b>ACE HOTEL</b> dengan harga terjangkau, kualitas papan atas</small></p>
				<p class="text-center grey-text"><small>MASUK DENGAN GOOGLE</small></p>
				<form id="form" method="POST">
					<div class="form-group margin-top">
					<?php
//    if(!isset($login_button))
//    {

//     $user_data = $this->session->userdata('user_data');
//     echo '<div class="panel-heading">Welcome User</div><div class="panel-body">';
//     echo '<img src="'.$user_data['profile_picture'].'" class="img-responsive img-circle img-thumbnail" />';
//     echo '<h3><b>Name : </b>'.$user_data["first_name"].' '.$user_data['last_name']. '</h3>';
//     echo '<h3><b>Email :</b> '.$user_data['email_address'].'</h3>';
//     echo '<h3><a href="http://localhost/login_google/google/logout">Logout</h3></div>';
//    }
//    else
//    {
    echo '<div align="center">'.$login_button . '</div>';
//    }
   ?>
						<!-- <span class="signbox"><a href="<?=base_url()?>index.php/googlelogin"><img src="<?=base_url()?>upload/foto/google-btn.png" alt=""/></a></span> -->

						<!-- <label for="usr">Username:</label>
						<input type="text" class="form-control" name="username"> -->
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
<script src="<?=base_url("dist/js/jquery.min.js");?>"></script>
<script src="<?=base_url("dist/js/popper.min.js");?>"></script>
<script src="<?=base_url("dist/js/bootstrap.min.js");?>"></script>

<script src="https://use.fontawesome.com/450c9ae375.js"></script>

<script>
	// $(document).on('submit', '#form', function (event) {
	// 	event.preventDefault();
	// 	var urls = 'cekloginreceptionist';
	// 	var dataString = $("#form").serialize();
	// 	$("#submit").html("tunggu");
	// 	$("#submit").prop("disabled", true);
	// 	$.ajax({
	// 		url: "<?php echo base_url() ?>index.php/" + urls,
	// 		type: 'POST',
	// 		data: dataString,
	// 		success: function (response) {
	// 			if (response == "berhasil login") {
	// 				window.location.replace("<?php echo base_url() ?>index.php/dashboardreceptionist");
	// 			} else {
	// 				alert(response);
	// 				$("#submit").prop("disabled", false);
	// 			}
	// 		}
	// 	});
	// });

	// $('#myModal').on('shown.bs.modal', function () {
	// 	$('#myInput').trigger('focus')
	// })

</script>


</html>
