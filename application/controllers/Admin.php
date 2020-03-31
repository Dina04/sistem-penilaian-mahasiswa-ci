<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        //digunakan untuk menjalankan fungsi construct pada class parrent(ci_controller)
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('Auth_model');

        if ($this->session->userdata('level') == "user") {
            redirect('user', 'refresh');
        } elseif ($this->session->userdata('level') == "user" and $this->session->userdata('status') == "Tidak Aktif") {
            $this->session->sess_destroy();
            $data['pesan'] = "Maaf Saat Ini Akun Anda Belum Aktif, Silahkan Hubungi Admin";
            $data['title'] = 'Login User';
            $this->load->view('auth/header_login', $data);
            $this->load->view('auth/login', $data);
        } elseif ($this->session->userdata('level') != "admin") {
            redirect('auth', 'refresh');
        }
    }

    public function index()
    {
        $data['title'] = 'Halaman Admin';
        $this->load->view('admin/header_login', $data);
        $this->load->view('admin/index');
    }
}
/* End of file admin.php */
