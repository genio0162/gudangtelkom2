<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_gudang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_data');
        $this->load->helper('url');
        cek_session();
    }

    public function lap_barmas()
    {
        $cek['title'] = 'Laporan Barang Masuk';
        $cek['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $cek['lap'] = $this->db->get('tb_lapbarmas')->result_array();

        $this->load->view('template/header', $cek);
        $this->load->view('template/mainsidebar', $cek);
        $this->load->view('template/topbar', $cek);
        $this->load->view('data_gudang/v_lapbarmas', $cek);
        $this->load->view('template/footer');
    }

    public function cetak_pemasukan($id)
    {
        $cek['title'] = 'Print BA. Barang Masuk';
        $cek['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $where = array('id' => $id);
        $cek['lap_barmas'] = $this->M_data->edit_data($where, 'tb_lapbarmas')->result_array();

        $this->load->view('file_print/v_p_pemasukan', $cek);
    }

    public function lap_barkel()
    {
        $cek['title'] = 'Laporan Barang Keluar';
        $cek['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $cek['lap'] = $this->db->get('tb_lapbarkel')->result_array();

        $this->load->view('template/header', $cek);
        $this->load->view('template/mainsidebar', $cek);
        $this->load->view('template/topbar', $cek);
        $this->load->view('data_gudang/v_lapbarkel', $cek);
        $this->load->view('template/footer');
    }

    public function cetak_pengeluaran()
    {
        $cek['stok'] = $this->db->get_where('tb_lapbarkel', ['nofrak' => $this->input->post('nofrak')])->result_array();
        $cek['nama'] = $this->db->get_where('tb_lapbarkel', ['nofrak' => $this->input->post('nofrak')])->row_array();
        $this->load->view('file_print/v_p_pengeluaran', $cek);
    }

    public function cetak_pengeluaranb($id)
    {
        $cek['title'] = 'Print BA. Barang Masuk';
        $cek['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $where = array('id' => $id);
        $cek['lap_barkel'] = $this->M_data->edit_data($where, 'tb_lapbarkel')->result_array();

        $this->load->view('file_print/v_p_pengeluaranb', $cek);
    }

    public function stok_gudang()
    {
        $cek['title'] = 'Stok Gudang';
        $cek['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $cek['stok'] = $this->db->get('tb_stokgudang')->result_array();

        $this->load->view('template/header', $cek);
        $this->load->view('template/mainsidebar', $cek);
        $this->load->view('template/topbar', $cek);
        $this->load->view('data_gudang/v_stokgudang', $cek);
        $this->load->view('template/footer');
    }
}
