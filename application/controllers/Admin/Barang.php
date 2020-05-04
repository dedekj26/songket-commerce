<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_model');
		$this->load->model('Barang_model');
		$this->load->helper(array('string', 'text'));

        if(!$this->session->userdata('username')) {
        	redirect('auth');
        }
    }

	// Controller Barang
	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['barang'] = $this->Barang_model->get_barang();
		$data['kategori'] = $this->Kategori_model->get_kategori();

		$this->load->view('templates/header_admin.php', $data);
		$this->load->view('admin/daftar_barang', $data);
		$this->load->view('templates/footer_admin.php');
	}

	public function tambah_barang()
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['kategori'] = $this->Kategori_model->get_kategori();

		$this->load->view('templates/header_admin.php', $data);
		$this->load->view('admin/tambah_barang', $data);
		$this->load->view('templates/footer_admin.php');
	}

	public function simpan_barang()
	{
		$data = [
				'nama_barang' => htmlspecialchars($this->input->post('nama_barang', true)),
				'id_kategori' => $this->input->post('kategori'),
				'harga_barang' => $this->input->post('harga_barang'),
				'foto_barang' => $this->upload(),
				'deskripsi_barang' => $this->input->post('deskripsi_barang')
		];

		$this->db->insert('barang', $data);
		$this->session->set_flashdata('flash', 'Ditambahkan');
		redirect('admin/barang');
	}

	public function hapus_barang($id_barang)
	{
		$this->Barang_model->hapus_barang($id_barang);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('admin/barang');
	}

	public function form_ubah_barang($id_barang)
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['barang'] = $this->Barang_model->pilih_barang($id_barang);
		$data['kategori'] = $this->Kategori_model->get_kategori();
		$data['id_barang'] = $id_barang;

		$this->load->view('templates/header_admin.php', $data);
		$this->load->view('admin/form_ubah_barang', $data);
		$this->load->view('templates/footer_admin.php');
	}

	public function ubah_barang($id_barang)
	{
		$data = [
				'nama_barang' => htmlspecialchars($this->input->post('nama_barang', true)),
				'id_kategori' => $this->input->post('kategori'),
				'harga_barang' => $this->input->post('harga_barang'),
				'foto_barang' => $this->upload(),
				'deskripsi_barang' => $this->input->post('deskripsi_barang')
		];

		$this->Barang_model->ubah_barang($id_barang, $data);
		$this->session->set_flashdata('flash', 'Diubah');
		redirect('admin/barang');
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

}