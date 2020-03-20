<?php

defined('BASEPATH') or exit('No direct script access allowed');

class matakuliah_model extends CI_Model
{

    public function getAllMataKuliah()
    {
        $query = $this->db->query("select * from matakuliah");
        return $query->result_array();
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
    public function ubahdatamk()
    {
        $data = [
            "matakuliah" => $this->input->post('matakuliah', true), // ini sama dengan htmlspecialchars($_POST['nama])
            "kode_mk" => $this->input->post('kode_mk', true),
            "sks" => $this->input->post('sks', true)
        ];
        $this->db->where('id_matakuliah', $this->input->post('id_matakuliah'));
        $this->db->update('matakuliah', $data);
    }
    public function hapusdatamk($id_matakuliah)
    {
        $this->db->where('id_matakuliah', $id_matakuliah);
        $this->db->delete('matakuliah');
    }
    public function datatabels()
    {
        $query = $this->db->order_by('id_matakuliah', 'DESC')->get('matakuliah');
        return $query->result();
    }
}

/* End of file Controllername.php */
