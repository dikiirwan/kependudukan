<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kependudukan_model extends CI_Model
{
    public function Hapus_penduduk($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function Hapus_kelahiran($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function Hapus_kematian($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function Hapus_pendatang($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function Hapus_pindahan($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
