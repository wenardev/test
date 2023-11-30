<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Curl_lib {

    private $ci;

    public function __construct()
    {
        $this->ci =& get_instance();
        $this->ci->load->helper('url');
    }

    public function execute_post_request($url, $data)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $output = curl_exec($ch);
        curl_close($ch);

        return $output;
    }
}