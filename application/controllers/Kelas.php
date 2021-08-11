<?php

class Kelas extends CI_Controller{

    public function __construct()
    {
        parent::__construct();

        if(!$this->session->userdata('username')){
            redirect('auth');
        }

        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->model('KelasModel');
    }

    public function index()
    {
        $data['tab_title'] = "Halaman Admin";
        $data['title'] = "Data Kelas";

        $data['kelas'] = $this->KelasModel->getKelas();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('kelas/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('id_kelas', 'ID Kelas', 'required');
        $this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'required');

        if ($this->form_validation->run() == FALSE){
            $data['tab_title'] = "Tambah Data";
            $data['title'] = "Tambah Data Kelas";
            
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('kelas/tambah', $data);
            $this->load->view('templates/footer');
        }else{
            //data diambil di model
            $this->KelasModel->insertKelas();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('kelas');
        }
    }

    public function delete($id)
    {
        $this->KelasModel->deleteKelas($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('kelas'); 
    }

}