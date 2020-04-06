<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Admin";
        $data['user'] = $this->db->get_where('Users', ['email_user' => $this->session->userdata('email_user')])->row_array();
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('user/admin_dashboard', $data);
        $this->load->view('templates/admin_footer');
    }
}
