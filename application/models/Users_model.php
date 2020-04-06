<?php

class Users_model extends CI_model
{

    public function getAllUsers()
    {
        return $this->db->get('Users')->result_array();
    }

    public function addUser()
    {
        $data = [
            'nama_user' => $this->input->post('username'),
            'password_user' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'email_user' => $this->input->post('email'),
            'alamat_user' => "",
            'no_telp' => "",
            'image' => "default",
            'role_id' => "2",
            'is_active' => "1",
            'date_created' => time(),
        ];


        return $this->db->insert('Users', $data);
    }
}
