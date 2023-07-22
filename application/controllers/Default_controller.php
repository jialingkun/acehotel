<?php
include_once ("Loadview.php");

header('Access-Control-Allow-Origin: *'); //for allow any domain, insecure
header('Access-Control-Allow-Headers: *'); //for allow any headers, insecure
header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');  

class Default_controller extends Loadview {
	public function __construct(){
		parent::__construct();
		$this->load->model('Default_model');
		$this->load->library('pdf');
		$this->load->helper('url_helper');
		date_default_timezone_set('Asia/Jakarta');
		// require_once APPPATH.'third_party/src/Google_Client.php';
		// require_once APPPATH.'third_party/src/contrib/Google_Oauth2Service.php';
		include_once APPPATH . "../vendor/autoload.php";
	}
	
	//GET DATA

	//get all data
	//note: ambil semua data dari database tanpa filter
	//parameter: tidak untuk frontend, kosongi parameternya
	public function get_all_admin($return_var = NULL){
		$data = $this->Default_model->get_data_admin();
		if (empty($data)){
			$data = [];
		}else{
			foreach ($data as &$row){
				unset($row['password_admin']);
			}
		}
		if ($return_var == true) {
			return $data;
		}else{
			echo json_encode($data);
		}
	}

	public function get_all_owner($return_var = NULL){
		$data = $this->Default_model->get_data_owner();
		if (empty($data)){
			$data = [];
		}else{
			foreach ($data as &$row){
				unset($row['password_owner']);
			}
		}
		if ($return_var == true) {
			return $data;
		}else{
			echo json_encode($data);
		}
	}

	public function get_all_hotel($return_var = NULL){
		$data = $this->Default_model->get_data_hotel();
		if (empty($data)){
			$data = [];
		}else{
			foreach ($data as &$row){
				unset($row['password_owner']);
			}
		}
		if ($return_var == true) {
			return $data;
		}else{
			echo json_encode($data);
		}
	}

	public function get_all_receptionist($return_var = NULL){
		$data = $this->Default_model->get_data_receptionist();
		if (empty($data)){
			$data = [];
		}else{
			foreach ($data as &$row){
				unset($row['password_receptionist']);
			}
		}
		if ($return_var == true) {
			return $data;
		}else{
			echo json_encode($data);
		}
	}

	public function get_all_kamar($return_var = NULL){
		$data = $this->Default_model->get_data_kamar();
		if (empty($data)){
			$data = [];
		}
		if ($return_var == true) {
			return $data;
		}else{
			echo json_encode($data);
		}
	}

	public function get_all_nokamar($return_var = NULL){
		$data = $this->Default_model->get_data_nokamar();
		if (empty($data)){
			$data = [];
		}
		if ($return_var == true) {
			return $data;
		}else{
			echo json_encode($data);
		}
	}

	public function get_all_order($return_var = NULL){
		$data = $this->Default_model->get_data_order(NULL,'id_order');
		if (empty($data)){
			$data = [];
		}
		if ($return_var == true) {
			return $data;
		}else{
			echo json_encode($data);
		}
	}

	//get by id
	//parameter: username atau id
	//note: ambil data dari database berdasarkan id / username
	public function get_admin_by_id($id, $return_var = NULL){
		$filter = array('username_admin'=> $id);
		$data = $this->Default_model->get_data_admin($filter);
		if (empty($data)){
			$data = [];
		}else{
			foreach ($data as &$row){
				unset($row['password_admin']);
			}
		}
		if ($return_var == true) {
			return $data;
		}else{
			echo json_encode($data);
		}
	}

	public function get_owner_by_id($id, $return_var = NULL){
		$filter = array('username_owner'=> $id);
		$data = $this->Default_model->get_data_owner($filter);
		if (empty($data)){
			$data = [];
		}else{
			foreach ($data as &$row){
				unset($row['password_owner']);
			}
		}
		if ($return_var == true) {
			return $data;
		}else{
			echo json_encode($data);
		}
	}

	public function get_hotel_by_id($id, $return_var = NULL){
		$filter = array('id_hotel'=> $id);
		$data = $this->Default_model->get_data_hotel($filter);
		if (empty($data)){
			$data = [];
		}else{
			foreach ($data as &$row){
				unset($row['password_owner']);
			}
		}
		if ($return_var == true) {
			return $data;
		}else{
			echo json_encode($data);
		}
	}

	public function get_receptionist_by_id($id, $return_var = NULL){
		$filter = array('username_receptionist'=> $id);
		$data = $this->Default_model->get_data_receptionist($filter);
		if (empty($data)){
			$data = [];
		}else{
			foreach ($data as &$row){
				unset($row['password_receptionist']);
			}
		}
		if ($return_var == true) {
			return $data;
		}else{
			echo json_encode($data);
		}
	}

	
	public function get_user_by_id($id, $return_var = NULL){
		$filter = array('id_user'=> $id);
		$data = $this->Default_model->get_data_user($filter);
		if (empty($data)){
			$data = [];
		}else{
			foreach ($data as &$row){
				unset($row['password_receptionist']);
			}
		}
		if ($return_var == true) {
			return $data;
		}else{
			echo json_encode($data);
		}
	}

	public function get_kamar_by_id($id, $return_var = NULL){
		$filter = array('kamar.id_kamar'=> $id);
		$data = $this->Default_model->get_data_kamar($filter);
		if (empty($data)){
			$data = [];
		}
		if ($return_var == true) {
			return $data;
		}else{
			echo json_encode($data);
		}
	}

	public function get_kamar_by_id_user($id, $tglcheckout,$return_var = NULL){
		$filter = array('kamar.id_kamar'=> $id);
		$datakamar = $this->Default_model->get_data_kamar($filter);
		$arr_order = [];

		$tersediakamar = 0;
		$jmlkamarterisi = 0;
		$jmlkamarkosong = 0;
		$totalkamar = 0;
		$hargaakhir = 0;
		$data = $this->get_nokamar_by_kamar($id, true);
		foreach ($data as &$row){
			$filter = array(
				'orders.id_kamar'=> $id,
				'orders.no_kamar REGEXP '=> "(^|,)".$row['no_kamar']."($|,)", 
				'orders.status_order !='=> 'completed', 
				'orders.tanggal_check_in <=' =>date("Y-m-d", strtotime($tglcheckout))
			);
			$dataorder = $this->Default_model->get_data_order($filter);
			if (empty($dataorder)){
				$row['ketersediaan'] = 'tersedia';
				$tersediakamar= 1;
				$jmlkamarkosong = $jmlkamarkosong + 1;
			}else{
				$row['ketersediaan'] = 'tidak tersedia';
				$jmlkamarterisi = $jmlkamarterisi + 1;
			}
			$totalkamar = $totalkamar + 1;
		}
		
		$selisih = $datakamar[0]['harga_max'] - $datakamar[0]['harga_min'];
		$sisakamar = $totalkamar - $jmlkamarterisi;

		$harganaik = $selisih / $totalkamar;
		
		$total = $harganaik * $jmlkamarterisi;

		if ($jmlkamarterisi == 0){
			$hargaakhir = $datakamar[0]['harga_min'];
		} else {
			$hargaakhir = $datakamar[0]['harga_min'] + $total;

		}

		array_push($arr_order, array('id_kamar' => $datakamar[0]['id_kamar'], 'id_hotel' => $datakamar[0]['id_hotel'], 'nama_kamar' => $datakamar[0]['nama_kamar'], 'max_guest' => $datakamar[0]['max_guest'], 'type_bed' => $datakamar[0]['type_bed'], 'jml_kamar_kosong' => $jmlkamarkosong, 'harga_kamar' => $hargaakhir, 'id_master_kota' => $datakamar[0]['id_master_kota'], 'username_owner' => $datakamar[0]['username_owner'], 'nama_hotel' => $datakamar[0]['nama_hotel'], 'alamat_hotel' => $datakamar[0]['alamat_hotel'], 'telepon_hotel' => $datakamar[0]['telepon_hotel']));

		echo json_encode($arr_order);

		// if (empty($data)){
		// 	$data = [];
		// }
		// if ($return_var == true) {
		// 	return $data;
		// }else{
		// 	echo json_encode($data);
		// }
	}

	public function get_nokamar_by_id($idkamar, $nokamar, $return_var = NULL){
		$filter = array('nokamar.id_kamar'=> $idkamar, 'no_kamar'=> $nokamar);
		$data = $this->Default_model->get_data_nokamar($filter);
		if (empty($data)){
			$data = [];
		}
		if ($return_var == true) {
			return $data;
		}else{
			echo json_encode($data);
		}
	}

	public function get_order_by_id($id, $return_var = NULL){
		$filter = array('id_order'=> $id);
		$data = $this->Default_model->get_data_order($filter);
		if (empty($data)){
			$data = [];
		}
		if ($return_var == true) {
			return $data;
		}else{
			echo json_encode($data);
		}
	}

	//get hotel by owner
	//parameter: username owner
	//note: ambil data hotel berdasarkan owner
	public function get_hotel_by_owner($id, $return_var = NULL){
		$filter = array('hotel.username_owner'=> $id);
		$data = $this->Default_model->get_data_hotel($filter);
		if (empty($data)){
			$data = [];
		}else{
			foreach ($data as &$row){
				unset($row['password_owner']);
			}
		}
		if ($return_var == true) {
			return $data;
		}else{
			echo json_encode($data);
		}
	}

	//get kamar by hotel
	//parameter: id hotel
	//note: ambil data kamar berdasarkan hotel
	public function get_kamar_by_hotel($id, $return_var = NULL){
		$filter = array('kamar.id_hotel'=> $id);
		$data = $this->Default_model->get_data_kamar($filter);
		if (empty($data)){
			$data = [];
		}
		if ($return_var == true) {
			return $data;
		}else{
			echo json_encode($data);
		}
	}

	//get nokamar by kamar
	//parameter: id kamar
	//note: ambil data nomer kamar berdasarkan jenis kamar
	public function get_nokamar_by_kamar($id, $return_var = NULL){
		$filter = array('nokamar.id_kamar'=> $id);
		$data = $this->Default_model->get_data_nokamar($filter, 'lantai');
		if (empty($data)){
			$data = [];
		}
		if ($return_var == true) {
			return $data;
		}else{
			echo json_encode($data);
		}
	}

