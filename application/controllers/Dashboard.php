<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    var $session_user;

    function __construct() {
        parent::__construct();
        if($this->session->userdata('logged_in')){
            $this->session_user = $this->session->userdata('logged_in');
        }else if($this->session->userdata('stafflogged_in')){
            $this->session_user = $this->session->userdata('stafflogged_in');
        }elseif($this->session->userdata('adminlogged_in')){
            $this->session_user = $this->session->userdata('adminlogged_in');
        } 
    }

    public function index() {

        $data['title'] = 'Dashboard';

        if($this->session->userdata('logged_in')){
            $redirect = 'Customer/home';
            redirect($redirect);
            exit;
        }else if($this->session->userdata('stafflogged_in')){
            $redirect = 'Employees/home';
            redirect($redirect);
            exit;
        }elseif($this->session->userdata('adminlogged_in')){
            $redirect = 'Admin/home';
            redirect($redirect);
            exit;
        }else{
            $this->load->view('pages/dashboard');
        }
    }

    public function home() {

        $data['title'] = 'Dashboard';

        if($this->session->userdata('logged_in')){
            $redirect = 'Customer/home';
            redirect($redirect);
            exit;
        }else if($this->session->userdata('stafflogged_in')){
            $redirect = 'Employees/home';
            redirect($redirect);
            exit;
        }elseif($this->session->userdata('adminlogged_in')){
            $redirect = 'Admin/home';
            redirect($redirect);
            exit;
        }else{
            $this->load->view('pages/dashboard');
        }
    }
}
