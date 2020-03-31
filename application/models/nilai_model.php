<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Nilai_model extends CI_Model
{

    public function getAllNilai()
    {

        //atau bisa juga menggunakan code berikut
        $this->db->select('*');
        $this->db->from('nilai n');
        $this->db->join('mahasiswa m', 'm.id_mahasiswa = n.id_mahasiswa');
        $this->db->join('dosen d', 'd.id_dosen= n.id_dosen');
        $this->db->join('matakuliah mk', 'mk.id_matakuliah = n.id_matakuliah');

        $query = $this->db->get();
        return $query->result_array();

        //return $this->db->get('nilai')->result_array();
    }
    public function getNilaiByID($id_nilai)
    {
        return $this->db->get_where('nilai', ['id_nilai' => $id_nilai])->row_array();
    }
    public function tambahdatanilai()
    {
        $data = [
            "id_dosen" => $this->input->post('id_dosen', true), // ini sama dengan htmlspecialchars($_POST['nama])
            "id_matakuliah" => $this->input->post('id_matakuliah', true),
            "id_mahasiswa" => $this->input->post('id_mahasiswa', true),
            "nilai" => $this->input->post('nilai', true)
        ];
        // $this->db->insert('Table', $object);
        $this->db->insert('nilai', $data);
    }
    public function cariDataNilai()
    {
        $keyword = $this->input->post('keyword');
        $this->db->distinct();
        $this->db->select('d.nama_dosen, m.nama, mk.matakuliah, n.nilai, n.id_nilai');
        $this->db->from('nilai n');
        $this->db->join('mahasiswa m', 'm.id_mahasiswa = n.id_mahasiswa');
        $this->db->join('dosen d', 'd.id_dosen= n.id_dosen');
        $this->db->join('matakuliah mk', 'mk.id_matakuliah = n.id_matakuliah');

        $this->db->like('n.nilai', $keyword);
        $this->db->or_like('d.nama_dosen', $keyword);
        $this->db->or_like('m.nama', $keyword);
        $this->db->or_like('mk.matakuliah', $keyword);
        return $this->db->get('nilai')->result_array();
    }
    public function hapusdatanilai($id_nilai)
    {
        $this->db->where('id_nilai', $id_nilai);
        $this->db->delete('nilai');
    }
    public function ubahdatanilai()
    {
        $data = [
            "id_dosen" => $this->input->post('id_dosen', true),
            "id_matakuliah" => $this->input->post('id_matakuliah', true),
            "id_mahasiswa" => $this->input->post('id_mahasiswa', true),
            "nilai" => $this->input->post('nilai', true)
        ];
        $this->db->where('id_nilai', $this->input->post('id_nilai'));
        $this->db->update('nilai', $data);
    }
    public function selectDosen()
    {
        $query = $this->db->get('dosen');
        return $query->result_array();
    }

    public function selectMahasiswa()
    {
        $query = $this->db->get('mahasiswa');
        return $query->result_array();
    }

    public function selectMatakuliah()
    {
        $query = $this->db->get('matakuliah');
        return $query->result_array();
    }
    public function datatabels()
    {
        $query = $this->db->query("select * from nilai n join mahasiswa m on m.id_mahasiswa = n.id_mahasiswa join dosen d on d.id_dosen = n.id_dosen join matakuliah mk on mk.id_matakuliah = n.id_matakuliah order by n.id_nilai DESC");
        return $query->result();
    }
<<<<<<< HEAD

    //tambahan untuk rest-server
    public function getNilai($id = null)
    {
        if ($id === null) {
            return $this->db->get('nilai')->result_array();
        } else {
            return $this->db->get_where('nilai', ['id_nilai' => $id])->result_array();
        }
    }
=======
>>>>>>> a88752d53e9ca38bb2ea73f31f72e373e4c1c612
}

/* End of file ModelName.php */
