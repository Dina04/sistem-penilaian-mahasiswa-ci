<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen1 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('dosen1_model');

        if ($this->session->userdata('level') == "user") {
            redirect('user', 'refresh');
        } elseif ($this->session->userdata('level') == "user" and $this->session->userdata('status') == "Tidak Aktif") {
            $this->session->sess_destroy();
            $data['pesan'] = "Maaf Saat Ini Akun Anda Belum Aktif, Silahkan Hubungi Admin";
            $data['title'] = 'Login User';
            $this->load->view('auth/header_login', $data);
            $this->load->view('auth/login', $data);
        } elseif ($this->session->userdata('level') != "dosen") {
            redirect('auth', 'refresh');
        }
    }

    public function index()
    {
        $data['title'] = 'Halaman Dosen';
        $this->load->view('dosen1/header_login', $data);
        $this->load->view('dosen1/index');
    }
}
