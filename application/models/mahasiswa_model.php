<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model
{

    public function getAllMahasiswa()
    {

        //atau bisa juga menggunakan code berikut
        $query = $this->db->query("select * from mahasiswa");
        return $query->result_array();
    }
    public function tambahdatamhs()
    {
        $data = [
            "nim" => $this->input->post('nim', true), // ini sama dengan htmlspecialchars($_POST['nama])
            "nama" => $this->input->post('nama', true),
            "jeniskelamin" => $this->input->post('jeniskelamin', true),
            "alamat" => $this->input->post('alamat', true),
            "jurusan" => $this->input->post('jurusan', true),
        ];
        // $this->db->insert('Table', $object);
        $this->db->insert('mahasiswa', $data);
    }
    public function hapusdatamhs($id_mahasiswa)
    {
        $this->db->where('id_mahasiswa', $id_mahasiswa);
        $this->db->delete('mahasiswa');
    }
    public function getMahasiswaByID($id_mahasiswa)
    {
        return $this->db->get_where('mahasiswa', ['id_mahasiswa' => $id_mahasiswa])->row_array();
    }
    public function ubahdatamhs()
    {
        $data = [
            "nim" => $this->input->post('nim', true), // ini sama dengan htmlspecialchars($_POST['nama])
            "nama" => $this->input->post('nama', true),
            "jeniskelamin" => $this->input->post('jeniskelamin', true),
            "alamat" => $this->input->post('alamat', true),
            "jurusan" => $this->input->post('jurusan', true),
        ];
        $this->db->where('id_mahasiswa', $this->input->post('id_mahasiswa'));
        $this->db->update('mahasiswa', $data);
    }
    public function cariDataMahasiswa()
    {
        $keyword = $this->input->post('keyword');
        $this->db->like('nim', $keyword);
        $this->db->or_like('nama', $keyword);
        return $this->db->get('mahasiswa')->result_array();
    }
    public function datatabels()
    {
        $query = $this->db->order_by('id_mahasiswa', 'DESC')->get('mahasiswa');
        return $query->result();
    }
}

/* End of file Controllername.php */
