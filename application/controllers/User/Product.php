<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_model');
        $this->load->model('Barang_model');
    }

	public function index($id_barang)
	{
        $data['detail_barang'] = $this->Barang_model->pilih_barang($id_barang);
        $data['barang'] = $this->Barang_model->get_barang();
		$data['kategori'] = $this->Kategori_model->get_kategori();
		$data['barang_limit'] = $this->Barang_model->get_barang_limit();

		$this->load->view('templates/header_user.php');
		$this->load->view('user/product', $data);
		$this->load->view('templates/footer_user.php');
	}

	public function browse()
	{
		$data['barang'] = $this->Barang_model->get_barang();
		$data['kategori'] = $this->Kategori_model->get_kategori();

		$this->load->view('templates/header_user.php');
		$this->load->view('user/browse', $data);
		$this->load->view('templates/footer_user.php');
	}

	public function browse_kategori($id_kategori)
	{
        $data['barang'] = $this->Barang_model->pilih_barang_kategori($id_kategori);
		$data['kategori'] = $this->Kategori_model->get_kategori();

		$this->load->view('templates/header_user.php');
		$this->load->view('user/browse_kategori', $data);
		$this->load->view('templates/footer_user.php');
	}

}