<?php
function admin_is_logged_in($page = null) //membatasi akses ke halaman admin
{
    $ci = get_instance();
    if ($page == null) {
        if (!$ci->session->userdata('email')) {
            redirect('admin/auth/login');
        }
    } elseif ($page == "auth") {
        if ($ci->session->userdata('email')) {
            redirect('admin/dashboard');
        }elseif(!is_null(get_cookie('autologged'))){
            $json = json_decode(decrypt_str(get_cookie('autologged')));
            $data = [
                'logged' => TRUE,
                'uid' => $json->uid,
                'email' => $json->email
            ];
            $ci->session->set_userdata($data);
            redirect('admin/dashboard');
        }
    }
}
