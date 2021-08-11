<?php

class Anggota extends CI_Controller{
    
    public function __construct()
    {
        parent::__construct();

        // cek session
        if(!$this->session->userdata('username')){
            redirect('auth');
        }

        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->model(['AnggotaModel', 'KelasModel']);

    }

    public function index()
    {
        $data['tab_title'] = "Halaman Admin";
        $data['title'] = "Data Anggota Perpustakaan";

        $data['anggota'] = $this->AnggotaModel->getAnggotaKelas();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('anggota/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id)
    {
        $data['tab_title'] = 'Detail';
        $data['judul'] = 'Detail Data Anggota';
        $data['anggota'] = $this->AnggotaModel->getDataById($id);

        $this->load->view('templates/header', $data);
        $this->load->view('anggota/detail', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('nis', 'NIS', 'required');
        $this->form_validation->set_rules('nama_anggota', 'Nama', 'required');
        $this->form_validation->set_rules('tp_lhr', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tgl_lhr', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('telp_anggota', 'No Telpon', 'required');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('alamat_anggota', 'Alamat', 'required');

        if ($this->form_validation->run() == FALSE){
            $data['tab_title'] = "Registrasi";
            $data['title'] = "Form Registrasi Anggota";
            $data['kelas'] = $this->KelasModel->getKelas();
            
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('anggota/tambah', $data);
            $this->load->view('templates/footer');
        }else{
            //data diambil di model
            $this->AnggotaModel->insertAnggota();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('anggota');
        }

    }

    public function edit($id)
    {
        $data['tab_title'] = "Edit Data";
        $data['title'] = "Edit Data Anggota";
        // $data['anggota'] = $this->AnggotaModel->getDataById($id);
        $data['anggota'] = $this->AnggotaModel->getJoinedDataById($id);
        $data['kelas'] = $this->KelasModel->getKelas();

        $this->form_validation->set_rules('nis', 'NIS', 'required');
        $this->form_validation->set_rules('nama_anggota', 'Nama', 'required');
        $this->form_validation->set_rules('tp_lhr', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tgl_lhr', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('telp_anggota', 'No Telpon', 'required');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('alamat_anggota', 'Alamat', 'required');

        if ($this->form_validation->run() == FALSE){
            
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('anggota/edit', $data);
            $this->load->view('templates/footer');

        }else{

            $this->AnggotaModel->editAnggota($id);
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('anggota');
            
        }
    }

    public function delete($id)
    {
        // $data = $this->AnggotaModel->getDataById($id);
        $this->AnggotaModel->deleteAnggota($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('anggota'); 
    }

}