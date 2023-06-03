<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('activity')) {
    function activity($activity_name)
    {
        $CI =& get_instance();
        $CI->load->database();
        $uid = $CI->session->userdata('uid');
        $tanggal = date('Y-m-d H:i:s');
        $data = array(
            'user_id' => $uid,
            'activity_name' => $activity_name,
            'tanggal' => $tanggal
        );
        $CI->db->insert('tbl_user_activity', $data);
    }
}