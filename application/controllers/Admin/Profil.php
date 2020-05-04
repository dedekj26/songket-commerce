<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');

        if(!$this->session->userdata('username')) {
        	redirect('auth');
        }
    }

	// Controller Profil
	public function index($id_user)
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
			redirect('admin/profil/index/'.$id_user);
		} else {
			$this->session->set_flashdata('login', 'password');
			redirect('admin/profil/edit_profil/'.$id_user);
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
