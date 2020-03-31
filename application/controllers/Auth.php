<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
        //$this->load->library('session');
    }


    public function index()
    {
        if ($this->session->userdata('level') == "user") {
            redirect('user', 'refresh');
        } elseif ($this->session->userdata('level') == "admin") {
            redirect('admin', 'refresh');
        }
        $data['title'] = 'Sistem Penilaian Mahasiswa';
        $this->load->view('auth/header_login', $data);
        $this->load->view('auth/index');
        $this->load->view('template/footer');
    }

    public function login()
    {
        $data['title'] = 'User Login';
        $this->load->view('auth/header_login', $data);
        $this->load->view('auth/login');
        $this->load->view('template/footer');
    }

    public function register()
    {
        if ($this->session->userdata('level') == "user") {
            redirect('user', 'refresh');
        } elseif ($this->session->userdata('level') == "admin") {
            redirect('admin', 'refresh');
        }
        $data['title'] = 'User Register';
        $this->load->view('auth/header_login', $data);
        $this->load->view('auth/register');
        $this->load->view('template/footer');
    }
    public function proses_login()
    {
        //var_dump($row);
        if ($this->session->userdata('level') == "user") {
            redirect('user', 'refresh');
        } elseif ($this->session->userdata('level') == "admin") {
            redirect('admin', 'refresh');
        }
        $username = htmlspecialchars($this->input->post('username'));
        $password = htmlspecialchars(MD5($this->input->post('password')));

        $cekLogin = $this->Auth_model->login($username, $password);

        if ($cekLogin) {
            foreach ($cekLogin as $row);
            $this->session->set_userdata('id_user', $row->id_user);
            $this->session->set_userdata('User', $row->username);
            $this->session->set_userdata('level', $row->level);
            $this->session->set_userdata('status', $row->status);
            if ($this->session->userdata('level') == "admin") {
                redirect('admin');
            } elseif ($this->session->userdata('level') == "user" and $this->session->userdata('status') == "Tidak Aktif") {
                $this->session->sess_destroy();
                $data['pesan'] = "Maaf Saat Ini Akun Anda Belum Aktif, Silahkan Hubungi Admin";
                $data['title'] = 'Login User';
                $this->load->view('auth/header_login', $data);
                $this->load->view('auth/login', $data);
            } elseif ($this->session->userdata('level') == "user" and $this->session->userdata('status') == "Aktif") {
                redirect('user/index');
            } elseif ($this->session->userdata('level') == "dosen" and $this->session->userdata('status') == "Tidak Aktif") {
                $this->session->sess_destroy();
                $data['pesan'] = "Maaf Anda Belum Aktif, Tolong Hubungi Admin";
                $data['title'] = 'Login User';
                $this->load->view('auth/header_login', $data);
                $this->load->view('auth/login', $data);
            } elseif ($this->session->userdata('level') == "dosen" and $this->session->userdata('status') == "Aktif") {
                redirect('dosen1/index');
            }
        } else {
            $data['pesan'] = "username dan password anda salah";
            $data['title'] = 'Login';
            $this->load->view('auth/header_login', $data);
            $this->load->view('auth/login');
        }
    }


    public function proses_register()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('notelp', 'Notelp', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'User Register';
            $this->load->view('auth/header_login', $data);
            $this->load->view('auth/register');
            $this->load->view('template/footer');
        } else {
            $this->Auth_model->register();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Selamat, akun anda berhasil dibuat.
          </div>');
            redirect('auth');
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth', 'refresh');
    }
}

/* End of file auth.php */
