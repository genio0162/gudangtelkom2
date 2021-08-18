<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengadaan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_data');
        $this->load->helper('url');
        cek_session();
    }

    public function index()
    {
        $ci = get_instance();
        $id = $ci->session->userdata('email');
        $queryId = $ci->db->get_where('tb_user', ['email' => $id])->row_array();

        $cek['title'] = 'Dashboard';
        $cek['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $cek['pengumuman'] = $this->db->get('tb_pengumuman')->result_array();

        $this->load->view('template/header', $cek);
        if ($queryId['role'] == 1) {
            $this->load->view('template/mainsidebar', $cek);
        }
        if ($queryId['role'] == 2) {
            $this->load->view('template/mainsidebardua', $cek);
        }
        $this->load->view('template/topbar', $cek);
        $this->load->view('dashboard/v_pengadaan', $cek);
        $this->load->view('template/footer');
    }
}
