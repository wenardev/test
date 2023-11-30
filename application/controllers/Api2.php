<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('curl_lib');
        $this->load->helper('url');
    }

    public function index()
    {
        $username = 'tesprogrammer261123C16';
        $password = 'bisacoding-26-11-23';

        $data = array(
            'username' => $username,
            'password' => md5($password)
        );

        $output = $this->curl_lib->execute_post_request('https://recruitment.fastprint.co.id/tes/api_tes_programmer', $data);
        $result = json_decode($output, true);

        echo "<pre>";
        print_r($result);
        echo "</pre>";
    }
}