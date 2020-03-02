<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dosen extends CI_Controller
{
    public function __construct()
    {
        //digunakan untuk menjalankan fungsi constrauct pada class parrent(ci_controller)
        parent::__construct();
        $this->load->model('dosen_model');
    }

    public function index()
    {
        $this->load->model('dosen_model');

        $data['title'] = 'List Dosen';
        $data['dosen'] = $this->dosen_model->getAllDosen();
        $this->load->view('template/header', $data);
        $this->load->view('dosen/index', $data);
        $this->load->view('template/footer');
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
            $this->load->view('template/header', $data);
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
}

/* End of file Dosen.php */
