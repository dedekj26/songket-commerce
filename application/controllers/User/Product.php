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
		$data['keranjang'] = $this->cart->contents();

		$this->load->view('templates/header_user.php', $data);
		$this->load->view('user/product', $data);
		$this->load->view('templates/footer_user.php');
	}

	public function browse()
	{
		$data['barang'] = $this->Barang_model->get_barang();
		$data['kategori'] = $this->Kategori_model->get_kategori();
		$data['keranjang'] = $this->cart->contents();

		$this->load->view('templates/header_user.php', $data);
		$this->load->view('user/browse', $data);
		$this->load->view('templates/footer_user.php');
	}

	public function browse_kategori($id_kategori)
	{
        $data['barang'] = $this->Barang_model->pilih_barang_kategori($id_kategori);
		$data['kategori'] = $this->Kategori_model->get_kategori();
		$data['keranjang'] = $this->cart->contents();

		$this->load->view('templates/header_user.php', $data);
		$this->load->view('user/browse_kategori', $data);
		$this->load->view('templates/footer_user.php');
	}

	public function rajaongkir($data_kota, $jumlah_ongkir = "")
	{
		$data['barang'] = $this->Barang_model->get_barang();
		$data['kategori'] = $this->Kategori_model->get_kategori();
		$data['keranjang'] = $this->cart->contents();
		$data['kota'] = $data_kota;
		$data['jumlah_ongkir'] = $jumlah_ongkir;

		$this->load->view('templates/header_user.php', $data);
		$this->load->view('user/shopping_cart', $data);
		$this->load->view('templates/footer_user.php');
	}


	// RAJA ONGKIR API
	public function shopping_cart($jumlah_ongkir = "") {
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  	CURLOPT_URL => "http://api.rajaongkir.com/starter/city",
		  	CURLOPT_RETURNTRANSFER => true,
		  	CURLOPT_ENCODING => "",
		  	CURLOPT_MAXREDIRS => 10,
		  	CURLOPT_TIMEOUT => 30,
		  	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  	CURLOPT_CUSTOMREQUEST => "GET",
		  	CURLOPT_HTTPHEADER => array(
		    	"key: 69cfd7e978b50a95bbb6ee6082f10a9b"
		  	),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  	echo "cURL Error #:" . $err;
		} else {
			$data_kota = json_decode($response, true);
			$this->rajaongkir($data_kota, $jumlah_ongkir);
		}
	}

	public function cek_ongkir(){

		if($this->input->post('kota')){
			$curl = curl_init();

			$id_kota = $this->input->post('kota');
			$kurir = $this->input->post('kurir');

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "POST",
			  CURLOPT_POSTFIELDS => "origin=327&destination=".$id_kota."&weight=1000&courier=".$kurir."",
			  CURLOPT_HTTPHEADER => array(
			    "content-type: application/x-www-form-urlencoded",
			    "key: 69cfd7e978b50a95bbb6ee6082f10a9b"
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  	echo "cURL Error #:" . $err;
			} else {
			  	$jumlah_ongkir = json_decode($response, true);
				$this->shopping_cart($jumlah_ongkir);
			}
		}
		else{
			// echo "gagal";
			$this->shopping_cart(0);
		}
	}

}