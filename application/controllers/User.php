<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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
        $data['title'] = "Landing";
        $data['user'] = $this->Users_model->getUserSession();
        $data['obat'] = $this->Obat_model->getAllObat();
        $this->load->view('user/user_landing', $data);
    }

    public function about()
    {
        $this->load->view('user/user_about');
    }
}
