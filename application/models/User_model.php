<?php
 
class User_model extends CI_model {

    public function get_user($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('id_operator', $id_user);
        return $this->db->get('user')->result_array();
    }

    public function pilih_user($id_user)
    {
        $this->db->where('id_operator', $id_user);
        return $this->db->get('user')->result_array();
    }

    public function ubah_user($id_user, $data)
    {
    	$this->db->where('id_operator', $id_user);
        $this->db->update('user', $data);
    }

}