<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('curl_lib');
        $this->load->model('produk_model');
    }

    public function index()
    {
        $username = 'tesprogrammer261123C18';
        $password = 'bisacoding-26-11-23';

        $data = array(
            'username' => $username,
            'password' => md5($password)
        );

        $output = $this->curl_lib->execute_post_request('https://recruitment.fastprint.co.id/tes/api_tes_programmer', $data);
        //$result = json_decode($output, true);
        $result = $output;

        if (isset($result['status']) && $result['status'] == 'success') {
            $produk_data = array(
                'nama_produk' => $result['data']['nama_produk'],
                'kategori_id' => $result['data']['kategori_id'],
                'harga' => $result['data']['harga'],
                'status_id' => $result['data']['status_id']
            );

            $this->produk_model->insert_produk($produk_data);
        }

        echo "<pre>";
        print_r($result);
        echo "</pre>";
    }
}