<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

	public function index()
	{
        if($this->session->userdata('username')) {
            redirect('admin');
        }
        else{    
    		$this->load->view('templates/header_auth.php');
    		$this->load->view('auth/login');
    		$this->load->view('templates/footer_auth.php');
        }
	}

	public function login()
	{
        $username       = $this->input->post('username');
        $password       = $this->input->post('password');

        $user	= $this->db->get_where('user', ['username' => $username])->row_array();
        
        if($user) {
        	if(password_verify($password, $user['password'])) {
        		$data = [
        			'username' => $user['username']
        		];
        		$this->session->set_userdata($data);

        		redirect('admin/dashboard');
        	}
        	else{
        		$this->session->set_flashdata('login', 'password');
				redirect('auth');
        	}
        }
        else {
        	$this->session->set_flashdata('login', 'username');
			redirect('auth');
        }
	}

    public function logout()
    {
        $this->session->unset_userdata('username');

        $this->session->set_flashdata('login', 'logout');
        redirect('auth');
    }

    // public function daftar()
    // {
    //  $this->load->view('templates/header_auth.php');
    //  $this->load->view('auth/daftar');
    //  $this->load->view('templates/footer_auth.php');
    // }

}