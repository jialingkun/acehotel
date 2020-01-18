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
	<canvas id="myChart" height="300"></canvas>
</body>
<script src="<?=base_url("dist/js/jquery.min.js");?>"></script>
<script src="<?=base_url("dist/js/popper.min.js");?>"></script>
<script src="<?=base_url("dist/js/bootstrap.min.js");?>"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

<script>
	function getRevenue(idHotel,tglawal,tglakhir) {
		return $.ajax(
			"<?php echo base_url() ?>index.php/get_revenue_hotel_by_tanggalcheckin/" + idHotel + "/" + tglawal+ "/" + tglakhir, {
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











	$.when(getRevenue('araya001', '2020-01-11', '2020-01-18')).done(function (datarevenue) {
		var datalabels = [];
		var datavalues = [];
		for (var i = 0; i < datarevenue.length; i++) {
			datalabels.push(reformatDate(datarevenue[i].tanggal_check_in_real));
			datavalues.push(datarevenue[i].revenue/1000);
		}
		var ctx = document.getElementById('myChart').getContext('2d');
		var chart = new Chart(ctx, {
    	// The type of chart we want to create
    	type: 'line',

    	// The data for our dataset
    	data: {
    		labels: datalabels,
    		datasets: [{
    			label: 'Ribu Rupiah',
    			backgroundColor: 'rgb(255, 99, 132)',
    			borderColor: 'rgb(255, 99, 132)',
    			data: datavalues
    		}]
    	},

    	// Configuration options go here
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
	});
</script>


</html>
