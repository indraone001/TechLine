<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation', 'session'));
        $this->load->model('Users_model');
    }

    public function index()
    {
        $data['title'] = 'Login';
        $this->load->view('templates/auth_header', $data);
        $this->load->view('auth/login');
        $this->load->view('templates/auth_footer');
    }

    public function register()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[Users.email_user]', [
            'is_unique' => 'This email has already registered!',
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|matches[repeatpassword]', [
            'matches' => 'Password miss match!',
            'min_length' => 'Password too short!',
            'required' => 'Password required!',
        ]);
        $this->form_validation->set_rules('repeatpassword', 'RepeatPassword', 'required|trim|matches[password]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Register';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/register');
            $this->load->view('templates/auth_footer');
        } else {
            $this->Users_model->addUser();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">contact admin for verify account!</div>');
            redirect('auth');
        }
    }

    public function login()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->Users_model->getUser();
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email_user');
        $this->session->unset_userdata('role_id');
        $this->session->unset_userdata('id_user');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been Logged out!</div>');
        redirect('auth');
    }
}
