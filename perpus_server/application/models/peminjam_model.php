<?php

defined('BASEPATH') or exit('No direct script access allowed');

class peminjam_model extends CI_Model
{
    public function getPeminjam($id_peminjam = null)
    {
        if ($id_peminjam === null) {
            return $this->db->get('peminjam')->result_array();
        } else {
            return $this->db->get_where('peminjam', ['id_peminjam' => $id_peminjam])->result_array();
        }
    }

    public function createPeminjam($data)
    {
        $this->db->insert('peminjam', $data);
        return $this->db->affected_rows();
    }

    public function updatePeminjam($data, $id_peminjam)
    {
        $this->db->update('peminjam', $data, ['id_peminjam' => $id_peminjam]);
        return $this->db->affected_rows();
    }

    public function deletePeminjam($id_peminjam)
    {
        $this->db->delete('peminjam', ['id_peminjam' => $id_peminjam]);
        return $this->db->affected_rows();
    }
}
