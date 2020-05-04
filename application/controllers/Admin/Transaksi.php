<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_model');
        $this->load->model('Barang_model');
        $this->load->model('Transaksi_model');
        $this->load->model('Transaksi_barang_model');

        if(!$this->session->userdata('username')) {
        	redirect('auth');
        }
    }

	// Controller Transaksi
	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['transaksi'] = $this->Transaksi_model->get_transaksi();

		$this->load->view('templates/header_admin.php', $data);
		$this->load->view('admin/daftar_transaksi', $data);
		$this->load->view('templates/footer_admin.php');
	}

	public function detail_transaksi($id_transaksi)
	{
		$data['transaksi'] = $this->Transaksi_model->pilih_transaksi($id_transaksi);
		$data['transaksi_barang'] = $this->Transaksi_barang_model->pilih_transaksi_barang($id_transaksi);
		$data['barang'] = $this->Barang_model->get_barang();
		$data['kategori'] = $this->Kategori_model->get_kategori();

		$this->load->view('admin/detail_transaksi.php', $data);
	}

	public function ubah_transaksi($id_transaksi, $status_transaksi)
	{
		$data = [
				'status_transaksi' => $status_transaksi
		];

		$this->Transaksi_model->ubah_transaksi($id_transaksi, $data);
		$this->session->set_flashdata('flash', 'Di Update');
		redirect('admin/transaksi');
	}
	// End of Controller Transaksi

}