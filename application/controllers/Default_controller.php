<?php
include_once ("Loadview.php");

class Default_controller extends Loadview {

	//GLOBAL VARIABLE
	var $beds24APIkey;
	var $propAPIkeyprefix;


	public function __construct(){
		parent::__construct();
		$this->load->model('Default_model');
		$this->load->helper('url_helper');
		date_default_timezone_set('Asia/Jakarta');

		//init global variable
		$this->beds24APIkey = 'acehotelapiaccessmaster';
		$this->propAPIkeyprefix = 'propapiaccess/';
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

	//TODO YOKO
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

	//TODO YOKO
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

	//TODO YOKO
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

	//TODO YOKO
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

	//TODO YOKO
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

	//TODO YOKO
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
	//TODO YOKO
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
	//TODO YOKO
	public function get_nokamar_by_kamar($id, $return_var = NULL){
		$filter = array('nokamar.id_kamar'=> $id);
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
	//TODO YOKO
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
	//TODO YOKO
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
	//TODO YOKO
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
	//TODO YOKO
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
	//TODO YOKO
	public function get_ketersediaan_nokamar($id, $tglcheckout, $return_var = NULL){
		$data = $this->get_nokamar_by_kamar($id, true);
		foreach ($data as &$row){
			$filter = array(
				'orders.id_kamar'=> $id,
				'orders.no_kamar REGEXP '=> "(^|,)".$row['no_kamar']."($|,)", 
				'orders.status_order !='=> 'completed', 
				'orders.status_order !='=> 'cancelled',
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

	//get revenue hotel by range tanggal order
	//parameter: id hotel, tgl order awal (ex:2019-12-17), tgl order akhir
	//note: ambil data revenue hotel berdasarkan range tanggal order, revenue dihitung dari saat order
	// public function get_revenue_hotel_by_tanggalorder($id, $tglawal, $tglakhir, $return_var = NULL){
	// 	$filter = array(
	// 		'orders.id_hotel'=> $id,
	// 		'orders.tanggal_order >=' =>date("Y-m-d", strtotime($tglawal)),
	// 		'orders.tanggal_order <=' =>date("Y-m-d", strtotime($tglakhir))
	// 	);

	// 	$data = $this->Default_model->get_data_order($filter, 'tanggal_order','asc','tanggal_order',
	// 		'orders.id_hotel, orders.tanggal_order, SUM(orders.total_harga) as revenue');

	// 	if ($return_var == true) {
	// 		return $data;
	// 	}else{
	// 		echo json_encode($data);
	// 	}
	// }

	//get revenue hotel by range tanggal checkin
	//parameter: id hotel, tgl check in awal (ex:2019-12-17), tgl check in akhir
	//note: ambil data revenue hotel berdasarkan range tanggal checkin, revenue dihitung dari saat check in
	public function get_revenue_hotel_by_tanggalcheckin($id, $tglawal, $tglakhir, $return_var = NULL){
		$filter = array(
			'orders.id_hotel'=> $id,
			'orders.status_order !='=> 'upcoming',
			'orders.status_order !='=> 'cancelled',
			'orders.status_order !='=> 'black',
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
			'orders.status_order !='=> 'cancelled',
			'orders.status_order !='=> 'black',
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
	//TODO YOKO
	public function get_report_hotel_by_tanggalcheckin($id, $tglawal, $tglakhir, $return_var = NULL){
		$filter = array(
			'orders.id_hotel'=> $id,
			'orders.status_order !='=> 'upcoming',
			'orders.status_order !='=> 'cancelled',
			'orders.status_order !='=> 'black',
			'orders.tanggal_check_in_real >=' =>date("Y-m-d", strtotime($tglawal)),
			'orders.tanggal_check_in_real <=' =>date("Y-m-d", strtotime($tglakhir))
		);

		$data = $this->Default_model->get_data_order($filter, 'tanggal_check_in_real','asc',NULL,
			'orders.id_order, orders.nama_pemesan, orders.sumber_order, orders.tanggal_check_in, orders.tanggal_check_out, orders.status_order, orders.jumlah_room, orders.jumlah_guest, kamar.nama_kamar, orders.no_kamar, orders.total_harga');

		if ($return_var == true) {
			return $data;
		}else{
			echo json_encode($data);
		}
	}


	//ambil data error log (developer only)
	public function get_error_log($orderby = NULL, $sort = "asc", $limit = NULL, $return_var = NULL){
		$data = $this->Default_model->get_data_error_log($orderby, $sort, $limit);
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
	//API INI TIDAK DIPAKAI LAGI
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
	//API INI TIDAK DIPAKAI LAGI
	public function insert_kamar(){
		if ($this->checkcookieadmin()) {
			$data = array(
				// 'id_kamar' => $this->input->post('id_kamar'),
				'id_hotel' => $this->input->post('id_hotel'),
				'nama_kamar' => $this->input->post('nama'),
				'max_guest' => $this->input->post('max_guest')
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
	//API INI TIDAK DIPAKAI LAGI
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
	//output: success/failed/access denied/output error lain dari API
	public function insert_order(){
		if ($this->checkcookieadmin() || $this->checkcookieowner() || $this->checkcookiereceptionist()) {
			$propid = $this->input->post('propid'); //id hotel
			$data = array(
				'roomId' => $this->input->post('roomId'),
				'roomQty' => 1,
				'status' => 1,
				'firstNight' => date("Y-m-d", strtotime($this->input->post('firstNight'))),
				'lastNight' => date("Y-m-d",strtotime('-1 day', strtotime($this->input->post('lastNight')))), //tgl checkout
				'numAdult' => $this->input->post('numAdult'), //jumlah tamu
				'guestFirstName' => $this->input->post('guestFirstName'),
				'guestName' => $this->input->post('guestName'),
				'guestEmail' => $this->input->post('guestEmail'),
				'guestPhone' => $this->input->post('guestPhone'),
				'guestMobile' => $this->input->post('guestMobile'),
				'guestArrivalTime' => $this->input->post('guestArrivalTime'),
				'guestComments' => $this->input->post('guestComments'),
				'refererEditable' => $this->input->post('refererEditable'), //sumber order
				'notifyUrl' => false,
				'notifyGuest' => false,
				'notifyHost' => false,
				'assignBooking' => false,
				'checkAvailability' => true,
				'deleteInvoice' => false,
			);

			$totalprice = $this->input->post('invoiceprice0');
			$data['invoice'][0] = array(
				'description' => $this->input->post('invoicedesc0'), //required
				'price' => $this->input->post('invoiceprice0'), //required
			);

			//biaya tambahan opsional, bisa dikosongi
			if (!empty($this->input->post('invoiceprice1'))) {
				$totalprice = $totalprice + $this->input->post('invoiceprice1');
				$data['invoice'][1] = array(
					'description' => $this->input->post('invoicedesc1'),
					'price' => $this->input->post('invoiceprice1'),
				);
			}

			if (!empty($this->input->post('invoiceprice2'))) {
				$totalprice = $totalprice + $this->input->post('invoiceprice2');
				$data['invoice'][2] = array(
					'description' => $this->input->post('invoicedesc2'),
					'price' => $this->input->post('invoiceprice2'),
				);
			}

			if (!empty($this->input->post('invoiceprice3'))) {
				$totalprice = $totalprice + $this->input->post('invoiceprice3');
				$data['invoice'][3] = array(
					'description' => $this->input->post('invoicedesc3'),
					'price' => $this->input->post('invoiceprice3'),
				);
			}

			$data['price'] = $totalprice;

			set_time_limit(3000);
			$result = json_decode($this->setBooking($propid,$data));
			if (!empty($result->error)) {
				echo $result->error;
			}else{
				$this->syncBookings($propid,$result->bookId);
			}
		}else{
			echo "access denied";
		}
	}


	//Tambah data admin
	//note: API hanya bisa diakses saat ada cookie admin
	//input: form POST seperti di bawah
	//output: success/failed/access denied
	public function insert_error_log($log = NULL){
		if (!empty($this->input->post('log'))) {
			$log = $this->input->post('log');
		}
		$data = array(
			'value' => $log
		);
		$insertStatus = $this->Default_model->insert_error_log($data);
		// echo $insertStatus;
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
	//TODO YOKO
	public function update_hotel($id){
		if ($this->checkcookieadmin()) {
			$data = array(
				'username_owner' => $this->input->post('username_owner'),
				// 'nama_hotel' => $this->input->post('nama'),
				// 'alamat_hotel' => $this->input->post('alamat'),
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
	//API INI TIDAK DIPAKAI LAGI
	public function update_kamar($id){
		if ($this->checkcookieadmin()) {
			$data = array(
				// 'id_hotel' => $this->input->post('id_hotel'),
				'nama_kamar' => $this->input->post('nama'),
				'max_guest' => $this->input->post('max_guest')
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
	//TODO YOKO
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

	//edit order
	//parameter: id order
	//note: API hanya bisa diakses saat ada cookie admin atau owner
	//output: success/failed/access denied
	//TODO YOKO
	public function update_order($bookid){
		if ($this->checkcookieadmin() || $this->checkcookieowner() || $this->checkcookiereceptionist()) {
			$propid = $this->input->post('propid'); //id hotel
			$data = array(
				'bookId' => $bookid,
				'status' => 1,
				'firstNight' => date("Y-m-d", strtotime($this->input->post('firstNight'))),
				'lastNight' => date("Y-m-d",strtotime('-1 day', strtotime($this->input->post('lastNight')))), //tgl checkout
				'numAdult' => $this->input->post('numAdult'), //jumlah tamu
				'guestFirstName' => $this->input->post('guestFirstName'),
				'guestName' => $this->input->post('guestName'),
				'guestEmail' => $this->input->post('guestEmail'),
				'guestPhone' => $this->input->post('guestPhone'),
				'guestMobile' => $this->input->post('guestMobile'),
				'guestArrivalTime' => $this->input->post('guestArrivalTime'),
				'guestComments' => $this->input->post('guestComments'),
				'refererEditable' => $this->input->post('refererEditable'), //sumber order
				'notifyUrl' => false,
				'assignBooking' => false,
				'checkAvailability' => true,
				'deleteInvoice' => true,
			);

			$totalprice = $this->input->post('invoiceprice0');
			$data['invoice'][0] = array(
				'description' => $this->input->post('invoicedesc0'), //required
				'price' => $this->input->post('invoiceprice0'), //required
			);

			//biaya tambahan opsional, bisa dikosongi
			if (!empty($this->input->post('invoiceprice1'))) {
				$totalprice = $totalprice + $this->input->post('invoiceprice1');
				$data['invoice'][1] = array(
					'description' => $this->input->post('invoicedesc1'),
					'price' => $this->input->post('invoiceprice1'),
				);
			}

			if (!empty($this->input->post('invoiceprice2'))) {
				$totalprice = $totalprice + $this->input->post('invoiceprice2');
				$data['invoice'][2] = array(
					'description' => $this->input->post('invoicedesc2'),
					'price' => $this->input->post('invoiceprice2'),
				);
			}

			if (!empty($this->input->post('invoiceprice3'))) {
				$totalprice = $totalprice + $this->input->post('invoiceprice3');
				$data['invoice'][3] = array(
					'description' => $this->input->post('invoicedesc3'),
					'price' => $this->input->post('invoiceprice3'),
				);
			}

			$data['price'] = $totalprice;

			set_time_limit(3000);
			$result = json_decode($this->setBooking($propid,$data));
			if (!empty($result->error)) {
				echo $result->error;
			}else{
				$this->syncBookings($propid,$bookid);
			}
		}else{
			echo "access denied";
		}
	}

	//check in order ke inhouse
	//parameter: id booking
	//note: API hanya bisa diakses saat ada cookie admin atau owner atau receptionist
	//output: success/failed/access denied
	//TODO BENNY
	public function update_order_check_in($bookid){
		if ($this->checkcookieadmin() || $this->checkcookieowner() || $this->checkcookiereceptionist()) {

			$propid = $this->input->post('propid'); //id hotel
			$data = array(
				'bookId' => $bookid,
				'unitId'=> $this->input->post('unitId'), //no kamar (bukan nama no kamar)
				'notifyUrl' => false,
			);
			$data['infoItems'][0] = array(
				'code' => 'CHECKIN',
			);

			set_time_limit(3000);
			$result = json_decode($this->setBooking($propid,$data));
			if (!empty($result->error)) {
				echo $result->error;
			}else{
				$this->syncBookings($propid,$bookid);
			}


		}else{
			echo "access denied";
		}
	}

	//check out order ke completed
	//parameter: id booking
	//note: API hanya bisa diakses saat ada cookie admin atau owner atau receptionist
	//output: success/failed/access denied
	//TODO BENNY
	public function update_order_check_out($bookid){
		if ($this->checkcookieadmin() || $this->checkcookieowner() || $this->checkcookiereceptionist()) {
			$propid = $this->input->post('propid'); //id hotel
			$data = array(
				'bookId' => $bookid,
				'notifyUrl' => false,
			);
			$data['infoItems'][0] = array(
				'code' => 'CHECKOUT',
			);

			set_time_limit(3000);
			$result = json_decode($this->setBooking($propid,$data));
			if (!empty($result->error)) {
				echo $result->error;
			}else{
				$this->syncBookings($propid,$bookid);
			}
		}else{
			echo "access denied";
		}
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
	//API INI TIDAK DIPAKAI LAGI
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
	//API INI TIDAK DIPAKAI LAGI
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
	//API INI TIDAK DIPAKAI LAGI
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
	//API INI TIDAK DIPAKAI LAGI
	public function delete_order($id){
		if ($this->checkcookieadmin()) {
			$deleteStatus = $this->Default_model->delete_order($id);
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

	//SYNC
	//untuk sinkronisasi master data semua hotel
	//parameter: 
	//output: success/failed/pesan error API
	//TODO YOKO
	public function syncProperties(){
		set_time_limit(3000);
		$data = json_decode($this->getProperties());
		if (!empty($data->error)) {
			echo $data->error;
		}else{
			$result = $this->Default_model->syncHotel($data, true);
			echo $result;
		}
	}

	//untuk sinkronisasi master data satu hotel
	//parameter: id property
	//output: success/failed/pesan error API
	//TODO YOKO
	public function syncProperty($propid){
		set_time_limit(3000);
		$data = json_decode($this->getProperty($propid));
		if (!empty($data->error)) {
			echo $data->error;
		}else{
			$result = $this->Default_model->syncHotel($data, false);
			echo $result;
		}
	}


	//untuk sinkronisasi master data semua booking mulai hari ini sampai satu tahun kedepan
	//parameter: id property
	//output: success/failed/pesan error API
	//TODO YOKO
	public function syncAllBookings($propid){
		set_time_limit(3000);
		$data = json_decode($this->getAllBookings($propid));
		if (!empty($data->error)) {
			echo $data->error;
		}else{
			$result = $this->Default_model->syncBookings($data);
			echo $result;
		}
	}

	//untuk sinkronisasi master data booking
	//parameter: id property dan id booking
	//output: success/failed/pesan error API
	//TODO YOKO
	public function syncBookings($propid, $bookid){
		set_time_limit(3000);
		$data = json_decode($this->getBookings($propid, $bookid));
		if (!empty($data->error)) {
			echo $data->error;
		}else{
			$result = $this->Default_model->syncBookings($data);
			echo $result;
		}
	}

	//WEBHOOK
	public function webhookProperty($propid){
		$this->syncProperty($propid);
		$this->insert_error_log("webhookProperty: ".$propid);
	}

	public function webhookBooking($propid){
		$this->syncBookings($propid,$this->input->get('bookid'));
		$this->insert_error_log("webhookBooking: ".$this->input->get('bookid'). "| Property: ".$propid);
	}





	//Beds24 API

	//untuk ambil data semua hotel
	//parameter: 
	//output: json data hotel atau pesan error
	public function getProperties(){
		$auth = array();
		$auth['apiKey'] = $this->beds24APIkey;

		$data = array();
		$data['authentication'] = $auth;

		$json = json_encode($data);

		$url = "https://api.beds24.com/json/getProperties";

		$ch=curl_init();
		curl_setopt($ch, CURLOPT_POST, 1) ;
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
		$result = curl_exec($ch);
		if(curl_errno($ch)){
			$result = '{"error":"'.curl_error($ch).'","errorCode":0}';
		}
		curl_close ($ch);
		return $result;
	}


	//untuk ambil data data hotel
	//parameter: idproperty
	//output: json data hotel atau pesan error
	public function getProperty($propid){
		$auth = array();
		$auth['apiKey'] = $this->beds24APIkey;
		$auth['propKey'] = $this->propAPIkeyprefix.$propid;

		$data = array();
		$data['authentication'] = $auth;
		$data['includeRooms'] = true;
		$json = json_encode($data);

		$url = "https://api.beds24.com/json/getProperty";

		$ch=curl_init();
		curl_setopt($ch, CURLOPT_POST, 1) ;
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
		$result = curl_exec($ch);
		if(curl_errno($ch)){
			$result = '{"error":"'.curl_error($ch).'","errorCode":0}';
		}
		curl_close ($ch);	
		return $result;
	}


 	//untuk ambil data data semua booking mulai hari ini hingga satu tahun kedepan
	//parameter: idproperty
	//output: json data booking atau pesan error
	public function getAllBookings($propid){
		$auth = array();
		$auth['apiKey'] = $this->beds24APIkey;
		$auth['propKey'] = $this->propAPIkeyprefix.$propid;

		$data = array();
		$data['authentication'] = $auth;
		$data['includeInvoice'] = true;
		$data['includeInfoItems'] = true;
		$json = json_encode($data);

		$url = "https://api.beds24.com/json/getBookings";

		$ch=curl_init();
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
		$result = curl_exec($ch);
		if(curl_errno($ch)){
			$result = '{"error":"'.curl_error($ch).'","errorCode":0}';
		}
		curl_close ($ch);	
		return $result;
	}


 	//untuk ambil data data booking
	//parameter: idbooking
	//output: json data booking atau pesan error
	public function getBookings($propid,$bookid){
		$auth = array();
		$auth['apiKey'] = $this->beds24APIkey;
		$auth['propKey'] = $this->propAPIkeyprefix.$propid;

		$data = array();
		$data['authentication'] = $auth;
		$data['includeInvoice'] = true;
		$data['includeInfoItems'] = true;
		$data['bookId'] = $bookid;
		$json = json_encode($data);

		$url = "https://api.beds24.com/json/getBookings";

		$ch=curl_init();
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
		$result = curl_exec($ch);
		if(curl_errno($ch)){
			$result = '{"error":"'.curl_error($ch).'","errorCode":0}';
		}
		curl_close ($ch);	
		return $result;
	}


 	//untuk menambah data data booking
	//parameter: id property, data booking
	//output: json success atau error
	public function setBooking($propid,$data){
		$auth = array();
		$auth['apiKey'] = $this->beds24APIkey;
		$auth['propKey'] = $this->propAPIkeyprefix.$propid;

 		// $data = array();
		$data['authentication'] = $auth;
		$json = json_encode($data);

		$url = "https://api.beds24.com/json/setBooking";

		$ch=curl_init();
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
		$result = curl_exec($ch);
		if(curl_errno($ch)){
			$result = '{"error":"'.curl_error($ch).'","errorCode":0}';
		}
		curl_close ($ch);	
		return $result;
	}



	//untuk testing
	//parameter: 
	//output: 
	public function testing(){
		echo $this->input->get('status');
	}



}