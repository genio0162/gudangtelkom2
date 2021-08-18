<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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
        $cek['title'] = 'My Profile';
        $cek['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/header', $cek);
        $this->load->view('template/mainsidebar', $cek);
        $this->load->view('template/topbar', $cek);
        $this->load->view('users/v_profile', $cek);
        $this->load->view('template/footer');
    }

    public function editprofile()
    {
        $cek['title'] = 'Edit Profile';
        $cek['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/header', $cek);
        $this->load->view('template/mainsidebar', $cek);
        $this->load->view('template/topbar', $cek);
        $this->load->view('users/v_editprofile', $cek);
        $this->load->view('template/footer');
    }

    public function update()
    {
        $this->form_validation->set_rules('nama', 'Nama Admin', 'required|trim');

        if ($this->form_validation->run() == false) {
            $cek['title'] = 'Edit Profile';
            $cek['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('template/header', $cek);
            $this->load->view('template/mainsidebar', $cek);
            $this->load->view('template/topbar', $cek);
            $this->load->view('users/v_editprofile', $cek);
            $this->load->view('template/footer');
        } else {
            $username = $this->input->post('email');
            $nama = $this->input->post('nama');
            $nik = $this->input->post('nik');
            $jabatan = $this->input->post('jabatan');
            $alamat = $this->input->post('alamat');
            $telpon = $this->input->post('telpon');

            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '10500';
                $config['upload_path'] = './asset/sbadmin/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('foto', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('nama', $nama);
            $this->db->set('nik', $nik);
            $this->db->set('gudang', $jabatan);
            $this->db->set('alamat', $alamat);
            $this->db->set('telpon', $telpon);
            $this->db->where('email',  $username);
            $this->db->update('tb_user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Merubah Akun</div>');
            redirect('user/editprofile');
        }
    }

    public function users()
    {
        $cek['title'] = 'Data User';
        $cek['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $cek['waw'] = $this->db->get('tb_user')->result_array();

        $this->load->view('template/header', $cek);
        $this->load->view('template/mainsidebar', $cek);
        $this->load->view('template/topbar', $cek);
        $this->load->view('users/v_users', $cek);
        $this->load->view('template/footer');
    }

    public function diskusi()
    {
        $ci = get_instance();
        $id = $ci->session->userdata('email');

        $cek['title'] = 'Forum Diskuksi';
        $cek['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $cek['waw'] = $this->db->get('tb_user')->result_array();
        $cek['diskusi'] = $this->db->get('tb_diskusi')->result_array();
        $cek['nama'] = $ci->db->get_where('tb_user', ['email' => $id])->row_array();

        $this->load->view('template/header', $cek);
        $this->load->view('template/mainsidebar', $cek);
        $this->load->view('template/topbar', $cek);
        $this->load->view('users/v_diskusi', $cek);
        $this->load->view('template/footer');
    }

    public function coba()
    {
        $cek['title'] = 'Forum Diskuksi';
        $cek['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $cek['diskusi'] = $this->db->get('tb_diskusi')->result_array();

        $this->load->view('template/header', $cek);
        $this->load->view('template/mainsidebar', $cek);
        $this->load->view('template/topbar', $cek);
        $this->load->view('users/coba', $cek);
        $this->load->view('template/footer');
    }

    public function kirim()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('diskusi', 'Tulis pesan', 'required|trim');

        if ($this->form_validation->run() == false) {
            $cek['title'] = 'Forum Diskuksi';
            $cek['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
            $cek['waw'] = $this->db->get('tb_user')->result_array();
            $cek['diskusi'] = $this->db->get('tb_diskusi')->result_array();

            $this->load->view('template/header', $cek);
            $this->load->view('template/mainsidebar', $cek);
            $this->load->view('template/topbar', $cek);
            $this->load->view('users/v_diskusi', $cek);
            $this->load->view('template/footer');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'diskusi' => $this->input->post('diskusi'),
            ];

            $this->db->insert('tb_diskusi', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pesan terkirim</div>');
            redirect('user/diskusi');
        }
    }
}
