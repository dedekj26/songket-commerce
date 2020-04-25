<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		$this->load->view('templates/header_auth.php');
		$this->load->view('auth/login');
		$this->load->view('templates/footer_auth.php');
	}

	public function daftar()
	{
		$this->load->view('templates/header_auth.php');
		$this->load->view('auth/daftar');
		$this->load->view('templates/footer_auth.php');
	}

}