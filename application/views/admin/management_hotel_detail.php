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
									<input type="hidden" id="id_hotel" name="id_hotel" class="form-control"
										pattern="^[A-Za-z0-9-_]+$" required>
								</div>
								<div class="form-group">
									<label for="username_owner">Nama Kamar</label>
									<input type="text" name="nama" class="form-control" required>
								</div>

								<div class="form-group">
									<label for="nama">Max Guest</label>
									<input type="text" name="max_guest" class="form-control" pattern="^[0-9]+$"
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

		<div class="modal fade" id="editTransaksi" tabindex="-1" role="dialog" aria-labelledby="editTransaksiLabel"
			aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="editTransaksiLabel">Edit Kamar</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="col-12 no-padding">
							<form id="edit_kamar" onsubmit="editKamar(event)">
								<div class="form-group">
									<label for="alamat">Nama Kamar</label>
									<input type="text" id="eNama" name="nama" class="form-control"
										pattern="^[A-Za-z ,.'-]+$" required>
								</div>
								<div class="form-group">
									<label for="alamat">Max Guest</label>
									<input type="text" id="eGuest" name="max_guest" class="form-control"
										pattern="^[0-9]+$" required>
								</div>
								<div class="form-group">
									<button id="eDelete" class="btn btn-danger btn-md float-left">
										<span onclick="deleteKamar(getCookie('edit_kamar'))">Delete
											Kamar</span></button>
									<button type="submit" id="eButton" class="btn btn-primary btn-md float-right">
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
									<label for="alamat">Nama Hotel</label>
									<input type="text" id="eNamaHotel" name="nama" class="form-control"
										pattern="^[A-Za-z ,.'-]+$" required>
								</div>
								<div class="form-group">
									<label for="alamat">Alamat Hotel</label>
									<input type="text" id="eAlamatHotel" name="alamat" class="form-control" required>
								</div>
								<div class="form-group">
									<label for="alamat">Telepon</label>
									<input type="text" id="eTeleponHotel" name="telepon" class="form-control"
										pattern="^[0-9]+$" required>
								</div>
								<div class="form-group">
									<button id="eDelete" class="btn btn-danger btn-md float-left">
										<span onclick="deleteHotel(getCookie('manajemen_id_hotel'))">Delete
											Hotel</span></button>
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
							<form class="d-flex justify-content-around" id="tambah_no_kamar">
								<input type="text" id="tambahLantai" class="form-control" pattern="^[A-Za-z0-9 ,.'-]+$"
									style="width: 28%" placeholder="Lantai" required>
								<input type="text" id="tambahNomor" class="form-control" pattern="^[A-Za-z0-9 ,.'-]+$"
									style="width: 28%" pattern="^[A-Za-z0-9 ,.'-]+$" placeholder="Nomor" required>
								<button id="tambahLantaiNomor" class="btn btn-success btn-md" style="width: 28%">
									<span id="tambahLantaiNomorText" onclick="insertNoKamar()">Tambah</span></button>
							</form>
							<hr>

							<div class="d-flex justify-content-around">
								<span>Lantai</span>
								<span>Nomor</span>
								<span class="text-white">Nomor</span>
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
		<input type="text" id="lantaiKamar" name="nomorKamar" class="form-control"
			pattern="^[A-Za-z ,.'-]+$" style="width: 30%" placeholder="Lantai" readonly>
		<input type="text" id="nomorKamar" name="nomorKamar" class="form-control"
			style="width: 30%" placeholder="Nomor" readonly>
		<button id="noKamarHapus" class="btn btn-danger btn-md" style="width: 30%">
			<span >Hapus</span></button>
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
			<div id="btn_edit_kamar" class="d-flex justify-content-center align-items-center bg-primary text-white" data-toggle="modal" data-target="#editTransaksi" style="height:50%; background-color:gray;">
				Edit
			</div>
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

	var idHotel = getCookie("manajemen_id_hotel");
	// console.log(idHotel);
	$('.lds-ring').show();
	$('.container').hide();

	$.when(getAllKamar(idHotel), getHotel(idHotel)).done(function (getKamar, getHotel) {

		$('#nama_hotel').text(getHotel[0][0].nama_hotel);
		$('#alamat_hotel').text(getHotel[0][0].alamat_hotel);
		$('#tlp_hotel').text(getHotel[0][0].telepon_hotel);

		$('#eNamaHotel').val(getHotel[0][0].nama_hotel);
		$('#eAlamatHotel').val(getHotel[0][0].alamat_hotel);
		$('#eTeleponHotel').val(getHotel[0][0].telepon_hotel);

		$('.lds-ring').hide();
		$('.container').show();
		$('#id_hotel').val(idHotel);

		for (var i = 0; i < getKamar[0].length; i++) {
			var tmp = $('#list_kamar')[0].innerHTML;
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
					$(tmp).find('#lantaiKamar').val(response[i].lantai);
					$(tmp).find('#noKamarHapus').data('id', response[i].no_kamar);
					$(tmp).appendTo('#list_no_kamar');
				}
			}
		});
	}

	function insertNoKamar() {
		if (confirm('Apakah anda yakin ?')) {
			urls = "insert_nokamar";
			var dataString = {
				'id_kamar': getCookie('id_kamar'),
				'no_kamar': $('#tambahNomor').val(),
				'lantai': $('#tambahLantai').val()
			};

			$("#tambahLantaiNomorText").html("tunggu..");
			$("#tambahLantaiNomor").prop("disabled", true);

			$.ajax({
				url: "<?php echo base_url() ?>index.php/" + urls,
				type: 'POST',
				data: dataString,
				success: function (response) {
					if (response.startsWith("success", 0)) {
						getNokamarByKamar(getCookie('id_kamar'));
						$("#tambahLantaiNomorText").html("Tambah");
						$("#tambahLantaiNomor").prop("disabled", false);
					} else {
						alert(response);
						$("#tambahLantaiNomorText").html("Tambah");
						$("#tambahLantaiNomor").prop("disabled", false);
					}
				}
			});
		} else {}
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

	function editKamar(e) {
		if (confirm("Apakah anda yakin ?")) {
			e.preventDefault();
			urls = "update_kamar/";
			var dataString = $("#edit_kamar").serialize();
			var id = getCookie('edit_kamar');

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

	function deleteKamar(id) {
		$.ajax({
			url: "<?php echo base_url() ?>index.php/delete_kamar/" + id,
			success: function (response) {
				if (response === "success") {
					location.reload();
				}
			}
		});
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

	function deleteHotel(id) {
		$.ajax({
			url: "<?php echo base_url() ?>index.php/delete_hotel/" + id,
			success: function (response) {
				if (response === "success") {
					window.location = "<?php echo base_url() ?>index.php/managementhotel/";
				}
			}
		});
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

</script>
