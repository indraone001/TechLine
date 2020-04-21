<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'file'));
        $this->load->library(array('form_validation', 'session'));
        $this->load->model('Users_model');
        $this->load->model('Obat_model');
        $this->load->model('Cart_model');
    }

    public function index()
    {
        if (!$_SESSION['email_user']) {
            redirect('auth');
        }
        //get transaction
        $data['transaksi'] = $this->Cart_model->getTrans();
        $data['success'] = $this->Cart_model->getSuccess();

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
        if (!$_SESSION['email_user']) {
            redirect('auth');
        }
        //get transaction
        $data['transaksi'] = $this->Cart_model->getTrans();

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
        if (!$_SESSION['email_user']) {
            redirect('auth');
        }

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
        if (!$_SESSION['email_user']) {
            redirect('auth');
        }

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
        if (!$_SESSION['email_user']) {
            redirect('auth');
        }

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
        if (!$_SESSION['email_user']) {
            redirect('auth');
        }
        //get transaction
        $data['transaksi'] = $this->Cart_model->getTrans();

        $data['title'] = "Obat";
        $data['user'] = $this->Users_model->getUserSession();
        $data['account'] = $this->Users_model->getUsers();
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('user/admin_account', $data);
        $this->load->view('templates/admin_footer');
    }

    public function deleteUser()
    {
        if (!$_SESSION['email_user']) {
            redirect('auth');
        }

        if ($this->Users_model->delete() == false) {
            $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Delete success!</strong> user has been deleted!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('admin/account');
        } else {
            echo 'gagal';
        }
    }

    public function editUser()
    {
        if (!$_SESSION['email_user']) {
            redirect('auth');
        }

        //image upload
        $config['upload_path']          = 'assets/img/users';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 10000;
        $config['max_width']            = 10000;
        $config['max_height']           = 10000;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('userfile')) {
            // print_r($this->upload->display_errors());
            $image = $this->input->post('recentImage');
        } else {
            $result = $this->upload->data();
            $image = $result['file_name'];
        }

        if ($this->Users_model->edit($image) == false) {
            $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edit success!</strong> User has been eddited!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('admin/account');
        } else {
            echo 'gagal';
        }
    }

    public function transaksi()
    {
        if (!$_SESSION['email_user']) {
            redirect('auth');
        }

        $data['title'] = "Transaksi";
        $data['user'] = $this->Users_model->getUserSession();
        $data['transaksi'] = $this->Cart_model->getTrans();
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('user/admin_transaksi', $data);
        $this->load->view('templates/admin_footer');
    }

    public function proccess_transaksi()
    {
        if (!$_SESSION['email_user']) {
            redirect('auth');
        }

        $id_transaksi = $this->input->post('id_transaksi');


        if ($this->Cart_model->Proccess($id_transaksi) == false) {
            $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Transaction has been proccess!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('admin/transaksi');
        } else {
            $this->session->set_flashdata('message', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Failed!</strong> Out of Stock!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('admin/transaksi');
        }
    }
}
