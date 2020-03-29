<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjam extends CI_Controller {

    var $API = "";

    
    public function __construct()
    {
        parent::__construct();
        //pengisian libk rest server (code-uts1)
        $this->API="http://localhost/12.codeigniter/perpus_server/api/peminjam";
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
    }
    

    public function index()
    {
        //mengambi data dari rest server dan mendecode datanya yang berformat JSON
        $respon = json_decode($this->curl->simple_get($this->API.'/peminjam'));
        $data['title'] = 'Data Anggota / Peminjam';
        $data['datapeminjam'] = $respon->data;
        $this->load->view('template/header', $data);
        $this->load->view('perpustakaan/peminjam', $data);
        $this->load->view('template/footer');
    }

    //fungsi create data Peminjam
    public function create()
    {
        # code...
        if(isset($_POST['submit'])){
            $data = array(
                'id_peminjam' => $this->input->NULL,
                'nama_peminjam' => $this->input->post('nama_peminjam'),
                'alamat_peminjam' => $this->input->post('alamat_peminjam'),
                'no_telp' => $this->input->post('no_telp'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin')
            );
            $insert = $this->curl->simple_post($this->API.'/peminjam', $data, array(CURLOPT_BUFFERSIZE => 10));
            if ($insert) {
                # code...
                $this->session->set_flashdata('hasil', 'Pengisian Data Anggota Berhasil!');
            } else {
                # code...
                $this->session->set_flashdata('hasil', 'Pengisian Data Anggota Gagal!');
            }
            redirect('peminjam');//ke controller Peminjam
        }else {
            $data['jeniskelamin']=['Perempuan','Laki-Laki'];
            $data['title'] = 'Tambah Data Peminjam';
            $this->load->view('template/header', $data);
            $this->load->view('perpustakaan/createPeminjam',$data);
            $this->load->view('template/footer');
        }
    }

    //fungsi edit data Peminjam
    public function edit()
    {
        # code...
        if(isset($_POST['submit'])){
            $data = array(
                'id_peminjam' => $this->input->post('id_peminjam',true),
                'nama_peminjam' => $this->input->post('nama_peminjam',true),
                'alamat_peminjam' => $this->input->post('alamat_peminjam',true),
                'no_telp' => $this->input->post('no_telp',true),
                'jenis_kelamin' => $this->input->post('jenis_kelamin',true)
            );
            $update = $this->curl->simple_put($this->API.'/peminjam', $data, array(CURLOPT_BUFFERSIZE => 10));
            if ($update) {
                # code...
                $this->session->set_flashdata('hasil', 'Pembaruan Data Anggota Berhasil!');
            } else {
                # code...
                $this->session->set_flashdata('hasil', 'Pembaruan Data Anggota Gagal!');
            }
            redirect('peminjam');//ke controller Peminjam
        }else {
            $params = array('id_peminjam' => $this->uri->segment(3));
            $respon = json_decode($this->curl->simple_get($this->API.'/peminjam',$params));
            $data['datapeminjam'] = $respon->data;
            $data['jeniskelamin']=['Perempuan','Laki-Laki'];
            $data['title'] = 'Ubah Data Peminjam';
            $this->load->view('template/header', $data);
            $this->load->view('perpustakaan/editPeminjam',$data);
            $this->load->view('template/footer');
        }
    }

    //fungsi delete data Peminjam
    function delete($id_Peminjam)
    {
        # code...
        if (empty($id_Peminjam)) {
            # code...
            redirect('');
        }else {
            $delete = $this->curl->simple_delete($this->API.'/kontak',array('id_peminjam' => $id_Peminjam), array(CURLOPT_BUFFERSIZE => 10));
            if ($delete) {
                $this->session->set_flashdata('hasil', 'Menghapus Data Anggota Berhasil!');
            }else {
                $this->session->set_flashdata('hasil', 'Menghapus Data Anggota Gagal!');
            }
            redirect('Peminjam');
        }
    }

}

/* End of file Peminjam.php */

?>