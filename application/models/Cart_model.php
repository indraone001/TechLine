<?php

class Cart_model extends CI_model
{

    public function getAllTrans()
    {
        return $this->db->get('Cart')->result_array();
    }

    public function getTrans()
    {
        $this->db->select('Transaksi.*, Cart.jumlah_obat, Obat.*, Users.nama_user');
        $this->db->from('Transaksi, Cart, Obat, Users');
        $this->db->where('Transaksi.id_item = Cart.id_item');
        $this->db->where('Transaksi.id_user = Users.id_user');
        $this->db->where('Cart.id_obat = Obat.id_obat');
        $this->db->where('status = 2');
        $query = $this->db->get();
        return $query->result();
    }

    public function getCart($id)
    {
        $this->db->select('Transaksi.*, Cart.jumlah_obat, Obat.*');
        $this->db->from('Transaksi, Cart, Obat');
        $this->db->where('Transaksi.id_item = Cart.id_item');
        $this->db->where('Cart.id_obat = Obat.id_obat');
        $this->db->where('Transaksi.id_user', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function deleteCart()
    {
        $id_transaksi = $this->input->post('id_transaksi');
        $id_item = $this->input->post('id_item');
        $this->db->delete('Transaksi', array('id_transaksi' => $id_transaksi));
        $this->db->delete('Cart', array('id_item' => $id_item));
        return;
    }

    public function Pay()
    {
        $id_user = $this->input->post('id_transaksi');

        $data = array(
            'status' => 2,
        );

        $where = array(
            'id_user' => $id_user,
            'status' => 0,
        );

        $this->db->where($where);
        $this->db->update('Transaksi', $data);
        return;
    }

    public function orderCart($id)
    {
        $id_obat = $this->input->post('id_obat');
        $jumlah_obat = $this->input->post('kuantity');

        $data = array(
            'id_obat' => $id_obat,
            'jumlah_obat' => $jumlah_obat,
        );

        $this->db->insert('Cart', $data);

        $id_item = $this->db->insert_id();
        $id_user = $id;
        $tanggal = date('Y-m-d');
        $status = 0;
        $harga = $this->input->post('harga');
        $total = $harga * $jumlah_obat;

        $dataTr = array(
            'id_item' => $id_item,
            'id_user' => $id_user,
            'tanggal' => $tanggal,
            'status' => $status,
            'total' => $total,
        );

        $this->db->insert('Transaksi', $dataTr);

        return;
    }

    public function Proccess($id_transaksi)
    {
        //get recent stock
        $id_obat = $this->input->post('id_obat');
        $data = $this->db->get_where('Obat', ['id_obat' => $id_obat])->row_array();
        $stock = $data['kuantitas'];

        //update recent stock
        $jumlah = $this->input->post('jumlah');
        $new_stock = $stock - $jumlah;
        if ($new_stock < 0) {
            return true;
        } else {
            $data = array(
                'kuantitas' => $new_stock,
            );
            $where = array(
                'id_obat' => $id_obat,
            );
            $this->db->where($where);
            $this->db->update('Obat', $data);

            //update process
            $data = array(
                'status' => 1,
            );
            $where = array(
                'id_transaksi' => $id_transaksi,
            );
            $this->db->where($where);
            $this->db->update('Transaksi', $data);

            return false;
        }
    }
}
