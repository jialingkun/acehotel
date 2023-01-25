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

/* 
	.floating-button-menu {
  z-index: 5;
  position: fixed;
  bottom: 40px;
  right: 40px; 
  cursor: pointer;
  background: #F35A5A;
  border-radius: 50%;
  min-width: 80px;
  max-width: 0px;
  min-height: 80px;
  max-height: 0px;
  box-shadow: 2px 2px 8px 2px rgba(0,0,0,.6);
  transition: all ease-in-out .3s;
  &:hover {
    background: #fff;
  } 
.floating-button-menu-links {
    width: 0;
    height: 0;
    overflow: hidden;
    opacity: 0;
    transition: all .4s;
    a {
      position: relative;
       color: #454545;
         text-transform: uppercase;
         text-decoration: none;
         line-height: 50px;
         display: block;
      display: block;
      border-bottom: 1px solid #ccc;
      width: 100%;
      height: 50px;
      padding: 0 20px;
      border-bottom: 1px solid #ccc;
      transition: background ease-in-out .3s;
      background: rgba(0,0,0,0);
         &:hover {
           background: rgba(0,0,0,.1)
         }
      &:last-child {
        border-bottom: 0px solid #fff; 
      }
    }
    &.menu-on {
      background: #fff;
      width: 450px;
      height: 400px;
      border-radius: 10px;
      opacity: 1;
      transition: all ease-in-out .5s;
      }
   
   }
   .floating-button-menu-label {
      text-align: center;
      line-height: 74px;
      font-size: 50px;
      color: #fff;
      opacity: 1;
      transition: opacity .3s;
   }
   &.menu-on {
      background: #fff;
      max-width: 340px;
      max-height: 3300px;
      border-radius: 10px;
     .floating-button-menu-links {
      width: 100%;
      height: 100%;
      opacity: 1;
      transition: all ease-in-out 1s;
     }
     .floating-button-menu-label {
       height: 0px;
       overflow: hidden;
     }
    }
}
.floating-button-menu-close {
  position: fixed;
  z-index: 2;
  width: 0%;
  height: 0%;
  &.menu-on {
       width: 100%;
       height: 100%;  
       background: rgba(0,0,0,.1);
  }
} */