	//get receptionist by hotel
	//parameter: id hotel
	//note: ambil data receptionist berdasarkan hotel
	public function get_receptionist_by_hotel($id, $return_var = NULL){
		$filter = array('receptionist.id_hotel'=> $id);
		$data = $this->Default_model->get_data_receptionist($filter);
		if (empty($data)){
			$data = [];
		}else{
			foreach ($data as &$row){
				unset($row['password_receptionist']);
			}
		}
		if ($return_var == true) {
			return $data;
		}else{
			echo json_encode($data);
		}
	}

	//get order by hotel
	//parameter: id hotel
	//note: ambil data order berdasarkan hotel
	public function get_order_by_hotel($id, $return_var = NULL){
		$filter = array('orders.id_hotel'=> $id);
		$data = $this->Default_model->get_data_order($filter,'id_order');
		if (empty($data)){
			$data = [];
		}
		if ($return_var == true) {
			return $data;
		}else{
			echo json_encode($data);
		}
	}

	//get order hotel upcoming
	//parameter: id hotel
	//note: ambil data order upcoming berdasarkan hotel
	public function get_order_by_hotel_upcoming($id, $return_var = NULL){
		$filter = array('orders.id_hotel'=> $id, 'orders.status_order'=> 'upcoming');
		$data = $this->Default_model->get_data_order($filter, 'tanggal_check_in');
		if (empty($data)){
			$data = [];
		}
		if ($return_var == true) {
			return $data;
		}else{
			echo json_encode($data);
		}
	}

	//get order hotel inhouse
	//parameter: id hotel
	//note: ambil data order inhouse berdasarkan hotel
	public function get_order_by_hotel_inhouse($id, $return_var = NULL){
		$filter = array('orders.id_hotel'=> $id, 'orders.status_order'=> 'inhouse');
		$data = $this->Default_model->get_data_order($filter, 'tanggal_check_out');
		if (empty($data)){
			$data = [];
		}
		if ($return_var == true) {
			return $data;
		}else{
			echo json_encode($data);
		}
	}

	//get order hotel completed
	//parameter: id hotel
	//note: ambil data order completed berdasarkan hotel
	public function get_order_by_hotel_completed($id, $return_var = NULL){
		$filter = array('orders.id_hotel'=> $id, 'orders.status_order'=> 'completed');
		$data = $this->Default_model->get_data_order($filter, 'tanggal_check_out','desc',NULL,NULL,50);
		if (empty($data)){
			$data = [];
		}
		if ($return_var == true) {
			return $data;
		}else{
			echo json_encode($data);
		}
	}

	
	//get order by user
	//parameter: id user
	//note: ambil data order berdasarkan user
	public function get_order_by_user($id, $return_var = NULL){

		
		$filter = array('oauth_uid'=>$id);
		$datauser = $this->Default_model->get_data_user($filter);


		$filter = array('orders.id_user'=> $datauser[0]['id_user']);
		$data = $this->Default_model->get_data_order_user($filter,'id_order');
		if (empty($data)){
			$data = [];
		}
		if ($return_var == true) {
			return $data;
		}else{
			echo json_encode($data);
		}
	}


	//get summary check in hari ini untuk dashboard
	//parameter: id hotel
	//note: output adalah check in yang sudah diselesaikan dan jumlah check in yang diperlukan
	public function get_info_checkin_today($id, $return_var = NULL){
		$filter = array('orders.id_hotel'=> $id, 'orders.status_order'=> 'upcoming', 'tanggal_check_in <='=>date('Y-m-d'));
		$notcheckin = $this->Default_model->get_count_order($filter);

		$filter = array('orders.id_hotel'=> $id, 'orders.status_order'=> 'inhouse', 'tanggal_check_in_real'=>date('Y-m-d'));
		$finishcheckin = $this->Default_model->get_count_order($filter);

		$requiredcheckin = $finishcheckin+$notcheckin;
		$data['finished_checkin'] = $finishcheckin;
		$data['required_checkin'] = $requiredcheckin;
		if ($return_var == true) {
			return $data;
		}else{
			echo json_encode($data);
		}
	}


	//get summary inhouse hari ini untuk dashboard
	//parameter: id hotel
	//note: output adalah jumlah inhouse dan jumlah total kamar
	public function get_info_inhouse_today($id, $return_var = NULL){
		$filter = array('orders.id_hotel'=> $id, 'orders.status_order'=> 'inhouse');
		$inhouse = $this->Default_model->get_count_order($filter);

		$datakamar = $this->get_kamar_by_hotel($id,true);
		$totalkamar = 0;
		foreach ($datakamar as $row){
			$totalkamar = $totalkamar + $row['jumlah_kamar'];
		}

		$data['finished_inhouse'] = $inhouse;
		$data['required_inhouse'] = $totalkamar;
		if ($return_var == true) {
			return $data;
		}else{
			echo json_encode($data);
		}
	}

	//get summary check out hari ini untuk dashboard
	//parameter: id hotel
	//note: output adalah check out yang sudah diselesaikan dan jumlah check out yang diperlukan
	public function get_info_checkout_today($id, $return_var = NULL){
		$filter = array('orders.id_hotel'=> $id, 'orders.status_order'=> 'inhouse', 'tanggal_check_out <='=>date('Y-m-d'));
		$notcheckout = $this->Default_model->get_count_order($filter);

		$filter = array('orders.id_hotel'=> $id, 'orders.status_order'=> 'completed', 'tanggal_check_out_real'=>date('Y-m-d'));
		$finishcheckout = $this->Default_model->get_count_order($filter);

		$requiredcheckout = $finishcheckout+$notcheckout;
		$data['finished_checkout'] = $finishcheckout;
		$data['required_checkout'] = $requiredcheckout;
		if ($return_var == true) {
			return $data;
		}else{
			echo json_encode($data);
		}
	}

	//get summary dashboard
	//parameter: id hotel
	//note: output adalah detil check in, inhouse, dan check out
	public function get_info_dashboard_today($id, $return_var = NULL){
		$checkin = $this->get_info_checkin_today($id, true);
		$inhouse = $this->get_info_inhouse_today($id, true);
		$checkout = $this->get_info_checkout_today($id, true);
		$data = array_merge($checkin,$inhouse,$checkout);
		if ($return_var == true) {
			return $data;
		}else{
			echo json_encode($data);
		}
	}



	//get ketersediaan nokamar by kamar
	//parameter: id kamar, tgl check out (ex:2019-12-17)
	//note: ambil data nomer kamar berdasarkan jenis kamar dengan detail ketersediaannya di tanggal check out tertentu
	public function get_ketersediaan_nokamar($id, $tglcheckout, $return_var = NULL){
		$data = $this->get_nokamar_by_kamar($id, true);
		foreach ($data as &$row){
			$filter = array(
				'orders.id_kamar'=> $id,
				'orders.no_kamar REGEXP '=> "(^|,)".$row['no_kamar']."($|,)", 
				'orders.status_order !='=> 'completed', 
				'orders.tanggal_check_in <=' =>date("Y-m-d", strtotime($tglcheckout))
			);
			$dataorder = $this->Default_model->get_data_order($filter);
			if (empty($dataorder)){
				$row['ketersediaan'] = 'tersedia';
			}else{
				$row['ketersediaan'] = 'tidak tersedia';
			}
		}

		if ($return_var == true) {
			return $data;
		}else{
			echo json_encode($data);
		}
	}

	public function get_ketersediaan_nokamar_2($id, $tglcheckout, $return_var = NULL){

		
		$datakamar = $this->get_kamar_by_hotel($id,true);
		$arr_data = [];
		
		foreach ($datakamar as &$abc){
			$tersediakamar = 0;
			$data = $this->get_nokamar_by_kamar($abc['id_kamar'], true);
			foreach ($data as &$row){
				$filter = array(
					'orders.id_kamar'=> $abc['id_kamar'],
					'orders.no_kamar REGEXP '=> "(^|,)".$row['no_kamar']."($|,)", 
					'orders.status_order !='=> 'completed', 
					'orders.tanggal_check_in <=' =>date("Y-m-d", strtotime($tglcheckout))
				);
				$dataorder = $this->Default_model->get_data_order($filter);
				if (empty($dataorder)){
					$row['ketersediaan'] = 'tersedia';
					$tersediakamar= 1;
				}else{
					$row['ketersediaan'] = 'tidak tersedia';
				}
			}
			
			if($tersediakamar == 0){
				array_push($arr_data, array('id_kamar' => $abc['id_kamar'], 'status' => 'tidak tersedia'));

			} else {
				array_push($arr_data, array('id_kamar' => $abc['id_kamar'], 'status' => 'tersedia'));

			}
		}

		// if ($return_var == true) {
		// 	return $data;
		// }else{
			echo json_encode($arr_data);
		// }
	}

	
	public function get_harga_kamar_by_hotel($id, $tglcheckout, $return_var = NULL){
		$datakamar = $this->get_kamar_by_hotel($id,true);
		$arr_data = [];
		$arr_order = [];
		
		foreach ($datakamar as &$abc){
			$tersediakamar = 0;
			$jmlkamarterisi = 0;
			$jmlkamarkosong = 0;
			$totalkamar = 0;
			$hargaakhir = 0;
			$data = $this->get_nokamar_by_kamar($abc['id_kamar'], true);
			foreach ($data as &$row){
				$filter = array(
					'orders.id_kamar'=> $abc['id_kamar'],
					'orders.no_kamar REGEXP '=> "(^|,)".$row['no_kamar']."($|,)", 
					'orders.status_order !='=> 'completed', 
					'orders.tanggal_check_in <=' =>date("Y-m-d", strtotime($tglcheckout))
				);
				$dataorder = $this->Default_model->get_data_order($filter);
				if (empty($dataorder)){
					$row['ketersediaan'] = 'tersedia';
					$tersediakamar= 1;
					$jmlkamarkosong = $jmlkamarkosong + 1;
				}else{
					$row['ketersediaan'] = 'tidak tersedia';
					$jmlkamarterisi = $jmlkamarterisi + 1;
				}
				$totalkamar = $totalkamar + 1;
			}
			
			$selisih = $abc['harga_max'] - $abc['harga_min'];
			$sisakamar = $totalkamar - $jmlkamarterisi;

			if($totalkamar != 0){
				$harganaik = $selisih / $totalkamar;
				
				$total = $harganaik * $jmlkamarterisi;

				if ($jmlkamarterisi == 0){
					$hargaakhir = $abc['harga_min'];
				} else {
					$hargaakhir = $abc['harga_min'] + $total;

				}
			}
				array_push($arr_order, array('id_kamar' => $abc['id_kamar'], 'id_hotel' => $abc['id_hotel'], 'nama_kamar' => $abc['nama_kamar'], 'max_guest' => $abc['max_guest'], 'type_bed' => $abc['type_bed'], 'src_foto_kamar' => $abc['src_foto_kamar'], 'jml_kamar_kosong' => $jmlkamarkosong, 'harga_kamar' => $hargaakhir, 'totalkamar' => $totalkamar));

			// array_push($arr_order, array('jmlkamarterisi' => $jmlkamarterisi, 'jmlkamarkosong' => $jmlkamarkosong, 'harga' => $abc['harga_max'],'sisakamar' => $harganaik, 'total' => $hargaakhir));
			
			if($tersediakamar == 0){
				array_push($arr_data, array('id_kamar' => $abc['id_kamar'], 'status' => 'tidak tersedia', 'jmlkamarkosong' => $jmlkamarkosong));

			} else {
				array_push($arr_data, array('id_kamar' => $abc['id_kamar'], 'status' => 'tersedia', 'jmlkamarkosong' => $jmlkamarkosong));

			}
		}
		array_push($arr_data, $arr_order);

		// if ($return_var == true) {
		// 	return $data;
		// }else{
			echo json_encode($arr_order);
		// }
	}

