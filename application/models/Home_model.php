<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends CI_Model
{
    public function get_produk() {
        // Logika pengambilan data produk dari database
        $query = $this->db->get('produk');
        return $query->result();
    }

    public function get_products_page() {
        // Ambil data produk dengan status "di jual" dari database
        $this->db->select('id_produk, nama_produk, harga, kategori_id, status_id');
        $this->db->where('status_id', 'bisa dijual'); // Sesuaikan dengan nilai yang digunakan di database
        $query = $this->db->get('produk'); // Sesuaikan dengan nama tabel Anda
        return $query->result();
    }

    public function get_available_produk($limit, $offset) {
        // Ambil data produk dengan status "bisa dijual" dari database dengan pagination
        $this->db->select('id_produk, nama_produk, harga, kategori_id, status_id');
        $this->db->where('status_id', 'bisa dijual'); // Sesuaikan dengan nilai yang digunakan di database
        $this->db->limit($limit, $offset);
        $query = $this->db->get('produk'); // Sesuaikan dengan nama tabel Anda
        echo $this->db->last_query(); // Cetak query
        return $query->result();
    }

    public function get_total_produk() {
        // Menghitung jumlah total produk
        $total = $this->db->count_all_results('produk'); // Sesuaikan dengan nama tabel Anda
        echo 'Total Produk: ' . $total . '<br>';
        return $total;
    }
    
        
    public function get_kategori() {
        // Logika pengambilan data produk dari database
        $query = $this->db->get('kategori');
        return $query->result();
    }

}