<?php
class Loadview extends CI_Controller {

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

	public function loginuser(){
		$this->load->view('user/login');
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
	
	public function dashboarduser(){
		// if ($this->checkcookiereceptionist()) {
			$this->load->view('user/dashboard');
		// }else{
		// 	header("Location: ".base_url()."index.php/loginreceptionist");
		// 	die();
		// }
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

	public function managementadminowner(){
		if ($this->checkcookieadmin()) {
			$this->load->view('admin/management_owner');
		}else{
			header("Location: ".base_url()."index.php/loginadmin");
			die();
		}
	}
	public function managementowner(){
		if ($this->checkcookieowner()) {
			$this->load->view('owner/management');
		}else{
			header("Location: ".base_url()."index.php/loginowner");
			die();
		}
	}


	//testing
	public function test_linechart(){
		$this->load->view('testpage/linechart');
	}

	public function test_function(){
		$this->load->view('testpage/testfunction');
	}

	//User
	public function kataloghotel(){
		$this->load->view('user/katalog_hotel');
	}

	public function katalogkamar(){
		$this->load->view('user/katalog_kamar');
	}

	
	public function bookingdetails(){
		$this->load->view('user/booking');
	}
	
}