	//get revenue hotel by range tanggal order
	//parameter: id hotel, tgl order awal (ex:2019-12-17), tgl order akhir
	//note: ambil data revenue hotel berdasarkan range tanggal order, revenue dihitung dari saat order
	public function get_revenue_hotel_by_tanggalorder($id, $tglawal, $tglakhir, $return_var = NULL){
		$filter = array(
			'orders.id_hotel'=> $id,
			'orders.tanggal_order >=' =>date("Y-m-d", strtotime($tglawal)),
			'orders.tanggal_order <=' =>date("Y-m-d", strtotime($tglakhir))
		);

		$data = $this->Default_model->get_data_order($filter, 'tanggal_order','asc','tanggal_order',
			'orders.id_hotel, orders.tanggal_order, SUM(orders.total_harga) as revenue');

		if ($return_var == true) {
			return $data;
		}else{
			echo json_encode($data);
		}
	}

	//get revenue hotel by range tanggal checkin
	//parameter: id hotel, tgl check in awal (ex:2019-12-17), tgl check in akhir
	//note: ambil data revenue hotel berdasarkan range tanggal checkin, revenue dihitung dari saat check in
	public function get_revenue_hotel_by_tanggalcheckin($id, $tglawal, $tglakhir, $return_var = NULL){
		$filter = array(
			'orders.id_hotel'=> $id,
			'orders.status_order !='=> 'upcoming',
			'orders.tanggal_check_in_real >=' =>date("Y-m-d", strtotime($tglawal)),
			'orders.tanggal_check_in_real <=' =>date("Y-m-d", strtotime($tglakhir))
		);

		$data = $this->Default_model->get_data_order($filter, 'tanggal_check_in_real','asc','tanggal_check_in_real',
			'orders.id_hotel, orders.tanggal_check_in_real, SUM(orders.total_harga) as revenue');

		if ($return_var == true) {
			return $data;
		}else{
			echo json_encode($data);
		}
	}

	//get sumber order hotel by range tanggal checkin
	//parameter: id hotel, tgl check in awal (ex:2019-12-17), tgl check in akhir
	//note: ambil data sumber order hotel berdasarkan range tanggal checkin, revenue dihitung dari saat check in
	public function get_sumber_order_hotel_by_tanggalcheckin($id, $tglawal, $tglakhir, $return_var = NULL){
		$filter = array(
			'orders.id_hotel'=> $id,
			'orders.status_order !='=> 'upcoming',
			'orders.tanggal_check_in_real >=' =>date("Y-m-d", strtotime($tglawal)),
			'orders.tanggal_check_in_real <=' =>date("Y-m-d", strtotime($tglakhir))
		);

		$data = $this->Default_model->get_data_order($filter, 'sumber_order','desc','sumber_order',
			'orders.id_hotel, orders.sumber_order, COUNT(orders.sumber_order) as frekuensi');

		if ($return_var == true) {
			return $data;
		}else{
			echo json_encode($data);
		}
	}


	//get report hotel by range tanggal checkin
	//parameter: id hotel, tgl check in awal (ex:2019-12-17), tgl check in akhir
	//note: ambil data report hotel berdasarkan range tanggal checkin, report dihitung dari saat check in
	public function get_report_hotel_by_tanggalcheckin($id, $tglawal, $tglakhir, $return_var = NULL){
		$filter = array(
			'orders.id_hotel'=> $id,
			'orders.status_order !='=> 'upcoming',
			'orders.tanggal_check_in_real >=' =>date("Y-m-d", strtotime($tglawal)),
			'orders.tanggal_check_in_real <=' =>date("Y-m-d", strtotime($tglakhir))
		);

		$data = $this->Default_model->get_data_order($filter, 'tanggal_check_in_real','asc',NULL,
			'orders.id_order, orders.nama_pemesan, orders.sumber_order, orders.tanggal_check_in, orders.tanggal_check_out, orders.status_order, orders.jumlah_room, orders.jumlah_guest, orders.nama_kamar, orders.no_kamar, orders.total_harga');

		if ($return_var == true) {
			return $data;
		}else{
			echo json_encode($data);
		}
	}

	//get fasilitas hotel
	//parameter: id hotel
	//note: ambil data fasilitas hotel berdasarkan hotel
	public function get_fasilitas_by_hotel($id, $return_var = NULL){
		$filter = array('fasilitas.id_hotel'=> $id);
		$data = $this->Default_model->get_data_fasilitas($filter);
		if (empty($data)){
			$data = [];
		}
		if ($return_var == true) {
			return $data;
		}else{
			echo json_encode($data);
		}
	}
	
	//get foto hotel
	//parameter: id hotel
	//note: ambil data foto hotel berdasarkan hotel
	public function get_foto_by_hotel($id, $return_var = NULL){
		$filter = array('fotohotel.id_hotel'=> $id);
		$data = $this->Default_model->get_data_foto($filter);
		if (empty($data)){
			$data = [];
		}
		if ($return_var == true) {
			return $data;
		}else{
			echo json_encode($data);
		}
	}
	
	//get master kota
	//note: ambil data kota
	public function get_master_kota($return_var = NULL){
		$data = $this->Default_model->get_data_kota();
		if (empty($data)){
			$data = [];
		}
		if ($return_var == true) {
			return $data;
		}else{
			echo json_encode($data);
		}
	}



	//get harga kamar termurah per hotel
	//note: ambil data harga kamar hotel
	public function get_harga_kamar_hotel_display($idkota, $tglcheckout, $return_var = NULL){
		
		$filter = array('id_master_kota'=> $idkota);
		$datahotel = $this->Default_model->get_data_hotel($filter);

		$arr_data = [];
		$arr_order = [];
		$src_foto = '';

		foreach ($datahotel as $hotel){
			$datakamar = $this->get_kamar_by_hotel($hotel['id_hotel'],true);
			$hargatermurah = 999999999;
			$totalkamar = 0;
		
			foreach ($datakamar as $abc){
				$tersediakamar = 0;
				$jmlkamarterisi = 0;
				$jmlkamarkosong = 0;
				$totalkamar = 0;
				$hargaakhir = 0;
				$data = $this->get_nokamar_by_kamar($abc['id_kamar'], true);
				foreach ($data as &$row){
					$filter = array(
						'orders.id_kamar'=> $abc['id_kamar'],
						'orders.no_kamar REGEXP '=> "(^|,)".$row['no_kamar']."($|,)", 
						'orders.status_order !='=> 'completed', 
						'orders.tanggal_check_in <=' =>date("Y-m-d", strtotime($tglcheckout))
					);
					$dataorder = $this->Default_model->get_data_order($filter);
					if (empty($dataorder)){
						$row['ketersediaan'] = 'tersedia';
						$tersediakamar= 1;
						$jmlkamarkosong = $jmlkamarkosong + 1;
					}else{
						$row['ketersediaan'] = 'tidak tersedia';
						$jmlkamarterisi = $jmlkamarterisi + 1;
					}
					$totalkamar = $totalkamar + 1;
				}
				
				$selisih = $abc['harga_max'] - $abc['harga_min'];
				$sisakamar = $totalkamar - $jmlkamarterisi;

				if ($totalkamar != 0) {
					$harganaik = $selisih / $totalkamar;
					
					$total = $harganaik * $jmlkamarterisi;

					if ($jmlkamarterisi == 0){
						$hargaakhir = $abc['harga_min'];
					} else {
						$hargaakhir = $abc['harga_min'] + $total;

					}

					
					if($hargaakhir < $hargatermurah){
						$hargatermurah = $hargaakhir;
						$src_foto = $abc['src_foto_kamar'];
					}
				}


			}

			array_push($arr_order, array('id_hotel' => $hotel['id_hotel'], 'id_master_kota' => $hotel['id_master_kota'], 'username_owner' => $hotel['username_owner'], 'nama_hotel' => $hotel['nama_hotel'], 'alamat_hotel' => $hotel['alamat_hotel'], 'telepon_hotel' => $hotel['telepon_hotel'], 'nama_owner' => $hotel['nama_owner'], 'telepon_owner' => $hotel['telepon_owner'], 'img_hotel' => $src_foto, 'harga_kamar' => $hargatermurah, 'total_kamar' => $totalkamar));

		}
		// array_push($arr_data, $arr_order);



		// if ($return_var == true) {
		// 	return $data;
		// }else{
			echo json_encode($arr_order);
	}



	public function get_user_by_email($email, $return_var = NULL){
		$filter = array('oauth_uid'=> $email);
		$data = $this->Default_model->get_data_user($filter);
		if (empty($data)){
			$data = [];
		}
		if ($return_var == true) {
			return $data;
		}else{
			echo json_encode($data);
		}
	}


	

	//INSERT

	//Tambah data admin
	//note: API hanya bisa diakses saat ada cookie admin
	//output: success/failed/access denied
	public function insert_admin(){
		if ($this->checkcookieadmin()) {
			$data = array(
				'username_admin' => $this->input->post('username'),
				'password_admin' => md5($this->input->post('password'))
			);
			$insertStatus = $this->Default_model->insert_admin($data);
			echo $insertStatus;
		}else{
			echo "access denied";
		}
	}

