<?php

class Transaksi_barang_model extends CI_model {

    public function pilih_transaksi_barang($id_transaksi)
    {
        $this->db->where('id_transaksi', $id_transaksi);
        return $this->db->get('transaksi_barang')->result_array();
    }

}