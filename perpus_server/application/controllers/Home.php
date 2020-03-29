<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function index($nama = '')
    {
        $data['title'] = 'Home';
        $data['nama'] = $nama;
        $this->load->view('template/header', $data);
        // echo "Selamat Datang di halaman Home";
        $this->load->view('home/index', $data);
        $this->load->view('template/footer');
    }
}
    
    /* End of file Home.php */