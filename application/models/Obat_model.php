<?php

class Obat_model extends CI_model
{

    public function getAllObat()
    {
        return $this->db->get('Obat')->result();
    }
}
