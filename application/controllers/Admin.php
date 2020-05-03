<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_model');
        $this->load->model('Barang_model');
        $this->load->model('User_model');

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

	// Controller Barang
	public function daftar_barang()
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
		redirect('admin/daftar_kategori');
	}
	// End of Controller Kategori


	// Controller Penjualan
	public function penjualan_tahun()
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$this->load->view('templates/header_admin.php', $data);
		$this->load->view('admin/penjualan_tahun');
		$this->load->view('templates/footer_admin.php');
	}

	public function penjualan_bulan()
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$this->load->view('templates/header_admin.php', $data);
		$this->load->view('admin/penjualan_bulan');
		$this->load->view('templates/footer_admin.php');
	}
	// End of Controller Penjualan

	// Controller Profil
	public function profil($id_user)
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['user_data'] = $this->User_model->pilih_user($id_user);

		$this->load->view('templates/header_admin.php', $data);
		$this->load->view('admin/profil', $data);
		$this->load->view('templates/footer_admin.php');
	}

	public function edit_profil($id_user)
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['id_user'] = $id_user;

		$data['user_data'] = $this->User_model->pilih_user($id_user);

		$this->load->view('templates/header_admin.php', $data);
		$this->load->view('admin/edit_profil', $data);
		$this->load->view('templates/footer_admin.php');
	}

	public function ubah_profil($id_user)
	{
		$password       = $this->input->post('password');
		$user			= $this->db->get_where('user', ['id_operator' => $id_user])->row_array();

		if(password_verify($password, $user['password'])) {
			$data = [
				'nama_operator' => $this->input->post('nama_lengkap'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'tempat_lahir' => $this->input->post('tempat_lahir'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'foto' => $this->upload_profil()
			];

			$this->User_model->ubah_user($id_user, $data);
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('admin/profil/'.$id_user);
		} else {
			$this->session->set_flashdata('login', 'password');
			redirect('admin/edit_profil/'.$id_user);
		}
		
	}

	public function upload_profil()
	{
		$config['upload_path']          = './assets/img/profile/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 5024;
	    $config['overwrite']			= true;

		$this->load->library('upload', $config);
 		
 		if ( empty($_FILES["foto_profil"]["name"]) ) 
 		{
	 		return $this->input->post('foto_profil_lama');
 		}
 		else
 		{
 			if ( ! $this->upload->do_upload('foto_profil'))
			{
				return "profile.jpg";
			}
			else
			{
				return $this->upload->data("file_name");
			}
 		}
		
	}
	// End of Controller Profil
}