	//Tambah data owner
	//note: API hanya bisa diakses saat ada cookie admin
	//output: success/failed/access denied
	public function insert_owner(){
		if ($this->checkcookieadmin()) {
			$data = array(
				'username_owner' => $this->input->post('username'),
				'password_owner' => md5($this->input->post('password')),
				'nama_owner' => $this->input->post('nama'),
				'telepon_owner' => $this->input->post('telepon')
			);
			$insertStatus = $this->Default_model->insert_owner($data);
			echo $insertStatus;
		}else{
			echo "access denied";
		}
	}

	//Tambah data hotel
	//note: API hanya bisa diakses saat ada cookie admin
	//output: success/failed/access denied
	public function insert_hotel(){
		if ($this->checkcookieadmin()) {
			$data = array(
				'id_hotel' => $this->input->post('id_hotel'),
				'username_owner' => $this->input->post('username_owner'),
				'nama_hotel' => $this->input->post('nama'),
				'alamat_hotel' => $this->input->post('alamat'),
				'telepon_hotel' => $this->input->post('telepon')
			);
			$insertStatus = $this->Default_model->insert_hotel($data);
			echo $insertStatus;
		}else{
			echo "access denied";
		}
	}

	//Tambah data receptionist
	//note: API hanya bisa diakses saat ada cookie admin atau cookie owner
	//output: success/failed/access denied
	public function insert_receptionist(){
		if ($this->checkcookieadmin() || $this->checkcookieowner()) {
			$data = array(
				'username_receptionist' => $this->input->post('username'),
				'password_receptionist' => md5($this->input->post('password')),
				'id_hotel' => $this->input->post('id_hotel'),
				'nama_receptionist' => $this->input->post('nama'),
				'telepon_receptionist' => $this->input->post('telepon')
			);
			$insertStatus = $this->Default_model->insert_receptionist($data);
			echo $insertStatus;
		}else{
			echo "access denied";
		}
	}

	//Tambah data kamar
	//note: API hanya bisa diakses saat ada cookie admin
	//output: success/failed/access denied
	public function insert_kamar(){
		if ($this->checkcookieadmin()) {

			$date = date("ymd");	
			$jam = date("His");		
			$file1 = '';

			if (isset($_FILES['file_1']['name']) && $_FILES['file_1']['name'] != '') {
				$configFoto['upload_path'] = './upload/photo_room_hotel';
				// $configFoto['upload_path'] = $path;				
				$configFoto['max_size'] = '60000';
				$configFoto['allowed_types'] = 'gif|jpg|png';
				$configFoto['overwrite'] = FALSE; 
				$configFoto['remove_spaces'] = TRUE;
				$foto_name = $date.'_'.$jam.'_foto_kamar';
				$configFoto['file_name'] = $foto_name;
		
				$this->load->library('upload', $configFoto);
				$this->upload->initialize($configFoto);
	
				if(!$this->upload->do_upload('file_1')) {
					// echo $this->upload->display_errors();
				}else{
					$FotoDetails = $this->upload->data();		
					$file1 = $FotoDetails['file_name'];			
				}
				
			}

			$data = array(
				// 'id_kamar' => $this->input->post('id_kamar'),
				'id_hotel' => $this->input->post('id_hotel'),
				'nama_kamar' => $this->input->post('nama'),
				'max_guest' => $this->input->post('max_guest'),
				'harga_min' => $this->input->post('min_harga'),
				'harga_max' => $this->input->post('max_harga'),
				'type_bed' => $this->input->post('fasilitas'),
				'src_foto_kamar' => $file1
			);
			$insertStatus = $this->Default_model->insert_kamar($data);
			echo $insertStatus;
		}else{
			echo "access denied";
		}
	}

	//Tambah data nomer kamar
	//note: API hanya bisa diakses saat ada cookie admin
	//output: success/failed/access denied
	public function insert_nokamar(){
		if ($this->checkcookieadmin()) {
			$data = array(
				'no_kamar' => $this->input->post('no_kamar'),
				'id_kamar' => $this->input->post('id_kamar'),
				'lantai' => $this->input->post('lantai')
			);
			$insertStatus = $this->Default_model->insert_nokamar($data);
			echo $insertStatus;
		}else{
			echo "access denied";
		}
	}

	//Tambah data order
	//note: API hanya bisa diakses saat ada cookie admin atau owner atau receptionist
	//output: success/failed/access denied
	public function insert_order(){
		// if ($this->checkcookieadmin() || $this->checkcookieowner() || $this->checkcookiereceptionist() || $this->checkcookieuser()) {
			$datakamar = $this->get_kamar_by_id($this->input->post('id_kamar'),true);
			if($this->input->post('sumber_order') == 'on_process'){
				$status_order = 'waiting_payment';
			}else {
				$status_order = 'upcoming';
			}

			$filter = array('email_user'=>$this->input->post('email_pemesan'));
			$datauser = $this->Default_model->get_data_user($filter);
			$id_user = '';
			$arr_hasil = [];
			
			
			if (!empty($datauser)){
				$id_user = $datauser[0]['id_user'];
			}

			$data = array(
				'id_hotel' => $this->input->post('id_hotel'),
				'id_kamar' => $this->input->post('id_kamar'),
				'id_user' => $id_user,
				'nama_pemesan' => $this->input->post('nama_pemesan'),
				'telepon_pemesan' => $this->input->post('telepon_pemesan'),
				'email_pemesan' => $this->input->post('email_pemesan'),
				'no_ktp_pemesan' => $this->input->post('no_ktp_pemesan'),
				'tanggal_check_in' => date("Y-m-d", strtotime($this->input->post('tanggal_check_in'))),
				'tanggal_check_out' => date("Y-m-d", strtotime($this->input->post('tanggal_check_out'))),
				'jumlah_guest' => $this->input->post('jumlah_guest'),
				'jumlah_room' => $this->input->post('jumlah_room'),
				'max_guest' => $datakamar[0]['max_guest'],
				'nama_kamar' => $datakamar[0]['nama_kamar'],
				'nama_hotel' => $datakamar[0]['nama_hotel'],
				'alamat_hotel' => $datakamar[0]['alamat_hotel'],
				'telepon_hotel' => $datakamar[0]['telepon_hotel'],
				'request_jam_check_in_awal' => ($this->input->post('request_jam_check_in_awal') == '') ? null : $this->input->post('request_jam_check_in_awal'),
				'request_jam_check_in_akhir' => ($this->input->post('request_jam_check_in_akhir') == '') ? null : $this->input->post('request_jam_check_in_akhir'),
				'request_breakfast' => $this->input->post('request_breakfast'),
				'request_rent_car' => $this->input->post('request_rent_car'),
				'total_harga' => $this->input->post('total_harga'),
				'tanggal_order' => date('Y-m-d'),
				'sumber_order' => $this->input->post('sumber_order'),
				'status_order' => $status_order
			);
			$insertStatus = $this->Default_model->insert_order($data);
			
			$last_data_ordes = $this->Default_model->get_last_orders($id_user);
			$idorders = $last_data_ordes[0]['id_order'];	
			array_push($arr_hasil, array('id_orders' => $idorders, 'status' => $insertStatus));

			// echo $insertStatus;
			echo json_encode($arr_hasil);

			//call ipaymu
			$arr_product = [];
			$arr_jml = [];
			$arr_harga = [];
			array_push($arr_product, $datakamar[0]['nama_kamar']);
			array_push($arr_jml, $this->input->post('jumlah_room'));
			array_push($arr_harga, $this->input->post('total_harga'));

			// $this->apisendbox($arr_product, $arr_jml, $arr_harga, $);
		// }else{
		// 	echo "access denied";
		// }
	}

	//Tambah data fasilitas hotel
	//note: API hanya bisa diakses saat ada cookie admin
	//output: success/failed/access denied
	public function insert_fasilitas(){
		if ($this->checkcookieadmin()) {
			$data = array(
				'id_hotel' => $this->input->post('id_hotel_fasilitas'),
				'nama_fasilitas' => $this->input->post('nama_fasilitas'),
				'ket_fasilitas' => $this->input->post('ket_fasilitas')
			);
			$insertStatus = $this->Default_model->insert_fasilitas($data);
			echo $insertStatus;
		}else{
			echo "access denied";
		}
	}
	

	//Tambah data foto hotel
	//note: API hanya bisa diakses saat ada cookie admin
	//output: success/failed/access denied
	public function insert_foto_desc_hotel(){
		if ($this->checkcookieadmin()) {
			// $status = $_POST['status'];
			// $status = $_POST['status'];
			$date = date("ymd");	
			$jam = date("His");		
			$file1 = '';

			if (isset($_FILES['file_1']['name']) && $_FILES['file_1']['name'] != '') {
				$configFoto['upload_path'] = './upload/hotel_description_photo';
				// $configFoto['upload_path'] = $path;				
				$configFoto['max_size'] = '60000';
				$configFoto['allowed_types'] = 'gif|jpg|png';
				$configFoto['overwrite'] = FALSE; 
				$configFoto['remove_spaces'] = TRUE;
				$foto_name = $date.'_'.$jam.'_foto_hotel';
				$configFoto['file_name'] = $foto_name;
		
				$this->load->library('upload', $configFoto);
				$this->upload->initialize($configFoto);
	
				if(!$this->upload->do_upload('file_1')) {
					// echo $this->upload->display_errors();
				}else{
					$FotoDetails = $this->upload->data();		
					$file1 = $FotoDetails['file_name'];			
				}
				
			}

			$data = array(
				// 'id_kamar' => $this->input->post('id_kamar'),
				'id_hotel' => $this->input->post('id_hotel_foto'),
				'nama_foto' => $this->input->post('nama_foto'),
				'src_foto' => $file1,
			);
			$insertStatus = $this->Default_model->insert_foto($data);
			echo $insertStatus;
		}else{
			echo "access denied";
		}
	}
	

	//UPDATE

