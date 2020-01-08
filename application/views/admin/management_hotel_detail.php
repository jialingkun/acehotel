<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="<?=base_url("dist/css/bootstrap.min.css");?>">
	<link rel="stylesheet" href="<?=base_url("dist/css/bootstrap-grid.min.css");?>">
	<link rel="stylesheet" href="<?=base_url("dist/css/style.css");?>">
	<link rel="stylesheet" href="<?=base_url("dist/css/font-awesome.min.css");?>">

	<title>DASHBOARD ADMIN</title>
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

</style>

<body>
	<?php $this->load->view("admin/header");?>
	<div class="container">
		<div class="row" style="margin-top:20%;">
			<div class="col-sm-12 m-2">
				<h5 class="mb-1">Hotel Araya</h5>
				<span>Alamat : </span>
				<span>Jl. Bunga Mawar 29B</span>
				<br>
				<span class="sm-font">Tlep : </span>
				<span class="sm-font">081333111222</span>
				<button type="button" class="btn btn-primary d-block pl-3 pr-3 mt-2">Edit</button>
				<div class="tab-content">
					<div id="all_kamar" class="tab-pane active"><br>
						<div class="list-group">

						</div>
					</div>
				</div>
			</div>
		 </div>
		<a class="float" data-toggle="modal" data-target="#inputTransaksi">
			<i class="fa fa-plus my-float text-white" aria-hidden="true"></i>
		</a>
		<div class="modal fade" id="inputTransaksi" tabindex="-1" role="dialog" aria-labelledby="inputTransaksiLabel"
			aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="inputTransaksiLabel">Tambah Hotel</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="col-12 no-padding">
							<form id="insert_kamar" onsubmit="insertKamar(event)">
							<div class="form-group">
									<input type="hidden" id="id_hotel" name="id_hotel" class="form-control" pattern="^[A-Za-z0-9-_]+$"
										required>
								</div>
								<div class="form-group">
									<label for="usr">ID kamar</label>
									<input type="text" name="id_kamar" class="form-control" pattern="^[A-Za-z0-9-_]+$"
										required>
								</div>
								<div class="form-group">
									<label for="username_owner">Nama Kamar</label>
									<input type="text" name="nama" class="form-control" 
										required>
								</div>

								<div class="form-group">
									<label for="nama">Max Guest</label>
									<input type="text"  name="max_guest" class="form-control" pattern="^[0-9]+$"	
										required>
								</div>
								<div class="form-group">
									<button type="submit" id="submitButton" class="btn btn-primary btn-md float-right">
										<span id="submit">Submit</span></button>
								</div>
							</form>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php $this->load->view("admin/footer");?>
</body>
<script src="<?=base_url("dist/js/jquery.min.js");?>"></script>
<script src="<?=base_url("dist/js/popper.min.js");?>"></script>
<script src="<?=base_url("dist/js/bootstrap.min.js");?>"></script>
<script src="<?=base_url("dist/js/function.js");?>"></script>

<script id="list_kamar" type="text/HTML">
	<a href="#" class="list-group-item list-group-item-action mgn-list data-kamar">
	<div class="row">
		<div class="col-9">
            <div class="d-block">
                <h6 class="mb-1" id="namaKamar"></h6>
            </div>
            <div class="d-block">
                <span class="sm-font">Jumlah : </span>
                <span id="jmlKamar"></span>    
            </div>
        	<div class="d-block">
                <span class="sm-font">MaxGuest :</span>
                <span id="maxGuest"></span>    
            </div>
		</div>
		<div class="col-3" style="margin:auto; color:#1C7CD5">
			<span>Edit</span>
		</div>
	</div>
    </a>
</script>

<script>
	$(document).ready(function () {
		$("#management_footer").addClass('is-active');
		$("#header_title").text('Management Hotel');
	});

	var idHotel = getCookie("manajemen_id_hotel");
	console.log(idHotel);
	$('.lds-ring').show();
	$('.container').hide();

	$.when(getAllKamar(idHotel)).done(function (getKamar) {
		$('.lds-ring').hide();
		$('.container').show();
		$('#id_hotel').val(idHotel);
		
		for (var i = 0; i < getKamar.length; i++) {
			var tmp = $('#list_kamar')[0].innerHTML;
			tmp = $.parseHTML(tmp);

			console.log(getKamar[i]);
			$(tmp).find('#namaKamar').text(getKamar[i].nama_kamar);
			$(tmp).find('#jmlKamar').text(getKamar[i].jumlah_kamar);
			$(tmp).find('#maxGuest').text(getKamar[i].max_guest);
			$(tmp).data('id', getKamar[i].id_kamar);
			$(tmp).appendTo('#all_kamar');
		}
	});

	$(document).on('click', '.data-kamar', function () {
		var idKamar = $(this).data('id');
		setCookie('id_kamar', idKamar);
	});

	function getAllKamar(idHotel) {
		return $.ajax(
			"<?php echo base_url() ?>index.php/get_kamar_by_hotel/" + idHotel, {
				dataType: 'json'
			}
		);
	}
	
	function insertKamar(e) {
		if (confirm("Apakah anda yakin ?")) {
			e.preventDefault();
			urls = "insert_kamar";
			var dataString = $("#insert_kamar").serialize();

			$("#submit").html("tunggu..");
			$("#submitButton").prop("disabled", true);

			$.ajax({
				url: "<?php echo base_url() ?>index.php/" + urls,
				type: 'POST',
				data: dataString,
				success: function (response) {
					if (response.startsWith("success", 0)) {
						location.reload();
					} else {
						alert(response);
						$("#submit").html("Submit");
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

</script>
