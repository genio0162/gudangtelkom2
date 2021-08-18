<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
        $this->load->library('form_validation');
        $this->load->model('M_data');
        $this->load->model('M_transaksi');
        $this->load->helper('url');
        cek_session();
    }

    public function barmas()
    {
        $ci = get_instance();
        $id = $ci->session->userdata('email');
        $queryId = $ci->db->get_where('tb_user', ['email' => $id])->row_array();

        $cek['title'] = 'Barang Masuk';
        $cek['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $cek['stok'] = $this->db->get_where('tb_stokgudang')->result_array();

        $this->load->view('template/header', $cek);
        if ($queryId['role'] == 1) {
            $this->load->view('template/mainsidebar', $cek);
        }
        if ($queryId['role'] == 2) {
            $this->load->view('template/mainsidebardua', $cek);
        }
        $this->load->view('template/topbar', $cek);
        if ($queryId['role'] == 1) {
            $this->load->view('transaksi/v_barmas', $cek);
        }
        if ($queryId['role'] == 2) {
            $this->load->view('transaksi/v_barmas2', $cek);
        }
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        if (isset($_POST['tambah'])) {
            $post = $this->input->post(null, TRUE);
            $this->M_transaksi->lap_barangbaru($post);
            $this->M_transaksi->tambah_stok_barangbaru($post);

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('message', '<div class="alert col-sm-12 alert-success" role="alert">Berhasil menambahkan stok</div>');
            } else  $this->session->set_flashdata('message', '<div class="alert col-sm-12 alert-danger" role="alert">Gagal Menambahkan Stok</div>');
            redirect('transaksi/barmas');
        }
    }

    public function barkel()
    {
        $ci = get_instance();
        $id = $ci->session->userdata('email');
        $queryId = $ci->db->get_where('tb_user', ['email' => $id])->row_array();

        $cek['title'] = 'Barang Keluar';
        $cek['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $cek['stok'] = $this->db->get_where('tb_stokgudang')->result_array();

        $this->load->view('template/header', $cek);
        if ($queryId['role'] == 1) {
            $this->load->view('template/mainsidebar', $cek);
        }
        if ($queryId['role'] == 2) {
            $this->load->view('template/mainsidebardua', $cek);
        }
        $this->load->view('template/topbar', $cek);
        if ($queryId['role'] == 1) {
            $this->load->view('transaksi/v_barkel', $cek);
        }
        if ($queryId['role'] == 2) {
            $this->load->view('transaksi/v_barkel2', $cek);
        }
        $this->load->view('template/footer');
    }

    public function coba()
    {
        $cek['title'] = 'coba';
        $cek['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $cek['stok'] = $this->db->get_where('tb_stokgudang')->result_array();

        $this->load->view('template/header', $cek);
        $this->load->view('template/mainsidebar', $cek);
        $this->load->view('template/topbar', $cek);
        $this->load->view('transaksi/coba', $cek);
        $this->load->view('template/footer');
    }

    public function tambah2()
    {
        $stok = $this->db->get('tb_stokgudang')->result_array();

        $data = array(
            'namak' => $this->input->post('namak'),
            'id' => $this->input->post('id_barang'),
            'date' => $this->input->post('date'),
            'name' => $this->input->post('nama'),
            'price' => $this->input->post('jenis'),
            'satuan' => $this->input->post('satuan'),
            'keterangan' => $this->input->post('keterangan'),
            'qty' => $this->input->post('qty')
        );

        $this->cart->insert($data);
        redirect('transaksi/barkel');
    }

    public function keluar()
    {
        $nofrak = $this->M_transaksi->get_nofrak();
        $order_proses = $this->M_transaksi->kurang($nofrak);

        $this->cart->destroy();
        redirect('transaksi/barkel');
        $this->session->set_flashdata('message', '<div class="alert col-sm-12 alert-success" role="alert">Berhasil memproses Data</div>');
    }

    public function hapus_cart()
    {
        $this->cart->destroy();
        redirect('transaksi/barkel');
    }
}
