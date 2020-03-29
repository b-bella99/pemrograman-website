<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class buku extends CI_Controller {

    var $API = "";

    
    public function __construct()
    {
        parent::__construct();
        //pengisian libk rest server (perpus_server)
        $this->API="http://localhost/12.codeigniter/perpus_server/api/buku";
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
    }
    

    public function index()
    {
        //mengambi data dari rest server dan mendecode datanya yang berformat JSON
        $respon = json_decode($this->curl->simple_get($this->API.'/buku'));
        $data['title'] = 'Data Buku';
        $data['databuku'] = $respon->data;
        $this->load->view('template/header', $data);
        $this->load->view('perpustakaan/buku', $data);
        $this->load->view('template/footer');
    }

    //fungsi create data buku
    public function create()
    {
        # code...
        if(isset($_POST['submit'])){
            $data = array(
                'id_buku' => $this->input->NULL,
                'judul_buku' => $this->input->post('judul_buku'),
                'penerbit' => $this->input->post('penerbit'),
                'pengarang' => $this->input->post('pengarang'),
                'jumlah' => $this->input->post('jumlah'),
                'tahun_terbit' => $this->input->post('tahun_terbit'),
                'rak' => $this->input->post('rak')
            );
            $insert = $this->curl->simple_post($this->API.'/buku', $data, array(CURLOPT_BUFFERSIZE => 10));
            if ($insert) {
                # code...
                $this->session->set_flashdata('hasil', 'Pengisian Data Buku Berhasil!');
            } else {
                # code...
                $this->session->set_flashdata('hasil', 'Pengisian Data Buku Gagal!');
            }
            redirect('buku');//ke controller buku
        }else {
            $data['title'] = 'Tambah Data Buku';
            $this->load->view('template/header', $data);
            $this->load->view('perpustakaan/createBuku');
            $this->load->view('template/footer');
        }
    }

    //fungsi edit data buku
    public function edit()
    {
        # code...
        if(isset($_POST['submit'])){
            $data = array(
                'id_buku' => $this->input->post('id_buku'),
                'judul_buku' => $this->input->post('judul_buku'),
                'penerbit' => $this->input->post('penerbit'),
                'pengarang' => $this->input->post('pengarang'),
                'jumlah' => $this->input->post('jumlah'),
                'tahun_terbit' => $this->input->post('tahun_terbit'),
                'rak' => $this->input->post('rak')
            );
            $update = $this->curl->simple_put($this->API.'/buku', $data, array(CURLOPT_BUFFERSIZE => 10));
            if ($update) {
                # code...
                $this->session->set_flashdata('hasil', 'Pembaruan Data Buku Berhasil!');
            } else {
                # code...
                $this->session->set_flashdata('hasil', 'Pembaruan Data Buku Gagal!');
            }
            redirect('buku');//ke controller buku
        }else {
            $params = array('id_buku' => $this->uri->segment(3));
            $respon = json_decode($this->curl->simple_get($this->API.'/buku',$params));
            $data['databuku'] = $respon->data;
            $data['title'] = 'Ubah Data Buku';
            $this->load->view('template/header', $data);
            $this->load->view('perpustakaan/editBuku',$data);
            $this->load->view('template/footer');
        }
    }

    //fungsi delete data buku
    function delete($id_buku)
    {
        # code...
        if (empty($id_buku)) {
            # code...
            redirect('');
        }else {
            $delete = $this->curl->simple_delete($this->API.'/kontak',array('id_buku' => $id_buku), array(CURLOPT_BUFFERSIZE => 10));
            if ($delete) {
                $this->session->set_flashdata('hasil', 'Menghapus Data Buku Berhasil!');
            }else {
                $this->session->set_flashdata('hasil', 'Menghapus Data Buku Gagal!');
            }
            redirect('buku');
        }
    }

}

/* End of file buku.php */

?>