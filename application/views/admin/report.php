<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="<?=base_url("dist/css/bootstrap.min.css");?>">
	<link rel="stylesheet" href="<?=base_url("dist/css/bootstrap-grid.min.css");?>">
	<link rel="stylesheet" href="<?=base_url("dist/css/style.css");?>">

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
    <div class="lds-ring">
		<div></div>
		<div></div>
		<div></div>
		<div></div>
	</div>
    <div class="container">
        <div class="row" style="margin-top:20%; margin-left:1%; margin-right:1%;">
            <div class="col-sm-12">
            <h5>Total Revenue</h5>
	<h4 id="totalRevenue"></h4>
	<canvas id="myLineChart" height="200"></canvas>
	<h5>Total Order</h5>
	<h4 id="totalSource"></h4>
	<canvas id="myDoughnutChart" height="200"></canvas>
            </div>
        
        </div>
    </div>
    
	<?php $this->load->view("admin/footer");?>
</body>
<script src="<?=base_url("dist/js/jquery.min.js");?>"></script>
<script src="<?=base_url("dist/js/popper.min.js");?>"></script>
<script src="<?=base_url("dist/js/bootstrap.min.js");?>"></script>
<script src="<?=base_url("dist/js/function.js");?>"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

<script>
	$(document).ready(function () {
		$("#report_footer").addClass('is-active');
		$("#header_title").text('Report');
	});

</script>



<script>
    $('.lds-ring').show();
		$('.container').hide();

	function getRevenue(idHotel,tglawal,tglakhir) {
		return $.ajax(
			"<?php echo base_url() ?>index.php/get_revenue_hotel_by_tanggalcheckin/" + idHotel + "/" + tglawal+ "/" + tglakhir, {
				dataType: 'json'
			}
			);
	}

	function getSource(idHotel,tglawal,tglakhir) {
		return $.ajax(
			"<?php echo base_url() ?>index.php/get_sumber_order_hotel_by_tanggalcheckin/" + idHotel + "/" + tglawal+ "/" + tglakhir, {
				dataType: 'json'
			}
			);
	}


	function reformatDate(oldformat){
		var mydate = new Date(oldformat);
		var month = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
		"Jul", "Aug", "Sep", "Oct", "Nov", "Dec"][mydate.getMonth()];
		return mydate.getDate() + ' ' + month;
	}


	$.when(getRevenue('araya001', '2020-01-11', '2020-01-18'), getSource('araya001', '2020-01-11', '2020-01-18')).done(function (getrevenue, getsource) {
		$('.lds-ring').hide();
		$('.container').show();
		var datarevenue = getrevenue[0];

		var datalabels = [];
		var datavalues = [];
		var totalRevenue = 0;
		for (var i = 0; i < datarevenue.length; i++) {
			datalabels.push(reformatDate(datarevenue[i].tanggal_check_in_real));
			datavalues.push(datarevenue[i].revenue/1000);
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
				scales:{
					xAxes:[{
						ticks:{
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

</script>


</html>
