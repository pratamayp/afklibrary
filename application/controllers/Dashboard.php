<?php

class Dashboard extends CI_Controller{

    public function __construct()
    {
        parent::__construct();

        if(!$this->session->userdata('username')){
            redirect('auth');
        }

        $this->load->model([
            'AnggotaModel',
            'BukuModel',
            'KelasModel',
            'PeminjamanModel'
        ]);
    }

    public function index()
    {
        $data['tab_title'] = 'Dashboard';
        $data['title'] = 'Dashboard';

        $data['total_anggota'] = $this->AnggotaModel->countAnggota();
        $data['total_buku'] = $this->BukuModel->countBuku();
        $data['total_kelas'] = $this->KelasModel->countKelas();
        $data['total_pinjam'] = $this->PeminjamanModel->countTransaksi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('dashboard/index', $data);
        $this->load->view('templates/footer');

    }
    
    public function logout()
    {
        $this->session->unset_userdata('nama_petugas');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message','
            <div class="alert alert-success" role="alert">
                Berhasil logout.
            </div>');

        redirect('auth');
    }
    
}