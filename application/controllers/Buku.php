<?php

class Buku extends CI_Controller{

    public function __construct()
    {
        parent::__construct();

        if(!$this->session->userdata('username')){
            redirect('auth');
        }

        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->model(['AnggotaModel', 'BukuModel']);
    }

    public function index()
    {
        $data['tab_title'] = "Halaman Admin";
        $data['title'] = "Data Buku Perpustakaan";

        $data['buku'] = $this->BukuModel->getBuku();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('buku/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id)
    {
        $data['tab_title'] = 'Detail';
        $data['judul'] = 'Detail Data Buku';
        $data['buku'] = $this->BukuModel->getDataById($id);

        $this->load->view('templates/header', $data);
        $this->load->view('buku/detail', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('judul_buku', 'Judul Buku', 'required');
        $this->form_validation->set_rules('penulis', 'Penulis', 'required');
        $this->form_validation->set_rules('tahun_terbit', 'Tahun Terbit', 'required');
        $this->form_validation->set_rules('penerbit', 'Penerbit', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('jumlah_buku', 'Jumlah Buku', 'required');
        $this->form_validation->set_rules('lokasi_buku', 'Lokasi Buku', 'required');

        if ($this->form_validation->run() == FALSE){
            $data['tab_title'] = "Tambah Data";
            $data['title'] = "Tambah Data Buku";
            // $data['kelas'] = $this->KelasModel->getAllData();
            
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('buku/tambah', $data);
            $this->load->view('templates/footer');
        }else{
            //data diambil di model
            $this->BukuModel->insertBuku();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('buku');
        }

    }

    public function edit($id)
    {
        $data['tab_title'] = "Edit Data";
        $data['title'] = "Edit Data Buku";
        $data['buku'] = $this->BukuModel->getDataById($id);

        $this->form_validation->set_rules('judul_buku', 'Judul Buku', 'required');
        $this->form_validation->set_rules('penulis', 'Penulis', 'required');
        $this->form_validation->set_rules('tahun_terbit', 'Tahun Terbit', 'required');
        $this->form_validation->set_rules('penerbit', 'Penerbit', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('jumlah_buku', 'Jumlah Buku', 'required');
        $this->form_validation->set_rules('lokasi_buku', 'Lokasi Buku', 'required');

        if ($this->form_validation->run() == FALSE){
            // $data['kelas'] = $this->KelasModel->getAllData();
            
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('buku/edit', $data);
            $this->load->view('templates/footer');

        }else{

            $this->BukuModel->editBuku($id);
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('buku');
            
        }
    }

    public function delete($id)
    {
        // $data = $this->AnggotaModel->getDataById($id);
        $this->BukuModel->deleteBuku($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('buku'); 
    }

}