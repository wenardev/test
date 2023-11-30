<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('Home_model');
    }

	//HALAMAN HOME
	public function index()
	{
		//MEMBUAT ACTIVE PADA MENU
		$data['menu_active'] = 'index';

        //$data['produk'] = $this->Home_model->get_produk();
		$data['produk'] = $this->Home_model->get_products_page();

		$this->load->view('/fe/layout/header', $data);
		$this->load->view('/fe/index', $data);
		$this->load->view('/fe/layout/footer');
	}

	//HALAMAN SHOP
	public function shop()
	{
		$data['menu_active'] = 'shop';
	
		// Pagination
		$this->load->library('pagination');
		$config['base_url'] = base_url('shop');
		$config['total_rows'] = $this->db->where('status_id', 'bisa dijual')->from("produk")->count_all_results();
		$config['per_page'] = 9; // Sesuaikan dengan jumlah produk per halaman yang diinginkan
	
		// Mengatur halaman dengan jumlah data yang sama
		$config['num_links'] = ceil($config['total_rows'] / $config['per_page'] - 1);
	
		// Aktifkan penggunaan nomor halaman
		$config['use_page_numbers'] = TRUE;
	
		
		$this->pagination->initialize($config);
	
		// Ambil nilai per_page dari input
		$per_page = $this->input->get('page');
		if (!$per_page) {
			$per_page = 1; // Atur halaman default jika tidak ada parameter page
		}
	
		$data['produk'] = $this->db->where('status_id', 'bisa dijual')->get('produk', $config['per_page'], $per_page)->result();
		$data['kategori'] = $this->Home_model->get_kategori();
	
		$this->load->view('/fe/layout/header', $data);
		$this->load->view('/fe/shop', $data);
		$this->load->view('/fe/layout/sidebar', $data);
		$this->load->view('/fe/layout/footer');
	}
	

	//HALAMAN KATEGORI
	public function kategori()
	{
		$data['menu_active'] = 'kategori';
		$this->load->view('/fe/layout/header', $data);
		$this->load->view('/fe/kategori');
		$this->load->view('/fe/layout/sidebar');
		$this->load->view('/fe/layout/footer');
	}

	//HALAMAN ABOUT
	public function about()
	{
		$data['menu_active'] = 'about';
		$this->load->view('/fe/layout/header', $data);
		$this->load->view('/fe/about');
		$this->load->view('/fe/layout/sidebar');
		$this->load->view('/fe/layout/footer');
	}

	//HALAMAN KONTAK
	public function kontak()
	{
		$data['menu_active'] = 'kontak';
		$this->load->view('/fe/layout/header', $data);
		$this->load->view('/fe/kontak');
		$this->load->view('/fe/layout/sidebar');
		$this->load->view('/fe/layout/footer');
	}
}