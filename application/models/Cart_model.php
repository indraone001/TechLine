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

    public function getCart()
    {
        $id = 8;
        $this->db->select('Transaksi.*, Cart.jumlah_obat, Obat.*');
        $this->db->from('Transaksi, Cart, Obat');
        $this->db->where('Transaksi.id_item = Cart.id_item');
        $this->db->where('Cart.id_obat = Obat.id_obat');
        $this->db->where('Transaksi.id_user', $id);
        $query = $this->db->get();
        return $query->result();
    }
}
