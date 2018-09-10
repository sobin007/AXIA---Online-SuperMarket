<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employees extends CI_Controller {

    var $session_user;

    function __construct() {
        parent::__construct();
        $this->session_user = $this->session->userdata('stafflogged_in');
        //$this->handler();
    }

    public function handler(){
        
        if (!$this->session->userdata('logged_in')) {
            $this->load->view('pages/dashboard');
        }else {
            $data['session_user'] = $this->session_user;
            if($user['role'] != '7') {
            redirect('Dashboard/home');
            exit;
            }
        }
    }

    public function home () {
        $data['title'] = 'Employee';
        if ($this->session->userdata('stafflogged_in')) {
            $data['session_user'] = $this->session_user;
            $this->load->view('employee/home');
        }
    }

    public function userProfile() {
        $data['title'] = 'Employee Profile';
        if ($this->session->userdata('logged_in')) {
            $data['session_user'] = $this->session_user;
            $this->load->view('employee/userprofile');
        }
    }
}