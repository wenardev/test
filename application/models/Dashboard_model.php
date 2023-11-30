<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }

    //======================JUMLAH PRODUK, KATEGORI, PRODUK YANG DIJUAL & TIDAK DIJUAL =======================================

    public function get_count_produk()
    {
        $sql = "SELECT count(DISTINCT id_produk) as id_produk FROM produk";
        $result = $this->db->query($sql);
        return $result->row()->id_produk;
    }

    public function get_count_kategori()
    {
        $sql = "SELECT count(DISTINCT id_kategori) as id_kategori FROM kategori";
        $result = $this->db->query($sql);
        return $result->row()->id_kategori;
    }

    public function get_count_produk_bisa_dijual()
    {
        $sql = "SELECT count(DISTINCT id_produk) as id_produk FROM produk WHERE status_id = 'bisa dijual'";
        $result = $this->db->query($sql);
        return $result->row()->id_produk;
    }

    public function get_count_produk_tidak_bisa_dijual()
    {
        $sql = "SELECT count(DISTINCT id_produk) as id_produk FROM produk WHERE status_id = 'tidak bisa dijual'";
        $result = $this->db->query($sql);
        return $result->row()->id_produk;
    }

    //=================================================PRODUK======================================================================

    public function getProduk() {
        //AMBIL DATA PRODUK DARI TABEL PRODUK DI DATABASE
        $query = $this->db->get('produk');
        return $query->result();
    }

    public function produk_create_model($data) {
        try {
            //PROSES INSERT DATA KE DATABASE
            $this->db->insert('produk', $data);
            return true;  //JIKA BERHASIL
        } catch (Exception $e) {
            //TANGANI KESALAHAN DAN LOG ATAU BERIKAN PESAN KESALAHAN
            log_message('error', 'Error: ' . $e->getMessage());
            return false; //JIKA TERJADI KESALAHAN
        }
    }

    public function produk_update_model($id_produk, $data) {
        try {
            //PROSES UPDATE DATA DI DATABASE
            $this->db->where('id_produk', $id_produk);
            $this->db->update('produk', $data);
            return true;  //JIKA BERHASIL
        } catch (Exception $e) {
            //TANGANI KESALAHAN DAN LOG ATAU BERIKAN PESAN KESALAHAN
            log_message('error', 'Error: ' . $e->getMessage());
            return 'Terjadi kesalahan saat memperbarui data'; //JIKA TERJADI KESALAHAN
        }
    }

    public function produk_delete_model($id_produk) {
        //HAPUS DATA PRODUK BERDASARKAN ID
        $this->db->where('id_produk', $id_produk);
        $this->db->delete('produk');

        //PERIKSA APAKAH DATA BERHASIL DIHAPUS
        return $this->db->affected_rows() > 0;
    }

    //=================================================KATEGORI======================================================================

    public function getKategori() {
        //AMBIL DATA KATEGORI DARI TABEL KATEGORI DI DATABASE
        $query = $this->db->get('kategori');
        return $query->result();
    }

    public function kategori_create_model($data) {
        try {
            //PROSES INSERT DATA KE DATABASE
            $this->db->insert('kategori', $data);
            //JIKA BERHASIL
            return true;  
        } catch (Exception $e) {
            //TANGANI KESALAHAN DAN BERIKAN LOG KESALAHAN
            log_message('error', 'Error: ' . $e->getMessage());
            return false; //JIKA TERJADI KESALAHAN
        }
    }

    public function kategori_update_model($id_kategori, $data) {
        try {
            //PROSES INSERT DATA KE DATABASE
            $this->db->where('id_kategori', $id_kategori);
            $this->db->update('kategori', $data);
            return true; 
            //JIKA BERHASIL
        } catch (Exception $e) {
            //TANGANI KESALAHAN DAN BERIKAN LOG KESALAHAN
            log_message('error', 'Error: ' . $e->getMessage());
            return 'Terjadi kesalahan saat memperbarui data'; //JIKA TERJADI KESALAHAN
        }
    }

    public function kategori_delete_model($id_kategori) {
        //HAPUS KATEGORI BERHADASARKAN ID_KATEGORI
        $this->db->where('id_kategori', $id_kategori);
        $this->db->delete('kategori');

        //PERIKSA DATA APAKAH BERHASIL DI HAPUS
        return $this->db->affected_rows() > 0;
    }

}