<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Transaksi_model');

        if(!$this->session->userdata('username')) {
        	redirect('auth');
        }
    }

	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['success'] = $this->Transaksi_model->get_jumlah('SUCCESS');
		$data['pending'] = $this->Transaksi_model->get_jumlah('PENDING');
		$data['failed'] = $this->Transaksi_model->get_jumlah('FAILED');
		$data['penghasilan'] = $this->Transaksi_model->pilih_transaksi_status('SUCCESS');
		$data['transaksi'] = $this->Transaksi_model->get_transaksi_5();

		$this->load->view('templates/header_admin.php', $data);
		$this->load->view('admin/dashboard', $data);
		$this->load->view('templates/footer_admin.php');
	}

}