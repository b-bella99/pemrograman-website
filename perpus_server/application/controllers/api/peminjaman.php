<?php

defined('BASEPATH') or exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';

class peminjaman extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('peminjaman_model', 'peminjaman');
    }

    public function index_get()
    {
        $id_transaksi = $this->get('id_transaksi');
        if ($id_transaksi === NULL) {
            $peminjaman = $this->peminjaman->getData();
        } else {
            $peminjaman = $this->peminjaman->getPeminjaman($id_transaksi);
        }

        if ($peminjaman) {
            $this->response([
                'status' => true,
                'data' => $peminjaman
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'Tid_transaksiak Ditemukan Peminjaman'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function index_post()
    {
        $data = [
            'id_transaksi_peminjam' => $this->post('id_transaksi_peminjam'),
            'id_transaksi_buku' => $this->post('id_transaksi_buku'),
            'tgl_pinjam' => $this->post('tgl_pinjam'),
            'tgl_kembali' => $this->post('tgl_kembali')
        ];

        if ($this->peminjaman->createPeminjaman($data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'Data Peminjaman Dibuat'
            ], REST_Controller::HTTP_CREATED);
        } else {
            //id_transaksi not found
            $this->response([
                'status' => true,
                'message' => 'Gagal membuat data Peminjaman baru'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function index_put()
    {
        $id_transaksi = $this->put('id_transaksi');
        $data = [
            'id_transaksi_peminjam' => $this->put('id_transaksi_peminjam'),
            'id_transaksi_buku' => $this->put('id_transaksi_buku'),
            'tgl_pinjam' => $this->put('tgl_pinjam'),
            'tgl_kembali' => $this->put('tgl_kembali')

        ];

        if ($this->peminjaman->updatePeminjaman($data, $id_transaksi) > 0) {
            $this->response([
                'status' => true,
                'message' => 'Data peminjaman has been updated'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Failed to update data!'
            ], REST_Controller::HTTP_BAD_REQUEST);
            var_dump($data, $id_transaksi);
        }
    }

    public function index_delete()
    {
        $id_transaksi = $this->delete('id_transaksi');

        if ($id_transaksi === null) {
            $this->response([
                'status' => false,
                'message' => 'Provid_transaksie an id_transaksi!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->peminjaman->deletePeminjaman($id_transaksi) > 0) {
                $this->response([
                    'status' => true,
                    'id_transaksi' => $id_transaksi,
                    'message' => 'deleted'
                ], REST_Controller::HTTP_OK);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'id_transaksi not found!'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }
}