.plus {
  transition: .5s all ease-out;
}
.flBtnCntr {
  display: inline-flex;
  position: absolute;
  top: 50px;
  left: 50px
}
.flBtnBox {
  outline: 0;
  border: 0;
  /* border-radius: 50%; */
  background-color: #2978d3;
  color: #fff;
  cursor: pointer
}
.flBtnBox.big {
  background-color: #2978d3;
  font-size: 30px;
  height: 50px;
  width: 50px
}
.flBtnBox.small {
  animation: showBtn 200ms cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
  transform: scale(0);
  background-color: #2978d3;
  margin: 0 5px;
  font-size: 20px;
  height: 40px;
  width: 150px;
}
.flBtnBox.small:nth-child(2) {
  animation-delay: 200ms
}
.flBtnBox.small:nth-child(3) {
  animation-delay: 400ms
}
@keyframes showBtn {
  0% {
    transform: scale(0)
  }
  100% {
    transform: scale(1)
  }
}
.flBtnBox.big:hover {
  box-shadow: 0 0 10px rgba(41,120,211,0.4)
}
.flBtnBox.small:hover {
  box-shadow: 0 0 10px rgba(0,0,0,0.3)
}
.flBtns {
  position: absolute;
  /* left: 100%; */
  top: -125px;
  bottom: 0;
  right: -15px;
  display: none;
  /* padding: 0 5px; */
  align-items: center
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
				<div style="margin:auto; width:100%; font-size:0.9em;padding-top:20px;">
					<ul class="nav nav-tabs text-center">
						<li class="nav-item" style="width:33.4%;">
							<a class="nav-link active" id="up" data-toggle="tab" href="#list_kamar_hotel" style="padding:8px 0;">List Kamar</a>
						</li>
						<li class="nav-item" style="width:33.3%;">
							<a class="nav-link" id="in" data-toggle="tab" href="#fasilitas_hotel" style="padding:8px 0;">Fasilitas</a>
						</li>
						<li class="nav-item" style="width:33.3%;">
							<a class="nav-link" id="comp" data-toggle="tab" href="#foto_desc_hotel" style="padding:8px 0;">Foto</a>
						</li>
					</ul>
				</div>

				<div class="tab-content">
					<div id="list_kamar_hotel" class="tab-pane active"><br>
						<div id="all_kamar" class="tab-pane active" style="padding-bottom:60px;">
							<div class="list-group"></div>
						</div>
					</div>
					<div id="fasilitas_hotel" class="tab-pane fade"><br>
						<!-- <button type="button" class="btn btn-primary d-block pl-3 pr-3 mt-2" data-toggle="modal"
						data-target="#inputFasilitas">Add fasilitas</button><br> -->
						
						<div id="all_fasilitas" class="tab-pane" style="padding-bottom:60px;">
							<div class="list-group"></div>
						</div>
					</div>
					<div id="foto_desc_hotel" class="tab-pane fade"><br>
						<!-- <button type="button" class="btn btn-primary d-block pl-3 pr-3 mt-2" data-toggle="modal"
						data-target="#inputFoto">Add Image</button><br> -->
						
						<div id="all_foto" class="tab-pane" style="padding-bottom:60px;">
							<div class="list-group"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<a class="float btn_input">
			<i class="fa fa-plus my-float text-white plus" aria-hidden="true"></i>
			<div class="flBtns">
				<button class="flBtnBox small" data-toggle="modal" data-target="#inputTransaksi">List Kamar</button>
				<button class="flBtnBox small" data-toggle="modal" data-target="#inputFasilitas">Fasilitas</button>
				<button class="flBtnBox small" data-toggle="modal" data-target="#inputFoto">Foto</button>
			</div>
			<!-- <div class="flBtns">
    <button class="flBtnBox small">+</button>
    <button class="flBtnBox small">+</button>
    <button class="flBtnBox small">+</button>
  </div> -->
		</a>
		
<!-- <div class="flBtnCntr">
  <button class="flBtnBox big plus">+</button>
  <div class="flBtns">
    <button class="flBtnBox small">+</button>
    <button class="flBtnBox small">+</button>
    <button class="flBtnBox small">+</button>
  </div>
</div> -->

		<!-- <div class="floating-button-menu menu-off"> -->
			<!-- <div class="floating-button-menu-links">
				<a href="#one">link one</a>
				<a href="#two">link two</a>
				<a href="#three">link three</a>
				<a href="#four">link four</a>
			</div> -->
			<!-- <div class="floating-button-menu-label"><i class="fa fa-plus my-float text-white" aria-hidden="true"></i>
		</a></div>
		</div>
		<div class="floating-button-menu-close"></div> -->


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
									<input type="text" id="nama" name="nama" class="form-control" required>
								</div>

								<div class="form-group">
									<label for="nama">Max Guest</label>
									<input type="text" id="max_guest" name="max_guest" class="form-control" pattern="^[0-9]+$"
										required>
								</div>
								<div class="form-group">
									<label for="alamat">Harga</label>
									<input type="text" id="min_harga" name="min_harga" class="form-control"
										required>
										-
									<input type="text" id="max_harga" name="max_harga" class="form-control"
										required>
								</div>
								<div class="form-group">
									<label for="alamat">Fasilitas</label>
									<div class="d-flex justify-content-around">
										<input type="text" id="tambahfasilitaskamar" class="form-control" pattern="^[A-Za-z0-9 ,.'-]+$"
											style="width: 50%" placeholder="Fasilitas">
										<button type="button" id="tambahLantaiNomor" class="btn btn-success btn-md" style="width: 28%">
											<span id="tambahFasilitasKamartext" onclick="insertFasilitasKamar()">Tambah</span></button>
									</div>
									<hr>

									<div class="d-flex justify-content-around">
										<span>Fasilitas</span>
										<span class="text-white">Nomor</span>
									</div>
									<div id="list_fasilitas_kamar">
									</div>
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

		<div class="modal fade" id="inputFasilitas" tabindex="-1" role="dialog" aria-labelledby="inputFasilitasLabel"
			aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="inputFasilitasLabel">Tambah Fasilitas</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="col-12 no-padding">
							<form id="insert_fasilitas" onsubmit="insertFasilitas(event)">
								<div class="form-group">
									<input type="hidden" id="id_hotel_fasilitas" name="id_hotel_fasilitas" class="form-control"
										pattern="^[A-Za-z0-9-_]+$" required>
								</div>
								<div class="form-group">
									<label>Nama Fasilitas</label>
									<input type="text" name="nama_fasilitas" class="form-control" required>
								</div>

								<div class="form-group">
									<label>Keterangan Fasilitas</label>
									<input type="text" name="ket_fasilitas" class="form-control" required>
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

		<div class="modal fade" id="inputFoto" tabindex="-1" role="dialog" aria-labelledby="inputFotoLabel"
			aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="inputFotoLabel">Tambah Foto Hotel</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="col-12 no-padding">
							<form id="insert_foto" onsubmit="insertFoto(event)">
								<div class="form-group">
									<input type="hidden" id="id_hotel_foto" name="id_hotel_foto" class="form-control"
										pattern="^[A-Za-z0-9-_]+$" required>
								</div>
								<div class="form-group">
									<label>Nama Foto</label>
									<input type="text" id="nama_foto" name="nama_foto" class="form-control" required>
								</div>

								<div class="form-group">
									<label>Upload Foto</label>
									<input id="inputFileToLoad" type="file" accept="image/jpeg,image/png" style="padding-top:5px;" max-file-size="320" onchange="encodeImageFileAsURL();"/>
                          			<div id="imgTest" style="padding-top:15px;"></div>
									<!-- <input type="text" name="ket_fasilitas" class="form-control" required> -->
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
									<label for="alamat">Harga</label>
									<input type="text" id="eMinHarga" name="eMinHarga" class="form-control"
										required>
										-
									<input type="text" id="eMaxHarga" name="eMaxHarga" class="form-control"
										required>
								</div>
								
								<div class="form-group">
									<label for="alamat">Fasilitas</label>
									<div class="d-flex justify-content-around">
										<input type="text" id="tambahfasilitaskamaredit" class="form-control" pattern="^[A-Za-z0-9 ,.'-]+$"
											style="width: 50%" placeholder="Fasilitas">
										<button type="button" id="tambahLantaiNomor" class="btn btn-success btn-md" style="width: 28%">
											<span id="tambahFasilitasKamarEdittext" onclick="insertFasilitasKamarEdit()">Tambah</span></button>
									</div>
									<hr>

									<div class="d-flex justify-content-around">
										<span>Fasilitas</span>
										<span class="text-white">Nomor</span>
									</div>
									<div id="list_fasilitas_kamar_edit" style="padding-bottom: 20px;">
									</div>
								</div>
								<div class="form-group">
									<button type="button" id="eDelete" class="btn btn-danger btn-md float-left">
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
									<button type="button" id="eDelete" class="btn btn-danger btn-md float-left">
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
								<button type="button" id="tambahLantaiNomor" class="btn btn-success btn-md" style="width: 28%">
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

		<div class="modal fade" id="editFasilitas" tabindex="-1" role="dialog" aria-labelledby="editFasilitasLabel"
			aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="editFasilitasLabel">Edit Fasilitas</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="col-12 no-padding">
							<form id="edit_fasilitas" onsubmit="editFasilitas(event)">
								<div class="form-group">
									<label>Nama Fasilitas</label>
									<input type="text" id="eNamaFasilitas" name="eNamaFasilitas" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Keterangan Fasilitas</label>
									<input type="text" id="eKetFasilitas" name="eKetFasilitas" class="form-control" required>
								</div>
								<div class="form-group">
									<button type="button" id="eDelete" class="btn btn-danger btn-md float-left">
										<span onclick="deleteFasilitas(getCookie('edit_fasilitas'))">Delete
										Fasilitas</span></button>
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

		
		<div class="modal fade" id="editFoto" tabindex="-1" role="dialog" aria-labelledby="editFotoLabel"
			aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="editFotoLabel">Edit Foto</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="col-12 no-padding">
							<form id="edit_foto" onsubmit="editFoto(event)">
								<div class="form-group">
									<label>Nama Foto</label>
									<input type="text" id="eNamaFoto" name="eNamaFoto" class="form-control" required>
								</div>
								
								<div class="form-group" id="divimage_1" style="display:block">
									<label>Foto Iklan</label><br>
									<img id="eFotoHotel" src="#" width="200" height="auto"><br><br>
									<!-- <button type="button" class="btn btn-outline-info"><a href="#" id="download_file_1" download>Download File</a></button> -->
									<button type="button" class="btn btn-outline-secondary" id="hpsfoto">Ganti File</button>
								</div> 

								<div class="form-group" id="divupload_1" style="display:none">
									<label>Upload Foto</label><br>
									<input id="inputFileToLoad1" type="file" accept="image/jpeg,image/png" style="padding-top:5px;" max-file-size="320" onchange="encodeImageFileAsURLEdit();"/>
                          			<div id="imgTest1" style="padding-top:15px;"></div>
								</div>
								
								<!-- <div class="form-group">
									<label>Foto</label>
									<div id="eFotoHotel"></div>
								</div> -->
								<div class="form-group">
									<button type="button" id="eDelete" class="btn btn-danger btn-md float-left">
										<span onclick="deleteFoto(getCookie('edit_foto'))">Delete
										Foto</span></button>
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
		<button type="button" id="noKamarHapus" class="btn btn-danger btn-md" style="width: 30%">
			<span >Hapus</span></button>
	</form>
</script>

<script id="template_fasilitas_kamar" type="text/HTML">
	<form class="d-flex justify-content-around pt-3">
		<input type="text" id="namaFasilitas" name="namaFasilitas" class="form-control"
			pattern="^[A-Za-z ,.'-]+$" style="width: 30%" placeholder="Lantai" readonly>
		<!-- <input type="text" id="nomorKamar" name="nomorKamar" class="form-control"
			style="width: 30%" placeholder="Nomor" readonly> -->
		<div id="div_btn_hps_fasilitas">

		</div>
		<!-- <button type="button" id="noFasilitasKamarHapus" class="btn btn-danger btn-md" style="width: 30%">
			<span >Hapus</span></button> -->
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
            <div style="display: none;">
                <span id="minHarga"></span>    
                <span id="maxHarga"></span>    
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

<script id="list_fasilitas" type="text/HTML">
	<a href="#" class="list-group-item list-group-item-action mgn-list p-0">
    <div class="row" id="listFasilitas">
        <div class="col-8 px-4 py-3" >
        	<input type="hidden" id="id_fasilitas">
            <div class="d-block">
                <h6 class="mb-1" id="namaFasilitas"></h6>
            </div>
            <div class="d-block">
                <span class="sm-font">Keterangan : </span>
                <span id="ketFasilitas"></span>    
            </div>
        </div>
        <div class="col-4 py-0 pl-0 m-0 d-flex flex-column justify-content-around" style="margin:auto; color:#1C7CD5">
			<div id="btn_edit_fasilitas" class="d-flex justify-content-center align-items-center bg-primary text-white" data-toggle="modal" data-target="#editFasilitas" style="height:50%; background-color:gray;">
				Edit
			</div>
			<!-- <div id="btn_no_kamar" class="d-flex justify-content-center align-items-center bg-light text-dark" data-toggle="modal" data-target="#editNoKamar" style="height:50%">No Kamar</div> -->
        </div>
    </div>
    </a>
</script>

<script id="list_foto" type="text/HTML">
	<a href="#" class="list-group-item list-group-item-action mgn-list p-0">
    <div class="row" id="listFoto">
        <div class="col-8 px-4 py-3" >
        <input type="hidden" id="id_foto">
		<input type="hidden" id="urlFotoHotel">
            <div class="d-block">
                <h4 class="mb-1" id="namaFoto"></h4>
            </div>
            <div class="d-block">
                <span class="sm-font">Foto : </span>
                <!-- <span id="ketFasilitas"></span>     -->
				<div id="FotoHotel" style="padding-top:15px;"></div>
            </div>
        </div>
        <div class="col-4 py-0 pl-0 m-0 justify-content-around" style="margin:auto; color:#1C7CD5">
			<div id="btn_edit_foto" class="d-flex justify-content-center align-items-center bg-primary text-white" data-toggle="modal" data-target="#editFoto" style="height:50px; background-color:gray;">
				Edit
			</div>
			<!-- <div id="btn_no_kamar" class="d-flex justify-content-center align-items-center bg-light text-dark" data-toggle="modal" data-target="#editNoKamar" style="height:50%">No Kamar</div> -->
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
	var arr_fasilitas_kamar = [];
	var arr_data_fasilitas = [];
	var arr_no = 0;
	var temp_harga_min = 0;
	var temp_harga_max = 0;

	// console.log(idHotel);
	$('.lds-ring').show();
	$('.container').hide();


	$('#inputFoto').on('show.bs.modal', function() {
		document.getElementById("imgTest").innerHTML = "";
		document.getElementById("inputFileToLoad").value = '';
    });

	// $( ".menu-off" ).click(function() {
	// 	console.log('--mneu')
	// 	$( this ).removeClass( "menu-off" );
	// 	$( this ).addClass( "menu-on" );
	// 	$('.floating-button-menu-close').addClass('menu-on');
	// 	});
	// 	$('.floating-button-menu-close').click(function(){
	// 	$( this ).addClass( "menu-off" );
	// 	$( this ).removeClass( "menu-on" );
	// 	$('.floating-button-menu').toggleClass('menu-on');
	// 	});

		
    $('.btn_input').on("click", function(){
        $(this).toggleClass('active');

        if($(".btn_input").hasClass("active") == false){
            $('.plus').css('transform','rotate(-90deg)' )
			
		$('.flBtns').css("display", "none");
			
        } else {
            $('.plus').css('transform','rotate(135deg)' )
			
		$('.flBtns').css("display", "revert");
        }

	});

	$("#inputTransaksi").on('show.bs.modal', function(){
		arr_fasilitas_kamar = [];
		arr_no = 0;
		
		$('#list_fasilitas_kamar').text('')
		$('#nama').val('')
		$('#max_guest').val('')
		$('#min_harga').val('')
		$('#max_harga').val('')
		
	});
	

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
		$('#id_hotel_fasilitas').val(idHotel);
		$('#id_hotel_foto').val(idHotel);

		for (var i = 0; i < getKamar[0].length; i++) {
			var tmp = $('#list_kamar')[0].innerHTML;
			tmp = $.parseHTML(tmp);

			arr_data_fasilitas.push({id:getKamar[0][i].id_kamar, data:getKamar[0][i].type_bed});  

			$(tmp).find('#id_kamar').text(getKamar[0][i].id_kamar);
			$(tmp).find('#namaKamar').text(getKamar[0][i].nama_kamar);
			$(tmp).find('#jmlKamar').text(getKamar[0][i].jumlah_kamar);
			$(tmp).find('#maxGuest').text(getKamar[0][i].max_guest);
			$(tmp).find('#minHarga').text(getKamar[0][i].harga_min);
			$(tmp).find('#maxHarga').text(getKamar[0][i].harga_max);
			$(tmp).data('id', getKamar[0][i].id_kamar);
			$(tmp).find('#btn_edit_kamar').data('id', getKamar[0][i].id_kamar);
			$(tmp).find('#btn_no_kamar').data('id', getKamar[0][i].id_kamar);
			$(tmp).appendTo('#all_kamar');
		}

		// console.log('---- darar')
		// console.log(arr_data_fasilitas)
	});

	
	$.when(getAllFasilitas(idHotel)).done(function (getFasilitas) {


		for (var i = 0; i < getFasilitas.length; i++) {
			// console.log('---------' + $('#list_fasilitas')[0])
			var tmp = $('#list_fasilitas')[0].innerHTML;
			tmp = $.parseHTML(tmp);
			
			// console.log('------------')
			// console.log(tmp)

			$(tmp).find('#id_fasilitas').text(getFasilitas[i].id_fasilitas)
			$(tmp).find('#namaFasilitas').text(getFasilitas[i].nama_fasilitas)
			$(tmp).find('#ketFasilitas').text(getFasilitas[i].ket_fasilitas)
			$(tmp).appendTo('#all_fasilitas');

		}


	});

	
	$.when(getAllFoto(idHotel)).done(function (getFoto) {

		// console.log('------------getFoto')
		// console.log(getFoto)
		// console.log(getFoto.length)

		for (var j = 0; j < getFoto.length; j++) {
			var tmpfoto = $('#list_foto')[0].innerHTML;
			tmpfoto = $.parseHTML(tmpfoto);
			url_foto = '<img class="d-block w-100" src="http://localhost/acehotel/upload/hotel_description_photo/'+ getFoto[j].src_foto +'">'
			
			$(tmpfoto).find('#id_foto').text(getFoto[j].id_foto_hotel)
			$(tmpfoto).find('#namaFoto').text(getFoto[j].nama_foto)
			$(tmpfoto).find('#urlFotoHotel').val(getFoto[j].src_foto)
			$(tmpfoto).find('#FotoHotel').append(url_foto)
			
			console.log(getFoto[j].src_foto)
			$(tmpfoto).appendTo('#all_foto');

			

		}


	});


	$(document).on('click', '.data-kamar', function () {
		var idKamar = $(this).data('id');
		console.log($(this))
		console.log($(this).data)
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

	function getFasilitasByKamar(idKamar) {
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

	function getAllFasilitas(idHotel) {
		return $.ajax(
			"<?php echo base_url() ?>index.php/get_fasilitas_by_hotel/" + idHotel, {
				dataType: 'json'
			}
		);
	}
	
	function getAllFoto(idHotel) {
		return $.ajax(
			"<?php echo base_url() ?>index.php/get_foto_by_hotel/" + idHotel, {
				dataType: 'json'
			}
		);
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

			let formData = new FormData();
			var inputid = document.getElementById("id_hotel").value;
			var inputnama = document.getElementById("nama").value;
			var inputguest = document.getElementById("max_guest").value;
			var arr_fas = '';
			
			for (var i = 0; i < arr_fasilitas_kamar.length; i++) {
				arr_fas = arr_fas + arr_fasilitas_kamar[i] + ', ';
			}

			formData.append('id_hotel', inputid);
			formData.append('nama', inputnama);
			formData.append('max_guest', inputguest);
			formData.append('min_harga', temp_harga_min);
			formData.append('max_harga', temp_harga_max);
			formData.append('fasilitas', arr_fas);


			$("#submit").html("tunggu..");
			$("#submitButton").prop("disabled", true);

			$.ajax({
				url: "<?php echo base_url() ?>index.php/" + urls,
				type: 'POST',
				timeout: 1800000,
				data: formData,
				cache: false,
				processData: false,
				contentType: false,
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
		let min = $(this).find('#minHarga').text();
		let max = $(this).find('#maxHarga').text();

		$('#eNama').val(nama);
		$('#eGuest').val(guest);
		$('#eMinHarga').val(formatRupiah(min));
		$('#eMaxHarga').val(formatRupiah(max));

		console.log(id_kamar)
		isi_data_arr_fasilitas = []
		var_lokasi = '';
		pos_awal = 0;
		arr_fasilitas_kamar = [];

		for (var i=0; i<arr_data_fasilitas.length; i++){
			console.log(arr_data_fasilitas[i]['id'])
			if(arr_data_fasilitas[i]['id'] == id_kamar){
				console.log('--ketemu')
				if(arr_data_fasilitas[i]['data'] != null){
					for(var j=0; j<arr_data_fasilitas[i]['data'].length;j++) {
						if (arr_data_fasilitas[i]['data'][j] === ",") {
							// var_lokasi = var_lokasi +data_booking.slice(pos_awal, (i)) + '<br>';
							var_lokasi = arr_data_fasilitas[i]['data'].slice(pos_awal, (j));
							arr_fasilitas_kamar.push(var_lokasi);   
							pos_awal = j+1;
						}
					}
				}


			}
		}

		// console.log('done')
		// console.log(arr_fasilitas_kamar)

		if (arr_fasilitas_kamar.length == 0){
			console.log('-=kosong')
		}
		arr_fasilitas_kamar
		for (var a = 0; a < arr_fasilitas_kamar.length; a++) {
			var tmp = $('#template_fasilitas_kamar')[0].innerHTML;
			tmp = $.parseHTML(tmp);

			$(tmp).find('#namaFasilitas').val(arr_fasilitas_kamar[a]);
			$(tmp).find('#div_btn_hps_fasilitas').append('<button type="button" id="noFasilitasKamarHapus" class="btn btn-danger btn-md" style="width: 100%" onclick="deleteFasilitaskamaredit('+ a +')"><span >Hapus</span></button>');
			$(tmp).appendTo('#list_fasilitas_kamar_edit');
		}

		
		console.log(id_kamar)
		setCookie('edit_kamar', id_kamar);
	});

	
	$(document).on('click', '#listFasilitas', function () {
		let id_fasilitas = $(this).find('#id_fasilitas').text();
		let nama = $(this).find('#namaFasilitas').text();
		let ket = $(this).find('#ketFasilitas').text();

		$('#eNamaFasilitas').val(nama);
		$('#eKetFasilitas').val(ket);

		console.log(id_fasilitas)

		setCookie('edit_fasilitas', id_fasilitas);
	});

	
	$(document).on('click', '#listFoto', function () {
		let id_foto = $(this).find('#id_foto').text();
		let nama = $(this).find('#namaFoto').text();
		let foto = $(this).find('#FotoHotel')[0];
		let url_foto = 'http://localhost/acehotel/upload/hotel_description_photo/' + $(this).find('#urlFotoHotel').val();
		

		$('#eNamaFoto').val(nama);
		document.getElementById("eFotoHotel").src = url_foto;

		setCookie('edit_foto', id_foto);
	});


	$(document).on('click', '#btn_no_kamar', function () {
		let id = $(this).data('id');
		getNokamarByKamar(id);
	});

	function insertFasilitasKamar() {
		var tmp = $('#template_fasilitas_kamar')[0].innerHTML;
		tmp = $.parseHTML(tmp);
		arr_fasilitas_kamar.push($('#tambahfasilitaskamar').val());  
		
		$(tmp).find('#namaFasilitas').val($('#tambahfasilitaskamar').val());
		$(tmp).find('#div_btn_hps_fasilitas').append('<button type="button" id="noFasilitasKamarHapus" class="btn btn-danger btn-md" style="width: 100%" onclick="deleteFasilitaskamar('+ arr_no +')"><span >Hapus</span></button>');
		$(tmp).appendTo('#list_fasilitas_kamar');
		
		arr_no = arr_no + 1;
		$('#tambahfasilitaskamar').val('');
	}

	
	function insertFasilitasKamarEdit() {
		var tmp = $('#template_fasilitas_kamar')[0].innerHTML;
		tmp = $.parseHTML(tmp);
		arr_fasilitas_kamar.push($('#tambahfasilitaskamaredit').val());  
		
		$(tmp).find('#namaFasilitas').val($('#tambahfasilitaskamaredit').val());
		$(tmp).find('#div_btn_hps_fasilitas').append('<button type="button" class="btn btn-danger btn-md" style="width: 100%" onclick="deleteFasilitaskamaredit('+ arr_no +')"><span >Hapus</span></button>');
		$(tmp).appendTo('#list_fasilitas_kamar_edit');
		
		arr_no = arr_no + 1;
		$('#tambahfasilitaskamaredit').val('');
	}

	function insertFasilitas(e) {
		if (confirm("Apakah anda yakin ?")) {
			e.preventDefault();
			urls = "insert_fasilitas";
			var dataString = $("#insert_fasilitas").serialize();

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

	
	function editFasilitas(e) {
		if (confirm("Apakah anda yakin ?")) {
			e.preventDefault();
			urls = "update_fasilitas/";
			var dataString = $("#edit_fasilitas").serialize();
			var id = getCookie('edit_fasilitas');

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

	function deleteFasilitas(id) {
		$.ajax({
			url: "<?php echo base_url() ?>index.php/delete_fasilitas/" + id,
			success: function (response) {
				if (response === "success") {
					location.reload();
				}
			}
		});
	}

	function deleteFasilitaskamar(id) {
		console.log('hps')
		console.log(id)

		arr_fasilitas_kamar.splice(id, 1)
		$('#list_fasilitas_kamar').text('')
		arr_no = arr_no - 1;
		
		for (var i = 0; i < arr_fasilitas_kamar.length; i++) {
			var tmp = $('#template_fasilitas_kamar')[0].innerHTML;
			tmp = $.parseHTML(tmp);

			$(tmp).find('#namaFasilitas').val(arr_fasilitas_kamar[i]);
			$(tmp).find('#div_btn_hps_fasilitas').append('<button type="button" id="noFasilitasKamarHapus" class="btn btn-danger btn-md" style="width: 100%" onclick="deleteFasilitaskamar('+ i +')"><span >Hapus</span></button>');
			$(tmp).appendTo('#list_fasilitas_kamar');
		}
	}

	
	function deleteFasilitaskamaredit(id) {
		
		if (confirm("Apakah anda yakin ?")) {
			console.log('hps')
			console.log(id)

			arr_fasilitas_kamar.splice(id, 1)
			$('#list_fasilitas_kamar_edit').text('')
			arr_no = arr_fasilitas_kamar.length - 1;
			
			for (var i = 0; i < arr_fasilitas_kamar.length; i++) {
				var tmp = $('#template_fasilitas_kamar')[0].innerHTML;
				tmp = $.parseHTML(tmp);

				$(tmp).find('#namaFasilitas').val(arr_fasilitas_kamar[i]);
				$(tmp).find('#div_btn_hps_fasilitas').append('<button type="button" id="noFasilitasKamarHapus" class="btn btn-danger btn-md" style="width: 100%" onclick="deleteFasilitaskamaredit('+ i +')"><span >Hapus</span></button>');
				$(tmp).appendTo('#list_fasilitas_kamar_edit');
			}
		
		} else {}
	}

	function insertFoto(e) {
		
		var myFileGambar = $('#inputFileToLoad').prop('files');

		if(myFileGambar.length == 0){
          alert("Silahkan Pilih File!")
          return false;
        }
        

		if (confirm("Apakah anda yakin ?")) {
			e.preventDefault();
			urls = "insert_foto_desc_hotel";
			var dataString = $("#insert_foto").serialize();
			
			let formData = new FormData();
			var inputid = document.getElementById("id_hotel_foto").value;
			var inputnama = document.getElementById("nama_foto").value;
			const fileupload_1 = $('#inputFileToLoad').prop('files')[0];
			
				
			formData.append('file_1', fileupload_1);
			formData.append('id_hotel_foto', inputid);
			formData.append('nama_foto', inputnama);


			

			$("#submit").html("tunggu..");
			$("#submitButton").prop("disabled", true);

			$.ajax({
				url: "<?php echo base_url() ?>index.php/" + urls,
				type: 'POST',
        		timeout: 1800000,
				data: formData,
				cache: false,
				processData: false,
				contentType: false,
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

	function editFoto(e) {
		if (confirm("Apakah anda yakin ?")) {
			e.preventDefault();
			urls = "update_foto/";
			// var dataString = $("#edit_fasilitas").serialize();
			var id = getCookie('edit_foto');

			
			let formData = new FormData();
			// var inputid = document.getElementById("id_hotel_foto").value;
			var inputnama = document.getElementById("eNamaFoto").value;
			const fileupload_1 = $('#inputFileToLoad1').prop('files')[0];
			
				
			formData.append('file_1', fileupload_1);
			// formData.append('id_hotel_foto', inputid);
			formData.append('eNamaFoto', inputnama);

			$("#submit").html("tunggu..");
			$("#eButton").prop("disabled", true);

			console.log('nah')

			$.ajax({
				url: "<?php echo base_url() ?>index.php/" + urls + id,
				type: 'POST',
				timeout: 1800000,
				data: formData,
				cache: false,
				processData: false,
				contentType: false,
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


	function deleteFoto(id) {
		$.ajax({
			url: "<?php echo base_url() ?>index.php/delete_foto_hotel/" + id,
			success: function (response) {
				if (response === "success") {
					location.reload();
				}
			}
		});
	}


	function encodeImageFileAsURL() {
		var status_allow = '';
		var filesSelected = document.getElementById("inputFileToLoad").files;
		var test = filesSelected && filesSelected[0];
		var img = new Image();
		img.src = window.URL.createObjectURL(test);
		var fileToLoad = filesSelected[0];
		var fileReader = new FileReader();

      	fileReader.onload = function(fileLoadedEvent) {
			img.onload = function() {
				var width = img.naturalWidth,
				height = img.naturalHeight;
				window.URL.revokeObjectURL(img.src);
								
				var srcData = fileLoadedEvent.target.result; // <--- data: base64
				var newImage = document.createElement('img');
				newImage.src = srcData; 
				newImage.width = '200';
				document.getElementById("imgTest").innerHTML = newImage.outerHTML;
				
			};
		}	
      	fileReader.readAsDataURL(fileToLoad);
    }

	function encodeImageFileAsURLEdit() {
		var status_allow = '';
		var filesSelected = document.getElementById("inputFileToLoad1").files;
		var test = filesSelected && filesSelected[0];
		var img = new Image();
		img.src = window.URL.createObjectURL(test);
		var fileToLoad = filesSelected[0];
		var fileReader = new FileReader();

      	fileReader.onload = function(fileLoadedEvent) {
			img.onload = function() {
				var width = img.naturalWidth,
				height = img.naturalHeight;
				window.URL.revokeObjectURL(img.src);
								
				var srcData = fileLoadedEvent.target.result; // <--- data: base64
				var newImage = document.createElement('img');
				newImage.src = srcData; 
				newImage.width = '200';
				document.getElementById("imgTest1").innerHTML = newImage.outerHTML;
				
			};
		}	
      	fileReader.readAsDataURL(fileToLoad);
    }

	/// fungsi rupiah
    var min_harga_create = document.getElementById('min_harga');
	if(min_harga_create){
		min_harga_create.addEventListener('keyup', function(e)
		{
			min_harga_create.value = formatRupiah(this.value);
			temp_harga_min = (min_harga_create.value.replaceAll('.',''))
		});
	}
	
    var max_harga_create = document.getElementById('max_harga');
	if(max_harga_create){
		max_harga_create.addEventListener('keyup', function(e)
		{
			max_harga_create.value = formatRupiah(this.value);
			temp_harga_max = (max_harga_create.value.replaceAll('.',''))
		});
	}
	
    var min_harga_edit = document.getElementById('eMinHarga');
	if(min_harga_edit){
		min_harga_edit.addEventListener('keyup', function(e)
		{
			min_harga_edit.value = formatRupiah(this.value);
			temp_harga_min = (min_harga_edit.value.replaceAll('.',''))
		});
	}
	
    var max_harga_edit = document.getElementById('eMaxHarga');
	if(max_harga_edit){
		max_harga_edit.addEventListener('keyup', function(e)
		{
			max_harga_edit.value = formatRupiah(this.value);
			temp_harga_max = (max_harga_edit.value.replaceAll('.',''))
		});
	}

	
    
    function formatRupiah(angka, prefix){
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split    = number_string.split(','),
            sisa     = split[0].length % 3,
            rupiah     = split[0].substr(0, sisa),
            ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
            
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

	
	$('#hpsfoto').click(function editdata() {
		document.getElementById("divupload_1").style.display = "block";
		document.getElementById("divimage_1").style.display = "none";
    // status_foto = '1';

	});
    


</script>
