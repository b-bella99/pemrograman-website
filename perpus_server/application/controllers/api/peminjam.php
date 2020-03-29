<?php

defined('BASEPATH') or exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';

class Peminjam extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('peminjam_model', 'peminjam');
    }

    public function index_get()
    {
        $id_peminjam = $this->get('id_peminjam');
        if ($id_peminjam === NULL) {
            $peminjam = $this->peminjam->getPeminjam();
        } else {
            $peminjam = $this->peminjam->getPeminjam($id_peminjam);
        }

        if ($peminjam) {
            $this->response([
                'status' => true,
                'data' => $peminjam
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'Tid_peminjamak Ditemukan Peminjam'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function index_post()
    {
        $data = [
            'nama_peminjam' => $this->post('nama_peminjam'),
            'alamat_peminjam' => $this->post('alamat_peminjam'),
            'no_telp' => $this->post('no_telp'),
            'jenis_kelamin' => $this->post('jenis_kelamin')
        ];

        if ($this->peminjam->createPeminjam($data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'Data Peminjam Dibuat'
            ], REST_Controller::HTTP_CREATED);
        } else {
            //id_peminjam not found
            $this->response([
                'status' => true,
                'message' => 'Gagal membuat data Peminjam baru'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function index_put()
    {
        $id_peminjam = $this->put('id_peminjam');
        $data = [
            'nama_peminjam' => $this->put('nama_peminjam'),
            'alamat_peminjam' => $this->put('alamat_peminjam'),
            'no_telp' => $this->put('no_telp'),
            'jenis_kelamin' => $this->put('jenis_kelamin')

        ];

        if ($this->peminjam->updatePeminjam($data, $id_peminjam) > 0) {
            $this->response([
                'status' => true,
                'message' => 'Data peminjam has been updated'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Failed to update data!'
            ], REST_Controller::HTTP_BAD_REQUEST);
            var_dump($data, $id_peminjam);
        }
    }

    public function index_delete()
    {
        $id_peminjam = $this->delete('id_peminjam');

        if ($id_peminjam === null) {
            $this->response([
                'status' => false,
                'message' => 'Provid_peminjame an id_peminjam!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->peminjam->deletePeminjam($id_peminjam) > 0) {
                $this->response([
                    'status' => true,
                    'id_peminjam' => $id_peminjam,
                    'message' => 'deleted'
                ], REST_Controller::HTTP_OK);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'id_peminjam not found!'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }
}
