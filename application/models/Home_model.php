<?php
defined('BASEPATH') or exit('No direct access allowed');

class Home_model extends CI_Model
{
    public function get_gejala()
    {
        return $this->db->get('tbl_gejala')->result();
    }

    public function get_basiskasus()
    {
        return $this->db->get('tbl_basiskasus')->result();
    }

    public function get_gejala_by_kerusakan($kd_kerusakan)
    {
        $this->db->select('tbl_gejala.*');
        $this->db->from('tbl_basiskasus_detail');
        $this->db->join('tbl_gejala', 'tbl_basiskasus_detail.kd_gejala = tbl_gejala.kd_gejala');
        $this->db->where('tbl_basiskasus_detail.kd_kerusakan', $kd_kerusakan);
        return $this->db->get()->result();
    }

    public function save_hasil_diagnosa($data)
    {
        return $this->db->insert('tbl_hasil_diagnosa', $data);
    }

    //ini model untuk forward chaining

    public function get_gejala2()
    {
        return $this->db->get('tbl_gejala')->result();
    }

    public function get_kerusakan()
    {
        return $this->db->get('tbl_kerusakan')->result();
    }

    public function get_basiskasus_detail()
    {
        return $this->db->get('tbl_basiskasus_detail')->result();
    }

    public function save_hasil_diagnosa2($data)
    {
        return $this->db->insert('tbl_hasil_diagnosa2', $data);
    }
}