	//Ubah password admin
	//parameter: id admin
	//note: API hanya bisa diakses saat ada cookie admin
	//output: success/failed/id not found/wrong old password/access denied
	public function update_password_admin($id){
		if ($this->checkcookieadmin()) {
			$oldpassword = md5($this->input->post('oldpassword'));
			$newpassword = md5($this->input->post('newpassword'));
			$filter = array('username_admin'=> $id);
			$data = $this->Default_model->get_data_admin($filter);
			if (empty($data)){
				echo "id not found";
			}else{
				foreach ($data as $row){
					if ($oldpassword == $row['password_admin']){
						$update_data = array(
							'password_admin' => $newpassword
						);
						$updateStatus = $this->Default_model->update_admin($id,$update_data);
						echo $updateStatus;
					}else{
						echo "wrong old password";
					}
				}
			}
		}else{
			echo "access denied";
		}
	}

	//Ubah password owner
	//parameter: id owner
	//note: API hanya bisa diakses saat ada cookie admin atau owner
	//output: success/failed/id not found/wrong old password/access denied
	public function update_password_owner($id){
		if ($this->checkcookieadmin() || $this->checkcookieowner()) {
			$oldpassword = md5($this->input->post('oldpassword'));
			$newpassword = md5($this->input->post('newpassword'));
			$filter = array('username_owner'=> $id);
			$data = $this->Default_model->get_data_owner($filter);
			if (empty($data)){
				echo "id not found";
			}else{
				foreach ($data as $row){
					if ($oldpassword == $row['password_owner']){
						$update_data = array(
							'password_owner' => $newpassword
						);
						$updateStatus = $this->Default_model->update_owner($id,$update_data);
						echo $updateStatus;
					}else{
						echo "wrong old password";
					}
				}
			}
		}else{
			echo "access denied";
		}
	}

	//Ubah password receptionist
	//parameter: id receptionist
	//note: API hanya bisa diakses saat ada cookie admin atau owner atau receptionist
	//output: success/failed/id not found/wrong old password/access denied
	public function update_password_receptionist($id){
		if ($this->checkcookieadmin() || $this->checkcookieowner() || $this->checkcookiereceptionist()) {
			$oldpassword = md5($this->input->post('oldpassword'));
			$newpassword = md5($this->input->post('newpassword'));
			$filter = array('username_receptionist'=> $id);
			$data = $this->Default_model->get_data_receptionist($filter);
			if (empty($data)){
				echo "id not found";
			}else{
				foreach ($data as $row){
					if ($oldpassword == $row['password_receptionist']){
						$update_data = array(
							'password_receptionist' => $newpassword
						);
						$updateStatus = $this->Default_model->update_receptionist($id,$update_data);
						echo $updateStatus;
					}else{
						echo "wrong old password";
					}
				}
			}
		}else{
			echo "access denied";
		}
	}

	//edit profil owner
	//parameter: id owner
	//note: API hanya bisa diakses saat ada cookie admin atau owner
	//output: success/failed/access denied
	public function update_owner($id){
		if ($this->checkcookieadmin() || $this->checkcookieowner()) {
			$data = array(
				'nama_owner' => $this->input->post('nama'),
				'telepon_owner' => $this->input->post('telepon')
			);

			//reset password
			if (!empty($this->input->post('password'))) {
				$data['password_owner'] = md5($this->input->post('password'));
			}
			
			$updateStatus = $this->Default_model->update_owner($id,$data);
			echo $updateStatus;
		}else{
			echo "access denied";
		}
	}

	//edit profil hotel
	//parameter: id hotel
	//note: API hanya bisa diakses saat ada cookie admin
	//output: success/failed/access denied
	public function update_hotel($id){
		if ($this->checkcookieadmin()) {
			$data = array(
				// 'username_owner' => $this->input->post('username_owner'),
				'nama_hotel' => $this->input->post('nama'),
				'alamat_hotel' => $this->input->post('alamat'),
				'telepon_hotel' => $this->input->post('telepon')
			);
			$updateStatus = $this->Default_model->update_hotel($id,$data);
			echo $updateStatus;
		}else{
			echo "access denied";
		}
	}

	//edit profil receptionist
	//parameter: id receptionist
	//note: API hanya bisa diakses saat ada cookie admin atau owner
	//output: success/failed/access denied
	public function update_receptionist($id){
		if ($this->checkcookieadmin() || $this->checkcookieowner()) {
			$data = array(
				// 'password_receptionist' => $this->input->post('password'),
				// 'id_hotel' => $this->input->post('id_hotel'),
				'nama_receptionist' => $this->input->post('nama'),
				'telepon_receptionist' => $this->input->post('telepon')
			);

			//reset password
			if (!empty($this->input->post('password'))) {
				$data['password_receptionist'] = md5($this->input->post('password'));
			}

			$updateStatus = $this->Default_model->update_receptionist($id,$data);
			echo $updateStatus;
		}else{
			echo "access denied";
		}
	}

	//edit profil kamar
	//parameter: id kamar
	//note: API hanya bisa diakses saat ada cookie admin
	//output: success/failed/access denied
	public function update_kamar($id){
		if ($this->checkcookieadmin()) {

			
			$date = date("ymd");	
			$jam = date("His");		
			$status = $this->input->post('status_ganti');
			$file1 = $this->input->post('file_before_1');
			
			if($status == '1'){
				// if (isset($_FILES['file_1']['name']) && $_FILES['file_1']['name'] != '') {
				// 	$configFoto['upload_path'] = './upload/photo_room_hotel';
				// 	// $configFoto['upload_path'] = $path;				
				// 	$configFoto['max_size'] = '60000';
				// 	$configFoto['allowed_types'] = 'gif|jpg|png';
				// 	$configFoto['overwrite'] = FALSE; 
				// 	$configFoto['remove_spaces'] = TRUE;
				// 	$foto_name = $date.'_'.$jam.'_foto_kamar';
				// 	$configFoto['file_name'] = $foto_name;
			
				// 	$this->load->library('upload', $configVideo);
				// 	$this->upload->initialize($configVideo);
	
				// 	if(!$this->upload->do_upload('file_1')) {
				// 		// echo $this->upload->display_errors();
				// 	}else{
				// 		$videoDetails = $this->upload->data();		
				// 		$file1 = $videoDetails['file_name'];			
				// 	}
					
				// }

				if (isset($_FILES['file_1']['name']) && $_FILES['file_1']['name'] != '') {
					$configFoto['upload_path'] = './upload/photo_room_hotel';
					// $configFoto['upload_path'] = $path;				
					$configFoto['max_size'] = '60000';
					$configFoto['allowed_types'] = 'gif|jpg|png';
					$configFoto['overwrite'] = FALSE; 
					$configFoto['remove_spaces'] = TRUE;
					$foto_name = $date.'_'.$jam.'_foto_kamar';
					$configFoto['file_name'] = $foto_name;
			
					$this->load->library('upload', $configFoto);
					$this->upload->initialize($configFoto);
		
					if(!$this->upload->do_upload('file_1')) {
						// echo $this->upload->display_errors();
					}else{
						$FotoDetails = $this->upload->data();		
						$file1 = $FotoDetails['file_name'];			
					}
					
				}
			}

			
			$data = array(
				// 'id_hotel' => $this->input->post('id_hotel'),
				'nama_kamar' => $this->input->post('nama'),
				'max_guest' => $this->input->post('max_guest'),
				'harga_min' => $this->input->post('min_harga'),
				'harga_max' => $this->input->post('max_harga'),
				'type_bed' => $this->input->post('fasilitas'),
				'src_foto_kamar' => $file1
			);

			$updateStatus = $this->Default_model->update_kamar($id,$data);
			echo $updateStatus;
		}else{
			echo "access denied";
		}
	}


	//edit profil nomer kamar
	//parameter: id kamar, nomer kamar
	//note: API hanya bisa diakses saat ada cookie admin
	//output: success/failed/access denied
	public function update_nokamar($idkamar, $nokamar){
		if ($this->checkcookieadmin()) {
			$data = array(
				// 'no_kamar' => $this->input->post('no_kamar'),
				// 'id_kamar' => $this->input->post('id_kamar'),
				'lantai' => $this->input->post('lantai')
			);
			$updateStatus = $this->Default_model->update_nokamar($idkamar,$nokamar,$data);
			echo $updateStatus;
		}else{
			echo "access denied";
		}
	}
	
	//edit fasilitas hotel
	//parameter: id fasilitas
	//note: API hanya bisa diakses saat ada cookie admin
	//output: success/failed/access denied
	public function update_fasilitas($id){
		if ($this->checkcookieadmin()) {
			$data = array(
				// 'id_hotel' => $this->input->post('id_hotel'),
				'nama_fasilitas' => $this->input->post('eNamaFasilitas'),
				'ket_fasilitas' => $this->input->post('eKetFasilitas')
			);
			$updateStatus = $this->Default_model->update_fasilitas($id,$data);
			echo $updateStatus;
		}else{
			echo "access denied";
		}
	}
	
	//edit foto hotel
	//parameter: id foto
	//note: API hanya bisa diakses saat ada cookie admin
	//output: success/failed/access denied
	public function update_foto($id){
		if ($this->checkcookieadmin()) {
			$date = date("ymd");	
			$jam = date("His");		
			$file1 = '';

			if (isset($_FILES['file_1']['name']) && $_FILES['file_1']['name'] != '') {
				$configFoto['upload_path'] = './upload/hotel_description_photo';
				// $configFoto['upload_path'] = $path;				
				$configFoto['max_size'] = '60000';
				$configFoto['allowed_types'] = 'gif|jpg|png';
				$configFoto['overwrite'] = FALSE; 
				$configFoto['remove_spaces'] = TRUE;
				$foto_name = $date.'_'.$jam.'_foto_hotel';
				$configFoto['file_name'] = $foto_name;
		
				$this->load->library('upload', $configFoto);
				$this->upload->initialize($configFoto);
	
				if(!$this->upload->do_upload('file_1')) {
					// echo $this->upload->display_errors();
				}else{
					$FotoDetails = $this->upload->data();		
					$file1 = $FotoDetails['file_name'];			
				}
				
			}

			$data = array(
				// 'id_hotel' => $this->input->post('id_hotel'),
				'nama_foto' => $this->input->post('eNamaFoto'),
				'src_foto' => $file1
			);
			$updateStatus = $this->Default_model->update_foto($id,$data);
			echo $updateStatus;
		}else{
			echo "access denied";
		}
	}

