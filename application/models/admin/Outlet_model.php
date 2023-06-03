<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Outlet_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function get()
    {
        $hasil = $this->db->query("SELECT * FROM tbl_outlet");
        return $hasil->result_array();
    }

    function getArea()
    {
        $hasil = $this->db->query("SELECT * FROM tbl_area");
        return $hasil->result_array();
    }

    public function getById($id)
    {
        $this->db->select("o.id as id, o.nama_outlet as nama, o.alamat as alamat, a.nama_area as area, o.id_area as areaid, o.id_cabang as cabang, o.jenis as jenisiid, (CASE o.jenis WHEN 1 THEN 'Gedung Sendiri' WHEN 2 THEN 'Gedung Kontrak/Sewa' END) AS jenis, 
        (CASE o.status WHEN 1 THEN 'Aktif' WHEN 2 THEN 'Tidak Aktif' END) AS status");
        $this->db->from("tbl_outlet o");
        $this->db->join("tbl_area a", "a.id = o.id_area");
        $this->db->where("o.id", $id);
        $query = $this->db->get();
        return $query->row_array();

    }


    public function insert($data)
    {
        $this->db->insert('tbl_outlet', $data);
        return $this->db->insert_id();
    }


    public function update($where, $data)
    {
        $this->db->update('tbl_outlet', $data, $where);
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_outlet');
        return $this->db->affected_rows();
    }


    public function count_all()
    {
        // Hitung jumlah total data
        return $this->db->count_all('tbl_outlet');
    }

    public function get_data($area, $jenis, $status, $start, $length, $search_value)
    {

        $sql = "SELECT o.id as id, o.nama_outlet as nama, o.alamat as alamat, nama_area as area, 
        (CASE o.jenis WHEN 1 THEN 'Gedung Sendiri' WHEN 2 THEN 'Gedung Kontrak/Sewa' END) AS jenis, 
        (CASE o.status WHEN 1 THEN 'Aktif' WHEN 2 THEN 'Tidak Aktif' END) AS status 
        FROM tbl_outlet o
        JOIN tbl_area a ON a.id = o.id_area 
        WHERE o.id_cabang = ''";

        if (!empty($area)) {
            $sql .= " AND o.id_area = " . $area;
        }

        if (!empty($jenis)) {
            $sql .= " AND o.jenis = " . $jenis;
        }

        if (!empty($status)) {
            $sql .= " AND o.status = " . $status;
        }

        if (!empty($search_value)) {
            $sql .= " AND (o.nama_outlet LIKE '%$search_value%' OR o.alamat LIKE '%$search_value%')";
        }

        $sql .= " GROUP BY o.id, o.nama_outlet, o.alamat, nama_area, o.jenis, o.status
              LIMIT $start, $length";

        $hasil = $this->db->query($sql)->result_array();
        return $hasil;
    }

    public function get_upc($id, $start, $length, $search_value)
    {

        $sql = "SELECT o.id as id, o.nama_outlet as nama, o.alamat as alamat, nama_area as area, 
        (CASE o.jenis WHEN 1 THEN 'Gedung Sendiri' WHEN 2 THEN 'Gedung Kontrak/Sewa' END) AS jenis, 
        (CASE o.status WHEN 1 THEN 'Aktif' WHEN 2 THEN 'Tidak Aktif' END) AS status 
        FROM tbl_outlet o
        JOIN tbl_area a ON a.id = o.id_area 
        WHERE o.id_cabang = '$id'";

        $hasil = $this->db->query($sql)->result_array();
        return $hasil;
    }
}