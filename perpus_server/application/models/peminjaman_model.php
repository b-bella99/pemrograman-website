<?php

defined('BASEPATH') or exit('No direct script access allowed');

class peminjaman_model extends CI_Model
{
    public function getPeminjaman($id_transaksi = null)
    {
        if ($id_transaksi === null) {
            return $this->db->get('peminjaman')->result_array();
        } else {
            return $this->db->get_where('peminjaman', ['id_transaksi' => $id_transaksi])->result_array();
        }
    }

    public function getData()
    {
        //return $this->db->get_where('peminjaman', ['id_transaksi' => $id_transaksi])->result_array();
            $this->db->select('
            peminjaman.*, peminjam.nama_peminjam AS nama_peminjam, buku.judul_buku
            ');
            $this->db->join('peminjam', 'peminjaman.id_peminjam = peminjam.id_peminjam');
            $this->db->join('buku', 'peminjaman.id_buku = buku.id_buku');
            $this->db->from('peminjaman');
            $query = $this->db->get();
            return $query->result();
    }

    public function createPeminjaman($data)
    {
        $this->db->insert('peminjaman', $data);
        return $this->db->affected_rows();
    }

    public function updatePeminjaman($data, $id_transaksi)
    {
        $this->db->update('peminjaman', $data, ['id_transaksi' => $id_transaksi]);
        return $this->db->affected_rows();
    }

    public function deletePeminjaman($id_transaksi)
    {
        $this->db->delete('peminjaman', ['id_transaksi' => $id_transaksi]);
        return $this->db->affected_rows();
    }
}
