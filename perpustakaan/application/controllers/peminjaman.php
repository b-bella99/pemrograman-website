<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class peminjaman extends CI_Controller {

    var $API = "";

    
    public function __construct()
    {
        parent::__construct();
        //pengisian libk rest server (code-uts1)
        $this->API="http://localhost/12.codeigniter/perpus_server/api/peminjaman";
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
    }
    

    public function index()
    {
        //mengambi data dari rest server dan mendecode datanya yang berformat JSON
        $respon = json_decode($this->curl->simple_get($this->API.'/peminjaman'));
        $data['title'] = 'Data Peminjaman Buku';
        $data['datapeminjaman'] = $respon->data;
        $this->load->view('template/header', $data);
        $this->load->view('perpustakaan/peminjaman', $data);
        $this->load->view('template/footer');
    }

    //fungsi create data Peminjam
    public function create()
    {
        # code...
        if(isset($_POST['submit'])){
            $data = array(
                'id_transaksi' => $this->input->NULL,
                'id_peminjam' => $this->input->post('id_peminjam'),
                'id_buku' => $this->input->post('id_buku'),
                'tgl_pinjam' => $this->input->post('tgl_pinjam'),
                'tgl_kembali' => $this->input->post('tgl_kembali')
            );
            $insert = $this->curl->simple_post($this->API.'/peminjam', $data, array(CURLOPT_BUFFERSIZE => 10));
            if ($insert) {
                # code...
                $this->session->set_flashdata('hasil', 'Pengisian Data Peminjaman Buku Berhasil!');
            } else {
                # code...
                $this->session->set_flashdata('hasil', 'Pengisian Data Peminjaman Buku Gagal!');
            }
            redirect('peminjaman');//ke controller Peminjam
        }else {
            $data['title'] = 'Tambah Data Peminjaman Buku';
            $this->load->view('template/header', $data);
            $this->load->view('perpustakaan/createPeminjaman',$data);
            $this->load->view('template/footer');
        }
    }

    //fungsi edit data Peminjam
    public function edit()
    {
        # code...
        if(isset($_POST['submit'])){
            $data = array(
                'id_transaksi' => $this->input->post('id_transaksi',true),
                'id_peminjam' => $this->input->post('id_peminjam'),
                'id_buku' => $this->input->post('id_buku'),
                'tgl_pinjam' => $this->input->post('tgl_pinjam'),
                'tgl_kembali' => $this->input->post('tgl_kembali')
            );
            $update = $this->curl->simple_put($this->API.'/peminjaman', $data, array(CURLOPT_BUFFERSIZE => 10));
            if ($update) {
                # code...
                $this->session->set_flashdata('hasil', 'Pembaruan Data Peminjaman Buku Berhasil!');
            } else {
                # code...
                $this->session->set_flashdata('hasil', 'Pembaruan Data Peminjaman Buku Gagal!');
            }
            redirect('peminjam');//ke controller Peminjam
        }else {
            $params = array('id_transaksi' => $this->uri->segment(3));
            $respon = json_decode($this->curl->simple_get($this->API.'/peminjaman',$params));
            $data['datapeminjaman'] = $respon->data;
            $data['title'] = 'Ubah Data Peminjaman';
            $this->load->view('template/header', $data);
            $this->load->view('perpustakaan/editPeminjaman',$data);
            $this->load->view('template/footer');
        }
    }

    //fungsi delete data Peminjam
    function delete($id_transaksi)
    {
        # code...
        if (empty($id_transaksi)) {
            # code...
            redirect('');
        }else {
            $delete = $this->curl->simple_delete($this->API.'/kontak',array('id_transaksi' => $id_transaksi), array(CURLOPT_BUFFERSIZE => 10));
            if ($delete) {
                $this->session->set_flashdata('hasil', 'Menghapus Data Peminjaman Buku Berhasil!');
            }else {
                $this->session->set_flashdata('hasil', 'Menghapus Data Peminjaman Buku Gagal!');
            }
            redirect('Peminjam');
        }
    }

}

/* End of file Peminjam.php */

?>