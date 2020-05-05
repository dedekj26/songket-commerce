<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Transaksi_model');
    }

	public function index(){
        $data = array(
            'id' => $this->input->post('produk_id'),
            'qty' => $this->input->post('produk_qty'),
            'price' => $this->input->post('produk_harga'),
            'name' => $this->input->post('produk_nama'),
            'photo' => $this->input->post('produk_foto')
        );
        $this->cart->insert($data);
    }

    public function delete_cart(){
        $data = array(
            'rowid' => $this->input->post('row_id'), 
            'qty' => 0
        );
        $this->cart->update($data);
    }

    public function checkout(){
        $data = array(
            'kode_transaksi' => $this->input->post('kode_transaksi'),
            'nama_pelanggan' => $this->input->post('nama_pelanggan'),
            'email_pelanggan' => $this->input->post('email_pelanggan'),
            'nomor_pelanggan' => $this->input->post('nomor_pelanggan'),
            'alamat_pelanggan' => $this->input->post('alamat_pelanggan'),
            'total_bayar' => $this->input->post('total_bayar'),
            'tgl_transaksi' => date('Y-m-d'),
            'bukti_transfer' => $this->upload()
        );

        $this->db->insert('transaksi_detail', $data);

        foreach ($this->Transaksi_model->get_transaksi_1() as $key ) {
            redirect('user/cart/checkout_transaksi_barang/'.$key['id_transaksi']);
        }

    }

    public function checkout_transaksi_barang($id_transaksi){

        foreach ($this->cart->contents() as $key) {
            $data = [
                'id_barang' => $key['id'],
                'id_transaksi' => $id_transaksi
            ];

            if($this->db->insert('transaksi_barang', $data)){
                $data = array(
                    'rowid' => $key['rowid'], 
                    'qty' => 0
                );
                $this->cart->update($data);
            }
        }

        $this->load->view('user/success.php');
    }

    public function upload()
    {
        $config['upload_path']          = './assets/img/bukti_transfer/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 5024;
        $config['overwrite']            = true;

        $this->load->library('upload', $config);
        
        if ( empty($_FILES["bukti_transfer"]["name"]) ) 
        {
            return "Harus menggunakan bukti transfer";
        }
        else
        {
            if ( ! $this->upload->do_upload('bukti_transfer'))
            {
                return "default.jpg";
            }
            else
            {
                return $this->upload->data("file_name");
            }
        }
        
    }

}