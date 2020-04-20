<?php

class Cart_model extends CI_model
{

    public function getAllTrans()
    {
        return $this->db->get('Cart')->result_array();
    }

    public function getTrans()
    {
        return $this->db->get('Users')->result();
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
}
