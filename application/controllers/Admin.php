<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    var $session_user;

    function __construct() {
        parent::__construct();
        $this->session_user = $this->session->userdata('logged_in');
    }

    public function index () {
        $this->load->view('admin/home');
    }
    public function home () {
        $data['title'] = 'ADMIN';
        if ($this->session->userdata('logged_in')) {
            $data['session_user'] = $this->session_user;
        }
        $this->load->view('admin/home');
    }
}