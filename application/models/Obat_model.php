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

    public function deleteObat()
    {
        $id_obat = $this->input->post('id_obat');
        $this->db->delete('Obat', array('id_obat' => $id_obat));
        return;
    }

    public function editObat()
    {
        $id_obat = $this->input->post('id_obat');
        $nama_obat = $this->input->post('nama_obat');
        $jenis_obat = $this->input->post('jenis_obat');
        $tgl_pembuatan = $this->input->post('tgl_pembuatan');
        $tgl_kadaluarsa = $this->input->post('tgl_kadaluarsa');
        $Harga = $this->input->post('Harga');
        $deskripsi = $this->input->post('deskripsi');
        $kuantitas = $this->input->post('kuantitas');
        switch ($jenis_obat) {
            case 'capsule':
                $image = 'capsule.png';
                break;
            case 'tablet':
                $image = 'tablet.png';
                break;
            case 'syrup':
                $image = 'syrup.png';
                break;
            default:
                $image = 'medicine.png';
                break;
        }

        $data = array(
            'id_obat' => $id_obat,
            'nama_obat' => $nama_obat,
            'jenis_obat' => $jenis_obat,
            'tgl_pembuatan' => $tgl_pembuatan,
            'tgl_kadaluarsa' => $tgl_kadaluarsa,
            'Harga' => $Harga,
            'deskripsi' => $deskripsi,
            'kuantitas' => $kuantitas,
            'image' => $image,
            'date_created' => time(),
        );

        $where = array(
            'id_obat' => $id_obat
        );

        $this->db->where($where);
        $this->db->update('Obat', $data);
        return;
    }

    public function addObat()
    {
        $nama_obat = $this->input->post('nama_obat');
        $jenis_obat = $this->input->post('jenis_obat');
        $tgl_pembuatan = $this->input->post('tgl_pembuatan');
        $tgl_kadaluarsa = $this->input->post('tgl_kadaluarsa');
        $Harga = $this->input->post('Harga');
        $deskripsi = $this->input->post('deskripsi');
        $kuantitas = $this->input->post('kuantitas');
        switch ($jenis_obat) {
            case 'Capsule':
                $image = 'capsule.png';
                break;
            case 'Tablet':
                $image = 'tablet.png';
                break;
            case 'Syrup':
                $image = 'syrup.png';
                break;

            default:
                $image = 'medicine.png';
                break;
        }

        $data = array(
            'nama_obat' => $nama_obat,
            'jenis_obat' => $jenis_obat,
            'tgl_pembuatan' => $tgl_pembuatan,
            'tgl_kadaluarsa' => $tgl_kadaluarsa,
            'Harga' => $Harga,
            'deskripsi' => $deskripsi,
            'kuantitas' => $kuantitas,
            'image' => $image,
            'date_created' => time(),
        );

        $this->db->insert('Obat', $data);
        return;
    }
}
