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
            'nama_user' => htmlspecialchars($this->input->post('username')),
            'password_user' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'email_user' => htmlspecialchars($this->input->post('email')),
            'alamat_user' => "",
            'no_telp' => "",
            'image' => "default.jpg",
            'role_id' => "2",
            'is_active' => "1",
            'date_created' => time(),
        ];

        return $this->db->insert('Users', $data);
    }

    public function getUser()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('Users', ['email_user' => $email])->row_array();

        if ($user) {
            if ($user['is_active'] == 1) {
                if (password_verify($password, $user['password_user'])) {
                    $data = [
                        'email_user' => $user['email_user'],
                        'role_id' => $user['role_id'],
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 2) {
                        redirect('user');
                    } else {
                        redirect('admin');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email has not been activated!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered!</div>');
            redirect('auth');
        }
    }
}
