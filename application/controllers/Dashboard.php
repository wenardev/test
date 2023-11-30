<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {
        parent::__construct();
		$this->load->model('Dashboard_model');
    }

	//================================================================================================================================
	//HALAMAN DASHBOARD
	public function index()
	{
		//MEMBUAT ACTIVE PADA MENU
		$data['menu_active'] = 'index';

		//JUMLAH PRODUK, KATEGORI, PRODUK YANG DIJUAL & TIDAK DIJUAL
		$data['count_produk'] = $this->dashboard_model->get_count_produk();
		$data['count_kategori'] = $this->dashboard_model->get_count_kategori();
		$data['count_produk_dijual'] = $this->dashboard_model->get_count_produk_bisa_dijual();
		$data['count_produk_tidak_dijual'] = $this->dashboard_model->get_count_produk_tidak_bisa_dijual();

		//MENAMPILKAN PRODUK GET
		$data['produk'] = $this->dashboard_model->getProduk();

		$this->load->view('/be/layout/header');
		$this->load->view('/be/layout/sidebar', $data);
		$this->load->view('/be/index', $data);
		$this->load->view('/be/layout/footer');

	}

	//================================================================================================================================
	//HALAMAN PRODUK & MENAMPILKAN PRODUK
	public function produk()
	{
		//MEMBUAT ACTIVE PADA MENU
		$data['menu_active'] = 'produk';
		
		$this->load->model('Dashboard_model');

		//MEMANGGIL PRODUK 
		$data['produk'] = $this->Dashboard_model->getProduk();

		//MEMANGGIL DATA TABEL KATEGORI
		$data['kategori'] = $this->db->get('kategori')->result_array();

		//MEMANGGIL DATA TABEL STATUS
		$data['status'] = $this->db->get('status')->result_array();

		$this->load->view('/be/layout/header');
		$this->load->view('/be/layout/sidebar', $data);
		$this->load->view('/be/produk', $data);
		$this->load->view('/be/layout/footer');
	}

	//PRODUK CREATE
	public function produk_create() 
	{
		// MEMBUAT ACTIVE PADA MENU
		$data['menu_active'] = 'produk';

		$this->load->model('Dashboard_model');
		
		//MEMANGGIL PRODUK 
		$data['produk'] = $this->Dashboard_model->getProduk();

		//MEMANGGIL DATA TABEL KATEGORI
		$data['kategori'] = $this->db->get('kategori')->result_array();

		//MEMANGGIL DATA TABEL STATUS
		$data['status'] = $this->db->get('status')->result_array();

		$this->load->library('form_validation');
		$this->load->helper('form');

		if ($this->input->method() == 'post') {
			// SET RULES VALIDATION
			$this->form_validation->set_rules('nama_produk', 'Nama_produk', 'required', [
				'required' => 'Isi nama produk'
			]);
			$this->form_validation->set_rules('harga', 'Harga', 'required', [
				'required' => 'Isi harga produk'
			]);
			$this->form_validation->set_rules('kategori_id', 'Kategori', 'required', [
				'required' => 'Pilih kategori!'
			]);
			$this->form_validation->set_rules('status_id', 'Status', 'required', [
				'required' => 'Pilih status'
			]);

			if ($this->form_validation->run() == FALSE) {
				// FORM TIDAK VALID MAKA, TAMPILKAN PESAN ERROR
				$this->load->view('/be/layout/header');
				$this->load->view('/be/layout/sidebar', $data);
				$this->load->view('/be/produk');
				$this->load->view('/be/layout/footer');
			} else {
				// DATA FORM VALID, MAKA LANJUT KE PEMROSESAN DATA
				$data = array(
					'nama_produk' => $this->input->post('nama_produk'),
					'harga' => $this->input->post('harga'),
					'kategori_id' => $this->input->post('kategori_id'),
					'status_id' => $this->input->post('status_id'),
				);

				$this->load->model('Dashboard_model');

				if ($this->Dashboard_model->produk_create_model($data)) {
					// RESPON JIKA BERHASIL
					$this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">
					Data berhasil di tambahkan. <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button></div>');
					redirect('dashboard/produk');
				} else {
					// RESPON JIKA TIDAK BERHASIL
					$this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">
					Gagal menambahkan data. <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button></div>');
					redirect('dashboard/produk');
				}
			}
		} else {
			show_error('Metode permintaan tidak valid', 405);
		}
	}
	
	//PRODUK UPDATE
	public function produk_update($id_produk) 
	{
		// MEMBUAT ACTIVE PADA MENU
		$data['menu_active'] = 'produk';

		$this->load->model('Dashboard_model');
		
		//MEMANGGIL DATA PRODUK 
		$data['produk'] = $this->Dashboard_model->getProduk();
		
		//MEMANGGIL DATA KATEGORI
		$data['kategori'] = $this->db->get('kategori')->result_array();

		//MEMANGGIL DATA STATUS
		$data['status'] = $this->db->get('status')->result_array();

		$this->load->library('form_validation');
		$this->load->helper('form');

		if ($this->input->method() == 'post' || $this->input->method() == 'put') {
			
			// SET RULES FORM VALIDATION
			$this->form_validation->set_rules('nama_produk', 'Nama_produk', 'required', [
				'required' => 'Pilih kategori!'
			]);
			$this->form_validation->set_rules('harga', 'Harga', 'required', [
				'required' => 'Pilih kategori!'
			]);
			$this->form_validation->set_rules('kategori_id', 'Kategori', 'required', [
				'required' => 'Pilih kategori!'
			]);
			$this->form_validation->set_rules('status_id', 'Status', 'required', [
				'required' => 'Pilih status!'
			]);

			if ($this->form_validation->run() == FALSE) {
				// FORM TIDAK VALID MAKA, TAMPILKAN PESAN ERROR
				$this->load->view('/be/layout/header');
				$this->load->view('/be/layout/sidebar', $data);
				$this->load->view('/be/produk');
				$this->load->view('/be/layout/footer');
			} else {
				// DATA FORM VALID, MAKA LANJUT KE PEMROSESAN DATA
				$data = array(
					'nama_produk' => $this->input->post('nama_produk', TRUE),
					'harga' => $this->input->post('harga', TRUE),
					'kategori_id' => $this->input->post('kategori_id', TRUE),
					'status_id' => $this->input->post('status_id', TRUE),
				);

				if ($this->Dashboard_model->produk_update_model($id_produk, $data)) {
					// RESPON JIKA BERHASIL
					$this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">
					Data berhasil di perbaharui. <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button></div>');
					redirect('dashboard/produk');

				} else {
					// RESPON JIKA TIDAK BERHASIL
					$this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">
					Gagal memperbaharui data. <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button></div>');
					redirect('dashboard/produk');
				}
			}
		} else {
			show_error('Metode permintaan tidak valid', 405);
		}
	}

	//PRODUK DELETE
	public function produk_delete($id_produk) 
	{
		$this->load->model('Dashboard_model');
		
		// Panggil model untuk menghapus produk
		if ($this->Dashboard_model->produk_delete_model($id_produk)) {
        
		// Jika berhasil menghapus
        $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">
        Data berhasil dihapus. <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button></div>'); 
		} else {
		// Jika gagal menghapus
			$this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">
			Gagal menghapus data. <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button></div>');
		}
		// Redirect ke halaman produk setelah menghapus
		redirect('dashboard/produk');
	}

	//================================================================================================================================
	//HALAMAN KATEGORI
	public function kategori()
	{
		//MEMBUAT ACTIVE PADA MENU
		$data['menu_active'] = 'kategori';
		
		$this->load->model('Dashboard_model');
		
		//MEMANGGIL PRODUK 
		$data['kategori'] = $this->Dashboard_model->getKategori();
		
		$data['menu_active'] = 'kategori';
		$this->load->view('/be/layout/header');
		$this->load->view('/be/layout/sidebar', $data);
		$this->load->view('/be/kategori');
		$this->load->view('/be/layout/footer');
	}

	//KATEGORI CREATE
	public function kategori_create() 
	{
		// MEMBUAT ACTIVE PADA MENU
		$data['menu_active'] = 'kategori';
	
		$this->load->model('Dashboard_model');
			
		//MEMANGGIL KATEGORI 
		$data['kategori'] = $this->Dashboard_model->getKategori();
			
		$this->load->library('form_validation');
		$this->load->helper('form');
	
		if ($this->input->method() == 'post') {
		// SET RULES VALIDATION
			$this->form_validation->set_rules('nama_kategori', 'Nama_kategori', 'required', [
			'required' => 'Isi nama kategori!'
		]);
		
		if ($this->form_validation->run() == FALSE) {
			// FORM TIDAK VALID MAKA, TAMPILKAN PESAN ERROR
			$this->load->view('/be/layout/header');
			$this->load->view('/be/layout/sidebar', $data);
			$this->load->view('/be/kategori');
			$this->load->view('/be/layout/footer');
		} else {
			// DATA FORM VALID, MAKA LANJUT KE PEMROSESAN DATA
			$data = array(
				'nama_kategori' => $this->input->post('nama_kategori')
			);

		$this->load->model('Dashboard_model');

		if ($this->Dashboard_model->kategori_create_model($data)) {
		// RESPON JIKA BERHASIL
		$this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">
			Data berhasil di tambahkan. <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button></div>');
		redirect('dashboard/kategori');
		} else {
		// RESPON JIKA TIDAK BERHASIL
		$this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">
			Gagal menambahkan data. <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button></div>');
		redirect('dashboard/kategori');
			}
		}
		} else {
		show_error('Metode permintaan tidak valid', 405);
			}
		}
		
	
		//KATEGORI UPDATE
	public function kategori_update($id_kategori) 
		{
			// MEMBUAT ACTIVE PADA MENU
			$data['menu_active'] = 'kategori';
	
			$this->load->model('Dashboard_model');
			
			//MEMANGGIL DATA KATEGORI 
			$data['kategori'] = $this->Dashboard_model->getKategori();
	
			$this->load->library('form_validation');
			$this->load->helper('form');
	
			if ($this->input->method() == 'post' || $this->input->method() == 'put') {
				
				// SET RULES FORM VALIDATION
				$this->form_validation->set_rules('nama_kategori', 'Nama_kategori', 'required', [
					'required' => 'Isi nama kategori!'
				]);
	
				if ($this->form_validation->run() == FALSE) {
					// FORM TIDAK VALID MAKA, TAMPILKAN PESAN ERROR
					$this->load->view('/be/layout/header');
					$this->load->view('/be/layout/sidebar', $data);
					$this->load->view('/be/kategori');
					$this->load->view('/be/layout/footer');
				} else {
					// DATA FORM VALID, MAKA LANJUT KE PEMROSESAN DATA
					$data = array(
						'nama_kategori' => $this->input->post('nama_kategori', TRUE),
					);
	
					if ($this->Dashboard_model->kategori_update_model($id_kategori, $data)) {
						// RESPON JIKA BERHASIL
						$this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">
						Data berhasil di perbaharui. <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button></div>');
						redirect('dashboard/kategori');
	
					} else {
						// RESPON JIKA TIDAK BERHASIL
						$this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">
						Gagal memperbaharui data. <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button></div>');
						redirect('dashboard/kategori');
					}
				}
			} else {
				show_error('Metode permintaan tidak valid', 405);
			}
	}
	
	//PRODUK DELETE
	public function kategori_delete($id_kategori) 
		{
			$this->load->model('Dashboard_model');
			
			//PANGGIL KATEGORI UNTUK MENGHAPUS
			if ($this->Dashboard_model->kategori_delete_model($id_kategori)) {
			
				//JIKA BERHASIL MENGHAPUS
			$this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">
			Data berhasil dihapus. <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button></div>'); 
		} else {
			//JIKA GAGAL MENGHAPUS
			$this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">
			Gagal menghapus data. <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button></div>');
		}
			//REDIRECT KE HALAMAN KATEGORI SETELAH MENGHAPUS
			redirect('dashboard/kategori');
	}
	
}