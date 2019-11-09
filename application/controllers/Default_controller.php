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
	public function login(){
		$this->load->view('login');
	}

	
	//GET DATA

	

	//INSERT

	

	//UPDATE



	//DELETE



	//OTHER






}