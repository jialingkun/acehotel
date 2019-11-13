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
				unset($row['password']);
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
				unset($row['password']);
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
				unset($row['password']);
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
		$filter = array('username_owner'=> $id);
		$data = $this->Default_model->get_data_hotel($filter);
		if (empty($data)){
			$data = [];
		}else{
			foreach ($data as &$row){
				unset($row['password']);
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
		$filter = array('id_hotel'=> $id);
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
		$filter = array('id_hotel'=> $id);
		$data = $this->Default_model->get_data_receptionist($filter);
		if (empty($data)){
			$data = [];
		}else{
			foreach ($data as &$row){
				unset($row['password']);
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
		$filter = array('id_hotel'=> $id);
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