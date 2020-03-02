<?php

defined('BASEPATH') or exit('No direct script access allowed');

class dosen_model extends CI_Model
{

    public function getAllDosen()
    {

        //atau bisa juga menggunakan code berikut
        return $this->db->get('dosen')->result_array();
    }

    public function tambahdatadosen()
    {
        $data = [
            "nip" => $this->input->post('nip', true), // ini sama dengan htmlspecialchars($_POST['nama])
            "nama_dosen" => $this->input->post('nama_dosen', true),
            "jeniskelamin" => $this->input->post('jeniskelamin', true),
            "alamat" => $this->input->post('alamat', true),
            "email" => $this->input->post('email', true),
        ];
        // $this->db->insert('Table', $object);
        $this->db->insert('dosen', $data);
    }

    public function hapusdatadosen($id_dosen)
    {
        $this->db->where('id_dosen', $id_dosen);
        $this->db->delete('dosen');
    }

    public function ubahdatadosen()
    {
        $data = [
            "nip" => $this->input->post('nip', true), // ini sama dengan htmlspecialchars($_POST['nama])
            "nama_dosen" => $this->input->post('nama_dosen', true),
            "jeniskelamin" => $this->input->post('jeniskelamin', true),
            "alamat" => $this->input->post('alamat', true),
            "email" => $this->input->post('email', true),
        ];
        $this->db->where('id_dosen', $this->input->post('id_dosen'));
        $this->db->update('dosen', $data);
    }

    public function getDosenByID($id_dosen)
    {
        return $this->db->get_where('dosen', ['id_dosen' => $id_dosen])->row_array();
    }
}

/* End of file dosen_model.php */
