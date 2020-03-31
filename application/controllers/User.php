<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        //digunakan untuk menjalankan fungsi construct pada class parrent(ci_controller)
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('User_model');
        $this->load->model('Cetak_model');

        if ($this->session->userdata('level') == "user" and $this->session->userdata('status') == "Tidak Aktif") {
            $this->session->sess_destroy();
            $data['pesan'] = "Maaf Saat Ini Akun Anda Belum Aktif, Silahkan Hubungi Admin";
            $data['title'] = 'Login User';
            $this->load->view('auth/header_login', $data);
            $this->load->view('auth/login', $data);
        } elseif ($this->session->userdata('level') != "user" and $this->session->userdata('level') != "admin") {
            redirect('auth', 'refresh');
        }
    }

    public function index()
    {
        if ($this->session->userdata('level') == "admin") {
            redirect('admin', 'refresh');
        }
        $data['title'] = 'Halaman User';
        $this->load->view('user/header_login', $data);
        $this->load->view('user/index');
        $this->load->view('template/footer');
    }

    public function edit($id)
    {
        $data['title'] = 'Form Edit User';
        $data['status'] = ['Aktif', 'Tidak Aktif'];
        $data['user'] = $this->User_model->getUserById($id);
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('notelp', 'Notelp', 'required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('level', 'Level', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/header_login', $data);
            $this->load->view('user/edit', $data);
        } else {
            $this->User_model->ubahDataUser();
            $this->session->set_flashdata('flash-data', 'diedit');
            redirect('user/list_user', 'refresh');
        }
    }

    public function list_user()
    {
        if ($this->session->userdata('level') == "user") {
            redirect('user', 'refresh');
        } elseif ($this->session->userdata('level') == "admin") {
            $data['title'] = 'Data Admin - List User';
            $data['user'] = $this->User_model->datatabels();
            if ($this->input->post('keyword')) {
                $data['user'] = $this->User_model->cariDataUser();
            }
            $this->load->view('admin/header_login', $data);
            $this->load->view('user/list', $data);
            $this->load->view('template/footer');
        } else {
            redirect('auth', 'refresh');
        }
    }

    public function hapusDataUser($id)
    {

        $this->User_model->hapusDataUser($id);
        $this->session->flashdata('flash-data-hapus', 'Dihapus');
        redirect('user/list_user', 'refresh');
    }
    public function cetakLaporan()
    {
        $data['title'] = 'Laporan User';
        $data['user'] = $this->Cetak_model->viewUser();
        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->filename = "laporan_user.pdf";
        $this->pdf->load_view('user/laporan', $data);
    }
}
