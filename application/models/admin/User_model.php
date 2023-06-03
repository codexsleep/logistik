<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function get()
    {
        $hasil = $this->db->query("SELECT u.id as id, u.nama as nama, u.email as email, r.role_name as role, 
        (CASE  WHEN status = '0' THEN 'tidak aktif'  WHEN status = '1' THEN 'aktif' END) AS status FROM tbl_users u, tbl_role r WHERE r.id=u.role_id");
        return $hasil->result_array();
    }

    public function getById($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_users');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
    
    function getlog($userid_log, $start, $length, $search_value)
{
    // Set default value for start and length if they are empty
    if(empty($start)){
        $start = 0;
    }

    if(empty($length)){
        $length = 10;
    }

    if ($userid_log != null) {
        $hasil = $this->db->query("SELECT a.id as id, u.nama as user, a.activity_name as activity, a.tanggal as tanggal FROM tbl_user_activity a JOIN tbl_users u ON u.id = a.user_id WHERE u.user_id = '$userid_log' GROUP BY a.id HAVING a.activity_name LIKE '%$search_value%' OR u.nama LIKE '%$search_value%' LIMIT $start, $length")->result_array();
    } else {
        $hasil = $this->db->query("SELECT a.id as id, u.nama as user, a.activity_name as activity, a.tanggal as tanggal FROM tbl_user_activity a JOIN tbl_users u ON u.id = a.user_id GROUP BY a.id HAVING a.activity_name LIKE '%$search_value%' OR u.nama LIKE '%$search_value%' LIMIT $start, $length")->result_array();
    }
    return $hasil;
}


    public function count_all_log()
    {
        // Hitung jumlah total data
        return $this->db->count_all('tbl_user_activity');
    }

    function getakun()
    {
        $hasil = $this->db->query("SELECT * FROM tbl_user_activity");
        return $hasil->result_array();
    }
    
    function getrole()
    {
        $hasil = $this->db->query("SELECT * FROM tbl_role");
        return $hasil->result_array();
    }


    public function roleById($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_role');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function updaterole($where, $data)
    {
        $this->db->update('tbl_role', $data, $where);
        return $this->db->affected_rows();
    }


    public function insert($data)
    {
        $this->db->insert('tbl_users', $data);
        return $this->db->insert_id();
    }


    public function update($where, $data)
    {
        $this->db->update('tbl_users', $data, $where);
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_users');
        return $this->db->affected_rows();
    }

    public function delete_role($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_role');
        return $this->db->affected_rows();
    }


    public function count_all()
    {
        // Hitung jumlah total data
        return $this->db->count_all('tbl_users');
    }

    public function get_data($role, $status, $start, $length, $search_value)
    {

        if ($role != null && $status != null) {
            $hasil = $this->db->query("SELECT u.id as id, u.nama as nama, u.email as email, r.role_name as role, (CASE  WHEN u.status = '2' THEN 'tidak aktif'  WHEN u.status = '1' THEN 'aktif' END) AS status FROM tbl_users u JOIN tbl_role r ON r.id = u.role_id WHERE u.role_id = '$role' and u.status='$status' GROUP BY u.id HAVING u.nama LIKE '%$search_value%' OR u.email LIKE '%$search_value%' LIMIT $start, $length")->result_array();
        } elseif ($role != null) {
            $hasil = $this->db->query("SELECT u.id as id, u.nama as nama, u.email as email, r.role_name as role, (CASE  WHEN u.status = '2' THEN 'tidak aktif'  WHEN u.status = '1' THEN 'aktif' END) AS status FROM tbl_users u JOIN tbl_role r ON r.id = u.role_id WHERE u.role_id = '$role' GROUP BY u.id HAVING u.nama LIKE '%$search_value%' OR u.email LIKE '%$search_value%' LIMIT $start, $length")->result_array();
        } elseif ($status != null) {
            $hasil = $this->db->query("SELECT u.id as id, u.nama as nama, u.email as email, r.role_name as role, (CASE  WHEN u.status = '2' THEN 'tidak aktif'  WHEN u.status = '1' THEN 'aktif' END) AS status FROM tbl_users u JOIN tbl_role r ON r.id = u.role_id WHERE u.status='$status' GROUP BY u.id HAVING u.nama LIKE '%$search_value%' OR u.email LIKE '%$search_value%' LIMIT $start, $length")->result_array();
        } else {
            $hasil = $this->db->query("SELECT u.id as id, u.nama as nama, u.email as email, r.role_name as role, (CASE  WHEN u.status = '2' THEN 'tidak aktif'  WHEN u.status = '1' THEN 'aktif' END) AS status FROM tbl_users u JOIN tbl_role r ON r.id = u.role_id GROUP BY u.id HAVING u.nama LIKE '%$search_value%' OR u.email LIKE '%$search_value%' LIMIT $start, $length")->result_array();
        }
        return $hasil;
    }
}
