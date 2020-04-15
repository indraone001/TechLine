<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation', 'session'));
        $this->load->model('Users_model');
        $this->load->model('Obat_model');
    }

    public function index()
    {
        $data['title'] = "Admin";
        $data['user'] = $this->Users_model->getUserSession();
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('user/admin_dashboard', $data);
        $this->load->view('templates/admin_footer');
    }
}
