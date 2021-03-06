<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mahasiswa extends CI_Controller
{

    //fungsi yang akan dijalankan saat classnya diinstansiasi
    public function __construct()
    {
        //digunakan untuk menjalankan fungsi constrauct pada class parrent(ci_controller)
        parent::__construct();
        $this->load->model('Mahasiswa_model');
        $this->load->model('Cetak_model');
    }

    public function index()
    {
        $data = array(
            'title' => 'List Mahasiswa',
            'mahasiswa' =>  $this->Mahasiswa_model->datatabels()
        );

        //modul untuk load database
        //$this->load->database();
        // $data['title'] = 'List Mahasiswa';
        // $data['mahasiswa'] = $this->Mahasiswa_model->getAllMahasiswa();
        if ($this->input->post('keyword')) {
            #code...
            $data['mahasiswa'] = $this->Mahasiswa_model->cariDataMahasiswa();
        }
        $status_login = $this->session->userdata('level');
        if ($status_login == 'admin') {
            $this->load->view('admin/header_login', $data);
            $this->load->view('mahasiswa/index', $data);
            $this->load->view('template/footer');
        } elseif ($status_login == 'user') {
            $this->load->view('template/header', $data);
            $this->load->view('mahasiswa/index', $data);
            $this->load->view('template/footer');
        } elseif ($status_login == 'dosen') {
            $this->load->view('template/header', $data);
            $this->load->view('mahasiswa/index', $data);
            $this->load->view('template/footer');
        } else {
            redirect('auth', 'refresh');
        }
        // $this->load->view('template/header', $data);
        // $this->load->view('mahasiswa/index', $data);
        // $this->load->view('template/footer');
    }
    public function tambah()
    {

        $data['title'] = 'Form Menambahkan Data Mahasiswa';
        $data['jurusan'] = ['Teknik Informatika', 'Teknik Kimia', 'Teknik Industri', 'Teknik Mesin'];
        $this->load->library('form_validation');

        //$this->form_validation->set_rules('fielname', 'fieldlabel', 'trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nim', 'Nim', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            # code...
            $this->load->view('template/header', $data);
            $this->load->view('mahasiswa/tambah', $data);
            $this->load->view('template/footer');
        } else {
            # code...
            $this->Mahasiswa_model->tambahdatamhs();
            // untuk flashdata mmepunyai 2 parameter (nama flashdata/alias, isi dari flashdatanya)
            $this->session->set_flashdata('flash-data', 'ditambahkan');
            redirect('mahasiswa', 'refresh');
        }
    }
    public function hapus($id_mahasiswa)
    {
        $this->Mahasiswa_model->hapusdatamhs($id_mahasiswa);
        // untuk flashdata mmepunyai 2 parameter (nama flashdata/alias, isi dari flashdatanya)
        $this->session->set_flashdata('flash-data', 'dihapus');
        redirect('mahasiswa', 'refresh');
    }
    public function detail($id_mahasiswa)
    {
        $data['title'] = 'Detail Mahasiswa';
        $data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswaByID($id_mahasiswa);
        $this->load->view('template/header', $data);
        $this->load->view('mahasiswa/detail', $data);
        $this->load->view('template/footer');
    }
    public function edit($id_mahasiswa)
    {

        $data['title'] = 'Form Edit Data Mahasiswa';
        $data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswaByID($id_mahasiswa);
        $data['jurusan'] = ['Teknik Informatika', 'Teknik Kimia', 'Teknik Industri', 'Teknik Mesin'];

        $this->load->library('form_validation');

        //$this->form_validation->set_rules('fielname', 'fieldlabel', 'trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nim', 'Nim', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            # code...
            $this->load->view('template/header', $data);
            $this->load->view('mahasiswa/edit', $data);
            $this->load->view('template/footer');
        } else {
            # code...
            $this->Mahasiswa_model->ubahdatamhs();
            // untuk flashdata mmepunyai 2 parameter (nama flashdata/alias, isi dari flashdatanya)
            $this->session->set_flashdata('flash-data', 'diedit');
            redirect('mahasiswa', 'refresh');
        }
    }
    public function cetakLaporan()
    {
        $data['title'] = 'Laporan Mahasiswa';
        $data['mahasiswa'] = $this->Cetak_model->viewMahasiswa();
        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan_mahasiswa.pdf";
        $this->pdf->load_view('mahasiswa/laporan', $data);
    }
}
/* End of file Controllername.php */
