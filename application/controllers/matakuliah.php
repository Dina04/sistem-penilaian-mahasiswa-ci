<?php

defined('BASEPATH') or exit('No direct script access allowed');

class matakuliah extends CI_Controller
{
    public function __construct()
    {
        //digunakan untuk menjalankan fungsi constrauct pada class parrent(ci_controller)
        parent::__construct();
        $this->load->model('matakuliah_model');
    }


    public function index()
    {
        $this->load->model('matakuliah_model');
        $data['title'] = 'List Matakuliah';
        $data['matakuliah'] = $this->matakuliah_model->getAllMataKuliah();
        if ($this->input->post('keyword')) {
            #code...
            $data['matakuliah'] = $this->matakuliah_model->cariDataMatakuliah();
        }
        $this->load->view('template/header', $data);
        $this->load->view('matakuliah/index', $data);
        $this->load->view('template/footer');
    }
    public function tambah()
    {

        $data['title'] = 'Form Menambahkan Data Matakuliah';
        $this->load->library('form_validation');

        //$this->form_validation->set_rules('fielname', 'fieldlabel', 'trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('kode_mk', 'Kode_mk', 'required');
        $this->form_validation->set_rules('matakuliah', 'Matakuliah', 'required');
        $this->form_validation->set_rules('sks', 'Sks', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            # code...
            $this->load->view('template/header', $data);
            $this->load->view('matakuliah/tambah', $data);
            $this->load->view('template/footer');
        } else {
            # code...
            $this->matakuliah_model->tambahdatamatkul();
            // untuk flashdata mmepunyai 2 parameter (nama flashdata/alias, isi dari flashdatanya)
            $this->session->set_flashdata('flash-data', 'ditambahkan');
            redirect('matakuliah', 'refresh');
        }
    }
    public function detail($id_matakuliah)
    {
        $data['title'] = 'Detail Matakuliah';
        $data['matakuliah'] = $this->matakuliah_model->getMatakuliahByID($id_matakuliah);
        $this->load->view('template/header', $data);
        $this->load->view('matakuliah/detail', $data);
        $this->load->view('template/footer');
    }
    public function hapus($id_matakuliah)
    {
        $this->matakuliah_model->hapusdatamk($id_matakuliah);
        // untuk flashdata mmepunyai 2 parameter (nama flashdata/alias, isi dari flashdatanya)
        $this->session->set_flashdata('flash-data', 'dihapus');
        redirect('matakuliah', 'refresh');
    }
}

/* End of file Controllername.php */
