<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    var $session_user;

    function __construct() {
        parent::__construct();

        // Utils::no_cache();
        // if (!$this->session->userdata('logged_in')) {
        //     redirect(base_url('/dashboard'));
        //     exit;
        // }
        $this->session_user = $this->session->userdata('logged_in');
        
    }

    public function index() {

        $data['title'] = 'Dashboard';
        
        if (!$this->session->userdata('logged_in')) {

            $this->load->view('dashboard');

        }else {
            $data['session_user'] = $this->session_user;
            /*
             * Load view
             */
            $this->load->view('templates/homeheader', $data);
            $this->load->view('templates/home');
            $this->load->view('templates/footer');
        }
    }
}
