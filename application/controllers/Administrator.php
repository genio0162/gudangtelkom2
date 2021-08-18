<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administrator extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_data');
        $this->load->model('M_administrator');
        $this->load->helper('url');
        cek_session();
    }

    public function index()
    {

        $cek['title'] = 'Kelola User';
        $cek['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $cek['waw'] = $this->db->get('tb_user')->result_array();

        $this->load->view('template/header', $cek);
        $this->load->view('template/mainsidebar', $cek);
        $this->load->view('template/topbar', $cek);
        $this->load->view('administrator/v_keluser', $cek);
        $this->load->view('template/footer');
    }

    public function userbaru()
    {

        $this->form_validation->set_rules('namaadmin', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'E-mail', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim');
        $this->form_validation->set_rules('password2', 'Password', 'required|trim');
        $this->form_validation->set_rules('nik', 'NIK', 'required|trim');
        $this->form_validation->set_rules('gudang', 'Gudang', 'required|trim');

        if ($this->form_validation->run() == false) {
            $cek['title'] = 'Kelola User';
            $cek['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
            $cek['waw'] = $this->db->get('tb_user')->result_array();

            $this->load->view('template/header', $cek);
            $this->load->view('template/mainsidebar', $cek);
            $this->load->view('template/topbar', $cek);
            $this->load->view('administrator/v_keluser', $cek);
            $this->load->view('template/footer');
        } else {
            $datas = [
                'nama' => htmlspecialchars($this->input->post('namaadmin', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password2' => htmlspecialchars($this->input->post('password1', true)),
                'password' => password_hash($this->input->post('password2'), PASSWORD_DEFAULT),
                'nik' => $this->input->post('nik'),
                'gudang' => $this->input->post('gudang'),
                'foto' => 'default.jpg',
                'role' => $this->input->post('role'),
                'id_wilayah' => $this->input->post('id_wilayah'),
                'is_active' => 1,
            ];

            $this->db->insert('tb_user', $datas);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menambahkan akun baru</div>');
            redirect('administrator');
        }
    }

    public function hapus_user($id)
    {
        $where = array('id' => $id);
        $this->M_data->hapus_data($where, 'tb_user');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menghapus user</div>');
        redirect('administrator');
    }

    public function pengumuman()
    {
        $cek['title'] = 'Pengumuman';
        $cek['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $cek['pengumuman'] = $this->db->get('tb_pengumuman')->result_array();

        $this->load->view('template/header', $cek);
        $this->load->view('template/mainsidebar', $cek);
        $this->load->view('template/topbar', $cek);
        $this->load->view('administrator/v_pengumuman', $cek);
        $this->load->view('template/footer');
    }

    public function pengumuman_baru()
    {
        $this->form_validation->set_rules('baru', 'Inputan', 'required|trim');

        if ($this->form_validation->run() == false) {
            $cek['title'] = 'Pengumuman';
            $cek['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
            $cek['pengumuman'] = $this->db->get('tb_pengumuman')->result_array();

            $this->load->view('template/header', $cek);
            $this->load->view('template/mainsidebar', $cek);
            $this->load->view('template/topbar', $cek);
            $this->load->view('administrator/v_pengumuman', $cek);
            $this->load->view('template/footer');
        } else {
            $datar = [
                'pengumuman' => $this->input->post('baru')
            ];

            $this->db->insert('tb_pengumuman', $datar);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menambahkan pengumuman baru</div>');
            redirect('administrator/pengumuman');
        }
    }

    public function hapus_pengumuman($id)
    {
        $where = array('id' => $id);
        $this->M_data->hapus_data($where, 'tb_pengumuman');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menghapus pengumuman</div>');
        redirect('administrator/pengumuman');
    }

    public function material()
    {
        $cek['title'] = 'Pengumuman';
        $cek['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $cek['material'] = $this->db->get('tb_material')->result_array();
        $cek['tipe'] = $this->db->get('tb_tipe')->result_array();
        $cek['satuan'] = $this->db->get('tb_satuan')->result_array();

        $this->load->view('template/header', $cek);
        $this->load->view('template/mainsidebar', $cek);
        $this->load->view('template/topbar', $cek);
        $this->load->view('administrator/v_material', $cek);
        $this->load->view('template/footer');
    }

    public function material_baru()
    {
        $this->form_validation->set_rules('namamaterial', 'Material', 'required|trim');
        $this->form_validation->set_rules('tipe', 'Tipe', 'required|trim');
        $this->form_validation->set_rules('satuan', 'Satuan', 'required|trim');

        if ($this->form_validation->run() == false) {
            $cek['title'] = 'Pengumuman';
            $cek['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
            $cek['material'] = $this->db->get('tb_material')->result_array();
            $cek['tipe'] = $this->db->get('tb_tipe')->result_array();
            $cek['satuan'] = $this->db->get('tb_satuan')->result_array();

            $this->load->view('template/header', $cek);
            $this->load->view('template/mainsidebar', $cek);
            $this->load->view('template/topbar', $cek);
            $this->load->view('administrator/v_material', $cek);
            $this->load->view('template/footer');
        } else {
            $datas = [
                'id_barang' => $this->M_administrator->get_kobar(),
                'nama' => $this->input->post('namamaterial'),
                'tipe' => $this->input->post('tipe'),
                'satuan' => $this->input->post('satuan')
            ];

            $datal = [
                'id_barang' => $this->M_administrator->get_kobar(),
                'nama' => $this->input->post('namamaterial'),
                'tipe' => $this->input->post('tipe'),
                'satuan' => $this->input->post('satuan'),
                'whjember' => 0,
                'soinvjemkotin' => 0,
                'soinvjemkotout' => 0,
                'soinvjember' => 0,
                'soinvtguin' => 0,
                'soinvtguout' => 0,
                'soinvgen' => 0,
                'soinvbwi' => 0,
                'soinvbws' => 0,
                'soinvsit' => 0,
            ];

            $this->db->insert('tb_material', $datas);
            $this->db->insert('tb_stokgudang', $datal);
            $this->session->set_flashdata('message', '<div class="alert col-sm-12 alert-success" role="alert">Berhasil menambahkan Data</div>');
            redirect('administrator/material');
        }
    }

    function edit_material($id)
    {
        $cek['title'] = 'Edit Material';
        $cek['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $cek['waw'] = $this->db->get('tb_user')->result_array();
        $cek['material'] = $this->db->get('tb_material')->result_array();
        $cek['tipe'] = $this->db->get('tb_tipe')->result_array();
        $cek['satuan'] = $this->db->get('tb_satuan')->result_array();

        $where = array('id' => $id);
        $cek['material'] = $this->M_data->edit_data($where, 'tb_material')->result_array();
        $this->load->view('template/header', $cek);
        $this->load->view('template/mainsidebar', $cek);
        $this->load->view('template/topbar', $cek);
        $this->load->view('administrator/v_editmaterial', $cek);
        $this->load->view('template/footer');
    }

    function update_material()
    {
        $id = $this->input->post('id_material');
        $nama = $this->input->post('nama');
        $tipe = $this->input->post('tipe');
        $satuan = $this->input->post('satuan');

        $data = array(
            'nama' => $nama,
            'tipe' => $tipe,
            'satuan' => $satuan,
        );

        $where = array(
            'id' => $id
        );

        $this->M_data->update_data($where, $data, 'tb_material');
        $this->M_data->update_data($where, $data, 'tb_stokgudang');
        $this->session->set_flashdata('message', '<div class="alert col-sm-12 alert-success" role="alert">Berhasil mengubah data</div>');
        redirect('administrator/material');
    }

    public function tipe_baru()
    {
        $this->form_validation->set_rules('namatipe', 'Material', 'required|trim');

        if ($this->form_validation->run() == false) {
            $cek['title'] = 'Pengumuman';
            $cek['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
            $cek['material'] = $this->db->get('tb_material')->result_array();
            $cek['tipe'] = $this->db->get('tb_tipe')->result_array();
            $cek['satuan'] = $this->db->get('tb_satuan')->result_array();

            $this->load->view('template/header', $cek);
            $this->load->view('template/mainsidebar', $cek);
            $this->load->view('template/topbar', $cek);
            $this->load->view('administrator/v_material', $cek);
            $this->load->view('template/footer');
        } else {
            $datar = [
                'tipe' => $this->input->post('namatipe')
            ];

            $this->db->insert('tb_tipe', $datar);
            $this->session->set_flashdata('message1', '<div class="alert col-sm-10 alert-success" role="alert">Berhasil menambahkan Data</div>');
            redirect('administrator/material');
        }
    }

    public function hapus_tipe($id)
    {
        $where = array('id' => $id);
        $this->M_data->hapus_data($where, 'tb_tipe');
        $this->session->set_flashdata('message1', '<div class="alert col-sm-10 alert-success" role="alert">Berhasil menghapus data</div>');
        redirect('administrator/material');
    }

    public function satuan_baru()
    {
        $this->form_validation->set_rules('namasatuan', 'Material', 'required|trim');

        if ($this->form_validation->run() == false) {
            $cek['title'] = 'Pengumuman';
            $cek['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
            $cek['material'] = $this->db->get('tb_material')->result_array();
            $cek['tipe'] = $this->db->get('tb_tipe')->result_array();
            $cek['satuan'] = $this->db->get('tb_satuan')->result_array();

            $this->load->view('template/header', $cek);
            $this->load->view('template/mainsidebar', $cek);
            $this->load->view('template/topbar', $cek);
            $this->load->view('administrator/v_material', $cek);
            $this->load->view('template/footer');
        } else {
            $datam = [
                'satuan' => $this->input->post('namasatuan')
            ];

            $this->db->insert('tb_satuan', $datam);
            $this->session->set_flashdata('message2', '<div class="alert col-sm-10 alert-success" role="alert">Berhasil menambahkan Data</div>');
            redirect('administrator/material');
        }
    }

    public function hapus_satuan($id)
    {
        $where = array('id' => $id);
        $this->M_data->hapus_data($where, 'tb_satuan');
        $this->session->set_flashdata('message2', '<div class="alert col-sm-10 alert-success" role="alert">Berhasil menghapus data</div>');
        redirect('administrator/material');
    }
}
