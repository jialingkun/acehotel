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
				<h2 class="text-center"><small>ACE HOTEL</small></h2>
				<p class="text-center grey-text"><small>As Admin</small></p>
				<form id="form" method="POST">
					<div class="form-group margin-top">
						<label for="usr">Username:</label>
						<input type="text" class="form-control" name="username">
					</div>
					<div class="form-group">
						<label for="usr">Password:</label>
						<input type="password" class="form-control" name="password">
					</div>
					<button id="submit" type="submit" class="btn btn-primary center-item">Sign In</button>
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
	$(document).on('submit', '#form', function (event) {
		event.preventDefault();
		var urls = 'cekloginadmin';
		var dataString = $("#form").serialize();
		$("#submit").html("tunggu");
		$("#submit").prop("disabled", true);
		$.ajax({
			url: "<?php echo base_url() ?>index.php/" + urls,
			type: 'POST',
			data: dataString,
			success: function (response) {
				if (response == "berhasil login") {
					window.location.replace("<?php echo base_url() ?>index.php/dashboardadmin");
				} else {
					alert(response);
					$("#submit").prop("disabled", false);
				}
			}
		});
	});

	$('#myModal').on('shown.bs.modal', function () {
		$('#myInput').trigger('focus')
	})

</script>


</html>
