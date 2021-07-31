<?php

class AnggotaModel extends CI_Model{

    public function countAnggota()
    {
        return $this->db->get('anggota')->num_rows();
    }

    public function getAnggota()
    { 
        $query = $this->db->get('anggota');
        return $query->result_array();
    }

    public function getAnggotaKelas()
    {
        $this->db->select('*');
        $this->db->from('anggota');
        $this->db->join('kelas', 'anggota.kelas = kelas.id_kelas');

        return $this->db->get()->result_array();
    }

    public function getDataById($id)
    {
        return $this->db->get_where('anggota', ['id_anggota' => $id])->row_array();
    }

    public function getJoinedDataById($id)
    {
        $this->db->select('*');
        $this->db->join('kelas', 'anggota.kelas = kelas.id_kelas');

        return $this->db->get_where('anggota', ['anggota.id_anggota' => $id])->result();
    }

    public function insertAnggota()
    {
        $data = [
            'nis' => $this->input->post('nis', true),
            'nama_anggota' => $this->input->post('nama_anggota', true),
            'telp_anggota' => $this->input->post('telp_anggota', true),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'tp_lhr' => $this->input->post('tp_lhr', true),
            'tgl_lhr' => $this->input->post('tgl_lhr'),
            'alamat_anggota' => $this->input->post('alamat_anggota', true),
            'kelas' => $this->input->post('kelas', true)
        ];

        $this->db->insert('anggota', $data);
    }

    public function editAnggota()
    {
        $data = [
            'nis' => $this->input->post('nis', true),
            'nama_anggota' => $this->input->post('nama_anggota', true),
            'telp_anggota' => $this->input->post('telp_anggota', true),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'tp_lhr' => $this->input->post('tp_lhr', true),
            'tgl_lhr' => $this->input->post('tgl_lhr'),
            'alamat_anggota' => $this->input->post('alamat_anggota', true),
            'kelas' => $this->input->post('kelas', true)
        ];

        $id = $this->input->post('id_anggota');
        $this->db->where('id_anggota', $id);
        $this->db->update('anggota', $data);
    }

    public function deleteAnggota($id)
    {
        $this->db->where('id_anggota', $id);
        $this->db->delete('anggota');
    }
}