<?php

class Transaksi_model extends CI_model {

    public function get_transaksi()
    {
        $this->db->order_by("id_transaksi", "desc");
        return $this->db->get('transaksi_detail')->result_array();
    }

    public function pilih_transaksi($id_transaksi)
    {
        $this->db->where('id_transaksi', $id_transaksi);
        return $this->db->get('transaksi_detail')->result_array();
    }

    public function hapus_transaksi($id_transaksi)
    {
    	$this->db->where('id_transaksi', $id_transaksi);
        $this->db->delete('transaksi');
    }

    public function ubah_transaksi($id_transaksi, $data)
    {
    	$this->db->where('id_transaksi', $id_transaksi);
        $this->db->update('transaksi', $data);
    }

}