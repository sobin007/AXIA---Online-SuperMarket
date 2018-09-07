<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    var $session_user;

    function __construct() {
        parent::__construct();

        $this->session_user = $this->session->userdata('logged_in');
    }

    public function index () {

        $this->load->view('admin/product/product');
    }
    public function product() {

        $data['title'] = 'Product';
        $this->load->model('Admin_model');
        if ($this->session->userdata('logged_in')) {
            $data['session_user'] = $this->session_user;
        }

        $data['product'] = $this->Admin_model->getAllProduct();

        $this->load->view('admin/product/product',$data);
    }
    
}