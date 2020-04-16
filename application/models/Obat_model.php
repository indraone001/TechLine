<?php

class Obat_model extends CI_model
{

    public function getAllObat()
    {
        return $this->db->get('Obat')->result();
    }

    public function getSortObat()
    {
        $obat = $this->input->get('id');
        return $this->db->get_where('Obat', ['jenis_obat' => $obat])->result();
    }
}
