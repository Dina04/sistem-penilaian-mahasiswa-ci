<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Nilai extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data transaksi
    public function index_get()
    {
        // Users from a data store e.g. database
        $id = $this->get('id_nilai');

        // If the id parameter doesn't exist return all the users

        if ($id === NULL) {
            $this->db->select('*');
            $this->db->from('nilai n');
            $this->db->join('mahasiswa m', 'm.id_mahasiswa = n.id_mahasiswa');
            $this->db->join('dosen d', 'd.id_dosen= n.id_dosen');
            $this->db->join('matakuliah mk', 'mk.id_matakuliah = n.id_matakuliah');

            $nilai = $this->db->get()->result_array();
            // Check if the users data store contains users (in case the database result returns NULL)
            if ($nilai) {
                // Set the response and exit
                $this->response($nilai, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            } else {
                // Set the response and exit
                $this->response([
                    'status' => FALSE,
                    'message' => 'Nilai Tidak Ditemukan'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }

        // Find and return a single record for a particular user.
        else {
            $id = (int) $id;

            // Validate the id.
            if ($id <= 0) {
                // Invalid id, set the response and exit.
                $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
            }

            $this->db->query("select * from nilai n join mahasiswa m on m.id_mahasiswa = n.id_mahasiswa join dosen d on d.id_dosen = n.id_dosen join matakuliah mk on mk.id_matakuliah = n.id_matakuliah order by n.id_nilai DESC");
            $nilai = $this->db->get("nilai")->row_array();


            $this->response($nilai, REST_Controller::HTTP_OK);
        }
    }

    //Mengirim atau menambah data kontak baru
    function index_post()
    {
        $data = array(
            'id_nilai'           => $this->post('id_nilai'),
            'id_dosen'          => $this->post('id_dosen'),
            'id_matakuliah'    => $this->post('id_matakuliah'),
            'id_mahasiswa'    => $this->post('id_mahasiswa'),
            'nilai' => $this->post('nilai')
        );
        $insert = $this->db->insert('nilai', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Memperbarui data kontak yang telah ada
    public function index_put()
    {

        $data = array(
            'id_nilai'           => $this->put('id_nilai'),
            'id_dosen'          => $this->put('id_dosen'),
            'id_matakuliah'    => $this->put('id_matakuliah'),
            'id_mahasiswa'    => $this->put('id_mahasiswa'),
            'nilai' => $this->put('nilai')
        );
        $this->db->where('id_nilai', $this->put('id_nilai'));
        $this->db->update('nilai', $data);

        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }

    //Masukan function selanjutnya disini

    //Menghapus salah satu data kontak
    function index_delete()
    {
        $id = $this->delete('id_nilai');

        $where = [
            'id_nilai' => $id,
        ];

        $this->db->delete("nilai", $where);
        $message = array('status' => 'success');

        $this->set_response($message, REST_Controller::HTTP_NO_CONTENT);
    }
}
