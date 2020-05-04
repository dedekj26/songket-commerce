<?php

class Transaksi_model extends CI_model {

    public function get_transaksi()
    {
        $this->db->order_by("id_transaksi", "desc");
        return $this->db->get('transaksi_detail')->result_array();
    }

    public function get_transaksi_5()
    {
        $this->db->order_by("id_transaksi", "desc");
        $this->db->limit('5');
        return $this->db->get('transaksi_detail')->result_array();
    }

    public function pilih_transaksi($id_transaksi)
    {
        $this->db->where('id_transaksi', $id_transaksi);
        return $this->db->get('transaksi_detail')->result_array();
    }

    public function pilih_transaksi_status($keterangan)
    {
        $this->db->where('status_transaksi', $keterangan);
        return $this->db->get('transaksi_detail')->result_array();
    }

    public function hapus_transaksi($id_transaksi)
    {
    	$this->db->where('id_transaksi', $id_transaksi);
        $this->db->delete('transaksi_detail');
    }

    public function get_jumlah($keterangan)
    {
        $this->db->where('status_transaksi', $keterangan);
        return $this->db->get('transaksi_detail')->num_rows();
    }

    public function get_penghasilan()
    {
        $this->db->select_sum('total_bayar');
        $this->db->where('status_transaksi', 'SUCCESS');
        return $this->db->get('transaksi_detail')->result();
    }

    public function ubah_transaksi($id_transaksi, $data)
    {
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->update('transaksi_detail', $data);
    }

}