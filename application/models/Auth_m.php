<?php
defined('BASEPATH') or exit('No direct access allowed');

class auth_m extends CI_Model
{
    function cek_role($username, $password)
    {
        $kondisi = array(
            'username' => $username,
            'password' => SHA1($password)
        );
        $this->db->select('*');
        $this->db->from('tbl_admin');
        $this->db->where($kondisi);
        $this->db->limit(1);
        return $this->db->get();
    }
}
