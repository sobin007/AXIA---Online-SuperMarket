<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    var $session_user;

    function __construct() {
        parent::__construct();
        $this->session_user = $this->session->userdata('logged_in'); 
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
 

        // $user = $this->session->userdata('logged_in');
        // $redirect = 'admin/home';
        
        // if (!$user) {
        //     $this->load->view('pages/dashboard');
        // }else {
        //     $data['session_user'] = $this->session_user;
        //     if($user['role'] == '8') {
        //         $redirect = 'Admin/home';
        //     }else if($user['role'] == '7'){
        //         $redirect = 'Employees/home';
        //     }else{
        //         $redirect = 'Customer/home';
        //     }
        //     redirect($redirect);
        //     exit;
        // }
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

       

        // $data['title'] = 'Dashboard';
        // $user = $this->session->userdata('logged_in');
        // $redirect = 'admin/home';
        
        // if (!$user) {
        //     $this->load->view('pages/dashboard');
        // }else {
        //     $data['session_user'] = $this->session_user;
        //     if($user['role'] == '8') {
        //         $redirect = 'Admin/home';
        //     }else if($user['role'] == '7'){
        //         $redirect = 'Employees/home';
        //     }else{
        //         $redirect = 'Customer/home';
        //     }
        //     redirect($redirect);
        //     exit;
        // }
    }
}
