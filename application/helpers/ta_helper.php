<?php

function cek_session()
{

    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('login');
    } else {
        $role_id = $ci->session->userdata('role');
        $id = $ci->session->userdata('email');
        $menu = $ci->uri->segment(1);
        $queryId = $ci->db->get_where('tb_user', ['email' => $id])->row_array();


        $queryMenu = $ci->db->get_where('tb_menu', ['menu' => $menu])->row_array();
        $menu_id = $queryMenu['id_menu'];


        $userAccess = $ci->db->get_where('tb_useraccess', [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ]);

        if ($userAccess->num_rows() < 1) {
            redirect('block/blocked');
        }
    }
}