	//edit order
	//parameter: id order
	//note: API hanya bisa diakses saat ada cookie admin atau owner
	//output: success/failed/access denied
	public function update_order($id){
		if ($this->checkcookieadmin() || $this->checkcookieowner() || $this->checkcookiereceptionist()) {
			$datakamar = $this->get_kamar_by_id($this->input->post('id_kamar'),true);
			$data = array(
				// 'id_hotel' => $this->input->post('id_hotel'),
				'id_kamar' => $this->input->post('id_kamar'),
				'nama_pemesan' => $this->input->post('nama_pemesan'),
				'telepon_pemesan' => $this->input->post('telepon_pemesan'),
				'email_pemesan' => $this->input->post('email_pemesan'),
				'no_ktp_pemesan' => $this->input->post('no_ktp_pemesan'),
				'tanggal_check_in' => date("Y-m-d", strtotime($this->input->post('tanggal_check_in'))),
				'tanggal_check_out' => date("Y-m-d", strtotime($this->input->post('tanggal_check_out'))),
				'jumlah_guest' => $this->input->post('jumlah_guest'),
				'jumlah_room' => $this->input->post('jumlah_room'),
				'max_guest' => $datakamar[0]['max_guest'],
				'nama_kamar' => $datakamar[0]['nama_kamar'],
				'nama_hotel' => $datakamar[0]['nama_hotel'],
				'alamat_hotel' => $datakamar[0]['alamat_hotel'],
				'telepon_hotel' => $datakamar[0]['telepon_hotel'],
				'request_jam_check_in_awal' => ($this->input->post('request_jam_check_in_awal') == '') ? null : $this->input->post('request_jam_check_in_awal'),
				'request_jam_check_in_akhir' => ($this->input->post('request_jam_check_in_akhir') == '') ? null : $this->input->post('request_jam_check_in_akhir'),
				'request_breakfast' => $this->input->post('request_breakfast'),
				'request_rent_car' => $this->input->post('request_rent_car'),
				'total_harga' => $this->input->post('total_harga'),
				// 'tanggal_order' => date('Y-m-d'),
				'sumber_order' => $this->input->post('sumber_order'),
				// 'status_order' => "upcoming"
			);
			$updateStatus = $this->Default_model->update_order($id,$data);
			echo $updateStatus;
		}else{
			echo "access denied";
		}
	}

	//check in order ke inhouse
	//parameter: id order
	//note: API hanya bisa diakses saat ada cookie admin atau owner atau receptionist
	//output: success/failed/access denied
	public function update_order_check_in($id){
		if ($this->checkcookieadmin() || $this->checkcookieowner() || $this->checkcookiereceptionist()) {
			$data = array(
				'no_kamar' => $this->input->post('no_kamar'), //banyak kamar dipisah dengan koma tanpa spasi misal:101,102F,103
				'tanggal_check_in_real' => date('Y-m-d'),
				'status_order' => "inhouse"
			);
			$updateStatus = $this->Default_model->update_order($id,$data);
			echo $updateStatus;
		}else{
			echo "access denied";
		}
	}

	//check out order ke completed
	//parameter: id order
	//note: API hanya bisa diakses saat ada cookie admin atau owner atau receptionist
	//output: success/failed/access denied
	public function update_order_check_out($id){
		if ($this->checkcookieadmin() || $this->checkcookieowner() || $this->checkcookiereceptionist()) {
			$data = array(
				'tanggal_check_out_real' => date('Y-m-d'),
				'status_order' => "completed"
			);
			$updateStatus = $this->Default_model->update_order($id,$data);
			echo $updateStatus;
		}else{
			echo "access denied";
		}
	}


	//edit data user
	//parameter: id user
	//note: API hanya bisa diakses saat ada cookie admin
	//output: success/failed/access denied
	public function update_user($id){
		// if ($this->checkcookieadmin()) {
			$data = array(
				'nama_user' => $this->input->post('nama_pemesan'),
				'telepon_user' => $this->input->post('telepon_pemesan'),
				// 'ket_fasilitas' => $this->input->post('eKetFasilitas')
			);
			$updateStatus = $this->Default_model->update_user_by_id($id,$data);
			echo $updateStatus;
		// }else{
		// 	echo "access denied";
		// }
	}


	//DELETE

	//Delete admin
	//note: API hanya bisa diakses saat ada cookie admin
	//output: success/failed/access denied
	public function delete_admin($id){
		if ($this->checkcookieadmin()) {
			$deleteStatus = $this->Default_model->delete_admin($id);
			echo $deleteStatus;
		}else{
			echo "access denied";
		}
	}

	//Delete owner
	//note: API hanya bisa diakses saat ada cookie admin
	//output: success/failed/access denied
	public function delete_owner($id){
		if ($this->checkcookieadmin()) {
			$deleteStatus = $this->Default_model->delete_owner($id);
			echo $deleteStatus;
		}else{
			echo "access denied";
		}
	}

	//Delete hotel
	//note: API hanya bisa diakses saat ada cookie admin
	//output: success/failed/access denied
	public function delete_hotel($id){
		if ($this->checkcookieadmin()) {
			$deleteStatus = $this->Default_model->delete_hotel($id);
			echo $deleteStatus;
		}else{
			echo "access denied";
		}
	}

	//Delete receptionist
	//note: API hanya bisa diakses saat ada cookie admin atau owner
	//output: success/failed/access denied
	public function delete_receptionist($id){
		if ($this->checkcookieadmin() || $this->checkcookieowner()) {
			$deleteStatus = $this->Default_model->delete_receptionist($id);
			echo $deleteStatus;
		}else{
			echo "access denied";
		}
	}

	//Delete kamar
	//note: API hanya bisa diakses saat ada cookie admin
	//output: success/failed/access denied
	public function delete_kamar($id){
		if ($this->checkcookieadmin()) {
			$deleteStatus = $this->Default_model->delete_kamar($id);
			echo $deleteStatus;
		}else{
			echo "access denied";
		}
	}

	//Delete nomer kamar
	//note: API hanya bisa diakses saat ada cookie admin
	//output: success/failed/access denied
	public function delete_nokamar($idkamar, $nokamar){
		if ($this->checkcookieadmin()) {
			$deleteStatus = $this->Default_model->delete_nokamar($idkamar, $nokamar);
			echo $deleteStatus;
		}else{
			echo "access denied";
		}
	}

	//Delete order
	//note: API hanya bisa diakses saat ada cookie admin
	//output: success/failed/access denied
	public function delete_order($id){
		if ($this->checkcookieadmin()) {
			$deleteStatus = $this->Default_model->delete_order($id);
			echo $deleteStatus;
		}else{
			echo "access denied";
		}
	}
	
	//Delete Fasilitas
	//note: API hanya bisa diakses saat ada cookie admin
	//output: success/failed/access denied
	public function delete_fasilitas($id){
		if ($this->checkcookieadmin()) {
			$deleteStatus = $this->Default_model->delete_fasilitas($id);
			echo $deleteStatus;
		}else{
			echo "access denied";
		}
	}

	
	//Delete Foto
	//note: API hanya bisa diakses saat ada cookie admin
	//output: success/failed/access denied
	public function delete_foto_hotel($id){
		if ($this->checkcookieadmin()) {
			$deleteStatus = $this->Default_model->delete_foto_hotel($id);
			echo $deleteStatus;
		}else{
			echo "access denied";
		}
	}


	//OTHER

	//Login
	//note: login dengan request POST seperti di bawah.
	//Output: berhasil login / gagal login
	public function cekloginadmin(){
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$filter = array('username_admin'=> $username);
		$data = $this->Default_model->get_data_admin($filter);
		$is_login = false;
		foreach ($data as $row){
			if ($username == $row['username_admin'] && $password == $row['password_admin']) {
				$this->create_cookie_encrypt("adminCookie",$username);
				$is_login = true;
				break;
			}
		}
		if ($is_login) {
			echo "berhasil login";
		}else{
			echo "gagal login";
		}
	}

	public function cekloginowner(){
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$filter = array('username_owner'=> $username);
		$data = $this->Default_model->get_data_owner($filter);
		$is_login = false;
		foreach ($data as $row){
			if ($username == $row['username_owner'] && $password == $row['password_owner']) {
				$this->create_cookie_encrypt("ownerCookie",$username);
				$is_login = true;
				break;
			}
		}

		if ($is_login) {
			echo "berhasil login";
		}else{
			echo "gagal login";
		}

	}

	public function cekloginreceptionist(){
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$filter = array('username_receptionist'=> $username);
		$data = $this->Default_model->get_data_receptionist($filter);
		$is_login = false;
		foreach ($data as $row){
			if ($username == $row['username_receptionist'] && $password == $row['password_receptionist']) {
				$this->create_cookie_encrypt("receptionistCookie",$username);
				$is_login = true;
				break;
			}
		}

		if ($is_login) {
			echo "berhasil login";
		}else{
			echo "gagal login";
		}

	}

	//Check cookie
	//note: tidak untuk front end
	public function checkcookieadmin(){
		$this->load->helper('cookie');
		if ($this->input->cookie('adminCookie',true)!=NULL) {
			$value = $this->str_rot($this->input->cookie('adminCookie',true)); //decrypt first
			if (empty($this->get_admin_by_id($value,true))) {
				return false;
			}else{
				return true;
			}
		}else{
			return false;
		}
	}

	public function checkcookieowner(){
		$this->load->helper('cookie');
		if ($this->input->cookie('ownerCookie',true)!=NULL) {
			$value = $this->str_rot($this->input->cookie('ownerCookie',true)); //decrypt first
			if (empty($this->get_owner_by_id($value,true))) {
				return false;
			}else{
				return true;
			}
		}else{
			return false;
		}
	}

	public function checkcookiereceptionist(){
		$this->load->helper('cookie');
		if ($this->input->cookie('receptionistCookie',true)!=NULL) {
			$value = $this->str_rot($this->input->cookie('receptionistCookie',true)); //decrypt first
			if (empty($this->get_receptionist_by_id($value,true))) {
				return false;
			}else{
				return true;
			}
		}else{
			return false;
		}
	}

	public function checkcookieuser(){
		$this->load->helper('cookie');
		if ($this->input->cookie('userCookie',true)!=NULL) {
			$value = $this->str_rot($this->input->cookie('userCookie',true)); //decrypt first
			if (empty($this->get_user_by_id($value,true))) {
				return false;
			}else{
				return true;
			}
		}else{
			return false;
		}
	}


	//Logout
	//note: menghapus cookie dan langsung redirect ke halaman login
	public function logoutadmin(){
		$this->load->helper('cookie');
		delete_cookie("adminCookie");
		header("Location: ".base_url()."index.php/loginadmin");
		die();
	}

