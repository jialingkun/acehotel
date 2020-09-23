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
		z-index: 1;
	}

	.my-float {
		margin-top: 22px;
	}

	.loading-back{
		position:fixed;
		background-color:rgba(255, 255, 255, 0.5); 
		height:100vh; 
		width:100%; 
		z-index:10;
	}

</style>

<body >
	<?php $this->load->view("admin/header");?>
	<div class="loading-back">
		<div class="lds-ring" >
			<div></div>
			<div></div>
			<div></div>
			<div></div>
		</div>
	</div>
	<div class="container" >
		<div class="row" style="margin-top:20%; margin-bottom:20%;">
			<div class="col-sm-12  mt-3">
				<h5 class="mb-1" id="nama_hotel">...</h5>
				<span>Alamat : </span>
				<span id="alamat_hotel"></span>
				<br>
				<span class="sm-font">Tlp : </span>
				<span class="sm-font" id="tlp_hotel">...</span>
				<button type="button" class="btn btn-primary d-block pl-3 pr-3 mt-2" data-toggle="modal"
					data-target="#editHotel">Edit</button>
			</div>
			<div class="col-sm-12 ">
				<div id="all_kamar" class="tab-pane active">
					<br>
					<div class="list-group"></div>
				</div>
			</div>
		</div>
		<a class="float bg-success" onclick="syncHotel()">
			<i class="fa fa-refresh my-float text-white" aria-hidden="true"></i>
		</a>
		
		<div class="modal fade" id="editHotel" tabindex="-1" role="dialog" aria-labelledby="editHotelLabel"
			aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="editHotelLabel">Edit Hotel</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="col-12 no-padding">
							<form id="edit_hotel" onsubmit="editHotel(event)">
								<div class="form-group">
									<label for="alamat">Owner Hotel</label>
									<select class="form-control" id="eOwner" name="username_owner">
									</select>
								</div>
								<div class="form-group">
									<label for="alamat">Telepon</label>
									<input type="text" id="eTeleponHotel" name="telepon" class="form-control"
										pattern="^[0-9]+$" required>
								</div>
								<div class="form-group">
									<button type="submit" id="eButton" class="btn btn-primary btn-md float-right">
										<span id="submit">Submit</span></button>
								</div>
						</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="editNoKamar" tabindex="-1" role="dialog" aria-labelledby="editNoKamar"
			aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="editNoKamar">List Nomor Kamar</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="col-12 no-padding">
							<div class="d-flex justify-content-around">
								<span>No Kamar</span>
								<span>Nama Kamar</span>
							</div>
							<div id="list_no_kamar">
							</div>
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

<script id="template_no_kamar" type="text/HTML">
	<form class="d-flex justify-content-around pt-3">
		<input type="text" id="nomorKamar" name="nomorKamar" class="form-control"
			style="width: 30%" placeholder="Nomor" readonly>
		<input type="text" id="namaNoKamar" name="nomorKamar" class="form-control"
			pattern="^[A-Za-z ,.'-]+$" style="width: 30%" placeholder="Lantai" readonly>
	</form>
</script>

<script id="list_kamar" type="text/HTML">
	<a href="#" class="list-group-item list-group-item-action mgn-list data-kamar p-0">
    <div class="row "  id="listKamar">
        <div class="col-8 px-4 py-3" >
        <input type="hidden" id="id_kamar">
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
        <div class="col-4 py-0 pl-0 m-0 d-flex flex-column justify-content-around" style="margin:auto; color:#1C7CD5">
			<div id="btn_no_kamar" class="d-flex justify-content-center align-items-center bg-light text-dark" data-toggle="modal" data-target="#editNoKamar" style="height:50%">No Kamar</div>
        </div>
    </div>
    </a>
</script>

