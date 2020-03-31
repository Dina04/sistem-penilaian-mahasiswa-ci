<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cetak_model extends CI_Model
{
    public function viewMatakuliah()
    {
        $this->db->select('kode_mk, matakuliah, sks');
        $query = $this->db->get('matakuliah');
        return $query->result();
    }
    public function viewMahasiswa()
    {
        $this->db->select('*');
        $query = $this->db->get('mahasiswa');
        return $query->result();
    }
    public function viewDosen()
    {
        $this->db->select('*');
        $query = $this->db->get('dosen');
        return $query->result();
    }

    public function viewNilai()
    {
        $query = $this->db->query("select * from nilai n join mahasiswa m on m.id_mahasiswa = n.id_mahasiswa join dosen d on d.id_dosen = n.id_dosen join matakuliah mk on mk.id_matakuliah = n.id_matakuliah");
        return $query->result();
    }

    public function viewUser()
    {
        $this->db->select('*');
        $query = $this->db->get('user');
        return $query->result();
    }
}