	public function logoutowner(){
		$this->load->helper('cookie');
		delete_cookie("ownerCookie");
		header("Location: ".base_url()."index.php/loginowner");
		die();
	}

	public function logoutreceptionist(){
		$this->load->helper('cookie');
		delete_cookie("receptionistCookie");
		header("Location: ".base_url()."index.php/loginreceptionist");
		die();
	}

	//untuk membuat cookie
	//parameter: name, value dan expire cookie
	//output: cookie created
	public function create_cookie($name = NULL, $value = NULL, $expire = NULL){
		if ($name == NULL) {
			$name = $this->input->post('name');
		}
		if ($value == NULL) {
			$value = $this->input->post('value');
		}
		if ($expire == NULL) {
			$expire = 0;
		}
		$this->load->helper('cookie');
		$cookie= array(
			'name'   => $name,
			'value'  => $value,
			'expire' => $expire
		);
		$this->input->set_cookie($cookie);
		// echo "cookie created";
	}

	//untuk mengambil cookie
	//output: no cookie / $cookie
	//note: JANGAN GUNAKAN INI UNTUK MENGAMBIL COOKIE USER (karena sudah di encrypt), gunakan get_cookie_decrypt() di bawah
	public function get_cookie($name){
		$this->load->helper('cookie');
		if ($this->input->cookie($name,true)!=NULL) {
			echo $this->input->cookie($name,true);
		}else{
			echo "no cookie";
		}
	}

	//untuk membuat cookie yang di encrypt
	//parameter: name, value dan expire cookie
	//output: cookie created
	public function create_cookie_encrypt($name = NULL, $value = NULL, $expire = NULL){
		if ($name == NULL) {
			$name = $this->input->post('name');
		}
		if ($value == NULL) {
			$value = $this->input->post('value');
		}
		if ($expire == NULL) {
			$expire = 0;
		}
		$this->load->helper('cookie');
		$cookie= array(
			'name'   => $name,
			'value'  => $this->str_rot($value),
			'expire' => $expire
		);
		$this->input->set_cookie($cookie);
		// echo "cookie created";
	}

	//untuk mengambil cookie yang di decrypt dari fungsi create_cookie_encrypt
	//output: no cookie / $cookie
	public function get_cookie_decrypt($name){
		$this->load->helper('cookie');
		if ($this->input->cookie($name,true)!=NULL) {
			echo $this->str_rot($this->input->cookie($name,true));
		}else{
			echo "no cookie";
		}
	}


	// Export and download data in CSV format
	//parameter: id hotel, tgl check in awal (ex:2019-12-17), tgl check in akhir
	//note: API langsung memunculkan pop up download browser
	public function exportCSV($id, $tglawal, $tglakhir){ 
		$filename = 'report_'.$id.'_'.date('Ymd').'.csv'; 
		header("Content-Description: File Transfer"); 
		header("Content-Disposition: attachment; filename=$filename"); 
		header("Content-Type: application/csv; ");


		$reportData = $this->get_report_hotel_by_tanggalcheckin($id, $tglawal, $tglakhir, true);

		$file = fopen('php://output', 'w');

		$header = array(); 
		foreach($reportData[0] as $key => $val){
			$header[]= $key;
		}

		fputcsv($file, $header);
		foreach ($reportData as $key=>$line){ 
			fputcsv($file,$line); 
		}
		fclose($file); 
		exit; 
	}




	//Untuk mengacak teks agar tidak mudah dibaca.
	//note: alternatif pengganti str_rot13 dan base64decode karena beberapa server melarang fungsi tersebut.
	//parameter 1: string yang akan di acak
	//parameter 2: sebanyak berapa posisi huruf berpindah
	//parameter 3: sebanyak berapa posisi digit berpindah
	public function str_rot($s, $nletter = 13, $ndiggit = 5) {
		static $letterslower = 'abcdefghijklmnopqrstuvwxyz';
		static $lettersupper = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		static $digits = '0123456789';
		$nletter = (int)$nletter % 26;
		$ndiggit = (int)$ndiggit % 10;
		for ($i = 0, $l = strlen($s); $i < $l; $i++) {
			$c = $s[$i];
			if ($c >= 'a' && $c <= 'z') {
				$s[$i] = $letterslower[(ord($c) - 71 + $nletter) % 26];
			} else if ($c >= 'A' && $c <= 'Z') {
				$s[$i] = $lettersupper[(ord($c) - 39 + $nletter) % 26];
			} else if ($c >= '0' && $c <= '9') {
				$s[$i] = $digits[(ord($c) - 38 + $ndiggit) % 10];
			}
		}
		return $s;
	}


	public function googlelogin($return_var = NULL){
		
		
	
        $google_client = new Google_Client();
        $google_client->setClientId('714419741147-sgfpefrm28nktit1v1fgqstf005o42dp.apps.googleusercontent.com'); //masukkan ClientID anda 
        $google_client->setClientSecret('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'); //masukkan Client Secret Key anda
        $google_client->setRedirectUri('http://localhost/acehotel/index.php/loginuser'); //Masukkan Redirect Uri anda
        // $google_client->setClientId('166111118733-9u055jkuq1ald16q76o6053vk0qs5ged.apps.googleusercontent.com'); //masukkan ClientID anda 
        // $google_client->setClientSecret('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'); //masukkan Client Secret Key anda
        // $google_client->setRedirectUri('https://abcprivilegeclub.com/testing_acehotel/index.php/loginuser'); //Masukkan Redirect Uri anda
        
		// $google_client->setClientId('823366245044-1pau5uhste7n4m2qmlatf6h3l4pa2gbs.apps.googleusercontent.com'); //masukkan ClientID anda 
        // $google_client->setClientSecret('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'); //masukkan Client Secret Key anda
        // $google_client->setRedirectUri('https://acehotel-indonesia.com/manajemen/index.php/loginuser'); //Masukkan Redirect Uri anda
        $google_client->addScope('email');
        $google_client->addScope('profile');
        // $google_client->setAccessType('offline');
        // $google_client->setLoginHint('octa.riadi1412@gmail.com');
        // $google_client->addScope(Google\Service\Drive::DRIVE_METADATA_READONLY);

        if(isset($_GET["code"]))
        {
            $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
			
            if(!isset($token["error"]))
            {
                $google_client->setAccessToken($token['access_token']);
                $this->session->set_userdata('access_token', $token['access_token']);
                $google_service = new Google_Service_Oauth2($google_client);
                $data = $google_service->userinfo->get();
                $current_datetime = date('Y-m-d H:i:s');
                $user_data = array(
                'first_name' => $data['given_name'],
                'last_name'  => $data['family_name'],
                'email_address' => $data['email'],
                'profile_picture'=> $data['picture'],
                'updated_at' => $current_datetime
                );
                $this->session->set_userdata('user_data', $data);
				$this->session->set_userdata('login_oauth', $data['id']);
				$this->session->set_userdata('login_nama', $data['name']);
				$this->session->set_userdata('login_email', $data['email']);
                // $this->session->set_userdata('login_button', $data);

				// // create cookie user
				$this->create_cookie_encrypt("userCookie",$data['id']);

				/// check user
				$filter = array('oauth_uid'=> $data['id']);
				$data_status_user = $this->Default_model->get_data_user($filter);

				$this->session->set_userdata('login_id', $data_status_user[0]['id_user']);
				
				if(count($data_status_user) != 0){
					$current_datetime = date('Y-m-d H:i:s');
					$datas_user = array(
						// 'oauth_uid' => $hsl['id'],
						// 'nama_user' => $hsl['given_name'],
						// 'email_user' => $hsl['email'],
						'last_login' => $current_datetime,
						// 'email_user' => $this->input->post('username'),
					);
					$this->Default_model->update_user($data_status_user[0]['id_user'], $datas_user);
					
					// $datass = array(
					// 	'value' => json_decode($data_status_user)
					// );
					// $insertStatus = $this->Default_model->insert_error_log($datass);

				} else {
					
					$current_datetime = date('Y-m-d H:i:s');
					$datas_user = array(
						'oauth_uid' => $data['id'],
						'nama_user' => $data['given_name'],
						'email_user' => $data['email'],
						'created' => $current_datetime,
						'last_login' => $current_datetime,
					);
					$this->Default_model->insert_user($datas_user);

				}

				// $data = array(
				// 	'oauth_id' => $data['id'],
				// 	'nama_user' => $data['given_name'],
				// 	'email_user' => $data['email'],
				// 	'created' => $current_datetime,
				// 	// 'email_user' => $this->input->post('username'),
				// );
				// $insertStatus = $this->Default_model->insert_user($data);
            }									
        }

        $login_button = '';
        if(!$this->session->userdata('access_token'))
        {
		  	
            $login_button = '<a href="'.$google_client->createAuthUrl().'"><img src="http://localhost/acehotel/upload/google_logo.png" style="margin-left: -10px; width: 300px;"/></a>';
            $data['login_button'] = $login_button;
            $this->load->view('user/login', $data);
        }
        else
        {
		  	// uncomentar kode dibawah untuk melihat data session email
            // echo json_encode($this->session->userdata('access_token')); 
            $this->session->set_userdata('login_button', 'ada data');
			$hsl = $this->session->userdata('user_data');
			
			// $this->create_cookie_encrypt("userCookie",$data['id']);
            // echo ($hsl['email']);
            // echo "Login success";
            // header("Location: "."http://localhost/bekkologin/index.php/loginadmin");
			// $this->create_cookie_encrypt("loginUserCookie",'username');
			

			
			// $filter = array('user.oauth_uid'=> $hsl['id']);
			// $data_status_user = $this->Default_model->get_data_user($filter);

			// if(count($data_status_user) != 0){
                $current_datetime = date('Y-m-d H:i:s');
				$data = array(
					// 'oauth_uid' => $hsl['id'],
					// 'nama_user' => $hsl['given_name'],
					// 'email_user' => $hsl['email'],
					'last_login' => $current_datetime,
					// 'email_user' => $this->input->post('username'),
				);
				// $insertStatus = $this->Default_model->update_user($hsl['id'], $data);

			// } else {
			
			// 	$data = array(
			// 		'oauth_uid' => $hsl['id'],
			// 		'nama_user' => $hsl['given_name'],
			// 		'email_user' => $hsl['email'],
			// 		'created' => $current_datetime,
			// 		'last_login' => $current_datetime,
			// 		// 'email_user' => $this->input->post('username'),
			// 	);
			// 	$insertStatus = $this->Default_model->insert_user($data);

			// }
			
            // header("Location: "."http://acehotel-indonesia.com/manajemen/index.php/dashboarduser");
            header("Location: "."http://localhost/acehotel/index.php/dashboarduser");
           
        }

        // if ($this->session->userdata('access_token') != '') 
        // {
        //     header("Location: "."http://acehotel-indonesia.com/manajemen/index.php/dashboarduser");
            // redirect('login/frontpage');

        // }
	}

