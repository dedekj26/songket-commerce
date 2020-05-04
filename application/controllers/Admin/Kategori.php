<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_model');

        if(!$this->session->userdata('username')) {
        	redirect('auth');
        }
    }

	// Controller Kategori
	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['kategori'] = $this->Kategori_model->get_kategori();

		$this->load->view('templates/header_admin.php', $data);
		$this->load->view('admin/daftar_kategori', $data);
		$this->load->view('templates/footer_admin.php');
	}

	public function tambah_kategori()
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$this->load->view('templates/header_admin.php', $data);
		$this->load->view('admin/tambah_kategori');
		$this->load->view('templates/footer_admin.php');
	}

	public function simpan_kategori()
	{
		$data = [
				'nama_kategori' => htmlspecialchars($this->input->post('nama_kategori', true)),
				'deskripsi_kategori' => $this->input->post('deskripsi_kategori'),
		];

		$this->db->insert('kategori', $data);
		$this->session->set_flashdata('flash', 'Ditambahkan');
		redirect('admin/kategori');
	}

	public function hapus_kategori($id_kategori)
	{
		$this->Kategori_model->hapus_kategori($id_kategori);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('admin/kategori');
	}

	public function form_ubah_kategori($id_kategori)
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['kategori'] = $this->Kategori_model->pilih_kategori($id_kategori);
		$data['id_kategori'] = $id_kategori;

		$this->load->view('templates/header_admin.php', $data);
		$this->load->view('admin/form_ubah_kategori', $data);
		$this->load->view('templates/footer_admin.php');
	}

	public function ubah_kategori($id_kategori)
	{
		$data = [
				'nama_kategori' => htmlspecialchars($this->input->post('nama_kategori', true)),
				'deskripsi_kategori' => $this->input->post('deskripsi_kategori'),
		];

		$this->Kategori_model->ubah_kategori($id_kategori, $data);
		$this->session->set_flashdata('flash', 'Diubah');
		redirect('admin/kategori');
	}
	// End of Controller Kategori

}