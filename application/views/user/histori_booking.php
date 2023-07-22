<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />

	<link rel="stylesheet" href="<?=base_url("dist/css/bootstrap.min.css");?>">
	<link rel="stylesheet" href="<?=base_url("dist/css/bootstrap-grid.min.css");?>">
	<link rel="stylesheet" href="<?=base_url("dist/css/style.css");?>">
	<link rel="stylesheet" href="<?=base_url("dist/css/style_header.css");?>">
	<link rel="stylesheet" href="<?=base_url("dist/css/font-awesome.min.css");?>">




	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
	<title>Order</title>
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


	.pagi-hidden{
		display: none;
	}
      
      
	.pagi-active{
        display: inline-block;
	}
      
	.pagination-customku {
        display: inline-block;
        float:right;
        margin-top:10px;
	}

	.pagination-customku a {
        color: black;
        float: left;
        padding: 8px 16px;
        text-decoration: none;
	}

	.pagination-customku a.active {
        background-color: #4CAF50;
        color: white;
	}

	.pagination-customku a:hover:not(.active) {background-color: #ddd;}

	
	.page_navigationss { width: 100%; text-align: center }
	.page_navigationss ul { padding: 0 }
	.page_navigationss li { display: inline; padding: 5px; }
	.page_navigationss li.active_page { background-color: #cee4f7 }


	#choose_btn {
        background-color: blue;
        color: white;
        padding: 0.5rem;
        font-family: sans-serif;
        border-radius: 0.3rem;
        cursor: pointer;
	}

	#file-chosen{
        margin-left: 0.3rem;
        font-family: sans-serif;
	}
	  
</style>

<body>
	<?php $this->load->view("user/header");?>
	<div class="lds-ring">
		<div></div>
		<div></div>
		<div></div>
		<div></div>
	</div>
	<div class="container">
		<div class="row " style="margin-top:25%; margin-bottom:5%;" id="all_filter">
            <div class="col-5 text-center">
					<label>Filter History : </label>     
			</div>
            <div class="col-7 text-center"s>
				       
				<select id="filter_history" class="custom-select">
					<option selected value="active_ticket" id="option_history">Active </option>
					<option value="old_ticket" id="option_history">Old Ticket</option>
					<option value="all_ticket" id="option_history">All History</option>
				</select>
			</div>
		</div>

		<div class="row " style="margin-bottom:20%;" id="all_hotel">
		</div>
		
		<div class="row justify-content-center" style="margin-bottom:100px">
			<nav aria-label="Contacts Page Navigation">
				<ul class="pagination justify-content-center m-0" id="data_pagination">
				</ul>
			</nav>
		</div>
		
	</div>

	<?php $this->load->view("user/footer");?>
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

<script id="list_hotel" type="text/HTML">
	<div class="col-sm-12" style="width:100%;">
		<div class="card" style="border-radius: 5px;margin-top:20px;">
			<div class="card-body">
				<input type="hidden" id="idHotelList">
				<label style="color:black;" id="namaHotel"></label><br>
				<label style="color:black;" id="tgl_check_in_out"></label><br>
				<!-- <label style="float:right;" id="hargaHotel">Rp. 300.000 / room / night</label> -->
				<div id="btn_details" style="display: flex;"></div>
				<!-- <button type="button" class="btn btn-sm btn-outline-primary" id="nama_date">View Detail</button> -->
			</div>
			
		</div>
	</div>
</script>


<script>
	$(document).ready(function () {
		$("#order_footer").addClass('is-active');
		$("#header_title").text('Order');
		// getData(idHotelC, namaHotelC, dateFilter, today);
	});

