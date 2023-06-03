<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('helper_menu')) {
    function helper_menu($menuName) {
        $CI =& get_instance();
        $CI->load->database();
        
        $uid = $CI->session->userdata('uid');

        $CI->db->select('r.role_menu as menu');
        $CI->db->from('tbl_role r');
        $CI->db->join('tbl_users u', 'r.id = u.role_id');
        $CI->db->where('u.id', $uid);
        $query = $CI->db->get();
        $roleMenu = $query->row()->menu;
        
        $menuArray = explode(',', $roleMenu);
        return in_array($menuName, $menuArray);
    }
}
