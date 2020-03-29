<?php

defined('BASEPATH') or exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';

class buku extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('buku_model', 'buku');
    }

    public function index_get()
    {
        $id_buku = $this->get('id_buku');
        if ($id_buku === NULL) {
            $buku = $this->buku->getBuku();
        } else {
            $buku = $this->buku->getBuku($id_buku);
        }

        if ($buku) {
            $this->response([
                'status' => true,
                'data' => $buku
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'id_buku tidak Ditemukan Buku'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function index_post()
    {
        $data = [
            'judul_buku' => $this->post('judul_buku'),
            'penerbit' => $this->post('penerbit'),
            'pengarang' => $this->post('pengarang'),
            'jumlah' => $this->post('jumlah'),
            'tahun_terbit' => $this->post('tahun_terbit'),
            'rak' => $this->post('rak')
        ];

        if ($this->buku->createBuku($data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'Data Buku Dibuat'
            ], REST_Controller::HTTP_CREATED);
        } else {
            //id_buku not found
            $this->response([
                'status' => true,
                'message' => 'Gagal membuat data Buku baru'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function index_put()
    {
        $id_buku = $this->put('id_buku');
        $data = [
            'judul_buku' => $this->put('judul_buku'),
            'penerbit' => $this->put('penerbit'),
            'pengarang' => $this->put('pengarang'),
            'jumlah' => $this->put('jumlah'),
            'tahun_terbit' => $this->put('tahun_terbit'),
            'rak' => $this->put('rak')
        ];

        if ($this->buku->updateBuku($data, $id_buku) > 0) {
            $this->response([
                'status' => true,
                'message' => 'Data buku has been updated'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Failed to update data!'
            ], REST_Controller::HTTP_BAD_REQUEST);
            var_dump($data, $id_buku);
        }
    }

    public function index_delete()
    {
        $id_buku = $this->delete('id_buku');

        if ($id_buku === null) {
            $this->response([
                'status' => false,
                'message' => 'Provid_bukue an id_buku!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->buku->deleteBuku($id_buku) > 0) {
                $this->response([
                    'status' => true,
                    'id_buku' => $id_buku,
                    'message' => 'deleted'
                ], REST_Controller::HTTP_OK);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'id_buku not found!'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }
}
