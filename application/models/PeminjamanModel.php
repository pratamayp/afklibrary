<?php

class PeminjamanModel extends CI_Model{

    public function countTransaksi()
    {
        return $this->db->get('peminjaman')->num_rows();
    }

    public function getData()
    {
        return $this->db->get('peminjaman')->result_array();
    }

    public function getJoinedData()
    {
        $this->db->select('*');
        $this->db->from('peminjaman'); 
        $this->db->join('anggota', 'peminjaman.id_anggota = anggota.id_anggota');
        $this->db->join('buku', 'peminjaman.id_buku = buku.id_buku');

        return $this->db->get()->result_array() ;
    }

    public function getJoinedDataById($id)
    {
        $this->db->select('*');
        $this->db->join('anggota', 'peminjaman.id_anggota = anggota.id_anggota');
        $this->db->join('buku', 'peminjaman.id_buku = buku.id_buku');

        return $this->db->get_where('peminjaman', ['peminjaman.id_peminjaman' => $id])->result();
    }

    public function insertTransaksi()
    {
        $data = [
            'id_anggota' => $this->input->post('id_anggota', true),
            'id_buku' => $this->input->post('id_buku', true),
            'tgl_pinjam' => $this->input->post('tgl_pinjam'),
            'tgl_kembali' => $this->input->post('tgl_kembali', true),
            'tgl_dikembalikan' => $this->input->post('tgl_dikembalikan', true),
            'jml_dipinjam' => $this->input->post('jml_dipinjam', true),
            'status' => 1,
            'denda' => 0
        ];
        $this->db->insert('peminjaman', $data);
    }

    public function updateTanggal()
    {
        $id = $this->input->post('id_peminjaman');
        $data_update = $this->input->post('tgl_dikembalikan');

        $update_field = array(
            'tgl_dikembalikan' => $data_update,
            'status' => 0 );
        $this->db->where('id_peminjaman', $id);
        $this->db->update('peminjaman', $update_field); 

    }

    public function updateDenda()
    {
        $id = $this->input->post('id_peminjaman');
        $denda = $this->input->post('denda');
        var_dump($denda);
        $update_field = array('denda' => $denda);

        $this->db->where('id_peminjaman', $id);
        $this->db->update('peminjaman', $update_field); 

    }

}