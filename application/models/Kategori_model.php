<?php

class Kategori_model extends CI_model {

    public function get_kategori()
    {
        $this->db->order_by("id_kategori", "desc");
        return $this->db->get('kategori')->result_array();
    }

    public function pilih_kategori($id_kategori)
    {
        $this->db->where('id_kategori', $id_kategori);
        return $this->db->get('kategori')->result_array();
    }

    public function hapus_kategori($id_kategori)
    {
    	$this->db->where('id_kategori', $id_kategori);
        $this->db->delete('kategori');
    }

    public function ubah_kategori($id_kategori, $data)
    {
    	$this->db->where('id_kategori', $id_kategori);
        $this->db->update('kategori', $data);
    }

}