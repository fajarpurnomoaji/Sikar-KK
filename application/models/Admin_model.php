<?php
defined('BASEPATH') or exit('No direct access allowed');

class admin_model extends CI_Model
{
    public function get_data($table)
    {
        return $this->db->get($table);
    }

    public function join($table, $tbljoin, $join)
    {
        $this->db->join($tbljoin, $join);
        return $this->db->get($table);
    }

    public function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function update_data($data, $table)
    {
        $this->db->where('id', $data['id']);
        $this->db->update($table, $data);
    }

    public function delete($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function get_count()
    {
        $sql = "SELECT count(id) as id FROM tbl_admin";
        $result = $this->db->query($sql);
        return $result->row()->id;
    }

    public function update_dkerusakan($data, $table)
    {
        $this->db->where('kd_kerusakan', $data['kd_kerusakan']);
        $this->db->update($table, $data);
    }

    public function get_count2()
    {
        $sql = "SELECT count(kd_kerusakan) as kd_kerusakan FROM tbl_kerusakan";
        $result = $this->db->query($sql);
        return $result->row()->kd_kerusakan;
    }

    public function get_count3()
    {
        $sql = "SELECT count(kd_gejala) as kd_gejala FROM tbl_gejala";
        $result = $this->db->query($sql);
        return $result->row()->kd_gejala;
    }

    public function update_dgejala($data, $table)
    {
        $this->db->where('kd_gejala', $data['kd_gejala']);
        $this->db->update($table, $data);
    }

    public function get_count4()
    {
        $sql = "SELECT count(kd_bkasus) as kd_bkasus FROM tbl_basiskasus";
        $result = $this->db->query($sql);
        $this->db->join('tbl_kerusakan', 'tbl_kerusakan.kd_kerusakan = tbl_basiskasus.kd_kerusakan', 'left');
        $this->db->join('tbl_gejala', 'tbl_gejala.kd_gejala = tbl_basiskasus.kd_gejala', 'left');
        return $result->row()->kd_bkasus;
    }

    // public function basis_pengetahuan()
    // {
    //     $this->db->select('tbl_kerusakan.kerusakan, GROUP_CONCAT(tbl_basiskasus_detail.kd_gejala SEPARATOR ", ") as gejala_list', FALSE);
    //     $this->db->from('tbl_basiskasus');
    //     $this->db->join('tbl_kerusakan', 'tbl_kerusakan.kd_kerusakan = tbl_basiskasus.kd_kerusakan');
    //     $this->db->join('tbl_gejala', 'tbl_gejala.kd_gejala = tbl_basiskasus.kd_gejala');
    //     $this->db->join('tbl_basiskasus_detail', 'tbl_basiskasus_detail.kd_gejala = tbl_basiskasus.kd_gejala');
    //     $this->db->group_by('tbl_gejala.gejala');
    //     $query = $this->db->get();
    //     return $query->result();
    // }

    public function get_kasus_details()
    {
        $this->db->select('tbl_basiskasus.kd_bkasus, tbl_basiskasus.kd_kerusakan, GROUP_CONCAT(tbl_basiskasus_detail.kd_gejala) as gejala');
        $this->db->from('tbl_basiskasus');
        $this->db->join('tbl_basiskasus_detail', 'tbl_basiskasus.kd_kerusakan = tbl_basiskasus_detail.kd_kerusakan');
        $this->db->group_by('tbl_basiskasus.kd_bkasus, tbl_basiskasus.kd_kerusakan');
        $query = $this->db->get();
        return $query->result();
    }
}
