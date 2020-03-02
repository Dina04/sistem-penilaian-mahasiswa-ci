<?php

defined('BASEPATH') or exit('No direct script access allowed');

class matakuliah_model extends CI_Model
{

    public function getAllMataKuliah()
    {
        return $this->db->get('matakuliah')->result_array();
    }

    public function tambahdatamatkul()
    {
        $data = [
            "kode_mk" => $this->input->post('kode_mk', true),
            "matakuliah" => $this->input->post('matakuliah', true), // ini sama dengan htmlspecialchars($_POST['nama])
            "sks" => $this->input->post('sks', true)
        ];
        // $this->db->insert('Table', $object);
        $this->db->insert('matakuliah', $data);
    }

    public function cariDataMatakuliah()
    {
        $keyword = $this->input->post('keyword');
        $this->db->like('matakuliah', $keyword);
        $this->db->or_like('kode_mk', $keyword);
        return $this->db->get('matakuliah')->result_array();
    }
    public function getMatakuliahByID($id_matakuliah)
    {
        return $this->db->get_where('matakuliah', ['id_matakuliah' => $id_matakuliah])->row_array();
    }
    public function hapusdatamk($id_matakuliah)
    {
        $this->db->where('id_matakuliah', $id_matakuliah);
        $this->db->delete('matakuliah');
    }
}

/* End of file Controllername.php */
