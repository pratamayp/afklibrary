<?php

class Auth extends CI_Controller{

    public function __construct()
    {
        parent::__construct();

        if($this->session->userdata('email')){
            redirect('dashboard');
        }

        $this->load->library(['form_validation', 'session']);
        $this->load->helper(['form','url']);

    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim', [
            'required' => 'Username belum diisi'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Password belum diisi'
        ]);

        if($this->form_validation->run() == false){
            $data['tab_title'] = 'Login';
    
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login', $data);
            $this->load->view('templates/auth_footer');    
        } else {
            $this->_login();
        }
    }

    protected function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('petugas', ['username' => $username])->row_array();
        
        if($user){
            if(password_verify($password, $user['password'])){
                $data = [
                    'name' => $user['nama_petugas'],
                    'username' => $user['username'],
                    'role' => $user['role']
                ];

                $this->session->set_userdata($data);
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('message','
                <div class="alert alert-danger" role="alert">
                    Password salah!!
                </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message','
            <div class="alert alert-danger" role="alert">
                Invalid username 
            </div>');
            redirect('auth');
        }
    }
}