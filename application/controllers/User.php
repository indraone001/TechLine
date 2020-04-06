<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function index()
    {
        $data['user'] = $this->db->get_where('Users', ['email_user' => $this->session->userdata('email_user')])->row_array();
        echo 'hello' . $data['user']['nama_user'];
    }
}
