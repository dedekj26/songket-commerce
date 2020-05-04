<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();

        if(!$this->session->userdata('username')) {
        	redirect('auth');
        }
    }

	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$this->load->view('templates/header_admin.php', $data);
		$this->load->view('admin/dashboard', $data);
		$this->load->view('templates/footer_admin.php');
	}

}