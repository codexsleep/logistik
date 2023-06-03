<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggaran_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getById($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_anggaran');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function insert($data)
    {
        $this->db->insert('tbl_anggaran', $data);
        return $this->db->insert_id();
    }

    public function update($where, $data)
    {
        $this->db->update('tbl_anggaran', $data, $where);
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_anggaran');
        return $this->db->affected_rows();
    }

    public function count_all()
    {
        // Hitung jumlah total data
        return $this->db->count_all('tbl_anggaran');
    }

    public function get_data($tahun, $start, $length, $search_value)
    {

        if ($tahun != null) {
            $hasil = $this->db->query("SELECT id, detail, tahun, anggaran_inventaris as inventaris, anggaran_gedung as gedung FROM tbl_anggaran")->result_array();
        }else {
            $hasil = $this->db->query("SELECT id, detail, tahun, CONCAT('Rp ', FORMAT(anggaran_inventaris, 0)) AS inventaris, CONCAT('Rp ', FORMAT(anggaran_gedung, 0)) AS gedung, CONCAT('Rp ', FORMAT((anggaran_inventaris+anggaran_gedung), 0)) AS total, 'Rp (Dalam Maintanance)' as sisa
            FROM tbl_anggaran")->result_array();
        }
        return $hasil;
    }
}
 