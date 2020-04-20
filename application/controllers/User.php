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
        $this->load->model('Cart_model');
    }

    public function index()
    {
        if (!$_SESSION['email_user']) {
            redirect('auth');
        }

        $data['title'] = "Landing";
        $data['category'] = "All Items";
        $data['user'] = $this->Users_model->getUserSession();
        $data['obat'] = $this->Obat_model->getAllObat();
        $this->load->view('templates/user_header', $data);
        $this->load->view('user/user_landing', $data);
        $this->load->view('templates/user_footer', $data);
    }

    public function sort()
    {
        if (!$_SESSION['email_user']) {
            redirect('auth');
        }

        $data['title'] = "Landing";
        $data['category'] = $_GET['id'];
        $data['user'] = $this->Users_model->getUserSession();
        $data['obat'] = $this->Obat_model->getSortObat();
        $this->load->view('templates/user_header', $data);
        $this->load->view('user/user_landing', $data);
        $this->load->view('templates/user_footer', $data);
    }

    public function about()
    {
        if (!$_SESSION['email_user']) {
            redirect('auth');
        }

        $data['title'] = "About";
        $this->load->view('user/user_about', $data);
    }

    public function cart()
    {
        if (!$_SESSION['email_user']) {
            redirect('auth');
        }
        $id = $_SESSION['id'];
        $data['title'] = "Cart";
        $data['user'] = $this->Users_model->getUserSession();
        $data['cart'] = $this->Cart_model->getCart($id);
        $this->load->view('templates/cart_header', $data);
        $this->load->view('user/user_cart', $data);
        $this->load->view('templates/user_footer', $data);
    }

    public function cartDelete()
    {
        if (!$_SESSION['email_user']) {
            redirect('auth');
        }

        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Transaction has been canceled!</div>');

        $data['user'] = $this->Cart_model->deleteCart();
        redirect('user/cart');
    }

    public function cartPay()
    {
        if (!$_SESSION['email_user']) {
            redirect('auth');
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Transaction will be process!</div>');

        $data['user'] = $this->Cart_model->Pay();
        redirect('user/cart');
    }

    public function historyDelete()
    {
        if (!$_SESSION['email_user']) {
            redirect('auth');
        }

        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">History transaction has been deleted!</div>');

        $data['user'] = $this->Cart_model->deleteCart();
    }
}
