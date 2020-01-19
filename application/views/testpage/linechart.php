<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="<?=base_url("dist/css/bootstrap.min.css");?>">
	<link rel="stylesheet" href="<?=base_url("dist/css/bootstrap-grid.min.css");?>">
	<link rel="stylesheet" href="<?=base_url("dist/css/style.css");?>">

	<title>TEST</title>
</head>

<body>
	<h5>Total Revenue</h5>
	<h4 id="totalRevenue"></h4>
	<canvas id="myLineChart" height="300"></canvas>
	<h5>Total Order</h5>
	<h4 id="totalSource"></h4>
	<canvas id="myDoughnutChart" height="300"></canvas>
</body>
<script src="<?=base_url("dist/js/jquery.min.js");?>"></script>
<script src="<?=base_url("dist/js/popper.min.js");?>"></script>
<script src="<?=base_url("dist/js/bootstrap.min.js");?>"></script>
<script src="<?=base_url("dist/js/function.js");?>"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

<script>
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
