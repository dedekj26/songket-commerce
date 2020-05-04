<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

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

}