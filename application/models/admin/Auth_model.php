<?php
class Auth_model extends CI_Model
{

    function get($email)
    {
        $query = $this->db->query("SELECT * FROM tbl_users WHERE email='$email' LIMIT 1");
        return $query;
    }

    function userData()
    {
        $uid = $this->session->userdata('uid');
        $hasil = $this->db->query("SELECT u.id as id, u.email as email, u.nama as nama, r.role_name as role FROM tbl_users u, tbl_role r WHERE u.id='$uid' AND r.id=u.role_id");
        return $hasil->row_array();
    }
}
