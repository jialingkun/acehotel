<?php
class Default_controller extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Default_model');
		$this->load->helper('url_helper');
		date_default_timezone_set('Asia/Jakarta');
	}

	//LOAD VIEW

	//front
	public function index(){
		$this->load->view('frontpage');
	}

	//login
	public function loginadmin(){
		$this->load->view('admin/login');
	}

	public function loginowner(){
		$this->load->view('owner/login');
	}

	public function loginreceptionist(){
		$this->load->view('receptionist/login');
	}

	//Dashboard
	public function dashboardadmin(){
		if ($this->checkcookieadmin()) {
			$this->load->view('admin/dashboard');
		}else{
			header("Location: ".base_url()."index.php/loginadmin");
			die();
		}
	}

	public function dashboardowner(){
		if ($this->checkcookieowner()) {
			$this->load->view('owner/dashboard');
		}else{
			header("Location: ".base_url()."index.php/loginowner");
			die();
		}
	}

	public function dashboardreceptionist(){
		if ($this->checkcookiereceptionist()) {
			$this->load->view('receptionist/dashboard');
		}else{
			header("Location: ".base_url()."index.php/loginreceptionist");
			die();
		}
	}
	
	//Bookings
	public function bookingadmin(){
		if ($this->checkcookieadmin()) {
			$this->load->view('admin/booking');
		}else{
			header("Location: ".base_url()."index.php/loginadmin");
			die();
		}
	}

	public function bookingowner(){
		if ($this->checkcookieowner()) {
			$this->load->view('owner/booking');
		}else{
			header("Location: ".base_url()."index.php/loginowner");
			die();
		}
	}

	public function bookingreceptionist(){
		if ($this->checkcookiereceptionist()) {
			$this->load->view('receptionist/booking');
		}else{
			header("Location: ".base_url()."index.php/loginreceptionist");
			die();
		}
	}

	//Report
	public function reportadmin(){
		if ($this->checkcookieadmin()) {
			$this->load->view('admin/report');
		}else{
			header("Location: ".base_url()."index.php/loginadmin");
			die();
		}
	}

	public function reportowner(){
		if ($this->checkcookieowner()) {
			$this->load->view('owner/report');
		}else{
			header("Location: ".base_url()."index.php/loginowner");
			die();
		}
	}

	public function reportreceptionist(){
		if ($this->checkcookiereceptionist()) {
			$this->load->view('receptionist/report');
		}else{
			header("Location: ".base_url()."index.php/loginreceptionist");
			die();
		}
	}

	//Management
	public function managementadmin(){
		if ($this->checkcookieadmin()) {
			$this->load->view('admin/management');
		}else{
			header("Location: ".base_url()."index.php/loginadmin");
			die();
		}
	}

	public function managementhotel(){
		if ($this->checkcookieadmin()) {
			$this->load->view('admin/management_hotel');
		}else{
			header("Location: ".base_url()."index.php/loginadmin");
			die();
		}
	}

	public function managementhoteldetail(){
		if ($this->checkcookieadmin()) {
			$this->load->view('admin/management_hotel_detail');
		}else{
			header("Location: ".base_url()."index.php/loginadmin");
			die();
		}
	}

	public function managementowner(){
		if ($this->checkcookieadmin()) {
			$this->load->view('admin/management_owner');
		}else{
			header("Location: ".base_url()."index.php/loginowner");
			die();
		}
	}



	//testing
	public function test_linechart(){
		$this->load->view('testpage/linechart');
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
		$data = $this->Default_model->get_data_order($filter, 'tanggal_check_out','desc');
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
				'password_receptionist' => $this->input->post('password'),
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
		if ($this->checkcookieadmin() || $this->checkcookieowner() || $this->checkcookiereceptionist()) {
			$datakamar = $this->get_kamar_by_id($this->input->post('id_kamar'),true);
			$data = array(
				'id_hotel' => $this->input->post('id_hotel'),
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
				'request_jam_check_in_awal' => $this->input->post('request_jam_check_in_awal'),
				'request_jam_check_in_akhir' => $this->input->post('request_jam_check_in_akhir'),
				'request_breakfast' => $this->input->post('request_breakfast'),
				'request_rent_car' => $this->input->post('request_rent_car'),
				'total_harga' => $this->input->post('total_harga'),
				'tanggal_order' => date('Y-m-d'),
				'sumber_order' => $this->input->post('sumber_order'),
				'status_order' => "upcoming"
			);
			$insertStatus = $this->Default_model->insert_order($data);
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
				'password_receptionist' => $this->input->post('password'),
				// 'id_hotel' => $this->input->post('id_hotel'),
				'nama_receptionist' => $this->input->post('nama'),
				'telepon_receptionist' => $this->input->post('telepon')
			);
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
	public function update_order($id){
		if ($this->checkcookieadmin() || $this->checkcookieowner()) {
			$data = array(
				// 'id_hotel' => $this->input->post('id_hotel'),
				'id_kamar' => $this->input->post('id_kamar'),
				'no_kamar' => $this->input->post('no_kamar'),				
				'nama_pemesan' => $this->input->post('nama_pemesan'),
				'telepon_pemesan' => $this->input->post('telepon_pemesan'),
				'email_pemesan' => $this->input->post('email_pemesan'),
				'no_ktp_pemesan' => $this->input->post('no_ktp_pemesan'),
				'tanggal_check_in' => date("Y-m-d", strtotime($this->input->post('tanggal_check_in'))),
				'tanggal_check_out' => date("Y-m-d", strtotime($this->input->post('tanggal_check_out'))),
				'jumlah_guest' => $this->input->post('jumlah_guest'),
				'jumlah_room' => $this->input->post('jumlah_room'),
				'max_guest' => $this->input->post('max_guest'),
				'nama_kamar' => $this->input->post('nama_kamar'),
				'nama_hotel' => $this->input->post('nama_hotel'),
				'alamat_hotel' => $this->input->post('alamat_hotel'),
				'telepon_hotel' => $this->input->post('telepon_hotel'),
				'request_jam_check_in_awal' => $this->input->post('request_jam_check_in_awal'),
				'request_jam_check_in_akhir' => $this->input->post('request_jam_check_in_akhir'),
				'request_breakfast' => $this->input->post('request_breakfast'),
				'request_rent_car' => $this->input->post('request_rent_car'),
				'total_harga' => $this->input->post('total_harga'),
				// 'tanggal_order' => date('Y-m-d'),
				'sumber_order' => $this->input->post('sumber_order')
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


	//OTHER

	//Login
	//note: login dengan request POST seperti di bawah.
	//Output: berhasil login / gagal login
	public function cekloginadmin(){
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$data = $this->Default_model->get_data_admin();
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
		$data = $this->Default_model->get_data_owner();
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
		$data = $this->Default_model->get_data_receptionist();
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
			return true;
		}else{
			return false;
		}
	}

	public function checkcookieowner(){
		$this->load->helper('cookie');
		if ($this->input->cookie('ownerCookie',true)!=NULL) {
			return true;
		}else{
			return false;
		}
	}

	public function checkcookiereceptionist(){
		$this->load->helper('cookie');
		if ($this->input->cookie('receptionistCookie',true)!=NULL) {
			return true;
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
			'value'  => str_rot13($value), //Not really encrypt anything, just jumble text :P
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
			echo str_rot13($this->input->cookie($name,true));
		}else{
			echo "no cookie";
		}
	}


}