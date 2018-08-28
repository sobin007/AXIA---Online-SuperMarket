<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    var $session_user;

    function __construct() {
        parent::__construct();

        $this->session_user = $this->session->userdata('logged_in');
    }

    public function index () {

        $this->load->view('admin/category');
    }
    public function product() {

        $data['title'] = 'Category';
        if ($this->session->userdata('logged_in')) {
            $data['session_user'] = $this->session_user;
        }
        $this->load->view('admin/category',$data);
    }
    
}