<?php

class Petugas extends CI_Controller{

    public function __construct()
    {
        parent::__construct();

        if(!$this->session->userdata('username')){
            redirect('auth');
        }

        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->model(['PetugasModel']);
    }

    public function index()
    {
        $data['tab_title'] = "Halaman Admin";
        $data['title'] = "Data Petugas";

        $data['petugas'] = $this->PetugasModel->getPetugas();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('petugas/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        if($this->session->userdata['role'] == 1){
            $this->form_validation->set_rules('nama_petugas', 'Nama Petugas', 'required');
            $this->form_validation->set_rules('telp_petugas', 'No. Telp', 'required');
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[4]|matches[password_conf]',[
                'required' => 'Password belum diisi',
                'matches' => 'Konfirmasi password tidak sama',
                'min_length' => 'Password terlalu pendek'
            ]);
            $this->form_validation->set_rules('password_conf', 'Password', 'required|trim|matches[password]');
            $this->form_validation->set_rules('role', 'Role', 'required');

            if ($this->form_validation->run() == FALSE){
                $data['tab_title'] = "Data Petugas";
                $data['title'] = "Form Tambah Petugas";
                // $data['kelas'] = $this->KelasModel->getAllData();

                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar');
                $this->load->view('templates/topbar');
                $this->load->view('petugas/tambah', $data);
                $this->load->view('templates/footer');
            }else{
                //data diambil di model
                $this->PetugasModel->insertPetugas();
                $this->session->set_flashdata('flash', 'Ditambahkan');
                redirect('petugas');
            }
        } else {
            redirect('petugas');
        }
        
    }

    public function edit($id)
    {
        $data['tab_title'] = "Edit Data";
        $data['title'] = "Edit Data Petugas";
        $data['petugas'] = $this->PetugasModel->getDataById($id);

        if($this->session->userdata['role'] == 1){
            $this->form_validation->set_rules('nama_petugas', 'Nama Petugas', 'required');
            $this->form_validation->set_rules('telp_petugas', 'No. Telp', 'required');
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[4]|matches[password_conf]',[
                'required' => 'Password belum diisi',
                'matches' => 'Konfirmasi password tidak sama',
                'min_length' => 'Password terlalu pendek'
            ]);
            $this->form_validation->set_rules('password_conf', 'Password', 'required|trim|matches[password]');
            $this->form_validation->set_rules('role', 'Role', 'required');

            if ($this->form_validation->run() == FALSE){

                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar');
                $this->load->view('templates/topbar');
                $this->load->view('petugas/edit', $data);
                $this->load->view('templates/footer');
            }else{
                //data diambil di model
                $this->PetugasModel->editPetugas($id);
                $this->session->set_flashdata('flash', 'Diubah');
                redirect('petugas');
            }
        } else {
            redirect('petugas');
        }
    }

    public function delete($id)
    {
        if($this->session->userdata['role'] == 1){
            $this->PetugasModel->deletePetugas($id);
            $this->session->set_flashdata('flash', 'Dihapus');
            redirect('petugas');
        } else {
            redirect('petugas');
        }
         
    }

}