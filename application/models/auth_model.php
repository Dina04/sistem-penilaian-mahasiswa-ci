<?php

defined('BASEPATH') or exit('No direct script access allowed');

class auth_model extends CI_Model
{

    public function login($username, $password)
    {
        //var_dump($username)
        //var_dump($password)
        //die();
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $username); //maksudnya adalah selama inputan user yang disimpan pada parameter$user sama dengan username
        $this->db->where('password', $password);
        $this->db->limit(1); //maksudnya data yg diambil cuma 1

        $query = $this->db->get();
        if ($query->num_rows() == 1) //jika data ditemukan
        {
            return $query->result();
        } else {
            return false;
        }
    }

    public function register()
    {
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'username' => htmlspecialchars($this->input->post('username', true)),
            'password' => htmlspecialchars(MD5($this->input->post('password'))),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'notelp' => htmlspecialchars($this->input->post('notelp', true)),
            'level' => 'user',
            'status' => 'Tidak Aktif'
        ];
        $this->db->insert('user', $data);
    }
}

/* End of file auth_model.php */