<script>
	$(document).ready(function () {
		$("#management_footer").addClass('is-active');
		$("#header_title").text('Management Hotel');
	});
	$('.loading-back').show();
	$('.container').hide();

	var idHotel = getCookie("manajemen_id_hotel");
	// console.log(idHotel);

	$.when(getAllKamar(idHotel), getAllOwner(), getHotel(idHotel)).done(function (getKamar, getAllOwner, getHotel) {
		$('.loading-back').hide();
		$('.container').show();
		$('#nama_hotel').text(getHotel[0][0].nama_hotel);
		$('#alamat_hotel').text(getHotel[0][0].alamat_hotel);
		$('#tlp_hotel').text(getHotel[0][0].telepon_hotel);

		$('#eNamaHotel').val(getHotel[0][0].nama_hotel);
		$('#eAlamatHotel').val(getHotel[0][0].alamat_hotel);
		$('#eTeleponHotel').val(getHotel[0][0].telepon_hotel);

		$('#id_hotel').val(idHotel);

		let temp ="";
		if(getHotel[0][0].username_owner == null){
			temp += "<option ></option>";
		}
		for (let i = 0; i < getAllOwner[0].length; i++) {
			if(getHotel[0][0].username_owner == getAllOwner[0][i].username_owner){
				temp += "<option value="+getAllOwner[0][i].username_owner+" selected>"+getAllOwner[0][i].nama_owner+"</option>";
			}else{
				temp += "<option value="+getAllOwner[0][i].username_owner+">"+getAllOwner[0][i].nama_owner+"</option>";
			}
		}
		$(temp).appendTo('#eOwner');

		for (let i = 0; i < getKamar[0].length; i++) {
			let tmp = $('#list_kamar')[0].innerHTML;
			tmp = $.parseHTML(tmp);

			$(tmp).find('#id_kamar').text(getKamar[0][i].id_kamar);
			$(tmp).find('#namaKamar').text(getKamar[0][i].nama_kamar);
			$(tmp).find('#jmlKamar').text(getKamar[0][i].jumlah_kamar);
			$(tmp).find('#maxGuest').text(getKamar[0][i].max_guest);
			$(tmp).data('id', getKamar[0][i].id_kamar);
			$(tmp).find('#btn_edit_kamar').data('id', getKamar[0][i].id_kamar);
			$(tmp).find('#btn_no_kamar').data('id', getKamar[0][i].id_kamar);
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

	function getHotel(idHotel) {
		return $.ajax(
			"<?php echo base_url() ?>index.php/get_hotel_by_id/" + idHotel, {
				dataType: 'json'
			}
		);
	}

	function getAllOwner() {
		return $.ajax(
			"<?php echo base_url() ?>index.php/get_all_owner/", {
				dataType: 'json'
			}
		);
	}

	function getNokamarByKamar(idKamar) {
		$.ajax({
			url: "<?php echo base_url() ?>index.php/get_nokamar_by_kamar/" + idKamar,
			dataType: 'json',
			type: 'GET',
			success: function (response) {
				$('#list_no_kamar').empty();
				let length = response.length;
				// console.log(response[0]);
				for (let i = 0; i < length; i++) {
					var tmp = $('#template_no_kamar')[0].innerHTML;
					tmp = $.parseHTML(tmp);

					$(tmp).find('#nomorKamar').val(response[i].no_kamar);
					$(tmp).find('#namaNoKamar').val(response[i].nama_no_kamar);
					$(tmp).appendTo('#list_no_kamar');
				}
			}
		});
	}

	$(document).on('click', '#noKamarHapus', function () {
		if (confirm('Apakah anda yakin akan menghapus?')) {
			var no_kamar = $(this).data('id');
			var id_kamar = getCookie('id_kamar');
			$.ajax({
				url: "<?php echo base_url() ?>index.php/delete_nokamar/" + id_kamar + "/" + no_kamar,
				success: function (response) {
					if (response.startsWith("success", 0)) {
						getNokamarByKamar(getCookie('id_kamar'));
						location.reload();
					}
				}
			});
		} else {}
	});


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

	function editHotel(e) {
		if (confirm("Apakah anda yakin ?")) {
			e.preventDefault();
			urls = "update_hotel/";
			var dataString = $("#edit_hotel").serialize();
			var id = getCookie('manajemen_id_hotel');

			$("#submit").html("tunggu..");
			$("#eButton").prop("disabled", true);

			$.ajax({
				url: "<?php echo base_url() ?>index.php/" + urls + id,
				type: 'POST',
				data: dataString,
				success: function (response) {
					if (response.startsWith("success", 0)) {
						location.reload();
					} else {
						$("#submit").html("Submit");
						$("#eButton").prop("disabled", false);
					}
				},
				error: function () {
					alert(response);
					$("#eButton").prop("disabled", false);
				}
			});
		} else {}
	}
	
	$(document).on('click', '#listKamar', function () {
		let id_kamar = $(this).find('#id_kamar').text();
		let nama = $(this).find('#namaKamar').text();
		let guest = $(this).find('#maxGuest').text();

		$('#eNama').val(nama);
		$('#eGuest').val(guest);

		setCookie('edit_kamar', id_kamar);
	});

	$(document).on('click', '#btn_no_kamar', function () {
		let id = $(this).data('id');
		getNokamarByKamar(id);
	});
	
	function syncHotel(){
		$('.loading-back').show();
		
		$.ajax({
			url: "<?php echo base_url() ?>index.php/syncProperty/"+idHotel,
			type: 'GET',
			success: function (response) {
				if (response.startsWith("success", 0)) {
					alert("Berhasil!");
					location.reload();
				} else {
					if (response.startsWith("failed", 0)) {
						alert("Tidak ada data yang berubah");
					}else{
						alert(response);
					}
					$('.loading-back').hide();
				}
			},
			error: function () {
				alert(response);
				$('.loading-back').hide();
			}
		});
	}
</script>
