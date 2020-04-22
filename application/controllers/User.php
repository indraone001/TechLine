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

        //image upload
        $config['upload_path']          = 'assets/img/transfer';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 10000;
        $config['max_width']            = 10000;
        $config['max_height']           = 10000;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('userfile')) {
            // print_r($this->upload->display_errors());
            $image = "null";
        } else {
            $result = $this->upload->data();
            $image = $result['file_name'];
        }

        if ($image == "null") {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Upload Failed!</div>');
            redirect('user/cart');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Transaction will be process!</div>');
            $data['user'] = $this->Cart_model->Pay($image);
            redirect('user/cart');
        }
    }

    public function historyDelete()
    {
        if (!$_SESSION['email_user']) {
            redirect('auth');
        }

        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">History transaction has been deleted!</div>');

        $data['user'] = $this->Cart_model->deleteCart();
        redirect('user/cart');
    }

    public function order()
    {
        if (!$_SESSION['email_user']) {
            redirect('auth');
        }
        $id = $_SESSION['id'];
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Item has been added to your cart</div>');

        $data['user'] = $this->Cart_model->orderCart($id);
        redirect('user');
    }


    // update user 
    public function setting()
    {
        $data['title'] = "Edit_Pembeli";
        $data['user'] = $this->Users_model->getUserSession();

        $this->form_validation->set_rules('email_user', 'email user', 'required|trim');
        $this->form_validation->set_rules('nama_user', 'nama user', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/user_header', $data);
            $this->load->view('user/user_edit', $data);
        } else {
            $id_user = $this->input->post('id_user');
            $nama_user = $this->input->post('nama_user');
            $email_user = $this->input->post('email_user');
            $alamat_user = $this->input->post('alamat_user');
            $no_telp = $this->input->post('no_telp');
            $image_user = $_FILES['image'];

            // setingan image user 
            if ($image_user['name'] != null) {
                $config['upload_path']          = './assets/img/users';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = '2048';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/users/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }
            } else {
                // setingan jika tidak ada file yang di upload maka akan memunculkan gambar sblmnya
                $new_image = $data['user']['image'];
            }

            $data = array(
                'nama_user' => $nama_user,
                'email_user' => $email_user,
                'alamat_user' => $alamat_user,
                'no_telp' => $no_telp,
                'image' => $new_image,
            );

            $where = array(
                'id_user' => $id_user
            );
            $this->db->where($where);
            $this->db->update('Users', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profil anda telah diupdate!</div>');
            redirect('/user/ShowProfile');
        }
    }

    public function ShowProfile()
    {
        $data['title'] = "Profile pembeli";
        $data['user'] = $this->Users_model->getUserSession();
        $this->load->view('templates/user_header', $data);
        $this->load->view('user/user_profile', $data);
    }

    public function ChangePassword()
    {
        $data['title'] = "Change Password";
        $data['user'] = $this->Users_model->getUserSession();

        $this->form_validation->set_rules('password_user', 'Password lama', 'required|trim');
        $this->form_validation->set_rules('password_baru', 'Password baru', 'required|trim|min_length[8]|matches[re_password_baru]');
        $this->form_validation->set_rules('re_password_baru', 'ketik ulang Password baru', 'required|trim|min_length[8]|matches[password_baru]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/user_header', $data);
            $this->load->view('user/user_changepass', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Lengkapi field yang ada!</div>');
        } else {
            $id_user = $this->input->post('id_user');
            $password_user = $this->input->post('password_user');
            $password_baru = $this->input->post('password_baru');
            if (!password_verify($password_user, $data['user']['password_user'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password lama anda salah!</div>');
                redirect('/user/ChangePassword');
            } else {
                if ($password_user == $password_baru) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password baru dan lama anda sama!</div>');
                    redirect('/user/ChangePassword');
                } else {
                    $password_hash = password_hash($password_baru, PASSWORD_DEFAULT);

                    $where = array(
                        'id_user' => $id_user
                    );
                    $this->db->where($where);
                    $this->db->set('password_user', $password_hash);

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password anda telah diupdate!</div>');
                    redirect('/user/ShowProfile');
                }
            }
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

        if ($this->Users_model->editImage($image) == false) {
            $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edit success!</strong> User has been eddited!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('/user/ShowProfile');
        } else {
            echo 'gagal';
        }
    }
}
