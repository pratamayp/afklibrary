<?php

class PetugasModel extends CI_Model{
    
    public function getPetugas()
    {
        $query = $this->db->get('petugas');
        return $query->result_array();
    }

    public function getDataById($id)
    {
        return $this->db->get_where('petugas', ['id_petugas' => $id])->row_array();
    }

    public function insertPetugas()
    {
        $data = [
            'nama_petugas' => $this->input->post('nama_petugas', true),
            'telp_petugas' => $this->input->post('telp_petugas', true),
            'username' => $this->input->post('username', true),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'role' => $this->input->post('role')
        ];

        $this->db->insert('petugas', $data);
    }

    public function editPetugas()
    {       
        $data = [
            'nama_petugas' => $this->input->post('nama_petugas', true),
            'telp_petugas' => $this->input->post('telp_petugas', true),
            'username' => $this->input->post('username', true),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'role' => $this->input->post('role')
        ];

        $id = $this->input->post('id_petugas');
        $this->db->where('id_petugas', $id);
        $this->db->update('petugas', $data);
        
    }

    public function deletePetugas($id)
    {
        $this->db->where('id_petugas', $id);
        $this->db->delete('petugas');
    }

}