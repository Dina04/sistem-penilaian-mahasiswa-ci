<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dosen extends CI_Controller
{
    public function __construct()
    {
        //digunakan untuk menjalankan fungsi constrauct pada class parrent(ci_controller)
        parent::__construct();
        $this->load->model('dosen_model');
        $this->load->model('cetak_model');
    }

    public function index()
    {
        $data = array(
            'title' => 'List Dosen',
            'dosen' =>  $this->dosen_model->datatabels()
        );
        $status_login = $this->session->userdata('level');
        if ($status_login == 'admin') {
            $this->load->view('admin/header_login', $data);
            $this->load->view('dosen/index', $data);
            $this->load->view('template/footer');
        } elseif ($status_login == 'user') {
            $this->load->view('template/header', $data);
            $this->load->view('dosen/index', $data);
            $this->load->view('template/footer');
        } elseif ($status_login == 'dosen') {
            $this->load->view('template/header', $data);
            $this->load->view('dosen/index', $data);
            $this->load->view('template/footer');
        } else {
            redirect('auth', 'refresh');
        }


        // $this->load->model('dosen_model');

        // $data['title'] = 'List Dosen';
        // $data['dosen'] = $this->dosen_model->getAllDosen();
        // $this->load->view('template/header', $data);
        // $this->load->view('dosen/index', $data);
        // $this->load->view('template/footer');
    }
    public function tambah()
    {

        $data['title'] = 'Form Menambahkan Data Dosen';
        $this->load->library('form_validation');

        //$this->form_validation->set_rules('fielname', 'fieldlabel', 'trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('nip', 'NIP', 'required|numeric');
        $this->form_validation->set_rules('nama_dosen', 'Nama', 'required');
        $this->form_validation->set_rules('jeniskelamin', 'Jeniskelamin', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            # code...
            $this->load->view('template/header', $data);
            $this->load->view('dosen/tambah', $data);
            $this->load->view('template/footer');
        } else {
            # code...
            $this->dosen_model->tambahdatadosen();
            // untuk flashdata mmepunyai 2 parameter (nama flashdata/alias, isi dari flashdatanya)
            $this->session->set_flashdata('flash-data', 'ditambahkan');
            redirect('dosen', 'refresh');
        }
    }
    public function detail($id_dosen)
    {
        $data['title'] = 'Detail Dosen';
        $data['dosen'] = $this->dosen_model->getDosenByID($id_dosen);
        $this->load->view('admin/header_login', $data);
        $this->load->view('dosen/detail', $data);
        $this->load->view('template/footer');
    }

    public function hapus($id_dosen)
    {
        $this->dosen_model->hapusdatadosen($id_dosen);
        // untuk flashdata mmepunyai 2 id_dosen (nama flashdata/alias, isi dari flashdatanya)
        $this->session->set_flashdata('flash-data', 'dihapus');
        redirect('dosen', 'refresh');
    }


    public function edit($id_dosen)
    {

        $data['title'] = 'Form Edit Data Dosen';
        $data['dosen'] = $this->dosen_model->getDosenByID($id_dosen);

        $this->load->library('form_validation');

        //$this->form_validation->set_rules('fielname', 'fieldlabel', 'trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('nip', 'Nip', 'required|numeric');
        $this->form_validation->set_rules('nama_dosen', 'Nama', 'required');

        if ($this->form_validation->run() == FALSE) {
            # code...
            $this->load->view('admin/header_login', $data);
            $this->load->view('dosen/edit', $data);
            $this->load->view('template/footer');
        } else {
            # code...
            $this->dosen_model->ubahdatadosen();
            // untuk flashdata mmepunyai 2 parameter (nama flashdata/alias, isi dari flashdatanya)
            $this->session->set_flashdata('flash-data', 'diedit');
            redirect('dosen', 'refresh');
        }
    }
    public function cetakLaporan()
    {
        $data['title'] = 'Laporan Dosen';
        $data['dosen'] = $this->cetak_model->viewDosen();
        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan_dosen.pdf";
        $this->pdf->load_view('dosen/laporan', $data);
    }
}

/* End of file Dosen.php */
