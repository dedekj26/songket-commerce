<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_model');
        $this->load->model('Barang_model');
    }

	public function index()
	{
		$data['barang'] = $this->Barang_model->get_barang();
		$data['kategori'] = $this->Kategori_model->get_kategori();

		$this->load->view('templates/header_user.php');
		$this->load->view('user/home', $data);
		$this->load->view('templates/footer_user.php');
	}

}