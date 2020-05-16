<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Nilai extends CI_Controller
{
    public function __construct()
    {
        //digunakan untuk menjalankan fungsi constrauct pada class parrent(ci_controller)
        parent::__construct();
        $this->load->model('Nilai_model');
        $this->load->model('Matakuliah_model');
        $this->load->model('Mahasiswa_model');
        $this->load->model('Dosen_model');
        $this->load->model('Cetak_model');
    }


    public function index()
    {

        $data['title'] = 'List Nilai';
        $data['nilai'] = $this->Nilai_model->datatabels();
        if ($this->input->post('keyword')) {
            #code...
            $data['nilai'] = $this->Nilai_model->cariDataNilai();
        }
        $status_login = $this->session->userdata('level');
        if ($status_login == 'admin') {
            $this->load->view('admin/header_login', $data);
            $this->load->view('nilai/index', $data);
            $this->load->view('template/footer');
        } elseif ($status_login == 'user') {
            $this->load->view('template/header', $data);
            $this->load->view('nilai/index', $data);
            $this->load->view('template/footer');
        } elseif ($status_login == 'dosen') {
            $this->load->view('dosen1/header_login', $data);
            $this->load->view('nilai/index', $data);
            $this->load->view('template/footer');
        } else {
            redirect('auth', 'refresh');
        }
        // $this->load->view('template/header', $data);
        // $this->load->view('nilai/index', $data);
        // $this->load->view('template/footer');
    }
    public function tambah()
    {

        $data['title'] = 'Form Menambahkan Data Nilai';
        $this->load->library('form_validation');
        $this->load->model('Mahasiswa_model');
        $this->load->model('Dosen_model');
        $this->load->model('Matakuliah_model');
        $data['dosen'] = $this->Dosen_model->getAllDosen();
        $data['mahasiswa'] = $this->Mahasiswa_model->getAllMahasiswa();
        $data['matakuliah'] = $this->Matakuliah_model->getAllMataKuliah();
        $this->form_validation->set_rules('id_dosen', 'Id_dosen', 'trim|required');
        $this->form_validation->set_rules('id_matakuliah', 'Id_matakuliah', 'trim|required');
        $this->form_validation->set_rules('id_mahasiswa', 'Id_mahasiswa', 'trim|required');
        $this->form_validation->set_rules('nilai', 'Nilai', 'trim|required');


        if ($this->form_validation->run() == FALSE) {
            # code...
            $this->load->view('dosen1/header_login', $data);
            $this->load->view('nilai/tambah', $data);
            $this->load->view('template/footer');
        } else {
            # code...
            $this->Nilai_model->tambahdatanilai();
            // untuk flashdata mmepunyai 2 parameter (nama flashdata/alias, isi dari flashdatanya)
            $this->session->set_flashdata('flash-data', 'ditambahkan');
            redirect('nilai', 'refresh');
        }
    }
    public function hapus($id_nilai)
    {
        $this->Nilai_model->hapusdatanilai($id_nilai);
        // untuk flashdata mmepunyai 2 parameter (nama flashdata/alias, isi dari flashdatanya)
        $this->session->set_flashdata('flash-data', 'dihapus');
        redirect('nilai', 'refresh');
    }
    public function edit($id_nilai)
    {

        $data['title'] = 'Form Edit Data Nilai';
        $data['nilai'] = $this->Nilai_model->getNilaiByID($id_nilai);
        $data['dosen'] = $this->Nilai_model->selectDosen();
        $data['mahasiswa'] = $this->Nilai_model->selectMahasiswa();
        $data['matakuliah'] = $this->Nilai_model->selectMatakuliah();
        $this->load->library('form_validation');

        //$this->form_validation->set_rules('fielname', 'fieldlabel', 'trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('nilai', 'Nilai', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            # code...
            $this->load->view('dosen1/header_login', $data);
            $this->load->view('nilai/edit', $data);
            $this->load->view('template/footer');
        } else {
            # code...
            $this->Nilai_model->ubahdatanilai();
            // untuk flashdata mmepunyai 2 parameter (nama flashdata/alias, isi dari flashdatanya)
            $this->session->set_flashdata('flash-data', 'diedit');
            redirect('nilai', 'refresh');
        }
    }

    public function detail($id_matakuliah, $id_dosen, $id_mahasiswa, $id_nilai)
    {
        $data['title'] = 'Detail Nilai';
        $data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswaByID($id_mahasiswa);
        $data['nilai'] = $this->Nilai_model->getNilaiByID($id_nilai);
        $data['dosen'] = $this->Dosen_model->getDosenByID($id_dosen);
        $data['matakuliah'] = $this->Matakuliah_model->getMatakuliahByID($id_matakuliah);
        $this->load->view('dosen1/header_login', $data);
        $this->load->view('nilai/detail', $data);
        $this->load->view('template/footer');
    }

    public function detailUser($id_matakuliah, $id_dosen, $id_mahasiswa, $id_nilai)
    {
        $data['title'] = 'Detail Nilai';
        $data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswaByID($id_mahasiswa);
        $data['nilai'] = $this->Nilai_model->getNilaiByID($id_nilai);
        $data['dosen'] = $this->Dosen_model->getDosenByID($id_dosen);
        $data['matakuliah'] = $this->Matakuliah_model->getMatakuliahByID($id_matakuliah);
        $this->load->view('template/header', $data);
        $this->load->view('nilai/detail', $data);
        $this->load->view('template/footer');
    }
    public function cetakLaporan()
    {
        $data['title'] = 'Laporan Nilai';
        $data['nilai'] = $this->Cetak_model->viewNilai();
        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->filename = "laporan_nilai.pdf";
        $this->pdf->load_view('nilai/laporan', $data);
    }
}
/* End of file nilai.php */
