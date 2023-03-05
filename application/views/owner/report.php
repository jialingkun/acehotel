<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />

	<link rel="stylesheet" href="<?=base_url("dist/css/bootstrap.min.css");?>">
	<link rel="stylesheet" href="<?=base_url("dist/css/bootstrap-grid.min.css");?>">
	<link rel="stylesheet" href="<?=base_url("dist/css/style.css");?>">




	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
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
	<?php $this->load->view("owner/header");?>
	<div class="lds-ring">
		<div></div>
		<div></div>
		<div></div>
		<div></div>
	</div>
	<div class="container">
		<div class="row " style="margin-top:20%; margin-bottom:20%;">
			<div class="col-6 text-center no-padding">
				<div class="btn-group">
					<button type="button" class="btn btn-sm btn-primary" id="nama_date">This Week</button>
					<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"
						data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<span class="sr-only"></span>
					</button>
					<div class="dropdown-menu dropdown-menu-right" id="list_date">
						<a class="dropdown-item" id="date-item" href="#">This Week</a>
						<a class="dropdown-item" id="date-item" href="#">This Month</a>
						<a class="dropdown-item" id="date-item" href="#"><input type="text" name="daterange" /></a>
					</div>
				</div>
			</div>
			<div class="col-6 text-center">
				<div class="btn-group">
					<button type="button" class="btn btn-sm btn-primary" id="nama_hotel">Loading</button>
					<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"
						data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<span class="sr-only"></span>
					</button>
					<div class="dropdown-menu dropdown-menu-right" id="list_hotel"></div>
				</div>
			</div>
			<div class="col-sm-12">
				<a class="list-group-item list-group-item-action flex-column align-items-start mgn-list"
					id="totalDetail" data-toggle="modal" data-target="#revenueModal">
					<div class="w-100 ">
						<span>Total Revenue</span>
						<h5 id="totalRevenue"></h5>
					</div>
				</a>

				<a href="#" class="list-group-item list-group-item-action flex-column align-items-start mgn-list">
					<div class="w-100 ">
						<canvas id="myLineChart" height="200"></canvas>
					</div>
				</a>
				<a href="#" class="list-group-item list-group-item-action flex-column align-items-start mgn-list">
					<div class="w-100 ">
						<span>Total Order</span>
						<h5 id="totalSource"></h5>
					</div>
				</a>
				<a href="#" class="list-group-item list-group-item-action flex-column align-items-start mgn-list">
					<div class="w-100 ">
						<canvas id="myDoughnutChart" height="200"></canvas>
					</div>
				</a>
			</div>
		</div>
		<div class="modal fade" id="revenueModal" tabindex="-1" role="dialog" aria-labelledby="revenueModalLabel"
			aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<form id="checkin_booking">
						<div class="modal-header">
							<h5 class="modal-title" id="revenueModalLabel">Detail Revenue</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<p id="waitDetail">Please Wait</p>
							<div class="col-12 no-padding" id="modalContent">
								
								<a id="downloadReport"><button type="button" class="btn btn-success w-100">Download
										Report</button></a>
								<div id="listRevenue" class="tab-pane active"><br>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
							</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<?php $this->load->view("owner/footer");?>
	<?php $this->load->view("function");?>
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
<script id="list_revenue" type="text/HTML">
	<a href="#" class="list-group-item list-group-item-action flex-column align-items-start mgn-list" >
		<div class="w-100 ">
			<h5 class="mb-1" id="namaUser"></h5>
			<h6 class="mb-1" id="namaKamar"></h6>
		</div>
		<div class="mgn-list">
			<span id="jmlRoom"></span> Room
			.
			<span id="jmlMalam"></span> Night
			.
			<span id="jmlGuest"></span> Guest
		</div>
		<div class="mgn-list">
			<span class="badge badge-pill badge-danger"><span id="reqInAwal"></span> - <span id="reqInAkhir"></span></span>
			<span class="sm-font" id="totHarga"></span>
		</div>
	</a>
</script>
<script>
	$(document).ready(function () {

		$("#report_footer").addClass('is-active');
		$("#header_title").text('Report');

	});

