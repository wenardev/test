<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('Home_model');
    }

	//HALAMAN SHOP
	public function index()
	{
		$data['menu_active'] = 'shop';
		
        //$data['produk'] = $this->Home_model->get_produk();

		// Pagination
		$this->load->library('pagination');
		//$config['base_url'] = base_url('shop/page');
		$config['base_url'] = 'shop/page/';
		$config['total_rows'] = $this->home_model->get_total_produk();
		$config['per_page'] = 9; // Sesuaikan dengan jumlah produk per halaman yang diinginkan
		$this->pagination->initialize($config);

		$data['produk'] = $this->home_model->get_available_produk($config['per_page'], $this->uri->segment(3));	  
		
		$data['kategori'] = $this->Home_model->get_kategori();

		//echo $this->db->last_query(); // Cetak query database
		//var_dump($data['produk']); // Cetak data produk

        $this->load->view('/fe/layout/header', $data);
        $this->load->view('/fe/shop', $data);
        $this->load->view('/fe/layout/sidebar', $data);
        $this->load->view('/fe/layout/footer');
	}
}