<?php
class Default_controller extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Default_model');
		$this->load->helper('url_helper');
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
		if ($this->checkcookieowner()) {
			$this->load->view('receptionist/dashboard');
		}else{
			header("Location: ".base_url()."index.php/loginreceptionist");
			die();
		}
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

	public function get_all_order($return_var = NULL){
		$data = $this->Default_model->get_data_order();
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
		$filter = array('id_kamar'=> $id);
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
		$filter = array('order.id_hotel'=> $id);
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
				'id_kamar' => $this->input->post('id_kamar'),
				'id_hotel' => $this->input->post('id_hotel'),
				'nama_kamar' => $this->input->post('nama'),
				'jumlah_kamar' => $this->input->post('jumlah'),
				'max_guest' => $this->input->post('max_guest')
			);
			$insertStatus = $this->Default_model->insert_kamar($data);
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
			date_default_timezone_set('Asia/Jakarta');
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



	//DELETE



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
				$this->create_cookie("adminCookie",$username);
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
				$this->create_cookie("ownerCookie",$username);
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
				$this->create_cookie("receptionistCookie",$username);
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
		echo "cookie created";
	}

	//untuk mengambil cookie
	//output: no cookie / $cookie
	public function get_cookie($name){
		$this->load->helper('cookie');
		if ($this->input->cookie($name,true)!=NULL) {
			echo $this->input->cookie($name,true);
		}else{
			echo "no cookie";
		}
	}





}