	public function logoutsession(){
	  $this->session->unset_userdata('access_token');

	  $this->session->unset_userdata('user_data');
	  echo "Logout berhasil";
	}

	 


	public function sesiondata($return_var = NULL){
	
		
		$filter = array('oauth_uid'=> '111995045432633637179');
		$data_status_user = $this->Default_model->get_data_user($filter);

		
		echo json_encode($data_status_user);
		echo count($data_status_user);
	}

	

	public function testdatanya($return_var = NULL){
		$arr_product = [];
		$arr_jml = [];
		$arr_harga = [];
		$ids = 0;
		array_push($arr_product, 'kamar mahal');
		array_push($arr_jml, 2);
		array_push($arr_harga, 10000);

		$this->apisendbox($arr_product, $arr_jml, $arr_harga, $ids);

	}

	
	public function testdatanya2($nama, $jml, $price, $idorders, $return_var = NULL){
		$arr_product = [];
		$arr_jml = [];
		$arr_harga = [];
		array_push($arr_product, urldecode($nama));
		array_push($arr_jml, $jml);
		array_push($arr_harga, $price);

		$this->apisendbox($arr_product, $arr_jml, $arr_harga, $idorders);

	}
	
	public function apisendbox($arr_product, $arr_jml, $arr_harga, $idorders){


		$va           = '0000005397163756'; //get on iPaymu dashboard
		$apiKey       = 'SANDBOXC8C6DE72-F4CE-489C-B620-4EADE7A7C001'; //get on iPaymu dashboard

		$url          = 'https://sandbox.ipaymu.com/api/v2/payment'; // for development mode
		// $url          = 'https://my.ipaymu.com/api/v2/payment'; // for production mode
		
		$method       = 'POST'; //method
		
		//Request Body//
		$body['product']    = $arr_product;
		$body['qty']        = $arr_jml;
		$body['price']      = $arr_harga;
		$body['returnUrl']  = 'http://localhost/acehotel/index.php/orderuser'; //yg ini
		$body['cancelUrl']  = 'http://localhost/acehotel/index.php/dashboarduser';
		$body['notifyUrl']  = 'http://localhost/acehotel/index.php/dashboarduser';
		// $body['returnUrl']  = 'http://acehotel-indonesia.com/manajemen/index.php/orderuser'; //yg ini
		// $body['cancelUrl']  = 'http://acehotel-indonesia.com/manajemen/index.php/dashboarduser';
		// $body['notifyUrl']  = 'http://acehotel-indonesia.com/manajemen/index.php/dashboarduser';
		$body['referenceId'] = '1234'; //your reference id
		//End Request Body//

		//Generate Signature
		// *Don't change this
		$jsonBody     = json_encode($body, JSON_UNESCAPED_SLASHES);
		$requestBody  = strtolower(hash('sha256', $jsonBody));
		$stringToSign = strtoupper($method) . ':' . $va . ':' . $requestBody . ':' . $apiKey;
		$signature    = hash_hmac('sha256', $stringToSign, $apiKey);
		$timestamp    = Date('YmdHis');
		//End Generate Signature

		$ch = curl_init($url);

		$headers = array(
			'Accept: application/json',
			'Content-Type: application/json',
			'va: ' . $va,
			'signature: ' . $signature,
			'timestamp: ' . $timestamp
		);

		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		curl_setopt($ch, CURLOPT_POST, count($body));
		curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonBody);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		$err = curl_error($ch);
		$ret = curl_exec($ch);
		curl_close($ch);

		if($err) {
			echo $err;
		} else {

			//Response
			$awal = $ret;
			$ret = json_decode($ret);
			if($ret->Status == 200) {
				$sessionId  = $ret->Data->SessionID;
				$url        =  $ret->Data->Url;
				
				// $datas = array(
				// 	'id_log' => Date('YmdHis'),
				// 	'value' => $awal
				// );
				// $insertStatus = $this->Default_model->insert_error_log($datas);

				$data_update = array(
					'url_payment' =>$ret->Data->Url,
					'session_id' => $ret->Data->SessionID
				);
				
				$updateStatus = $this->Default_model->update_order($idorders,$data_update);


				header('Location:' . $url);
			} else {
				print_r ($ret);
			}
			//End Response
		}

	}


	public function apicheckbox(){


		$va           = '0000005397163756'; //get on iPaymu dashboard
		$apiKey       = 'SANDBOXC8C6DE72-F4CE-489C-B620-4EADE7A7C001'; //get on iPaymu dashboard

		$url 		  = 'https://sandbox.ipaymu.com/api/v2/transaction';
		// $url          = 'https://my.ipaymu.com/api/v2/payment'; // for production mode
		
		$method       = 'POST'; //method
		
		//Request Body//
		$body['transactionId']    = '88222';
		//End Request Body//

		//Generate Signature
		// *Don't change this
		$jsonBody     = json_encode($body, JSON_UNESCAPED_SLASHES);
		$requestBody  = strtolower(hash('sha256', $jsonBody));
		$stringToSign = strtoupper($method) . ':' . $va . ':' . $requestBody . ':' . $apiKey;
		$signature    = hash_hmac('sha256', $stringToSign, $apiKey);
		$timestamp    = Date('YmdHis');
		//End Generate Signature


		$ch = curl_init($url);

		$headers = array(
			'Accept: application/json',
			'Content-Type: application/json',
			'va: ' . $va,
			'signature: ' . $signature,
			'timestamp: ' . $timestamp,
			'transactionId:' . '88222'
		);

		

		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		curl_setopt($ch, CURLOPT_POST, count($body));
		curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonBody);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		$err = curl_error($ch);
		$ret = curl_exec($ch);
		curl_close($ch);

		if($err) {
			echo $err;
		} else {

			//Response
			$ret = json_decode($ret);
			if($ret->Status == 200) {
				// $sessionId  = $ret->Data->SessionID;
				// $url        =  $ret->Data->Url;
				// header('Location:' . $url);
				// print_r ($ret);
				echo json_encode($ret);
			} else {
				print_r ($ret);
			}
			//End Response
		}

	}

	public function invoice_pdf(){		
		// $data = $this->Default_model->get_data_admin();
		
		$id = $this->input->get('id');
		// $klik = $this->Default_model->get_iklan_klik($id);
		// $view = $this->Default_model->get_iklan_view($id);
		// $saldo = $this->Default_model->get_histori_saldo($id);
		// $iklan = $this->Default_model->get_iklan($id); 
		$nama_hotel = 'test';

		$dt = new DateTime(null, new DateTimeZone('Asia/Jakarta')); 
		$c_pdf = $this->pdf->getInstance();
		// $arr_klik = [];
		// $arr_view = [];
		$hasil = [];
		$arr_tgl = [];
		$jmlklik = 0;
		$jmlview = 0;
		$jmlsaldo = 0;

		


		$judul = "INVOICE HOTEL ".strtoupper($nama_hotel);
		$header = array(
				array("label"=>"Nama Kamar", "length"=>40, "align"=>"L"),
				array("label"=>"Jumlah Kamar", "length"=>50, "align"=>"L"),
				array("label"=>"Lama Menginap", "length"=>50, "align"=>"L"),
				array("label"=>"Harga Kamar", "length"=>50, "align"=>"L")
			);


        $c_pdf = new FPDF('P', 'mm', 'A4');		
		$c_pdf->AddPage();

		#tampilkan judul laporan
		$c_pdf->SetFont('Arial','B','16');
		$c_pdf->Cell(0,20, $judul, '0', 1, 'C');

		$c_pdf->SetFont('Arial','','10');
		$c_pdf->SetFillColor(51, 133, 255);
		$c_pdf->SetTextColor(255);
		$c_pdf->SetDrawColor(128,0,0);
		foreach ($header as $kolom) {
			$c_pdf->Cell($kolom['length'], 5, $kolom['label'], 1, '0', $kolom['align'], true);
		}
		$c_pdf->Ln();

		$c_pdf->SetFillColor(224,235,255);
		$c_pdf->SetTextColor(0);
		$c_pdf->SetFont('');
		// $fill=false;
		// foreach ($hasil as $baris) {
		// 	$i = 0;
		// 	foreach ($baris as $cell) {
		// 		$c_pdf->Cell($header[$i]['length'], 5, $cell, 1, '0', $kolom['align'], $fill);
		// 		$i++;
		// 	}
		// 	$fill = !$fill;
		// 	$c_pdf->Ln();
		// }
		
		// if($hasil == NULL){
		// 	$c_pdf->Cell($header[0]['length'] +$header[1]['length'] +$header[2]['length'] +$header[3]['length'], 5, 'Tidak Ada Data Histori', 1, '0', 'C', $fill);
		// }
		
		// $c_pdf->Output();
		$filename = 'Invoice Hotel '.$nama_hotel.'.pdf';
		$c_pdf->Output($filename, 'D');

	}
	

	public function yourcallbackurl(){
		
		// $datas = array(
		// 	'value' => $awal
		// );
		// $insertStatus = $this->Default_model->insert_error_log($datas);

		
		try {				
			$obj = file_get_contents('php://input'); 			
			$edata = json_decode($obj);
			// $ref = $edata->data->ref_id; // kode paket/pulsa
			// $status = $edata->data->status;		
			// $jenis = substr($ref,0,5);			

			$this->insert_error_log('value : '.$edata);	
		
		} catch (Exception $e) {
			// exception is raised and it'll be handled here
			$string = $e->getMessage();
			
			$this->insert_error_log($string);
		}
		
		// $filter = array('oauth_uid'=>$id);
		// $datauser = $this->Default_model->get_data_user($filter);


		// $filter = array('orders.id_user'=> $datauser[0]['id_user']);
		// $data = $this->Default_model->get_data_order_user($filter,'id_order');
		// if (empty($data)){
		// 	$data = [];
		// }
		// if ($return_var == true) {
		// 	return $data;
		// }else{
		// 	echo json_encode($data);
		// }
	}


}