</script>
<script>
	$('.lds-ring').hide();
	// $('.container').hide();
	// var idHotelC = getCookie('id_hotel');
	// var today = getToday();
	// var dateFilter = lastWeek();
	var data_booking = getCookie('data_booking');
    var arr_data_history = [];
    var jml_timeline = 0;
	var jml_loop_page = 10;

	
	var loginuseroauth = "<?php echo $_SESSION['login_oauth'] ?>";
	var loginuserName = "<?php echo $_SESSION['login_nama'] ?>";
	var loginuseremail = "<?php echo $_SESSION['login_email'] ?>";

	
	// $(function () {
	// 	$('input[name="daterange"]').daterangepicker({
	// 		opens: 'left'
	// 	}, function (start, end, label) {
	// 		$('#nama_date').text(start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
	// 		filter = start.format('YYYY-MM-DD');
	// 		today = end.format('YYYY-MM-DD');
	// 		getData(idHotelC, namaHotelC, filter, today);
	// 	});
	// });

	$.when(getAllHotel()).done(function (getHotel) {

		// console.log('-------getHotel.length-')
		// console.log(getHotel.length)

		arr_data_history = getHotel;
		var jml_data = 0;
		var data_list = '';
		var no_timeline = 1;
		var jml_list_order = 0;

		
		data_list = data_list + '<div class="timelinedata currentdata" id="timeline1" style="width: 100%;">';

		for (var i = 0; i < getHotel.length; i++) {
			if(getHotel[i].status_order != 'completed'){
				var tmp = $('#list_hotel')[0].innerHTML;
				tmp = $.parseHTML(tmp);
				
				tgl_check_in = new Date(getHotel[i].tanggal_check_in);
				tgl_check_out = new Date(getHotel[i].tanggal_check_out);
				btn_completed = '';

				var Difference_In_Time = tgl_check_out.getTime() - tgl_check_in.getTime();

				var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);

				// console.log('------------')
				// console.log(getHotel[i])
				// // console.log(arr_data_booking[0])
				// console.log(Difference_In_Days)

				
                var jml_coloumn = 0;
                var jml_coloumn_timeline = 0;

				
				if(jml_data == jml_loop_page){
					jml_data = 0;
					no_timeline = no_timeline + 1;
					data_list = data_list + '<div class="timelinedata pagi-hidden" id="timeline'+ no_timeline +'" style="width: 100%;">'
				}

				jml_data = jml_data + 1;
				jml_list_order = jml_list_order + 1;



				
				if(getHotel[i].status_order == 'waiting_payment'){
					btn_completed = '<button type="button" class="btn btn-sm btn-danger" id="nama_date" style="margin-left:10px;" >Belum Lunas</button>';
				} else {
					btn_completed = '<button type="button" class="btn btn-sm btn-primary" id="nama_date" style="margin-left:10px;" >Lunas</button>';
				}


				
				// if(getHotel[i].id_master_kota == arr_data_booking[0]){
				// $(tmp).find('#idHotelList').text(getHotel[i].id_order)
				// $(tmp).find('#namaHotel').append('<b>'+getHotel[i].nama_hotel+'</b> ' )
				// $(tmp).find('#tgl_check_in_out').append( getHotel[i].tanggal_check_in +' &#x2022; ' + Difference_In_Days+' nights &#x2022; ' + getHotel[i].nama_kota)
				
				// $(tmp).find('#btn_details').append('<button type="button" class="btn btn-sm btn-outline-primary" id="nama_date" onclick="viewdetails('+getHotel[i].id_order+')" >View Detail</button>' + btn_completed)
				// // $(tmp).find('#hargaHotel').text(getHotel[i].ket_fasilitas)
				// $(tmp).appendTo('#all_hotel');


				
				data_list = data_list + '<div class="col-sm-12" style="width:100%;">' +
					'<div class="card" style="border-radius: 5px;margin-top:20px;">' +
						'<div class="card-body">' +
							'<input type="hidden" id="'+ getHotel[i].id_order +'">' +
							'<label style="color:black;" id="namaHotel"><b>'+ getHotel[i].nama_hotel +'</b></label><br>' +
							'<label style="color:black;" id="tgl_check_in_out">'+ getHotel[i].tanggal_check_in +' &#x2022; ' + Difference_In_Days+' nights &#x2022; ' + getHotel[i].nama_kota +'</label><br>' +
							'<div id="btn_details" style="display: flex;"><button type="button" class="btn btn-sm btn-outline-primary" id="nama_date" onclick="viewdetails('+getHotel[i].id_order+')" >View Detail</button>' + btn_completed + '</div>' +
						'</div>' +
					'</div>' +
				'</div>';

				if(jml_data == jml_loop_page){
					// console.log('jml_data')
					// console.log(jml_data)
					data_list = data_list + '</div>'
				}

			}

		}

		if(jml_data < jml_loop_page){
			data_list = data_list + '</div>'
			// console.log('ini')

		}
		// console.log(data_list)
		
		document.getElementById("all_hotel").innerHTML = data_list;

		// if(getHotel.length == 0){
			
		// }

		// console.log('jml_list_order')
		// console.log(jml_list_order)
		
		// console.log(jml_timeline)

		
		jml_timeline = Math.floor(jml_list_order/jml_loop_page); // ganti angka 5 ini jd jml brp bnyk mau tampil
		
		// console.log(jml_timeline)
		var sisa_timeline = jml_list_order%jml_loop_page;
		if(sisa_timeline != 0){
			jml_timeline = jml_timeline + 1;
		}
		
		// console.log(jml_timeline)
		
		if(jml_timeline <= 10){
			loop_data = jml_timeline - 1;
		} else {
			loop_data = 9;

		}

		// console.log('loop_data')
		// console.log(loop_data)
		
		var data_li = '';
		data_li = data_li + '<li class="page-item"><a class="page-link" href="#all_filter" onclick="page_first()">&laquo;</a></li>' +
							'<li class="page-item active" id="li_1"><a class="page-link" href="#all_filter" onclick="ada(1)">1</a></li>' ;

		var id_li = 2;
		for(var z=0; z<loop_data; z++){
			data_li = data_li + '<li class="page-item" id="li_'+id_li+'"><a class="page-link" href="#all_filter" onclick="ada('+id_li+')">'+id_li+'</a></li>';
			id_li = id_li + 1;
		}

		data_li = data_li + '<li class="page-item"><a class="page-link" href="#all_filter" onclick="page_last()">&raquo;</a></li>';

		document.getElementById("data_pagination").innerHTML = data_li;

	});
	
	function getAllHotel() {
		return $.ajax(
			"<?php echo base_url() ?>index.php/get_order_by_user/" + loginuseroauth, {
				dataType: 'json'
			}
		);
	}

	function reload_history(filter) {
		
		// arr_data_history

		var status_order_now = '';
			
		var jml_data = 0;
		var data_list = '';
		var no_timeline = 1;
		var jml_list_order = 0;
		
		var status_pass_timeline1 = 0;


		$("#all_hotel").text('')

		for (var i = 0; i < arr_data_history.length; i++) {
			// console.log(arr_data_history[i].status_order);

			var status_pass = '0';
			var btn_completed = '';
			
			
			if(filter == 'active_ticket'){
				console.log('act');
				if(arr_data_history[i].status_order != 'completed'){
					status_pass = '1';
					jml_list_order = jml_list_order + 1;
					status_pass_timeline1 = status_pass_timeline1 + 1;
					if(arr_data_history[i].status_order == 'waiting_payment'){
						btn_completed = '<button type="button" class="btn btn-sm btn-danger" id="nama_date" style="margin-left:10px;" >Belum Lunas</button>';

					} else {
						btn_completed = '<button type="button" class="btn btn-sm btn-primary" id="nama_date" style="margin-left:10px;" >Lunas</button>';

					}
				}
			} else if(filter == 'old_ticket'){
				console.log('old');
				if(arr_data_history[i].status_order == 'completed'){
					status_pass = '1';
					jml_list_order = jml_list_order + 1;
					status_pass_timeline1 = status_pass_timeline1 + 1;
					btn_completed = '<button type="button" class="btn btn-sm btn-success" id="nama_date" style="margin-left:10px;" >Complete</button>';
				}

			} else if(filter == 'all_ticket'){
				console.log('all');
				status_pass = '1';
				jml_list_order = jml_list_order + 1;
				status_pass_timeline1 = status_pass_timeline1 + 1;
				if(arr_data_history[i].status_order == 'completed'){
					btn_completed = '<button type="button" class="btn btn-sm btn-success" id="nama_date" style="margin-left:10px;" >Complete</button>';
				} else if(arr_data_history[i].status_order == 'waiting_payment'){
					btn_completed = '<button type="button" class="btn btn-sm btn-danger" id="nama_date" style="margin-left:10px;" >Belum Lunas</button>';
				} else {
					btn_completed = '<button type="button" class="btn btn-sm btn-primary" id="nama_date" style="margin-left:10px;" >Lunas</button>';
				}

			}

			
			jml_timeline = Math.floor(jml_list_order.length/10);
			var sisa_timeline = jml_list_order.length%10;
			if(sisa_timeline != 0){
				jml_timeline = jml_timeline + 1;
			}
			
			if(status_pass_timeline1 == 1){
				
		
				data_list = data_list + '<div class="timelinedata currentdata" id="timeline1" style="width: 100%;">';
			}

			if(status_pass == '1'){
				var tmp = $('#list_hotel')[0].innerHTML;
				tmp = $.parseHTML(tmp);
				
				tgl_check_in = new Date(arr_data_history[i].tanggal_check_in);
				tgl_check_out = new Date(arr_data_history[i].tanggal_check_out);

				var Difference_In_Time = tgl_check_out.getTime() - tgl_check_in.getTime();
				var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);

				var jml_coloumn = 0;
                var jml_coloumn_timeline = 0;
				
				if(jml_data == jml_loop_page){
					jml_data = 0;
					no_timeline = no_timeline + 1;
					data_list = data_list + '<div class="timelinedata pagi-hidden" id="timeline'+ no_timeline +'" style="width: 100%;">'
				}

				jml_data = jml_data + 1;
				
				data_list = data_list + '<div class="col-sm-12" style="width:100%;">' +
					'<div class="card" style="border-radius: 5px;margin-top:20px;">' +
						'<div class="card-body">' +
							'<input type="hidden" id="'+ arr_data_history[i].id_order +'">' +
							'<label style="color:black;" id="namaHotel"><b>'+ arr_data_history[i].nama_hotel +'</b></label><br>' +
							'<label style="color:black;" id="tgl_check_in_out">'+ arr_data_history[i].tanggal_check_in +' &#x2022; ' + Difference_In_Days+' nights &#x2022; ' + arr_data_history[i].nama_kota +'</label><br>' +
							'<div id="btn_details" style="display: flex;"><button type="button" class="btn btn-sm btn-outline-primary" id="nama_date" onclick="viewdetails('+arr_data_history[i].id_order+')" >View Detail</button>' + btn_completed + '</div>' +
						'</div>' +
					'</div>' +
				'</div>';

				if(jml_data == jml_loop_page){
					data_list = data_list + '</div>'
				}


				// $(tmp).find('#idHotelList').text(arr_data_history[i].id_order)
				// $(tmp).find('#namaHotel').append('<b>'+arr_data_history[i].nama_hotel+'</b> ' )
				// $(tmp).find('#tgl_check_in_out').append( arr_data_history[i].tanggal_check_in +' &#x2022; ' + Difference_In_Days+' nights &#x2022; ' + arr_data_history[i].nama_kota)
				
				// $(tmp).find('#btn_details').append('<button type="button" class="btn btn-sm btn-outline-primary" id="nama_date" onclick="viewdetails('+arr_data_history[i].id_order+')" >View Detail</button>' + btn_completed)
				// $(tmp).appendTo('#all_hotel');
			}

		}

		

		if(jml_data < jml_loop_page){
			data_list = data_list + '</div>';
		}
		
		document.getElementById("all_hotel").innerHTML = data_list;
		jml_timeline = Math.floor(jml_list_order/jml_loop_page); // ganti angka 5 ini jd jml brp bnyk mau tampil
		
		var sisa_timeline = jml_list_order%jml_loop_page;
		if(sisa_timeline != 0){
			jml_timeline = jml_timeline + 1;
		}
		
		if(jml_timeline <= 10){
			loop_data = jml_timeline - 1;
		} else {
			loop_data = 9;
		}
		
		var data_li = '';
		data_li = data_li + '<li class="page-item"><a class="page-link" href="#all_filter" onclick="page_first()">&laquo;</a></li>' +
							'<li class="page-item active" id="li_1"><a class="page-link" href="#all_filter" onclick="ada(1)">1</a></li>' ;

		var id_li = 2;
		for(var z=0; z<loop_data; z++){
			data_li = data_li + '<li class="page-item" id="li_'+id_li+'"><a class="page-link" href="#all_filter" onclick="ada('+id_li+')">'+id_li+'</a></li>';
			id_li = id_li + 1;
		}

		data_li = data_li + '<li class="page-item"><a class="page-link" href="#all_filter" onclick="page_last()">&raquo;</a></li>';
		document.getElementById("data_pagination").innerHTML = data_li;
		$('.lds-ring').hide();

	}


	function viewdetails(active) {
		// setCookie('booking_section', active);
		console.log('ini')
		console.log(active)
		setCookie('id_booking_kamar', active);
		window.location = "<?=base_url("/index.php/bookingdetails");?>";
	}
	
	
	// $(document).on('click', '#listHotel', function () {
	// 	let id_hotel = $(this).find('#idHotelList').text();

	// 	console.log('ini nih klik')
	// 	console.log(id_hotel)

	// 	setCookie('open_kamar', id_hotel);
	// 	window.location = "<?=base_url("/index.php/bookingdetails");?>";
	// });

	$("#filter_history").change(function (e) { 
		console.log('--change')
		console.log($("#filter_history").val())
		$('.lds-ring').show();
		
		reload_history($("#filter_history").val())
    });


	function get_new_pagination(id, li_tujuan, li_skrng){
        var arr_num_1 = [];
        var arr_num_2 = [];
        var arr_num_final = [];
        var jml_skrng = 0;
        var status_mulai = 0;

        if(jml_timeline > 10){

            for(var a=0; a<jml_timeline; a++){
                if(a+1 == id){
                    status_mulai = 1;
                }
                if(status_mulai == 1){
                    if(jml_skrng <10){
                        jml_skrng = jml_skrng + 1;
                        arr_num_2.push(a+1);
                    }
                } else {
                    arr_num_1.push(a+1);
                }
            }
            
            var len_num = arr_num_1.length;

            if(jml_timeline > 10){
                if(jml_skrng < 10){
                    max = 10 - jml_skrng;
                    pos = max;
                    
                    for(var b=0; b<max; b++){
                        arr_num_final.push(arr_num_1[len_num-pos]);
                        pos= pos - 1;                    
                    }
                }
            }

            for(var c=0; c<arr_num_2.length; c++){
                arr_num_final.push(arr_num_2[c]);
            }
            
            var data_li = '';
            data_li = data_li + '<li class="page-item"><a class="page-link" href="#all_filter" onclick="page_first()">&laquo;</a></li>' ;
                                
            for(var z=0; z<arr_num_final.length; z++){
                var id_li = arr_num_final[z];
                if(id_li == id){
                    data_li = data_li + '<li class="page-item active" id="li_'+id_li+'"><a class="page-link" href="#all_filter" onclick="ada('+id_li+')">'+id_li+'</a></li>';
                } else {
                    data_li = data_li + '<li class="page-item" id="li_'+id_li+'"><a class="page-link" href="#all_filter" onclick="ada('+id_li+')">'+id_li+'</a></li>';
                }
            }
            
            data_li = data_li + '<li class="page-item"><a class="page-link" href="#all_filter" onclick="page_last()">&raquo;</a></li>';
            document.getElementById("data_pagination").innerHTML = data_li;

			// console.log('-------data_li')
			// console.log(data_li)

        } else {
            var element3 = document.getElementById(li_skrng);
            element3.classList.remove("active");

            var element4 = document.getElementById(li_tujuan);
            element4.classList.add("active");
			
			// console.log('-------data_li2')

        }
    }

    function ada(id){

		// console.log('--ada')

        var time_tujuan = "timeline" + id;
        var time_skrng = '';
        var li_tujuan = "li_" + id;
        var li_skrng = '';
        var no_skrng = '';
        
        var cusid_ele2 = document.getElementsByClassName('currentdata');
        for (var j = 0; j < cusid_ele2.length; ++j) {
            time_skrng = cusid_ele2[j].id;
            pos_awal = time_skrng.search("line") + 4;
            no_skrng = time_skrng.slice(pos_awal, time_skrng.length);
            li_skrng = "li_" + no_skrng;
        }
        
        var element = document.getElementById(time_skrng);
        element.classList.remove("currentdata");
        element.classList.add("pagi-hidden");
        
        var element2 = document.getElementById(time_tujuan);
        element2.classList.remove("pagi-hidden");
        element2.classList.add("currentdata");
        
        get_new_pagination(id, li_tujuan, li_skrng);
        
    }

    function page_first(){
        time_skrng = '';
        time_tujuan = 'timeline1';
        li_skrng = '';
        li_tujuan = 'li_1';

        var cusid_ele2 = document.getElementsByClassName('currentdata');
        for (var j = 0; j < cusid_ele2.length; ++j) {
            var item = cusid_ele2[j];  
            time_skrng = item.id;            
            pos_awal = time_skrng.search("line") + 4;
            no_skrng = time_skrng.slice(pos_awal, time_skrng.length);
            li_skrng = "li_" + no_skrng;
        }

        if(time_skrng != time_tujuan){
            var element = document.getElementById(time_tujuan);
            element.classList.remove("pagi-hidden");
            element.classList.add("currentdata");
            
            var element2 = document.getElementById(time_skrng);
            element2.classList.remove("currentdata");
            element2.classList.add("pagi-hidden");
            
            get_new_pagination(1, li_tujuan, li_skrng);
        }
    }

    
    function page_last(){
        time_skrng = '';
        time_tujuan = '';
        li_skrng = '';
        li_tujuan = '';

        var cusid_ele = document.getElementsByClassName('timelinedata');
        var cusid_ele2 = document.getElementsByClassName('currentdata');
        for (var j = 0; j < cusid_ele2.length; ++j) {
            var item = cusid_ele2[j];  
            time_skrng = item.id;            
            pos_awal = time_skrng.search("line") + 4;
            no_skrng = time_skrng.slice(pos_awal, time_skrng.length);
            li_skrng = "li_" + no_skrng;
        }

        time_tujuan = cusid_ele[cusid_ele.length-1].id;
        pos_awal = time_tujuan.search("line") + 4;
        no_tujuan = time_tujuan.slice(pos_awal, time_tujuan.length);
        li_tujuan = "li_" + no_tujuan;

        if(time_skrng != time_tujuan){
            var element = document.getElementById(time_tujuan);
            element.classList.remove("pagi-hidden");
            element.classList.add("currentdata");
            
            var element2 = document.getElementById(time_skrng);
            element2.classList.remove("currentdata");
            element2.classList.add("pagi-hidden");
            
            get_new_pagination(no_tujuan, li_tujuan, li_skrng);
        }
    }



</script>


</html>
