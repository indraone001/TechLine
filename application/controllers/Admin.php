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

    public function obat()
    {
        $data['title'] = "Obat";
        $data['user'] = $this->Users_model->getUserSession();
        $data['obat'] = $this->Obat_model->getAllObat();
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('user/admin_obat', $data);
        $this->load->view('templates/admin_footer');
    }

    public function delete()
    {
        if ($this->Obat_model->deleteObat() == false) {
            $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Delete success!</strong> data has been deleted!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('admin/obat');
        } else {
            echo 'gagal';
        }
    }

    public function edit()
    {
        if ($this->Obat_model->editObat() == false) {
            $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edit success!</strong> data has been eddited!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('admin/obat');
        } else {
            echo 'gagal';
        }
    }

    public function insert()
    {
        if ($this->Obat_model->addObat() == false) {
            $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Insert data success!</strong> data has been added!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('admin/obat');
        } else {
            echo 'gagal';
        }
    }

    public function account()
    {
        $data['title'] = "Obat";
        $data['user'] = $this->Users_model->getUserSession();
        $data['obat'] = $this->Users_model->getAllUsers();
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('user/admin_obat', $data);
        $this->load->view('templates/admin_footer');
    }
}