</script>
<script>
	$('.lds-ring').show();
	$('.container').hide();
	var namaHotelC = getCookie('nama_hotel');
	var idHotelC = getCookie('id_hotel');
	var today = getToday();
	var dateFilter = lastWeek();
	var idOwner = "";

	$(function () {
		$('input[name="daterange"]').daterangepicker({
			opens: 'left'
		}, function (start, end, label) {
			$('#nama_date').text(start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
			dateFilter = start.format('YYYY-MM-DD');
			today = end.format('YYYY-MM-DD');
			getData(idHotelC, namaHotelC, dateFilter, today);
		});
	});

	function getAllHotel(ownerId) {
		return $.ajax(
			"<?php echo base_url() ?>index.php/get_hotel_by_owner/" + ownerId, {
				dataType: 'json'
			}
		);
	}

	function getRevenue(idHotel, tglawal, tglakhir) {

		return $.ajax(
			"<?php echo base_url() ?>index.php/get_revenue_hotel_by_tanggalcheckin/" + idHotel + "/" + tglawal + "/" +
			tglakhir, {
				dataType: 'json'
			}
		);
	}

	function getSource(idHotel, tglawal, tglakhir) {
		return $.ajax(
			"<?php echo base_url() ?>index.php/get_sumber_order_hotel_by_tanggalcheckin/" + idHotel + "/" + tglawal +
			"/" + tglakhir, {
				dataType: 'json'
			}
		);
	}

	function lastWeek() {
		var today = new Date();
		var week = new Date(today.getFullYear(), today.getMonth(), today.getDate() - 7);
		var y = week.getFullYear();
		var m = (week.getMonth() + 1) < 10 ? '0' + (week.getMonth() + 1) : (week.getMonth() + 1);
		var d = week.getDate() < 10 ? '0' + week.getDate() : week.getDate();
		var a = y + '-' + m + '-' + d;
		return a;
	}

	function lastMonth() {
		var today = new Date();
		var week = new Date(today.getFullYear(), today.getMonth() - 1, today.getDate());
		var y = week.getFullYear();
		var m = (week.getMonth() + 1) < 10 ? '0' + (week.getMonth() + 1) : (week.getMonth() + 1);
		var d = week.getDate() < 10 ? '0' + week.getDate() : week.getDate();
		var a = y + '-' + m + '-' + d;
		return a;
	}

	function getToday() {
		var today = new Date();
		var dd = String(today.getDate()).padStart(2, '0');
		var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
		var yyyy = today.getFullYear();

		today = yyyy + '-' + mm + '-' + dd;
		return today;
	}

	function reformatDate(oldformat) {
		var mydate = new Date(oldformat);
		var month = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
			"Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
		][mydate.getMonth()];
		return mydate.getDate() + ' ' + month;
	}
	$.when(getLoginCookieServer('ownerCookie')).done(function (response) {
		getAllHotel(response);
		idOwner = response;
		getData(idHotelC, namaHotelC, dateFilter, today);
	});

	function getData(idHotel, namaHotel, filterDate, today) {
		$.when(getAllHotel(idOwner), getRevenue(idHotel, filterDate, today), getSource(idHotel, filterDate,
			today)).done(

			function (allHotel, getrevenue, getsource) {
				$('#list_hotel').empty();
				$('.lds-ring').hide();
				$('.container').show();
				var datarevenue = getrevenue[0];
				var datalabels = [];
				var datavalues = [];
				var totalRevenue = 0;

				for (i = 0; i < allHotel[0].length; i++) {
					var tmp = $('#hotel_option')[0].innerHTML;
					tmp = $.parseHTML(tmp);
					$(tmp).text(allHotel[0][i].nama_hotel);
					$(tmp).data('id', allHotel[0][i].id_hotel);
					$(tmp).data('nama', allHotel[0][i].nama_hotel);
					$(tmp).appendTo('#list_hotel');
				}
				$('.dropdown-toggle').dropdown();
				$('#nama_hotel').text(namaHotel);

				for (var i = 0; i < datarevenue.length; i++) {
					datalabels.push(reformatDate(datarevenue[i].tanggal_check_in_real));
					datavalues.push(datarevenue[i].revenue / 1000);
					totalRevenue = totalRevenue + parseInt(datarevenue[i].revenue);
				}
				$("#totalRevenue").html(currency.format(totalRevenue));

				var linectx = document.getElementById('myLineChart').getContext('2d');
				var chart = new Chart(linectx, {
					type: 'line',

					data: {
						labels: datalabels,
						datasets: [{
							label: 'Ribu Rupiah',
							backgroundColor: 'rgb(255, 99, 132)',
							borderColor: 'rgb(255, 99, 132)',
							data: datavalues
						}]
					},

					options: {
						scales: {
							xAxes: [{
								ticks: {
									maxTicksLimit: 5
								}
							}],
							yAxes: [{
								ticks: {
									suggestedMin: 0
								}
							}]
						}
					}
				});
				var datasource = getsource[0];
				var datalabels = [];
				var datavalues = [];
				var totalSource = 0;
				for (var i = 0; i < datasource.length; i++) {
					datalabels.push(datasource[i].sumber_order);
					datavalues.push(datasource[i].frekuensi);
					totalSource = totalSource + parseInt(datasource[i].frekuensi);
				}
				$("#totalSource").html(totalSource);

				var doughnutctx = document.getElementById('myDoughnutChart').getContext('2d');
				var chart = new Chart(doughnutctx, {
					type: 'doughnut',

					data: {
						labels: datalabels,
						datasets: [{
							backgroundColor: [
								'rgb(255, 99, 132)',
								'rgb(99, 255, 132)',
								'rgb(132, 99, 255)',
								'rgb(99, 132, 255)',
								'rgb(255, 132, 99)'
							],
							data: datavalues
						}]
					},

					options: {

					}
				});
			});
	}

	$(document).on('click', '#hotel-item', function () {
		let namaHotel = $(this).data('nama');
		let idHotel = $(this).data('id');

		$('#nama_hotel').text(namaHotel);
		namaHotelC = namaHotel;
		idHotelC = idHotel;
		getData(idHotelC, namaHotelC, dateFilter, today);
	});

	$(document).on('click', '#date-item', function () {
		var namaDate = $(this).text();
		var filter = 0;
		today = getToday();
		if (namaDate == "This Week") {
			filter = lastWeek();
			$('#nama_date').text(namaDate);
			dateFilter = filter;
			getData(idHotelC, namaHotelC, filter, today);
		} else if (namaDate == "This Month") {
			filter = lastMonth();
			$('#nama_date').text(namaDate);
			dateFilter = filter;
			getData(idHotelC, namaHotelC, filter, today);
		}

	});

	$(document).on('click', '#totalDetail', function () {
		urls = "get_report_hotel_by_tanggalcheckin/";
		$('#kamar').empty();
		$('#listRevenue').empty();
		let link_download = "<?php echo base_url() ?>index.php/exportCSV/"+idHotelC+"/"+dateFilter+"/"+today;
		$('#downloadReport').attr('href',link_download);
		$.ajax({
			url: "<?php echo base_url() ?>index.php/" + urls + idHotelC + "/" + dateFilter + "/" + today,
			type: 'GET',
			dataType: 'json',
			beforeSend: function () {
				$('#waitDetail').show();
				$('#modalContent').hide();
			},
			success: function (dataComplete) {
				$('#waitDetail').hide();
				$('#modalContent').show();
				for (var i = 0; i < dataComplete.length; i++) {
					var ckInDate = new Date(dataComplete[i].tanggal_check_in);
					var ckOtDate = new Date(dataComplete[i].tanggal_check_out);
					var selisihDate = Math.ceil((ckOtDate - ckInDate) / (1000 * 60 * 60 * 24));
					var tmp = $('#list_revenue')[0].innerHTML;
					tmp = $.parseHTML(tmp);
					

					$(tmp).data('id', dataComplete[i].id_order);
					$(tmp).find('#namaUser').text(dataComplete[i].nama_pemesan);
					$(tmp).find('#namaKamar').text(dataComplete[i].nama_kamar);
					$(tmp).find('#jmlRoom').text(dataComplete[i].jumlah_room);
					$(tmp).find('#jmlMalam').text(selisihDate);
					$(tmp).find('#jmlGuest').text(dataComplete[i].jumlah_guest);
					if (dataComplete[i].request_jam_check_in_awal != null) {
						$(tmp).find('#reqInAwal').text(dataComplete[i].request_jam_check_in_awal);
						$(tmp).find('#reqInAkhir').text(dataComplete[i].request_jam_check_in_akhir);
					} else {
						$(tmp).find('#reqInAkhir').parent('.badge').hide();
					}
					$(tmp).find('#totHarga').text(currency.format(dataComplete[i].total_harga));
					$(tmp).appendTo('#listRevenue');
				}
			}
		});
	});

</script>


</html>
