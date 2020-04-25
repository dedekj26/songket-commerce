<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_model');
        $this->load->model('Barang_model');
    }

	public function index()
	{
		$this->load->view('templates/header_admin.php');
		$this->load->view('admin/dashboard');
		$this->load->view('templates/footer_admin.php');
	}

	// Controller Barang
	public function daftar_barang()
	{
		$data['barang'] = $this->Barang_model->get_barang();
		$data['kategori'] = $this->Kategori_model->get_kategori();

		$this->load->view('templates/header_admin.php');
		$this->load->view('admin/daftar_barang', $data);
		$this->load->view('templates/footer_admin.php');
	}

	public function tambah_barang()
	{
		$data['kategori'] = $this->Kategori_model->get_kategori();

		$this->load->view('templates/header_admin.php');
		$this->load->view('admin/tambah_barang', $data);
		$this->load->view('templates/footer_admin.php');
	}

	public function simpan_barang()
	{
		$data = [
				'nama_barang' => htmlspecialchars($this->input->post('nama_barang', true)),
				'id_kategori' => $this->input->post('kategori'),
				'harga_barang' => $this->input->post('harga_barang'),
				'foto_barang' => $this->upload()
		];

		$this->db->insert('barang', $data);
		$this->session->set_flashdata('flash', 'Ditambahkan');
		redirect('admin/daftar_barang');
	}

	public function hapus_barang($id_barang)
	{
		$this->Barang_model->hapus_barang($id_barang);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('admin/daftar_barang');
	}

	public function form_ubah_barang($id_barang)
	{
		$data['barang'] = $this->Barang_model->pilih_barang($id_barang);
		$data['kategori'] = $this->Kategori_model->get_kategori();
		$data['id_barang'] = $id_barang;

		$this->load->view('templates/header_admin.php');
		$this->load->view('admin/form_ubah_barang', $data);
		$this->load->view('templates/footer_admin.php');
	}

	public function ubah_barang($id_barang)
	{
		$data = [
				'nama_barang' => htmlspecialchars($this->input->post('nama_barang', true)),
				'id_kategori' => $this->input->post('kategori'),
				'harga_barang' => $this->input->post('harga_barang'),
				'foto_barang' => $this->upload()
		];

		$this->Barang_model->ubah_barang($id_barang, $data);
		$this->session->set_flashdata('flash', 'Diubah');
		redirect('admin/daftar_barang');
	}

	public function upload()
	{
		$config['upload_path']          = './assets/img/barang/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 5024;
	    $config['overwrite']			= true;

		$this->load->library('upload', $config);
 		
 		if ( empty($_FILES["foto_barang"]["name"]) ) 
 		{
	 		return $this->input->post('foto_barang_lama');
 		}
 		else
 		{
 			if ( ! $this->upload->do_upload('foto_barang'))
			{
				return "default.jpg";
			}
			else
			{
				return $this->upload->data("file_name");
			}
 		}
		
	}
	// End of Controller Barang


	// Controller Kategori
	public function daftar_kategori()
	{
		$data['kategori'] = $this->Kategori_model->get_kategori();

		$this->load->view('templates/header_admin.php');
		$this->load->view('admin/daftar_kategori', $data);
		$this->load->view('templates/footer_admin.php');
	}

	public function tambah_kategori()
	{
		$this->load->view('templates/header_admin.php');
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
		redirect('admin/daftar_kategori');
	}

	public function hapus_kategori($id_kategori)
	{
		$this->Kategori_model->hapus_kategori($id_kategori);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('admin/daftar_kategori');
	}

	public function form_ubah_kategori($id_kategori)
	{
		$data['kategori'] = $this->Kategori_model->pilih_kategori($id_kategori);
		$data['id_kategori'] = $id_kategori;

		$this->load->view('templates/header_admin.php');
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
		redirect('admin/daftar_kategori');
	}
	// End of Controller Kategori


	// Controller Penjualan
	public function penjualan()
	{
		$this->load->view('templates/header_admin.php');
		$this->load->view('admin/penjualan');
		$this->load->view('templates/footer_admin.php');
	}
	// End of Controller Penjualan

	// Controller Profil
	public function profil()
	{
		$this->load->view('templates/header_admin.php');
		$this->load->view('admin/profil');
		$this->load->view('templates/footer_admin.php');
	}

	public function edit_profil()
	{
		$this->load->view('templates/header_admin.php');
		$this->load->view('admin/edit_profil');
		$this->load->view('templates/footer_admin.php');
	}
	// End of Controller Profil
}
