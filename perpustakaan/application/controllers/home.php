<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        //pengisian libk rest server (perpus_server)
        $this->API="http://localhost/12.codeigniter/perpus_server/api";
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title']='Dashboard';
        $this->load->view('template/header',$data); //menampilkan pada data pada view
        $this->load->view('perpustakaan/home');
        $this->load->view('template/footer');

    }
}

/* end of file Controllername.php */
?>