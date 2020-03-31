<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Matakuliah extends CI_Controller
{
    public function __construct()
    {
        //digunakan untuk menjalankan fungsi constrauct pada class parrent(ci_controller)
        parent::__construct();
        $this->load->model('Matakuliah_model');
        $this->load->model('Cetak_model');
    }


    public function index()
    {
        $data = array(
            'title' => 'List Matakuliah',
            'matakuliah' =>  $this->Matakuliah_model->datatabels()
        );
        // $this->load->model('Matakuliah_model');
        // $data['title'] = 'List Matakuliah';
        // $data['matakuliah'] = $this->Matakuliah_model->getAllMataKuliah();
        if ($this->input->post('keyword')) {
            #code...
            $data['matakuliah'] = $this->Matakuliah_model->cariDataMatakuliah();
        }
        $status_login = $this->session->userdata('level');
        if ($status_login == 'admin') {
            $this->load->view('admin/header_login', $data);
            $this->load->view('matakuliah/index', $data);
            $this->load->view('template/footer');
        } elseif ($status_login == 'user') {
            $this->load->view('template/header', $data);
            $this->load->view('matakuliah/index', $data);
            $this->load->view('template/footer');
        } elseif ($status_login == 'dosen') {
            $this->load->view('template/header', $data);
            $this->load->view('matakuliah/index', $data);
            $this->load->view('template/footer');
        } else {
            redirect('auth', 'refresh');
        }
        // $this->load->view('template/header', $data);
        // $this->load->view('matakuliah/index', $data);
        // $this->load->view('template/footer');
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
            $this->load->view('admin/header_login', $data);
            $this->load->view('matakuliah/tambah', $data);
            $this->load->view('template/footer');
        } else {
            # code...
            $this->Matakuliah_model->tambahdatamatkul();
            // untuk flashdata mmepunyai 2 parameter (nama flashdata/alias, isi dari flashdatanya)
            $this->session->set_flashdata('flash-data', 'ditambahkan');
            redirect('matakuliah', 'refresh');
        }
    }
    public function detail($id_matakuliah)
    {
        $data['title'] = 'Detail Matakuliah';
        $data['matakuliah'] = $this->Matakuliah_model->getMatakuliahByID($id_matakuliah);
        $this->load->view('admin/header_login', $data);
        $this->load->view('matakuliah/detail', $data);
        $this->load->view('template/footer');
    }
    public function edit($id_matakuliah)
    {

        $data['title'] = 'Form Edit Data Matakuliah';
        $data['matakuliah'] = $this->Matakuliah_model->getMatakuliahByID($id_matakuliah);

        $this->load->library('form_validation');

        //$this->form_validation->set_rules('fielname', 'fieldlabel', 'trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('matakuliah', 'Matakuliah', 'required');
        $this->form_validation->set_rules('kode_mk', 'Kode_mk', 'required');
        $this->form_validation->set_rules('sks', 'Sks', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            # code...
            $this->load->view('template/header', $data);
            $this->load->view('matakuliah/edit', $data);
            $this->load->view('template/footer');
        } else {
            # code...
            $this->Matakuliah_model->ubahdatamk();
            // untuk flashdata mmepunyai 2 parameter (nama flashdata/alias, isi dari flashdatanya)
            $this->session->set_flashdata('flash-data', 'diedit');
            redirect('matakuliah', 'refresh');
        }
    }
    public function hapus($id_matakuliah)
    {
        $this->Matakuliah_model->hapusdatamk($id_matakuliah);
        // untuk flashdata mmepunyai 2 parameter (nama flashdata/alias, isi dari flashdatanya)
        $this->session->set_flashdata('flash-data', 'dihapus');
        redirect('matakuliah', 'refresh');
    }
    public function cetakLaporan()
    {
        $data['title'] = 'Laporan Matakuliah';
        $data['matakuliah'] = $this->Cetak_model->viewMatakuliah();
        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan_matakuliah.pdf";
        $this->pdf->load_view('matakuliah/laporan', $data);
    }
}

/* End of file Controllername.php */
