<?php

class Peminjaman extends CI_Controller{

    public function __construct()
    {
        parent::__construct();

        if(!$this->session->userdata('username')){
            redirect('auth');
        }

        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->model([
            'AnggotaModel',
            'BukuModel',
            'KelasModel',
            'PeminjamanModel'
        ]);
    }

    public function index()
    {
        $data['tab_title'] = 'Halaman Admin';
        $data['title'] = 'Data Peminjaman Buku Perpustakaan';

        $data['transaksi'] = $this->PeminjamanModel->getJoinedData();

        $this->load->view('templates/header', $data);
        $this->load->view('peminjaman/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambahPeminjaman()
    {
        $this->form_validation->set_rules('id_anggota', 'Peminjam', 'required');
        $this->form_validation->set_rules('id_buku', 'Buku', 'required');
        $this->form_validation->set_rules('tgl_pinjam', 'Tanggal Peminjaman', 'required');
        $this->form_validation->set_rules('tgl_kembali', 'Tanggal Pengembalian', 'required');
        $this->form_validation->set_rules('jml_dipinjam', 'Jumlah Buku', 'required');
        
        
        if ($this->form_validation->run() == FALSE){
            $data['tab_title'] = "Peminjaman";
            $data['title'] = "Tambah Peminjaman Buku";

            $data['anggota'] = $this->AnggotaModel->getAnggota();
            $data['buku'] = $this->BukuModel->getBuku();
            $data['transaksi'] = $this->PeminjamanModel->getJoinedData();
            
            $this->load->view('templates/header', $data);
            $this->load->view('peminjaman/tambah', $data);
            $this->load->view('templates/footer');
        }else{
            if($this->input->post('tgl_pinjam') > $this->input->post('tgl_kembali')){
                redirect('peminjaman/tambahpeminjaman');
            }else{
                $this->PeminjamanModel->insertTransaksi();
                $this->session->set_flashdata('flash', 'Ditambahkan');
                redirect('peminjaman');
            }
        }

    }

    public function kembali($id)
    {

        $this->form_validation->set_rules('tgl_dikembalikan', 'Tanggal Dikembalikan', 'required');
        
        $data['tab_title'] = 'Detail Peminjaman';
        $data['transaksi'] = $this->PeminjamanModel->getJoinedDataById($id);

        if ($this->form_validation->run() == FALSE){
            
            $this->load->view('templates/header', $data);
            $this->load->view('peminjaman/kembali', $data);
            $this->load->view('templates/footer');

        }else{

           $this->PeminjamanModel->updateTanggal();
           redirect('peminjaman/detail/'. $id);
        }

    }

    public function detail($id)
    {
        $this->form_validation->set_rules('denda', 'Denda', 'required');

        $data['tab_title'] = 'Detail Peminjaman';
        $data['transaksi'] = $this->PeminjamanModel->getJoinedDataById($id);

        if ($this->form_validation->run() == FALSE){
            
            $this->load->view('templates/header', $data);
            $this->load->view('peminjaman/detail', $data);
            $this->load->view('templates/footer');

        }else{

            $this->PeminjamanModel->updateDenda();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('peminjaman');
        }
    }
}