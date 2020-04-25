<?php

class Barang_model extends CI_model {

    public function get_barang()
    {
        $this->db->order_by("id_barang", "desc");
        return $this->db->get('barang')->result_array();
    }

    public function pilih_barang($id_barang)
    {
        $this->db->where('id_barang', $id_barang);
        return $this->db->get('barang')->result_array();
    }

    public function hapus_barang($id_barang)
    {
    	$this->db->where('id_barang', $id_barang);
        $this->db->delete('barang');
    }

    public function ubah_barang($id_barang, $data)
    {
    	$this->db->where('id_barang', $id_barang);
        $this->db->update('barang', $data);
    }

}