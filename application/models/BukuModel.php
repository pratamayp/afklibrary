<?php

class BukuModel extends CI_Model{

    public function countBuku()
    {
        return $this->db->get('buku')->num_rows();
    }

    public function getBuku()
    { 
        $query = $this->db->get('buku');
        return $query->result_array();
    }

    public function getDataById($id)
    {
        return $this->db->get_where('buku', ['id_buku' => $id])->row_array();
    }

    public function insertBuku()
    {
        $data = [
            'judul_buku' => $this->input->post('judul_buku', true),
            'penulis' => $this->input->post('penulis', true),
            'tahun_terbit' => $this->input->post('tahun_terbit', true),
            'penerbit' => $this->input->post('penerbit', true),
            'kategori' => $this->input->post('kategori'),
            'jumlah_buku' => $this->input->post('jumlah_buku', true),
            'lokasi_buku' => $this->input->post('lokasi_buku', true)
        ];

        $this->db->insert('buku', $data);
    }

    public function editBuku()
    {
        $data = [
            'judul_buku' => $this->input->post('judul_buku', true),
            'penulis' => $this->input->post('penulis', true),
            'tahun_terbit' => $this->input->post('tahun_terbit', true),
            'penerbit' => $this->input->post('penerbit', true),
            'kategori' => $this->input->post('kategori'),
            'jumlah_buku' => $this->input->post('jumlah_buku', true),
            'lokasi_buku' => $this->input->post('lokasi_buku', true)
        ];

        $id = $this->input->post('id_buku');
        $this->db->where('id_buku', $id);
        $this->db->update('buku', $data);
    }

    public function deleteBuku($id)
    {
        $this->db->where('id_buku', $id);
        $this->db->delete('buku');
    }
}