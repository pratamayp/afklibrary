<?php

class KelasModel extends CI_Model{
    
    public function getKelas()
    {
        $query = $this->db->get('kelas');
        return $query->result_array();
    }

    public function getDataById($id)
    {
        return $this->db->get_where('kelas', ['id_kelas' => $id])->row_array();
    }

    public function insertKelas()
    {
        $data = [
            'id_kelas' => $this->input->post('id_kelas', true),
            'nama_kelas' => $this->input->post('nama_kelas', true),
        ];

        $this->db->insert('kelas', $data);
    }

    public function deleteKelas($id)
    {
        $this->db->where('id_kelas', $id);
        $this->db->delete('kelas');
    }

    public function countKelas()
    {
        return $this->db->get('kelas')->num_rows();
    }

}